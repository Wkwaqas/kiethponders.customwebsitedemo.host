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
            $response = Http::timeout(6)->withOptions(['connect_timeout' => 3])
                ->asForm()
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

    // public function getPlaylist($playlistId)
    // {
    //     $accessToken = $this->getAccessToken();

    //     $response = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . $accessToken,
    //     ])->get("https://api.spotify.com/v1/playlists/{$playlistId}");

    //     if ($response->status() === 401) { // Token expired
    //         Cache::forget('spotify_access_token');
    //         $accessToken = $this->getAccessToken();

    //         $response = Http::withHeaders([
    //             'Authorization' => 'Bearer ' . $accessToken,
    //         ])->get("https://api.spotify.com/v1/playlists/{$playlistId}");
    //     }

    //     if ($response->successful()) {
    //         return $response->json();
    //     }

    //     throw new \Exception('Unable to fetch playlist');
    // }
    public function getPlaylist($playlistId)
    {
        try {
            $accessToken = $this->getAccessToken();
    
            $response = Http::timeout(6)->withOptions(['connect_timeout' => 3])->withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("https://api.spotify.com/v1/playlists/{$playlistId}");
    
            if ($response->status() === 401) { // Token expired
                Cache::forget('spotify_access_token');
                $accessToken = $this->getAccessToken();
    
                $response = Http::timeout(6)->withOptions(['connect_timeout' => 3])->withHeaders([
                    'Authorization' => 'Bearer ' . $accessToken,
                ])->get("https://api.spotify.com/v1/playlists/{$playlistId}");
            }
    
            if ($response->successful()) {
                return $response->json();
            }
            
            // Agar response 200 nahi hai, toh log mein error check kar sakte hain
            \Log::error('Spotify API failed for playlist: ' . $playlistId);
            
        } catch (\Throwable $th) {
            // Exception aane par error nahi dikhega, bas code yahan handle ho jayega
            \Log::error('Spotify API Exception: ' . $th->getMessage());
        }
    
        return null; // Yahan null return hoga, toh page crash nahi hoga
    }

    // public function getJoeRoganPlaylist($playlistId)
    // {
    //     $accessToken = $this->getAccessToken();

    //     $response = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . $accessToken,
    //     ])->get("https://api.spotify.com/v1/shows/{$playlistId}");

    //     if ($response->status() === 401) { // Token expired
    //         Cache::forget('spotify_access_token');
    //         $accessToken = $this->getAccessToken();

    //         $response = Http::withHeaders([
    //             'Authorization' => 'Bearer ' . $accessToken,
    //         ])->get("https://api.spotify.com/v1/shows/{$playlistId}");
    //     }

    //     if ($response->successful()) {
    //         return $response->json();
    //     }

    //     throw new \Exception('Unable to fetch playlist');
    // }

    public function getJoeRoganPlaylist($showId)
    {
        try {
            $accessToken = $this->getAccessToken();

            $response = Http::timeout(6)->withOptions(['connect_timeout' => 3])->withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("https://api.spotify.com/v1/shows/{$showId}", [
                'market' => 'US'
            ]);

            if ($response->status() === 401) {
                Cache::forget('spotify_access_token');
                $accessToken = $this->getAccessToken();

                $response = Http::timeout(6)->withOptions(['connect_timeout' => 3])->withHeaders([
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
