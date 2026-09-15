# Morabangun AdSense Low-Value Remediation Package

**Prepared:** 8 September 2026  
**Scope:** `morabangun.com` only  
**Mode:** local preparation; no production write, deployment, or AdSense review request

## Decision

Do not request another AdSense review yet. The screenshot proves only that
`ads.txt` is authorized and that AdSense reported **Low value content**; it does
not prove that every technical, crawl, rendering, consent, or indexing control
is healthy. Content value and trust are the primary remediation scope, while
the public technical layer must still pass the release checks below. The next
release must reduce unverified commercial claims, withdraw or rebuild
thin/news-first pages, genuinely merge overlapping search intents, and prove
that every remaining indexable page contains original operational value.

No article in this document is marked fixed. Every disposition below is a
release recommendation that remains subject to current production checksum,
full-HTML review, human approval, and public verification.

## Evidence boundary

### Verified from the current repositories

- The central CMS is Laravel with SQLite in production and resolves
  Morabangun by domain. Existing code comments identify Morabangun as site ID
  `4`, but all production operations must resolve the site by
  `sites.domain = 'morabangun.com'` instead of trusting that historical ID.
- `CONTENT_AUTO_PUBLISH_ENABLED` and `CONTENT_AUTO_TOPUP_ENABLED` default to
  `false`; the production values still need a read-only check.
- The last stored baseline records 49 indexable published Morabangun articles:
  41 needing revision, 31 templated titles, 10 thin articles, and 9 articles
  without an original-evidence signal. These are historical counts and must be
  recalculated from current production HTML before release.
- Existing manifests contain checksum-bound source states for:
  - 10 thin AI/news articles (`91`-`100`) proposed for draft curation;
  - exactly 30 articles in the two metadata-only manifests (15 + 15);
  - article `232`, which received a separate full rewrite. The historical
    31-templated-title count is therefore not the metadata-manifest count and
    must not be reported as “31 metadata patches”;
  - scheduled article `272`, which remains unpublished and unapproved.
- The separate local homepage repository at `/Users/irwanbece/morabangun`
  contains unqualified counts, percentage outcomes, live-system labels,
  autonomous-operation wording, and demo metrics. References below use paths
  relative to that repository; they are not paths inside the central CMS.

### Current live evidence available for this package

- The 8 September 2026 AdSense screenshot shows Morabangun as
  **Perlu diperhatikan** with detail **Low value content** and `ads.txt`
  **Authorized**.
- A same-day public homepage crawl loaded the visible content and exposed the
  same claims listed in the homepage checklist below.
- Direct live sitemap and article fetches were blocked in this environment.
  Therefore the exact current production inventory and current HTML checksums
  are an explicit gate, not an assumption.

### Material-claim definition and mandatory human control

A **material claim** is any statement that could change a buyer's, regulator's,
publisher's, or user's decision, including: laws and effective dates; customs,
tax, licensing, HS, duty, penalty, clearance, or release outcomes; client names
or testimonials; project/client counts; prices, discounts, partnerships, and
timelines; percentages, ROI, accuracy, speed, savings, success rates, or other
measured results; security or production-readiness assertions; and claims that
AI or software autonomously classifies, approves, transmits, or ensures an
operational outcome.

Every material claim needs one of three explicit dispositions: `(a)` exact
primary evidence plus scope, date, methodology, and limitations; `(b)` a clear
fictional demo/simulation label that cannot be mistaken for a real result; or
`(c)` removal. Any write to an already published page containing regulated or
material claims requires approval from a named human reviewer **after** the
final diff and sources are available and **before** the write command runs.

## P0 risky-claim inventory

### Homepage and commercial trust claims

