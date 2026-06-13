<?php

namespace App\Services;

class NewsService
{
    /**
     * Fetch recent, REAL news headlines related to a keyword via Google News RSS.
     * Free, no API key. Returns array of ['title','link','source','date','image_url'].
     */
    public function fetchRelatedNews(string $keyword, string $lang = 'id', int $limit = 3): array
    {
        $hl   = $lang === 'en' ? 'en-US' : 'id-ID';
        $gl   = $lang === 'en' ? 'US' : 'ID';
        $ceid = $lang === 'en' ? 'US:en' : 'ID:id';
        $q    = urlencode($keyword . ' Indonesia');

        $url = "https://news.google.com/rss/search?q={$q}&hl={$hl}&gl={$gl}&ceid={$ceid}";

        try {
            $ctx = stream_context_create([
                'http' => [
                    'timeout'       => 5,
                    'header'        => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36\r\n",
                    'ignore_errors' => true,
                ],
                'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
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

                // Decode Google News URL
                $decodedUrl = $this->decodeGoogleNewsUrl($link);
                $imageUrl = null;
                if ($decodedUrl) {
                    $imageUrl = $this->fetchOgImage($decodedUrl);
                }

                $news[] = [
                    'title'     => $title,
                    'link'      => $decodedUrl ?: $link,
                    'source'    => $source ?: 'Google News',
                    'date'      => $date ? date('d M Y', strtotime($date)) : '',
                    'image_url' => $imageUrl,
                ];

                if (count($news) >= $limit) {
                    break;
                }
            }

            return $news;
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * Decode Google News RSS link to final target URL using batchexecute RPC.
     */
    public function decodeGoogleNewsUrl(string $url): ?string
    {
        try {
            $ctx = stream_context_create([
                'http' => [
                    'timeout' => 4,
                    'header'  => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36\r\n",
                ],
                'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
            ]);

            $html = @file_get_contents($url, false, $ctx);
            if (!$html) {
                return null;
            }

            if (!preg_match('/<c-wiz[^>]+data-p=["\']([^"\']+)["\']/i', $html, $m)) {
                return null;
            }
            $data_p = html_entity_decode($m[1], ENT_QUOTES | ENT_HTML5);

            $json_str = str_replace('%.@.', '["garturlreq",', $data_p);
            $obj = json_decode($json_str, true);
            if (!$obj) {
                return null;
            }

            $slice1 = array_slice($obj, 0, count($obj) - 6);
            $slice2 = array_slice($obj, -2);
            $obj_slice = array_merge($slice1, $slice2);

            $f_req = [[['Fbv4je', json_encode($obj_slice), null, 'generic']]];
            $post_data = http_build_query(['f.req' => json_encode($f_req)]);

            $post_ctx = stream_context_create([
                'http' => [
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/x-www-form-urlencoded;charset=UTF-8\r\n" .
                                 "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36\r\n",
                    'content' => $post_data,
                    'timeout' => 4,
                ],
                'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
            ]);

            $response = @file_get_contents('https://news.google.com/_/DotsSplashUi/data/batchexecute', false, $post_ctx);
            if (!$response) {
                return null;
            }

            $clean_response = str_replace(")]}'\n", "", $response);
            $res = json_decode($clean_response, true);
            if (!isset($res[0][2])) {
                return null;
            }

            $array_string = $res[0][2];
            $inner_res = json_decode($array_string, true);
            if (!isset($inner_res[1])) {
                return null;
            }

            return $inner_res[1];
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * Fetch og:image from the decoded URL.
     */
    public function fetchOgImage(string $url): ?string
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
            curl_setopt($ch, CURLOPT_TIMEOUT, 4);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            
            $html = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if (!$html || $http_code !== 200) {
                return null;
            }

            if (preg_match('/<meta[^>]+property=["\']og:image["\'][^>]+content=["\']([^"\']+)["\']/i', $html, $matches)) {
                return trim($matches[1]);
            }
            if (preg_match('/<meta[^>]+content=["\']([^"\']+)["\'][^>]+property=["\']og:image["\']/i', $html, $matches)) {
                return trim($matches[1]);
            }
            
            return null;
        } catch (\Throwable $e) {
            return null;
        }
    }
}
