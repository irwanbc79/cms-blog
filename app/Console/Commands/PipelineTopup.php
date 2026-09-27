<?php

namespace App\Console\Commands;

use App\Jobs\GenerateArticleJob;
use App\Models\Article;
use App\Models\Site;
use App\Models\TopicIdea;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class PipelineTopup extends Command
{
    protected $signature = 'pipeline:topup
        {--min=3 : Generate bila stok scheduled site di bawah angka ini}
        {--per-site=1 : Maksimal artikel digenerate per site per run (jaga rate limit Unsplash/AI)}
        {--dry-run : Tampilkan rencana tanpa dispatch}';

    protected $description = 'Jaga stok artikel scheduled per site: auto-generate dari TopicIdea saat stok menipis';

    /** Jam publish (UTC) per site — WAJIB menit :00 karena cron schedule:run CMS jalan per jam */
    private const PUBLISH_HOUR = [1 => 8, 2 => 12, 3 => 16, 4 => 20];

    private const INTERVAL_DAYS = 2;

    public function handle(): int
    {
        $min     = (int) $this->option('min');
        $perSite = (int) $this->option('per-site');
        $dry     = (bool) $this->option('dry-run');

        foreach (Site::where('is_active', true)->get() as $site) {
            $stock = Article::where('site_id', $site->id)->where('status', 'scheduled')->count();

            if ($stock >= $min) {
                $this->info("site {$site->id} {$site->domain}: stok {$stock} >= {$min}, skip");
                continue;
            }

            $topics = TopicIdea::where('site_id', $site->id)
                ->where('is_used', false)
                ->orderBy('id')
                ->limit($perSite)
                ->get();

            if ($topics->isEmpty()) {
                $this->warn("site {$site->id} {$site->domain}: stok {$stock} < {$min} tapi TopicIdea HABIS — seed topik baru via Filament!");
                continue;
            }

            $slot = $this->nextSlot($site->id);
            foreach ($topics as $t) {
                $when = $slot->format('Y-m-d H:i:s');
                $this->info("site {$site->id}: generate '" . mb_substr($t->topic, 0, 60) . "' → publish {$when}" . ($dry ? ' [DRY-RUN]' : ''));

                if (! $dry) {
                    dispatch(new GenerateArticleJob(
                        $site->id,
                        $t->topic,
                        $t->pillar ?: 'umkm',
                        $t->language ?: 'id',
                        $when,
                        1,
                        'scheduled',
                    ));
                    $t->is_used = true;
                    $t->used_at = now();
                    $t->save();
                }

                $slot = $slot->copy()->addDays(self::INTERVAL_DAYS);
            }
        }

        return self::SUCCESS;
    }

    /** Slot publish berikutnya: lanjut dari jadwal terakhir + 2 hari, minimal besok, di jam site */
    private function nextSlot(int $siteId): Carbon
    {
        $hour = self::PUBLISH_HOUR[$siteId] ?? 12;

        $last = Article::where('site_id', $siteId)->where('status', 'scheduled')->max('scheduled_at')
            ?: Article::where('site_id', $siteId)->where('status', 'published')->max('published_at');

        $slot = ($last ? Carbon::parse($last)->addDays(self::INTERVAL_DAYS) : now()->addDay())
            ->setTime($hour, 0, 0);

        $minimum = now()->addDay()->setTime($hour, 0, 0);

        return $slot->lessThan($minimum) ? $minimum : $slot;
    }
}
