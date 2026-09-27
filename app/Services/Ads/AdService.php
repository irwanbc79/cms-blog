<?php

namespace App\Services\Ads;

use App\Models\Site;

class AdService
{
    protected ?string $publisherId = null;
    protected array $slots = [];

    public function __construct(protected ?Site $site = null)
    {
        if ($this->site) {
            $rawPub = $this->site->getAdsensePublisher() ?? config('services.google.adsense_publisher_id');
            $this->publisherId = $this->normalizePublisherId($rawPub);

            $this->slots = [
                'display_top'    => $this->site->getAdSlot('display_top'),
                'in_article_1'   => $this->site->getAdSlot('in_article_1') ?? $this->site->getAdSlot('in_article'),
                'in_article_2'   => $this->site->getAdSlot('in_article_2'),
                'display_bottom' => $this->site->getAdSlot('display_bottom'),
                'multiplex'      => $this->site->getAdSlot('multiplex'),
                'sidebar'        => $this->site->getAdSlot('sidebar_sticky') ?? $this->site->getAdSlot('sidebar'),
                'in_feed'        => $this->site->getAdSlot('in_feed'),
            ];
        }
    }

    public function enabled(): bool
    {
        return !empty($this->publisherId);
    }

    public function publisherId(): ?string
    {
        return $this->publisherId;
    }

    public function rawPublisherId(): ?string
    {
        if (!$this->publisherId) {
            return null;
        }
        return preg_replace('/^ca-/', '', $this->publisherId);
    }

    public function slot(string $key): ?string
    {
        return $this->slots[$key] ?? null;
    }

    public function hasSlot(string $key): bool
    {
        return !empty($this->slot($key));
    }

    /**
     * Prevent ad stacking: Only show display_bottom if multiplex is not active.
     */
    public function shouldShowDisplayBottom(): bool
    {
        return $this->hasSlot('display_bottom') && !$this->hasSlot('multiplex');
    }

    public function normalizePublisherId(?string $id): ?string
    {
        if (!$id) {
            return null;
        }
        $id = trim($id);
        if (str_starts_with($id, 'ca-')) {
            return $id;
        }
        return 'ca-' . $id;
    }
}
