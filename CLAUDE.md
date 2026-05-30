# M2B Blog CMS — Project Context

## Aturan Kerja Wajib (JANGAN DILANGGAR)

1. **BACKUP dulu** sebelum modifikasi file/DB apa pun: `cp file file.bak.$(date +%F)`
2. **Jangan ubah/rusak modul yang sudah berjalan normal.**
3. **1 fitur = 1 branch**: `git checkout -b feature/nama-fitur`. Jangan commit ke `main` langsung.
4. **Test lokal dulu** sebelum push ke production.
5. **Gunakan `php artisan make:*`**, jangan buat file manual. Migration wajib ada `down()`.
6. **Konvensi**: `snake_case` DB · `camelCase` JS · `PascalCase` Class. CRUD via Filament Resource.
7. **JANGAN ubah `.env.production`** tanpa konfirmasi eksplisit. Jangan hapus migration yang sudah jalan.
8. **Gaya jawab**: singkat, tepat, 1 rekomendasi. Hemat token.

## Arsitektur: Content Hub & SEO 4 Domain

`cms.m2b.co.id` = single source of truth. Distribusi ke 4 domain via WP REST API (domain ber-WP) dan REST API internal (dira/gma SPA).

| Domain | Niche | Render | AdSense |
|---|---|---|---|
| m2b.co.id | Ekspor-impor, bea cukai, freight | SSR Laravel | Target utama |
| dira.co.id | Komoditas (sawit/karet/kopi), trading | SPA → perlu SSR | Setelah SSR siap |
| morabangun.com | ERP/CRM/AI bisnis | SSR | Sudah terpasang |
| gma-world.id | Maritime, konstruksi | SPA → perlu SSR | Tunda (B2B) |

AdSense pub-id: `ca-pub-5616961797801657`

## Gap yang Belum Ada (roadmap Fase 1+)

- `canonical_url` field di tabel `articles` — untuk `<link rel="canonical">` cross-domain
- `schema_type` field di tabel `articles`
- `routes/api.php` — REST API untuk distribusi ke dira/gma (non-WP)
- Webhook on-publish → trigger cache revalidate di domain terkait
- `IndexNow` / Google Indexing API ping saat publish
- Pillar `enum` di DB harus diubah ke `VARCHAR` (saat ini hardcoded: regulasi/umkm/news/logistik)

---


## Overview

Multi-site blog CMS built with **Laravel 12** + **Filament 3.x** admin panel. Serves multiple branded blog sites from a single codebase with AI-powered content generation (Claude) and WordPress publishing.

## Tech Stack

| Technology | Details |
|---|---|
| **Backend** | PHP 8.2+, Laravel 12 |
| **Admin Panel** | Filament 3.x (`/portal` path, login at `/portal/masuk`) |
| **Frontend (Blog)** | Blade + Tailwind CSS 4 + Alpine.js |
| **Build Tool** | Vite + `laravel-vite-plugin` + `@tailwindcss/vite` |
| **Database** | MySQL via Laravel Eloquent |
| **AI** | Anthropic Claude API (Sonnet/Opus models) |
| **External Integration** | WordPress REST API (publishing) |

## Architecture

### Multi-Site System

- Each **Site** record has a unique `domain`, `slug`, and per-site credentials (Anthropic, WordPress).
- `SiteResolver` service detects the current site from the HTTP hostname (`request()->getHost()`).
- Sites are cached by domain for 1 hour.
- Blog frontend is accessible at `/blog/` route path.
- **Subdirectory blog mode** supported (e.g., `morabangun.com/blog/`) via `mora-blog-index.php` bootstrap file that sets `BLOG_SUBDIRECTORY_MODE = true`.

### Key Models

| Model | Table | Key Fields |
|---|---|---|
| `Site` | `sites` | `name`, `slug`, `domain`, `wp_url`, `wp_username`, `wp_app_password` (encrypted), `anthropic_api_key` (encrypted), `anthropic_model`, `content_pillars` (JSON), `languages` (JSON), `ai_prompt_context`, `whatsapp_number`, `logo_url`, `is_active` |
| `Article` | `articles` | `site_id`, `title`, `slug`, `content_html`, `focus_keyword`, `meta_description`, `tags` (JSON), `schema_faq` (JSON), `pillar`, `language`, `status` (draft/scheduled/published), `wp_post_id`, `wp_post_url`, `featured_image_url` |
| `TopicIdea` | `topic_ideas` | `site_id`, `topic`, `pillar`, `language`, `generated_titles` (JSON), `selected_title`, `is_used`, `article_id` |
| `Setting` | `settings` | `key`, `value`, `group`, `is_encrypted` (global settings, fallback for per-site) |

### Noteworthy Conventions

