<?php

namespace App\Services;

use App\Models\Site;
use Illuminate\Support\Facades\Cache;

class SiteResolver
{
    protected ?Site $cachedSite = null;

    /**
     * Resolve the current site from the request hostname.
     */
    public function resolve(): ?Site
    {
        if ($this->cachedSite) {
            return $this->cachedSite;
        }

        $host = request()->getHost();

        $site = Cache::remember("site_domain_{$host}", 3600, function () use ($host) {
            return Site::where('is_active', true)
                ->where('domain', $host)
                ->first();
        });

        $this->cachedSite = $site;

        return $site;
    }

    /**
     * Resolve site or abort with 404.
     */
    public function resolveOrFail(): Site
    {
        $site = $this->resolve();

        if (! $site) {
            abort(404, 'Site not found for this domain.');
        }

        return $site;
    }

    /**
     * Get the current site's slug-based blog prefix.
     * e.g., if domain is m2b.co.id, prefix is '' (root)
     * if using subdirectory multi-site, prefix is the slug
     */
    public function blogPrefix(): string
    {
        $site = $this->resolve();

        if (! $site) {
            return '';
        }

        return $site->slug === 'default' ? '' : $site->slug;
    }

    /**
     * Clear cached site.
     */
    public function forget(string $host): void
    {
        Cache::forget("site_domain_{$host}");
    }
}