| Source | Current claim type | Risk | Required disposition |
|---|---|---|---|
| `/Users/irwanbece/morabangun/resources/views/components/hero.blade.php:76,83,391,409` | `50+` projects and `25+` active clients | Counts are presented as facts without a dated evidence register | Remove until supported, or link to a dated portfolio methodology and count only consented real projects |
| `/Users/irwanbece/morabangun/resources/views/components/cta.blade.php:76-77` | `50+` satisfied clients | Conflicts with the hero's `25+` active clients and lacks a definition | Remove; do not replace with another number until reconciled |
| `/Users/irwanbece/morabangun/resources/views/components/services.blade.php:17,35,69-72,238-239` | 30-45% efficiency, 29% conversion, 19% wasted time, 90% error reduction, 5-10x speed, ROI in 3-6 months | Benchmark-style promises have no source, cohort, baseline, or limitations | Replace with measurement methodology and conditional language; use client results only with dated evidence and permission |
| `/Users/irwanbece/morabangun/resources/views/components/flagship-product.blade.php:36,43-44,62-63,96-97` | Autonomous CEISA integration, 85% faster input, 70% fewer errors, 99.4% OCR, real-time PIB/PEB submission | High-stakes operational and regulated claims; no methodology is shown | Label as **interactive simulation** unless production authorization, logs, sample size, test set, and human-control boundaries are proven |
| `/Users/irwanbece/morabangun/resources/views/components/portfolio.blade.php:358-366,581-585,1009-1017,1229-1233` | Dashboard numbers and `98.2% Success`, `242 Docs` | Demo figures visually read as production results | Add persistent `DEMO DATA / SIMULASI` labels or remove; never imply customs approval success |
| `/Users/irwanbece/morabangun/resources/views/components/portfolio.blade.php` | Repeated `LIVE` labels | A reachable URL does not prove a production client engagement or daily use | Use `Public demo`, `Company site`, or `Production` only when status and client consent are documented |
| `/Users/irwanbece/morabangun/resources/views/components/process.blade.php:198` | Average transformation in 6-12 weeks | Timeline promise without scope assumptions | Replace with a discovery-dependent estimate and list the variables that change delivery time |
| `/Users/irwanbece/morabangun/resources/views/components/hostinger-promo.blade.php:20-52` | Official partner, exclusive 20% discount, free domain, active and verified | Partnership and promotion may expire; affiliate relationship is not disclosed in the visible copy | Verify current partner terms, expiry, eligible plans, and affiliate disclosure; otherwise remove `official`, `exclusive`, and `verified` |
| `/Users/irwanbece/morabangun/resources/views/components/testimonials.blade.php` | Named client testimonials | Consent, role, and result substantiation are not stored in the public evidence layer | Keep only with written permission and a dated case record; otherwise anonymize truthfully or remove |
| `/Users/irwanbece/morabangun/resources/views/components/footer.blade.php:150` | `Production Ready` | Vague certification-like badge | Replace with a precise, provable statement or remove |

### Article 232: regulated-content re-review

Article `232` is a **keep candidate**, not a pass. Its rewrite manifest itself
contains claims that require a fresh customs/editorial review:

1. Links point to institutional homepages rather than the exact regulation or
   procedural page being cited.
2. The fixed sample uses specific HS classifications, duty rates, 11% VAT, and
   a 100% administrative penalty without a product dossier, effective-date
   qualification, or calculation authority.
3. `Reject`, `SPJM`, and `SPTNP` are mixed in one taxonomy even though they are
   different procedural states and cannot share a generic remedy.
4. Wording about retransmitting the same AJU, manifest tolerance, licensing,
   guarantees, objection security, and cargo release needs validation against
   the exact current rule and implementation.
5. The closing paragraph advertises an autonomous CEISA/API capability without
   evidence of authorization or production scope.

**Disposition:** keep the search intent, but rewrite or qualify every regulated
claim against exact primary-source URLs and human customs review. The worked
example must be explicitly labeled a fictional calculation and use an
effective-date banner.

## Article disposition

### Withdraw, redirect, or rebuild; preserve records

Use the existing guarded draft-curation pattern only after production-state
verification. These are thin AI/news snippets, not durable service expertise:

