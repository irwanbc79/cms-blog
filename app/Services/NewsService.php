<?php

namespace App\Services;

class NewsService
{
    /**
     * Fetch recent, REAL news headlines related to a keyword via Google News RSS.
     * Free, no API key. Returns array of ['title','link','source','date'].
     */
    public function fetchRelatedNews(string $keyword, string $lang = 'id', int $limit = 4): array
    {
        $hl   = $lang === 'en' ? 'en-US' : 'id-ID';
        $gl   = $lang === 'en' ? 'US' : 'ID';
        $ceid = $lang === 'en' ? 'US:en' : 'ID:id';
        $q    = urlencode($keyword . ' Indonesia');

        $url = "https://news.google.com/rss/search?q={$q}&hl={$hl}&gl={$gl}&ceid={$ceid}";

        try {
            $ctx = stream_context_create([
                'http' => [
                    'timeout'       => 8,
                    'header'        => "User-Agent: Mozilla/5.0 (compatible; M2BCMS/1.0)\r\n",
                    'ignore_errors' => true,
                ],
                'ssl' => ['verify_peer' => false],
            ]);

            $xml = @file_get_contents($url, false, $ctx);
            if (! $xml) {
                return [];
            }

            $feed = @simplexml_load_string($xml);
            if (! $feed || ! isset($feed->channel->item)) {
                return [];
            }

            $news = [];
            foreach ($feed->channel->item as $item) {
                $title  = trim((string) $item->title);
                $link   = trim((string) $item->link);
                $source = trim((string) $item->source);
                $date   = trim((string) $item->pubDate);

                // Google News titles often end with " - Source"
                if ($source === '' && str_contains($title, ' - ')) {
                    $parts  = explode(' - ', $title);
                    $source = trim(array_pop($parts));
                    $title  = trim(implode(' - ', $parts));
                }

                if ($title === '' || $link === '') {
                    continue;
                }

                $news[] = [
                    'title'  => $title,
                    'link'   => $link,
                    'source' => $source ?: 'Google News',
                    'date'   => $date ? date('d M Y', strtotime($date)) : '',
                ];

                if (count($news) >= $limit) {
                    break;
                }
            }

            return $news;
        } catch (\Throwable) {
            return [];
        }
    }
}
