<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ThinkerSpotifyPlaylist
{
    public function getAccessToken()
    {
        // Check in cache
        return Cache::remember('spotify_access_token', 3500, function () {
            $response = Http::asForm()
                ->withBasicAuth(env('SPOTIFY_CLIENT_ID'), env('SPOTIFY_CLIENT_SECRET'))
                ->post('https://accounts.spotify.com/api/token', [
                    'grant_type' => 'client_credentials',
                ]);

            if ($response->successful()) {
                return $response->json()['access_token'];
            }

            throw new \Exception('Unable to get Spotify access token');
        });
    }

    public function getPlaylist($playlistId)
    {
        $accessToken = $this->getAccessToken();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get("https://api.spotify.com/v1/playlists/{$playlistId}");

        if ($response->status() === 401) { // Token expired
            Cache::forget('spotify_access_token');
            $accessToken = $this->getAccessToken();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("https://api.spotify.com/v1/playlists/{$playlistId}");
        }

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Unable to fetch playlist');
    }
    
    public function getJoeRoganPlaylist($showId)
    {
        try {
            $accessToken = $this->getAccessToken();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("https://api.spotify.com/v1/shows/{$showId}", [
                'market' => 'US'
            ]);

            if ($response->status() === 401) {
                Cache::forget('spotify_access_token');
                $accessToken = $this->getAccessToken();

                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $accessToken,
                ])->get("https://api.spotify.com/v1/shows/{$showId}", [
                    'market' => 'US'
                ]);
            }

            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Throwable $th) {
            // Ignore exception and return null
        }

        return null; // Agar API fail ho
    }



}