| IDs | Disposition | Reason |
|---|---|---|
| `91-100` | **Decision required per URL: draft/404, substantive merge + 301, or full rebuild** | The historical manifest identifies all ten as sub-400-word AI/news articles. Current production word counts, HTML hashes, GSC performance, and backlinks must be revalidated first. Preserve records; do not delete. |

Manifest already present:
`database/article-curations/2026-08-29-morabangun-thin-news-curation.php`.
Do not assume it is unapplied; first inspect current statuses and checksums.

`draft` and `noindex` are not synonyms in this CMS. Changing a published
article to `draft` removes it from public article queries, sitemap, and feed;
its old public URL is expected to return `404`. It does **not** serve a live
page carrying a `noindex` directive. For each URL, record one evidence-based
decision before authoring a new manifest:

- If GSC shows no meaningful impressions/clicks and backlink inspection finds
  no valuable referring page, draft it and verify `404`, absence from sitemap
  and feed, and removal from internal links. Use `410` only after an explicit
  routing/product decision and tested implementation; the current draft flow
  provides `404`.
- If the URL has useful backlinks, search demand, or unique material, merge its
  useful passages, evidence, examples, and internal links into a selected
  stronger target **before** applying a same-site 301 redirect. Verify the old
  URL returns `301` directly to a `200` target, with no chain or loop.
- If its intent is strategically distinct and evidence can be made original,
  rebuild it in full and keep `200`; a metadata-only edit is insufficient.
- A published `noindex` hold is permitted only if a separately implemented and
  tested robots-meta control exists. No such control is assumed here.

### Consolidation candidates; canonical alone is insufficient

The following overlap is supported by titles/search intent, but full HTML,
Search Console, backlinks, and current checksums must determine the target:

| Cluster | Article IDs | Proposed decision |
|---|---|---|
| ERP manufacturing implementation | `131`, `231` | Consolidate the weaker page into the stronger evidence-led implementation pillar; keep `81` as a distinct benefits/use-case page only if it contains original evidence |
| ERP/TCO cost | `181`, `264` | Consolidate into one auditable TCO worksheet; keep `199` separate only as open-source versus commercial selection intent |
| CRM follow-up | `226`, `227` | Prefer one operational SOP pillar; retain AI follow-up as a separate page only if it demonstrates architecture, consent, safety, and measured evidence |
| Multi-branch finance | `225`, `228` | Consolidate if both pages primarily target consolidation accounting; otherwise define parent-child intent and remove duplicated sections |
| Transformation adoption | `138`, `260` | Use `138` as a strategy hub and `260` as the human-adoption guide only if substantial overlap is removed |
| CRM evaluation/pipeline | `134`, `185` | Compare full content; preserve two URLs only if one is product selection and the other is pipeline operations |

No canonical-consolidation manifest may be authored until the production audit
identifies the target and alternate with exact checksums. For every approved
cluster, the target body must first absorb the alternate's verified unique
value, remove duplicated sections, present one coherent search intent, update
its sources and internal links, and pass human review. Only then may the
alternate receive the same-site canonical/301 state. A canonical tag or redirect
without a real target-content merge does not satisfy this remediation.

### Rewrite and human-review queue

Metadata changes do not cure low-value content. The 30 unique IDs below (15 in
each existing metadata manifest) have metadata patches, but their body content
is not proven remediated. Article `232` is a separate 31st historically
templated-title record with a full-rewrite manifest and remains in the P0 queue:

| Priority | Article IDs | Required review |
|---|---|---|
| P0 regulated/high-stakes | `183`, `184`, `228`, `232`, `233` | Exact official sources, current effective dates, scope limits, no compliance or outcome promises |
| P1 numeric/ROI/automation claims | `81`, `134`, `139`, `181`, `182`, `185`, `186`, `194`, `199`, `225`, `226`, `227`, `229`, `234`, `236`, `256`, `264`, `268` | Remove generic benchmarks; add real worksheet, architecture, failure modes, screenshots, or consented case evidence |
| P2 implementation depth | `131`, `132`, `138`, `203`, `230`, `231`, `252`, `260` | Add decision matrices, acceptance criteria, rollback, ownership, failure recovery, and first-hand process detail |

