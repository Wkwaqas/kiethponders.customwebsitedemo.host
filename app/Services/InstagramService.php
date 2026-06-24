<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class InstagramService
{
    protected $feedId = 'iY3LwpcviJffNexz';
    protected $cacheKey = 'instagram_latest_post_abff';
    protected $cacheTtl = 86400; // 24 hours

    public function getLatestPost()
    {
        return Cache::remember($this->cacheKey, $this->cacheTtl, function () {
            try {
                $apiKey = env('RSS_API_KEY');
                if (empty($apiKey)) {
                    Log::warning('RSS_API_KEY is not set in environment.');
                    return $this->getFallbackPost();
                }

                $url = "https://api.rss.app/v1/feeds/{$this->feedId}";

                $response = Http::timeout(10)->withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept' => 'application/json'
                ])->get($url);

                if ($response->successful()) {
                    $data = $response->json();
                    $items = $data['items'] ?? [];

                    if (!empty($items) && isset($items[0])) {
                        $latest = $items[0];

                        // Extract post details
                        $postUrl = $latest['url'] ?? 'https://www.instagram.com/americanblackfilmfestival/';
                        $title = $latest['title'] ?? 'Latest Post';
                        $description = $latest['description_text'] ?? ($latest['description'] ?? '');
                        $thumbnail = $latest['thumbnail'] ?? '/frontend/assets/images/cms_2-1.jpg';
                        $datePublished = $latest['date_published'] ?? now()->toIso8601String();

                        return [
                            'url' => $postUrl,
                            'title' => $title,
                            'description' => $description,
                            'thumbnail' => $thumbnail,
                            'date_published' => $datePublished,
                        ];
                    }
                } else {
                    Log::error('Failed to fetch Instagram feed from RSS.app: ' . $response->body());
                }
            } catch (\Exception $e) {
                Log::error('Exception in InstagramService: ' . $e->getMessage());
            }

            return $this->getFallbackPost();
        });
    }

    protected function getFallbackPost()
    {
        return [
            'url' => 'https://www.instagram.com/americanblackfilmfestival/',
            'title' => 'American Black Film Festival',
            'description' => 'Check out our latest updates, highlights, and behind-the-scenes moments directly on our official Instagram profile.',
            'thumbnail' => '/frontend/assets/images/cms_2-1.jpg',
            'date_published' => now()->toIso8601String(),
        ];
    }
}
