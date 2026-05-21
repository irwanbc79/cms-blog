# M2B Blog CMS — Claude Code Instructions

## Project Overview

Blog content management system untuk PT Mora Multi Berkah (M2B).
Target: generate 3 artikel/minggu (2 ID + 1 EN) dengan AI, auto-publish ke m2b.co.id/blog.

## Stack

- Laravel 12 + Filament 3.3
- MySQL (database: cms_m2b)
- PHP 8.3
- Livewire (untuk Content Wizard)
- Anthropic Claude API
- WordPress REST API

## Database Tables (sudah migrated)

- `users` — Filament admin users
- `articles` — published articles with full SEO meta
- `topic_ideas` — generated topic pool with 10 title options
- `settings` — encrypted credentials (Anthropic API, WP credentials)

## Business Context

- M2B: freight forwarding + PPJK berlisensi
- Pelabuhan: Belawan, Kualanamu, Tanjung Priok, Tanjung Perak, Makassar, Balikpapan
- Audiens: Eksportir/Importir B2B + UMKM Ekspor Pemula
- WhatsApp M2B: +6281263027818
- Deploy target: cms.m2b.co.id (shared hosting Hostinger)

## Content Pillars (rotation weekly)

- Senin: Regulasi (pillar: 'regulasi')
- Rabu: UMKM Ekspor (pillar: 'umkm')
- Jumat: News/Logistik (pillar: 'news' atau 'logistik')

## Key Features to Build

1. Article CRUD (Filament Resource)
2. Topic Idea manager (Filament Resource)
3. Settings page (Anthropic API key, WP credentials — encrypted)
4. Content Generation Wizard (Livewire):
    - Step 1: Pick pillar + language + topic
    - Step 2: AI generates 10 title options with CTR score
    - Step 3: Pick 1 title → generate full article
    - Step 4: Preview + Publish to WordPress
5. Dashboard widgets: weekly stats, pillar status
6. Weekly Batch: generate 3 articles at once

## Services Needed

- `App\Services\AnthropicService` — call Claude API
- `App\Services\WordPressService` — publish to m2b.co.id via REST API

## Deploy Plan

- Local dev: http://127.0.0.1:8000/admin
- Production (nanti): cms.m2b.co.id via rsync to Hostinger

## Coding Rules (per user preference)

- Backup file sebelum edit besar
- Jangan rusak fitur yang sudah jalan
- Prefer edit via terminal commands (find, grep, sed)
- Responses: singkat, jelas, actionable