Article `272` stays **scheduled/unpublished** until a named human reviewer
verifies its sources, examples, and business claims. It must not be used to
inflate article count before review.

### Keep candidates

- Article `232` may remain only after the P0 regulated-content re-review above.
- The eight published articles not represented in the 41-item finding set are
  provisional keep candidates. Their IDs and current state must be recovered
  from the fresh production audit before this package can identify them.
- “Keep” means eligible for human review, not AdSense-ready by default.

## Homepage remediation checklist

- [ ] Reconcile all project/client counts against a dated internal evidence
      register; remove the counters until this is done.
- [ ] Replace every generic percentage and ROI timeline with either a cited
      benchmark plus limitations or a consented, dated case-study methodology.
- [ ] Put a persistent **SIMULASI — tidak mengirim data ke CEISA** banner on the
      M2B One sandbox unless live authorization and production controls are
      proven.
- [ ] Remove any suggestion that AI independently selects HS codes, approves
      compliance, transmits final declarations, or guarantees release.
- [ ] Relabel mock dashboards and synthetic transactions as demo data.
- [ ] Validate every `LIVE` project label and testimonial against owner consent.
- [ ] Verify Hostinger partnership/promotion terms and add affiliate disclosure;
      otherwise remove the block.
- [ ] Replace `Production Ready` and `Active & Verified` badges with precise,
      testable wording.
- [ ] Ensure About, Contact, Privacy, Terms, Disclaimer, editorial policy,
      corrections process, author identity, and ad-independence disclosures are
      linked from all blog pages.
- [ ] Do not add more ad units while the content-review gate is red.

## Production-safe execution gates

The commands below are **next-run instructions only**. They were not executed
while preparing this package.

### Gate 1 — treat the CMS and homepage as separate releases

Do not deploy either repository from its current working directory. At the time
of drafting, both local repositories contained unrelated changes. Capture them
as evidence and leave them untouched; do not clean, stash, reset, add, or commit
them as part of this remediation. Create a separate clean release worktree from
an owner-approved branch/commit for each repository.

| Release unit | Local source root | Production target | Required independent controls |
|---|---|---|---|
| Central CMS: articles, sitemap, feed, redirects, AdSense audit | `/Users/irwanbece/worktrees/cms-blog-adsense` | **Unknown until read-only discovery**; record the resolved absolute release root and SQLite path, without assuming a Hostinger username | Own branch/commit, clean worktree, database and code backup, inventory hashes, tests, dry-run/apply approval, deploy log, HTTP verification, and database/code rollback |
| Morabangun homepage: commercial copy and demo labels | `/Users/irwanbece/morabangun` | **Unknown until read-only discovery**; record the resolved absolute document/release root | Own branch/commit, clean worktree, current-production file and rendered-homepage checksums, code backup, tests/build, reviewed diff, deploy log, HTTP verification, and code rollback |

For **each** local repository and its clean release worktree, archive all four
states separately before editing:

```bash
pwd
git branch --show-current
git rev-parse HEAD
git status --porcelain=v1 --untracked-files=all
git diff --binary
git diff --cached --binary
git ls-files --others --exclude-standard
```

Store those outputs under the private evidence directory created in Gate 2,
including repository name, branch, full commit, timestamp, and operator. The
release worktree must return no output from `git status --porcelain=v1
--untracked-files=all` before the first remediation edit. A dirty result is a
hard stop, not permission to alter the existing unrelated changes.

Discover both production targets through the hosting control panel, deployment
configuration, release symlink, and `pwd`/`readlink -f` on the selected target.
Record the actual paths in the sign-off artifact. Do not copy an historical
path from this document and do not infer or invent an account username.

### Gate 2 — private backup root, non-exposure, and off-host copy