- **ENUM columns** in migrations are hardcoded strings in PHP (`regulasi`, `umkm`, `news`, `logistik` for pillars; `id`, `en` for languages; `draft`, `scheduled`, `published` for status).
- **Encrypted fields** use Laravel's `Crypt` facade (cast as `encrypted` in Site model, manual encrypt/decrypt in Setting model).
- **Content pillars** are configurable per-site via `content_pillars` JSON, with fallback to defaults.
- **SEO scores** are calculated via `ArticleResource::calculateSeoScore()` static method (0-100% based on title, meta, keyword, content length, tags, FAQ).
- **Asset loading** for blog frontend has 3 modes: subdirectory (manual manifest reading), Vite dev (`@vite()`), or inline CSS (fallback when no manifest/hot file).

## Routes (Public)

```
GET  /                    → redirect to /portal/masuk
GET  /blog                → BlogController@index (multi-site blog index)
GET  /blog/{slug}         → BlogController@show (article detail)
GET  /blog/sitemap.xml    → SitemapController@index
GET  /blog/feed.xml       → FeedController@index
GET  /sitemap.xml         → SitemapController@index
GET  /feed.xml            → FeedController@index
GET  /portal/*            → Filament admin panel
```

## Admin Panel (Filament)

Path: `/portal`, Login: `/portal/masuk`

### Navigation Structure

**Content Group:**
1. **Content Studio** — Livewire wizard for AI article generation (site → topic → title → preview → publish)
2. **Articles** — CRUD with SEO score, pillar badges, bulk publish to WordPress
3. **Topic Ideas** — CRUD for brainstorming topics

**System Group:**
1. **Sites** — Multi-site management with per-site AI/WP credentials
2. **Settings** — Global Anthropic + WordPress credentials (fallback for sites)

### Dashboard Widgets
1. `StatsOverviewWidget` — Article counts, WP published, active sites, topic ideas
2. `ArticlesByPillarChart` — Bar chart of articles per pillar
3. `LatestArticlesTable` — Recent published/WP-pushed articles

### Key Services

**`AnthropicService`** — Generates titles and full articles via Claude API.
- Two API calls per article: 1) structured JSON metadata (SEO title, slug, meta desc, keyword, tags), 2) HTML content (1200-1500 words).
- Falls back to global settings if per-site credentials are empty.
- Default model: `claude-sonnet-4-20250514`.

**`WordPressService`** — Publishes articles to WordPress via REST API.
- Supports per-site or global WP credentials.
- Uploads featured images from URL to WP Media Library.
- Uses Basic Auth with Application Password.

**`SiteResolver`** — Detects site from HTTP hostname with caching.

**`ContentGenerator`** (Livewire) — Multi-step wizard component:
1. Select site → 2. Enter topic → 3. Pick AI-generated title → 4. Preview/save → 5. Publish to WP

## Frontend (Public Blog)

- Layout: `resources/views/blog/layouts/blog.blade.php`
- Index: `resources/views/blog/index.blade.php` (article grid + pillar filter)
- Show: `resources/views/blog/show.blade.php` (article with TOC, FAQ accordion, related articles, prev/next nav)
- Design system: Tailwind CSS 4 with custom inline styles (when not using Vite build)
- SEO: Open Graph, Twitter Cards, JSON-LD schemas (Blog, Article, BreadcrumbList, FAQPage, WebSite), RSS feed, sitemap
- AdSense: Auto ads + in-article ad unit (configurable via services config)
- Features: Search modal, pillar filtering, pagination, breadcrumbs, estimated read time, tags, FAQ accordion (Alpine.js)

## Dev Workflow

```bash
# Development (runs server + queue + logs + Vite in parallel)
composer dev

# Build for production
npm run build

# Run tests
composer test

# Setup fresh project
composer setup
```

PHP package manager: Composer | JS package manager: npm (with `concurrently` for dev script)

## Git History (Recent)

| Commit | Description |
|---|---|
| `6bf7746` | Fix Livewire ExtendBlade parse error (@elseif → @if blocks) |
| `fa98981` | Move blogAssetPrefix earlier in <head> for RSS/Sitemap |
| `32432e6` | Add subdirectory blog support for morabangun.com |
| `c945ac9` | Add Vite build assets for server deployment |
| `d67c3ff` | Multi-site upgrade + blog frontend with SEO & AdSense |
| `03f77b5` | Dashboard analytics, SEO score, bulk publish |
| `6265997` | Redirect `/` to `/portal/masuk` |
| `8c161ff` | Initial commit — Laravel Filament setup |

## Deployment Notes

- Production entry point: `public/index.php` (primary) or `mora-blog-index.php` (subdirectory mode for morabangun.com)
- Vite build assets are committed to repository (in `public/build/`)
- Blog frontend has fallback modes for environments without Vite build: subdirectory mode reads manifest manually, fallback mode uses inline CSS