Select one unique absolute backup root that is outside every `public_html`, web
document root, repository/worktree, and application storage path. Replace the
placeholder below only after checking the resolved path manually. Replace
`YYYYMMDD-HHMMSS-UNIQUE` with the actual execution timestamp plus a unique
suffix; never reuse a prior run directory:

```bash
install -d -m 700 /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE
install -d -m 700 /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/cms
install -d -m 700 /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/homepage
install -d -m 700 /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/evidence
```

Before any write, prove that `realpath` for all three directories is outside
both discovered production roots. Create a harmless uniquely named sentinel in
the private root, then request the corresponding guessed public paths under
both domains; every HTTP request must return `404` or `403`, never `200`. Remove
the sentinel only after recording the result. Do not place the sentinel or any
backup in a public directory merely to perform this test.

For the central CMS, discover the database driver and resolved SQLite path
without printing `.env`, then create a transactional snapshot:

```bash
php artisan tinker --execute='dump(config("database.default"), config("database.connections.sqlite.database"));'
sqlite3 /CONFIRMED/ABSOLUTE/PATH/database.sqlite ".backup '/ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/cms/database.sqlite'"
chmod 600 /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/cms/database.sqlite
sqlite3 /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/cms/database.sqlite "PRAGMA integrity_check;"
```

Back up the exact currently deployed code for each release unit into its own
private directory. Do not use a local checkout as a substitute for a production
backup. Generate separate checksum manifests and protect them:

```bash
sha256sum /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/cms/database.sqlite /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/cms/CMS-CODE-ARCHIVE > /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/evidence/cms.sha256
sha256sum /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/homepage/HOMEPAGE-CODE-ARCHIVE > /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/evidence/homepage.sha256
chmod 600 /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/evidence/cms.sha256
chmod 600 /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/evidence/homepage.sha256
```

Copy both backup directories and checksum manifests to an approved encrypted
off-host destination. Re-run `sha256sum -c` on the off-host copy and record a
pass before any production write. No verified off-host copy means no release.

### Gate 3 — read-only production identity, inventory, and current hashes

From the **discovered central CMS production root**, record `pwd`, resolved
release path, branch, and full commit. If production is not a Git checkout,
record a checksum manifest of deployed application files instead. Then run:

```bash
php artisan config:show adsense
php artisan tinker --execute='dump(\App\Models\Site::query()->where("domain", "morabangun.com")->value("id"));'
php artisan adsense:audit-queue --status=published --site=morabangun.com --json --store
php artisan adsense:audit-queue --status=scheduled --site=morabangun.com --json --store
php artisan adsense:audit --live --json --store
```

Copy the stored reports from `storage/app/private/adsense-audits` into the
external private evidence directory and checksum them. Stop if the domain is
missing, automation is enabled, the branch/commit is not the approved release,
or evidence cannot be preserved.

Create a dedicated **read-only** inventory containing expected state and a hash
of the actual production body. The inventory must include `id`, title, slug,
status, editorial status, canonical URL, timestamps, stored `word_count`, a
word count freshly computed from current `content_html`, and
`content_sha256 = SHA-256(content_html)`. Store the output directly in the
external private evidence directory with mode `600`; do not print bodies,
credentials, users, or comments. For example, use a reviewed read-only Tinker
query that maps current rows to those fields and computes `hash('sha256',
(string) $article->content_html)` and the normalized visible-word count, then
redirect its JSON output to:
`/ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/evidence/article-inventory.json`.

Recalculate the production thin-content count using the configured 1,200-word
threshold and the freshly computed visible-word count. Reconcile the 49/41/31/
10/9 historical baseline, IDs `91-100`, both 15-item metadata manifests,
article `232`, and article `272`. An old manifest must not be reused if any
expected field, content hash, status, or count differs.

For the homepage release, checksum the **current production source files** that
will be replaced and also record the rendered response before editing:

```bash
sha256sum /CONFIRMED/HOMEPAGE/PRODUCTION/FILE-1 /CONFIRMED/HOMEPAGE/PRODUCTION/FILE-2 > /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/evidence/homepage-production-files-before.sha256
curl -fsSL https://morabangun.com/ | sha256sum > /ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/evidence/homepage-http-before.sha256
```

The deployed file hashes must match the recorded current-production baseline
immediately before deployment. Any drift is a hard stop requiring a fresh
backup, diff, and approval.

### Gate 4 — evidence-based URL decisions and real consolidation

Export URL-level GSC data for at least the previous 16 months where available,
plus a backlink report, for every withdrawal/consolidation candidate. Record
clicks, impressions, last crawl, indexing state, referring domains, target URL,
and the chosen expected result: `200 rebuilt`, `404 draft`, deliberately
implemented `410`, or `301 merged`. No URL may be changed without this row.

For a `301 merged` decision, attach a before/after content map proving which
unique passages, evidence, examples, and useful internal links moved into the
target. The target rewrite and its exact source URLs must pass review before
the redirect manifest is applied. Canonical-only duplication does not pass.

### Gate 5 — clean-worktree tests and checksum-bound dry runs

Run tests from each clean release worktree, never from the unrelated dirty
working directories:

- Central CMS: relevant editorial, guarded-patch, curation, canonical,
  sitemap/feed, and public-route tests; then the normal project test suite if
  the targeted tests pass.
- Homepage: `composer test` and `npm run build`, followed by a visual desktop
  and mobile comparison of the homepage, project cards, labels, trust pages,
  and navigation.

Run a dry-run for every newly reviewed CMS manifest. A checksum mismatch is a
safety success: stop, refresh the inventory, and rebuild the manifest.

```bash
php artisan articles:apply-curation NEW-MORABANGUN-CURATION.php --dry-run --allow-published
php artisan articles:apply-guarded-patches NEW-MORABANGUN-PATCHES.php --dry-run --allow-published
php artisan articles:apply-editorial-revision NEW-MORABANGUN-ARTICLE.php --dry-run --allow-published
php artisan articles:apply-canonical-consolidation NEW-MORABANGUN-CANONICAL.php --dry-run
```

Do not replace `NEW-*` with a historical manifest until Gate 3 proves that it
is unapplied and matches current production exactly.

### Gate 6 — named sign-off before any published regulated-content write

Create
`/ABSOLUTE/PRIVATE/BACKUP/ROOT/morabangun-YYYYMMDD-HHMMSS-UNIQUE/evidence/MORABANGUN-EDITORIAL-SIGNOFF-YYYYMMDD.md`.
It must name the owner approver, editorial reviewer, technical reviewer, and—for
regulated claims—the qualified human regulatory reviewer. Record role, full
name, timestamp, release unit, branch, full commit, manifest/hash, reviewed
URLs, material-claim dispositions, test results, and an explicit approve/reject
decision. Placeholders or an unnamed “team” do not count as sign-off.

After final dry-runs and diffs are attached, stop. Obtain explicit owner
authorization and the required named human approval **before** any write to a
published regulated-content row or production homepage file. Approval of this
plan is not approval to write, deploy, or press the AdSense review button.

### Gate 7 — independent deploy, verification, and rollback

Deploy the two release units independently in small, reversible releases.

- **Central CMS:** recheck SQLite integrity; apply only owner-authorized,
  checksum-bound batches; preserve `--store` audits; verify expected `200`/
  `301`/`404`/`410` results, direct redirects, canonical tags, sitemap, feed,
  schema, internal links, and mobile rendering. Roll back by restoring the
  private transactional SQLite snapshot and exact CMS production-code archive,
  then re-run integrity and HTTP checks.
- **Homepage:** require current-production source checksums to equal Gate 3,
  deploy only the approved homepage commit/files, and verify rendered copy,
  persistent demo labels, navigation, trust links, schema, desktop/mobile, and
  the post-deploy HTTP-body hash. Roll back using only the independently
  checksummed homepage production-code archive, then verify the baseline pages.

Archive post-release branches/commits, deploy logs, checksums, tests, screenshots,
HTTP status/redirect evidence, and stored audits. Only after recrawl evidence,
the objective rubric below, and final named editorial/regulatory sign-off pass
should an AdSense review request be considered. Pressing that button still
requires separate explicit owner authorization.

## Release acceptance gate

Morabangun is not ready for resubmission until all conditions are true:

### Hard-fail conditions

Any one of these keeps the release and AdSense resubmission gate red:

1. Either production target, pre-release checksum, backup, off-host verification,
   branch/commit, or rollback procedure is missing or stale.
2. A release worktree is dirty, or existing unrelated staged, unstaged, or
   untracked changes were modified.
3. Current production inventory lacks expected state, freshly computed visible
   word count, or `content_sha256`, or does not reconcile with the manifests.
4. Any indexable page has a material claim without the evidence/disposition
   required above, or a published regulated-content write lacks prior named
   human approval.
5. Any consolidation relies only on canonical/redirect metadata without a
   documented substantive merge into the target.
6. An affected URL's intended and actual HTTP result differ; a redirect chains,
   loops, or lands anywhere other than a reviewed `200` target; or withdrawn
   content remains in sitemap, feed, or internal links.
7. Automatic publishing/top-up is enabled, public/technical tests fail, a
   private backup/evidence URL is exposed, or the AdSense account has a new
   policy issue.

### Retained-page rubric

Score every retained indexable article from `0` to `2` in each dimension and
record the evidence URL/path in the sign-off artifact:

| Dimension | `0` — fail | `1` — partial | `2` — pass |
|---|---|---|---|
| Intent and necessity | Duplicates another page or has no defined user task | Intent stated but overlaps materially | Unique user task; overlap removed or page substantively merged |
| Original operational value | Generic summary | One useful original element | Reproducible worksheet, first-hand process, decision matrix, architecture, test, or consented case evidence |
| Material-claim evidence | Unsupported or misleading claim | Source exists but scope/date/method is incomplete | Every material claim evidenced, qualified, simulated clearly, or removed |
| Source quality and currency | No source or generic homepage | Mixed secondary/primary or missing effective date | Exact primary URLs, effective dates, limitations, and access/review date |
| Transparency and accountability | Anonymous/generic author and no review trail | Byline or review note only | Named author/reviewer, role, dated review note, corrections path, and disclosure where relevant |
| Usability and production quality | Thin, broken, inaccessible, or misleading | Useful but incomplete or weak on mobile | Complete answer, functional assets/links, clear structure, accessible mobile rendering, and no intrusive ad pattern |

An article passes only with at least **10/12**, no dimension scored `0`, no hard
fail, and no unresolved reviewer comment. This score is an internal quality
gate, not a promise of Google approval.

### Portfolio-level pass

All of the following must also be evidenced:

1. Every production article is classified as keep/rebuild/merge/withdraw, and
   the 49/41/31/10/9 historical counts are replaced by fresh production counts.
2. All ten historical thin AI/news candidates have an evidence-based URL
   outcome and meet its verified `200`/`301`/`404`/`410` contract.
3. Homepage metrics, demos, projects, testimonials, partnerships, promotions,
   and regulated/autonomous wording are evidenced and qualified or removed.
4. About, Contact, Privacy, Terms, Disclaimer, editorial/corrections policy,
   author identity, and ad/affiliate disclosures are accessible from blog pages.
5. Both release units pass their independent tests, backup/restore evidence,
   current-production checksum gate, deployment verification, and rollback drill
   or documented restore rehearsal.
6. Stored post-release audits, GSC/backlink decision records, HTTP evidence,
   sitemap/feed/schema/mobile checks, and recrawl results are archived and
   compared with the 8 September rejection baseline.
7. The named sign-off artifact is complete and approved by all required humans;
   no placeholder remains.
8. No AdSense review button is pressed without separate explicit owner
   authorization after these gates pass.
