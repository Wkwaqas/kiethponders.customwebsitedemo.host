<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Services\ThinkerSpotifyPlaylist;
use App\Services\InstagramService;
use Feeds;

class SerializableFeedResponse
{
    private $status;
    private $headers;
    private $body;

    public function __construct(int $status, array $headers, string $body)
    {
        $this->status = $status;
        $this->headers = $headers;
        $this->body = $body;
    }

    public static function fromResponse($response): self
    {
        if ($response instanceof self) return $response;
        try {
            return new self(
                (int) $response->status(),
                (array) $response->headers(),
                (string) $response->body()
            );
        } catch (\Throwable $e) {
            return new self(599, [], '');
        }
    }

    public function status(): int { return $this->status; }
    public function successful(): bool { return $this->status >= 200 && $this->status < 300; }
    public function ok(): bool { return $this->status === 200; }
    public function failed(): bool { return $this->status >= 400; }
    public function serverError(): bool { return $this->status >= 500; }
    public function clientError(): bool { return $this->status >= 400 && $this->status < 500; }
    public function headers(): array { return $this->headers; }
    public function body(): string { return $this->body; }
    public function getBody(): string { return $this->body; }
    public function json($key = null, $default = null)
    {
        $data = json_decode($this->body, true);
        if (is_null($key)) return $data;
        return data_get($data, $key, $default);
    }
}

class PageController extends Controller
{
    // public function index(ThinkerSpotifyPlaylist $spotify)
    // { 
    //     $api_url = 'https://newsapi.org/v2/everything';
    //     // $api_playlist_url = 'https://api.spotify.com/v1/playlists/5LOf9RbuD75crqO2VULYpS';
    //     $playlist_id = '5LOf9RbuD75crqO2VULYpS';
    //     $joeroganplaylist_id = '4rOoJ6Egrf8K2IrywzwOMk';
    //     $politics_api_url = 'https://api.rss.app/v1/feeds/t7TMv0Q8MsVLtcV4';
    //     $business_api_url = 'https://api.rss.app/v1/feeds/tjFReqHyQrllHGqR';
    //     $finance_api_url = 'https://api.rss.app/v1/feeds/ti7Ew4A0tUe9Nhnh';
    //     $spirituality_api_url = 'https://api.rss.app/v1/feeds/tVUXjG5Dpu4ywOls';
    //     $blackfamily_api_url = 'https://api.rss.app/v1/feeds/tcqu8nvCXBXic8rz';
    //     $education_api_url = 'https://api.rss.app/v1/feeds/tnflEGUWwIbYdWjr';
    //     $entertainment_api_url = 'https://api.rss.app/v1/feeds/tClLg3yR7IDp180L';
    //     $sports_api_url = 'https://api.rss.app/v1/feeds/t1mTjjiArB31R2Aj';
    //     $worldpoverty_api_url = 'https://api.rss.app/v1/feeds/tnP5uU9zDzDgKaw6';
    //     $farming_api_url = 'https://api.rss.app/v1/feeds/thDsonEqVwaxNFTO';
    //     $crimereport_api_url = 'https://api.rss.app/v1/feeds/ttXcFyRuG4N0ahR9';
    //     $crypto_api_url = 'https://api.rss.app/v1/feeds/tDTK28E6GeBMLTzd';
        // $trending_api_url = 'https://api.rss.app/v1/feeds/tHeWppXA4HAuc2MT';
    //     $trending_api_url_feed_spots = 'http://rss.feedspot.com/folder/7961571/rss';

    //     // $for_you_api_url = 'https://api.rss.app/v1/feeds/txKhNyGv2UidmzPA';
    //     $for_you_feed_spots_api_url = 'http://www.espn.com/espnradio/feeds/rss/podcast.xml?id=12563086';
    //     $culture_api_url = 'https://api.rss.app/v1/feeds/t8tYhYNNQXLG8tEq';
    //     $custom_api_url = 'https://api.rss.app/v1/feeds/t932lWCIXDHjx6Rh';
    //     $addiction_api_url = 'https://api.rss.app/v1/feeds/tQSclggGtPP8g4KM';
    //     $people_api_url = 'https://api.rss.app/v1/feeds/tjltwyGb3X1WBqBI';
    //     $fashion_photography_api_url = 'https://api.rss.app/v1/feeds/twneVmLI6iQORvjX';
    //     $sisters_api_url = 'https://api.rss.app/v1/feeds/t7AIFddynbhMn7aH';
    //     $atlanta_api_url = 'https://api.rss.app/v1/feeds/tronjf4PdJWJOnXl';
    //     $georgia_api_url = 'https://api.rss.app/v1/feeds/tqKpGPbSJkDbtJ4r';
    //     $people_api_url = 'https://api.rss.app/v1/feeds/t9blhIF6hyAZYcRz';
    //     $travel_api_url = 'https://api.rss.app/v1/feeds/tPal7cllYL5cLbAH';




    //     $joe_rogan_api_url = 'https://api.rss.app/v1/feeds/c9MYa4CFUhyFypIY';

    //     $joeRogan = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($joe_rogan_api_url);

    //     $politics = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($politics_api_url, [
    //         'topic' => 'political-economy-news'
    //     ]);

    //     $business = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($business_api_url, [
    //         'topic' => 'business'
    //     ]);


    //     $sports = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($sports_api_url, [
    //         'topic' => 'business'
    //     ]);

    //     $finance = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($finance_api_url, [
    //         'topic' => 'finance'
    //     ]);

    //     $spirituality = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($spirituality_api_url, [
    //         'topic' => 'spirituality'
    //     ]);

    //     $blackfamily = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($blackfamily_api_url, [
    //         'topic' => 'black family'
    //     ]);



    //     $education = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($education_api_url, [
    //         'topic' => 'Education'
    //     ]);



    //     $entertainment = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($entertainment_api_url, [
    //         'topic' => 'black family'
    //     ]);



    //     $worldpoverty = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($worldpoverty_api_url, [
    //         'topic' => 'worldpoverty'
    //     ]);

    //     $farming = Http::get($api_url, [
    //         'q' => 'farming',
    //         'apiKey' => env('NEWS_API_KEY')
    //     ]);

    //     $farming = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($farming_api_url, [
    //         'topic' => 'business'
    //     ]);

    //     $crimereport = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($crimereport_api_url, [
    //         'topic' => 'business'
    //     ]);

    //     $crypto = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($crypto_api_url, [
    //         'topic' => 'crypto'
    //     ]);

    //     // $trending = Http::withHeaders([
    //     //     'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //     //     'Accept' => 'application/json'
    //     // ])->get($trending_api_url, [
    //     //     'topic' => 'trending'
    //     // ]);


    //     $culture = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($culture_api_url, [
    //         'topic' => 'for you'
    //     ]);
    //     $custom = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($custom_api_url, [
    //         'topic' => 'for you'
    //     ]);

    //     $addiction = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($addiction_api_url, [
    //         'topic' => 'addiction'
    //     ]);

    //     $people = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($people_api_url, [
    //         'topic' => 'people & sisters'
    //     ]);

    //     $travel = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($travel_api_url, [
    //         'topic' => 'travel'
    //     ]);


    //     $fashion_photography = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($fashion_photography_api_url, [
    //         'topic' => 'fashion photography'
    //     ]);

    //     $sisters = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($sisters_api_url, [
    //         'topic' => 'sisters'
    //     ]);

    //     $atlanta = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($atlanta_api_url, [
    //         'topic' => 'atlanta'
    //     ]);

    //     $georgia = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //         'Accept' => 'application/json'
    //     ])->get($georgia_api_url, [
    //         'topic' => 'georgia'
    //     ]);


    //     $sudanNews = Http::get($api_url, [
    //         'q' => 'Sudan News',
    //         'apiKey' => env('NEWS_API_KEY')
    //     ]);

    //     $for_you_response = Http::get($for_you_feed_spots_api_url);

    //     $trending_api_response = Http::get($trending_api_url_feed_spots);



    //     $spotify_section_api = $spotify->getPlaylist($playlist_id);
    //     $joerogan_spotify_section_api = $spotify->getJoeRoganPlaylist($joeroganplaylist_id);


    //     $unfilteredFeeds = [
    //         [
    //             'name' => 'Joy Reid',
    //             'feed_url' => 'https://rss.app/feed/JwvmWEjBN5XRX15d',
    //             'role' => 'American commentator and television host'
    //         ],
    //         [
    //             'name' => 'Trevor Noah',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/aNTlTisap74THUlj',
    //             'role' => 'South African comedian and writer'
    //         ],
    //         [
    //             'name' => 'Van Lathan',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/5i2q3Pj6oDjSRNDK',
    //             'role' => 'American journalist and producer'
    //         ],
    //         [
    //             'name' => 'Ana Kasparian',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/WtquqhYgU6PWcGzF',
    //             'role' => 'American commentator'
    //         ],
    //         [
    //             'name' => 'Jon Stewart',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/v7HNvc2JRagw338p',
    //             'role' => 'American comedian and writer'
    //         ],
    //         [
    //             'name' => 'Jimmy Kimmel',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/Cz6nTrprq9rzcyFo',
    //             'role' => 'American television host and comedian'
    //         ],
    //         [
    //             'name' => 'Chris Hayes',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/vshxQK3XgsYcnbcG',
    //             'role' => 'American commentator'
    //         ],
    //         [
    //             'name' => 'Jennifer Welch',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/FXaocGLeTDkSjeLb',
    //             'role' => 'Host'
    //         ],
    //         [
    //             'name' => 'Tucker Carlson',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/vtYRrpRW3ZbneJF7',
    //             'role' => 'American activist and commentator'
    //         ],
    //         [
    //             'name' => 'Saagar Enjeti',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/WCVhPgCyB76NsyoZ',
    //             'role' => 'American journalist'
    //         ],
    //         [
    //             'name' => 'John Kiriakoua',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/sgGVEkhmP7NzJdFA',
    //             'role' => 'CIA counterterrorism officer and analyst'
    //         ],
    //         [
    //             'name' => 'Jasmine Crockett',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/QXMU0s0aywzgqWrc',
    //             'role' => 'United States Representative'
    //         ],
    //         [
    //             'name' => 'Cori Bush',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/BfQjRmz3REZxCCcR',
    //             'role' => 'Nurse and former United States Representative'
    //         ],
    //         [
    //             'name' => 'Cenk Uygur',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/IikjfSrXJhZG2XAJ',
    //             'role' => 'Turkish-American political activist'
    //         ],
    //         [
    //             'name' => 'Jemele Hill',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/uc7V6WsTpmE2TRe0',
    //             'role' => 'American sports writer'
    //         ],
    //         [
    //             'name' => 'Karen Attiah',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/dqHabu63BqCDKkOq',
    //             'role' => 'American writer and commentator'
    //         ],

    //     ];



    //      $topStoryFeeds = [
    //       [
    //             'name' => 'Rachel Maddow',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/O8CBItiNmqQkUHt5',
    //             'role' => 'American TV show host'
    //         ],
    //         [
    //             'name' => 'Don Lemon',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/WhrHoGq0tUn26Ok3',
    //             'role' => 'American television journalist'
    //         ],
    //         [
    //             'name' => 'Lawrence O Donald',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/L1wFqjbgSeSZHA7W',
    //             'role' => 'American television actor and anchor'
    //         ],
    //         [
    //             'name' => 'Jake Tapper',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/5s8HWGKOX3ZjPXHC',
    //             'role' => 'American journalist'
    //         ],
    //         [
    //             'name' => 'abby phillip',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/ncNpS5yIItwu5GFm',
    //             'role' => 'American news anchor'
    //         ],
    //         [
    //             'name' => 'Jenn Psaki',
    //             'feed_url' => 'https://api.rss.app/v1/feeds/oOrOLJAki5OeCh4a',
    //             'role' => 'Former White House Press Secretary'
    //         ],
    //     ];


    //     $politicsArticles = [];
    //     $sportsArticles = [];
    //     $businessArticles = [];
    //     $financeArticles = [];
    //     $spiritualityArticles=[];
    //     $blackfamilyArticles=[];
    //     $educationArticles=[];
    //     $entertainmentArticles=[];
    //     $worldpovertyArticles=[];
    //     $farmingArticles=[];
    //     $crimereportArticles=[];
    //     $cryptoArticles=[];
    //     $trendingArticles=[];
    //     // $forYouArticles=[];
    //     $cultureArticles=[];
    //     $customArticles=[];
    //     $addictionArticles=[];
    //     $peopleArticles=[];
    //     $fashionPhotographyArticles=[];
    //     $sistersArticles=[];
    //     $atlantaArticles=[];
    //     $georgiaArticles=[];
    //     $travelArticles=[];
    //     $SudanNewsArticles = [];
    //     $unfiltered = [];
    //     $top_stories = [];
    //     $forYouArticles = [];



    //     if ($politics->successful()) {
    //         $politicsArticles = $politics->json()['items'];
    //     }
    //     // if ($politics->successful()) {
    //     //     $politicsArticles = $politics->json()['articles'];
    //     // }
    //     if ($sports->successful()) {
    //         $sportsArticles = $sports->json()['items'];
    //     }
    //     if ($business->successful()) {
    //         $businessArticles = $business->json()['items'];
    //     }
    //     // if ($business->successful()) {
    //     //     $businessArticles = $business->json()['articles'];
    //     // }
    //     if ($finance->successful()) {
    //         $financeArticles = $finance->json()['items'];
    //     }
    //     if($spirituality->successful()){
    //         $spiritualityArticles = $spirituality->json()['items'];

    //     }
    //     if($blackfamily->successful()){
    //         $blackfamilyArticles = $blackfamily->json()['items'];
    //     }
    //     if($education->successful()){
    //         $educationArticles = $education->json()['items'];

    //     }
    //     if($entertainment->successful()){
    //         $entertainmentArticles = $entertainment->json()['items'];

    //     }
    //     if($worldpoverty->successful()){
    //         $worldpovertyArticles = $worldpoverty->json()['items'];

    //     }
    //     if($farming->successful()){
    //         $farmingArticles = $farming->json()['items'];

    //     }
    //     if($crimereport->successful()){
    //         $crimereportArticles = $crimereport->json()['items'];

    //     }
    //     if($crypto->successful()){
    //         $cryptoArticles = $crypto->json()['items'];

    //     }

    //     // if($for_you->successful()){
    //     //     $forYouArticles = $for_you->json()['items'];

    //     // }
    //     if($culture->successful()){
    //         $cultureArticles = $culture->json()['items'];

    //     }
    //     if($custom->successful()){
    //         $customArticles = $custom->json()['items'];

    //     }
    //     if($addiction->successful()){
    //         $addictionArticles = $addiction->json()['items'];

    //     }
    //     if($people->successful()){
    //         $peopleArticles = $people->json()['items'];    
    //     }
    //     if($travel->successful()){
    //         $travelArticles = $travel->json()['items'];    
    //     }
    //     if($fashion_photography->successful()){
    //         $fashionPhotographyArticles = $fashion_photography->json()['items'];    
    //     }
    //     if($sisters->successful()){
    //         $sistersArticles = $sisters->json()['items'];    
    //     }
    //     if($atlanta->successful()){
    //         $atlantaArticles = $atlanta->json()['items'];    
    //     }
    //     if($georgia->successful()){
    //         $georgiaArticles = $georgia->json()['items'];    
    //     }
    //     if($people->successful()){
    //         $peopleArticles = $people->json()['items'];    
    //     }
    //     if ($sudanNews->successful()) {
    //         $SudanNewsArticles = $sudanNews->json()['articles'];
    //     }
    //     // if($spotify_section->successful()){
    //     //     $spotify_section_api = $spotify_section->json();
    //     // }
    //     if ($for_you_response->successful()) {
    //         $xml = simplexml_load_string($for_you_response->getBody());

    //         if ($xml !== false) {
    //             // Podcast cover image nikal lo (channel level)
    //             $channelImage = '';
    //             if (isset($xml->channel->image->url)) {
    //                 $channelImage = (string)$xml->channel->image->url;
    //             } elseif (isset($xml->channel->children('itunes', true)->image)) {
    //                 $channelImage = (string)$xml->channel->children('itunes', true)->image->attributes()->href;
    //             }

    //             foreach ($xml->channel->item as $item) {
    //                 $image = $channelImage; // default channel image

    //                 // Agar kisi episode mein specific image ho to (rare in podcasts)
    //                 if (isset($item->children('itunes', true)->image)) {
    //                     $image = (string)$item->children('itunes', true)->image->attributes()->href;
    //                 }

    //                 $forYouArticles[] = [
    //                     'title'            => (string)$item->title,
    //                     'description'      => strip_tags((string)$item->description),
    //                     'description_text' => strip_tags((string)$item->description),
    //                     'date_published'   => (string)$item->pubDate,
    //                     'pubDate'          => (string)$item->pubDate,
    //                     'link'             => (string)$item->link,
    //                     'thumbnail'        => $image,           // Blade mein use hoga
    //                     'image'            => $image,
    //                     'audio'            => (string)($item->enclosure['url'] ?? ''), // bonus: audio file
    //                 ];

    //                 if (count($forYouArticles) >= 10) break; // sirf 12 episodes enough
    //             }
    //         }
    //     }


    //     if ($trending_api_response->successful()) {
    //         $xml = simplexml_load_string($trending_api_response->getBody());

    //         if ($xml !== false) {
    //             // Podcast cover image nikal lo (channel level)
    //             $channelImage = '';
    //             if (isset($xml->channel->image->url)) {
    //                 $channelImage = (string)$xml->channel->image->url;
    //             } elseif (isset($xml->channel->children('itunes', true)->image)) {
    //                 $channelImage = (string)$xml->channel->children('itunes', true)->image->attributes()->href;
    //             }

    //             foreach ($xml->channel->item as $item) {
    //                 $image = $channelImage; // default channel image

    //                 // Agar kisi episode mein specific image ho to (rare in podcasts)
    //                 if (isset($item->children('itunes', true)->image)) {
    //                     $image = (string)$item->children('itunes', true)->image->attributes()->href;
    //                 }

    //                 $trendingArticles[] = [
    //                     'title'            => (string)$item->title,
    //                     'description'      => strip_tags((string)$item->description),
    //                     'description_text' => strip_tags((string)$item->description),
    //                     'date_published'   => (string)$item->pubDate,
    //                     'pubDate'          => (string)$item->pubDate,
    //                     'link'             => (string)$item->link,
    //                     'thumbnail'        => $image,           // Blade mein use hoga
    //                     'image'            => $image,
    //                     'audio'            => (string)($item->enclosure['url'] ?? ''), // bonus: audio file
    //                 ];

    //                 if (count($trendingArticles) >= 10) break; // sirf 12 episodes enough
    //             }
    //         }
    //     }

    //     $joeRoganArticles = $joeRogan->successful() ? $joeRogan->json()['items'] ?? [] : [];

    //     foreach ($unfilteredFeeds as $feed) {
    //         $response = Http::withHeaders([
    //             'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //             'Accept' => 'application/json'
    //         ])->get($feed['feed_url']);

    //         if ($response->successful() && !empty($response->json()['items'][0])) {
    //             $item = $response->json()['items'][0];
    //             $url = $item['link'] ?? $item['url'] ?? '';

    //             // YouTube ID nikaalo (agar hai)
    //             $youtubeId = $this->extractYoutubeVideoId($url);

    //             // Instagram reel ID nikaalo (naya function banao)
    //             $instagramReelId = $this->extractInstagramReelId($url);

    //             $unfiltered[] = [
    //                 'name'        => $feed['name'],
    //                 'role'        => $feed['role'],
    //                 'title'       => $item['title'],
    //                 'description' => strip_tags($item['description_text'] ?? $item['description'] ?? ''),
    //                 'pubDate'     => $item['date_published'] ?? $item['pubDate'],
    //                 'link'        => $url,
    //                 'youtube_id'  => $youtubeId,
    //                 'instagram_id'=> $instagramReelId,     // ← naya field
    //                 'is_instagram'=> !empty($instagramReelId),
    //             ];
    //         }
    //     }
    //     foreach ($topStoryFeeds as $feed) {
    //         $response = Http::withHeaders([
    //             'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
    //             'Accept' => 'application/json'
    //         ])->get($feed['feed_url']);

    //         if ($response->successful() && !empty($response->json()['items'][0])) {
    //             $item = $response->json()['items'][0];
    //             $url = $item['link'] ?? $item['url'] ?? '';

    //             // YouTube ID nikaalo (agar hai)
    //             $youtubeId = $this->extractYoutubeVideoId($url);

    //             // Instagram reel ID nikaalo (naya function banao)
    //             $instagramReelId = $this->extractInstagramReelId($url);

    //             $top_stories[] = [
    //                 'name'        => $feed['name'],
    //                 'role'        => $feed['role'],
    //                 'title'       => $item['title'],
    //                 'description' => strip_tags($item['description_text'] ?? $item['description'] ?? ''),
    //                 'pubDate'     => $item['date_published'] ?? $item['pubDate'],
    //                 'link'        => $url,
    //                 'youtube_id'  => $youtubeId,
    //                 'instagram_id'=> $instagramReelId,     // ← naya field
    //                 'is_instagram'=> !empty($instagramReelId),
    //             ];
    //         }
    //     }




    //     return view('home', [
    //         'politics' => $politicsArticles,
    //         'sports' => $sportsArticles,
    //         'business' => $businessArticles,
    //         'finance' => $financeArticles,
    //         'spirituality'=>$spiritualityArticles,
    //         'blackfamily'=>$blackfamilyArticles,
    //         'education'=>$educationArticles,
    //         'entertainment'=>$entertainmentArticles,
    //         'worldpoverty'=>$worldpovertyArticles,
    //         'farming'=>$farmingArticles,
    //         'crimereport'=>$crimereportArticles,
    //         'crypto'=>$cryptoArticles,
    //         'trending'=>$trendingArticles,
    //         // 'for_you'=>$forYouArticles,
    //         'culture'=>$cultureArticles,
    //         'custom'=>$customArticles,
    //         'addiction'=>$addictionArticles,
    //         'people'=>$peopleArticles,
    //         'fashion_photography'=>$fashionPhotographyArticles,
    //         'sisters'=>$sistersArticles,
    //         'atlanta'=>$atlantaArticles,
    //         'georgia'=>$georgiaArticles,
    //         'travel'=>$travelArticles,
    //         'spotify_section' => $spotify_section_api,
    //         'joerogan_spotify_playlist'=>$joerogan_spotify_section_api,
    //         'sudanNews' => $SudanNewsArticles,
    //         // 'joerogan_latest' => $joerogan_latest,
    //         'joeRogan' => $joeRoganArticles,
    //         'unfiltered' => $unfiltered,
    //          'top_stories' => $top_stories,
    //          'for_you' => $forYouArticles,

    //     ]);
    // }
    
    
    
    // public function getSpotifyLatestEpisode($showId) 
    // {
    //     $clientId = env('SPOTIFY_CLIENT_ID');
    //     $clientSecret = env('SPOTIFY_CLIENT_SECRET');
    //     $refreshToken = env('SPOTIFY_API_REFRESH_TOKEN'); 
    
    //     // 1. Automatic Token Refresh
    //     $tokenResponse = Http::asForm()->withHeaders([
    //         'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret),
    //     ])->post('https://accounts.spotify.com/api/token', [
    //         'grant_type' => 'refresh_token',
    //         'refresh_token' => $refreshToken,
    //     ]);
    
    //     if ($tokenResponse->failed()) {
    //         return null;
    //     }
    
    //     $accessToken = $tokenResponse->json()['access_token'];
    
    //     // 2. Latest Episode fetch karna
    //     $episodeResponse = Http::withToken($accessToken)
    //         ->get("https://api.spotify.com/v1/shows/{$showId}/episodes", [
    //             'limit' => 1,
    //             'market' => 'US'
    //         ]);
    
    //     if ($episodeResponse->successful() && isset($episodeResponse->json()['items'][0])) {
    //         return $episodeResponse->json()['items'][0]['id'];
    //     }
    
    //     return null;
    // }
    
    // ==================== TOP STORIES MULTIPLE PODCASTS ====================
    public function getLatestEpisode($showId)
    {
        return Cache::remember('spotify_show_episode_' . $showId, 1800, function () use ($showId) {
            $clientId = env('SPOTIFY_CLIENT_ID');
            $clientSecret = env('SPOTIFY_CLIENT_SECRET');
            $refreshToken = env('SPOTIFY_API_REFRESH_TOKEN');

            if (empty($clientId) || empty($clientSecret)) {
                return null;
            }

            try {
                $accessToken = Cache::remember('spotify_top_stories_token', 3500, function () use ($clientId, $clientSecret, $refreshToken) {
                    if (!empty($refreshToken)) {
                        $tokenResponse = Http::timeout(4)->withOptions(['connect_timeout' => 2])->asForm()->withHeaders([
                            'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret),
                        ])->post('https://accounts.spotify.com/api/token', [
                            'grant_type' => 'refresh_token',
                            'refresh_token' => $refreshToken,
                        ]);

                        if ($tokenResponse->successful() && isset($tokenResponse->json()['access_token'])) {
                            return $tokenResponse->json()['access_token'];
                        }
                    }

                    $ccResponse = Http::timeout(4)->withOptions(['connect_timeout' => 2])->asForm()
                        ->withBasicAuth($clientId, $clientSecret)
                        ->post('https://accounts.spotify.com/api/token', [
                            'grant_type' => 'client_credentials',
                        ]);

                    if ($ccResponse->successful() && isset($ccResponse->json()['access_token'])) {
                        return $ccResponse->json()['access_token'];
                    }

                    return null;
                });

                if (!$accessToken) {
                    return null;
                }

                $response = Http::timeout(4)->withOptions(['connect_timeout' => 2])->withToken($accessToken)
                    ->get("https://api.spotify.com/v1/shows/{$showId}/episodes", [
                        'limit' => 1,
                        'market' => 'US'
                    ]);

                if ($response->successful() && isset($response->json()['items'][0])) {
                    return $response->json()['items'][0];
                }
            } catch (\Exception $e) {
                \Log::error("getLatestEpisode error for show {$showId}: " . $e->getMessage());
            }

            return null;
        });
    }

    public function index(ThinkerSpotifyPlaylist $spotify)
    {
        // $topStoriesId = $this->getSpotifyLatestEpisode('3i5n7CpeJrkZn6xYG5A7bM');
        // $unfilteredId = $this->getSpotifyLatestEpisode('4rOoJ6Egrf8K2IrywzwOMk');
        
            @set_time_limit(180);
            libxml_use_internal_errors(true);

            $emptyFeedResponse = new SerializableFeedResponse(599, [], '');

            $http = static function () use ($emptyFeedResponse) {
                $client = Http::timeout(5)->withOptions(['connect_timeout' => 3]);
                return new class($client, $emptyFeedResponse) {
                    private $client;
                    private $emptyResponse;
                    public function __construct($client, $emptyResponse) {
                        $this->client = $client;
                        $this->emptyResponse = $emptyResponse;
                    }
                    public function withHeaders($headers) {
                        return new self($this->client->withHeaders($headers), $this->emptyResponse);
                    }
                    public function get($url, $query = []) {
                        if (empty($url)) return $this->emptyResponse;
                        $cacheKey = 'feed_v2_get_' . md5($url . serialize($query));
                        return Cache::remember($cacheKey, 600, function () use ($url, $query) {
                            try {
                                $response = $this->client->get($url, $query);
                                return SerializableFeedResponse::fromResponse($response);
                            } catch (\Exception $e) {
                                \Log::error("SafeHttpWrapper error fetching $url: " . $e->getMessage());
                                return $this->emptyResponse;
                            }
                        });
                    }
                    public function post($url, $data = []) {
                        try {
                            $response = $this->client->post($url, $data);
                            return SerializableFeedResponse::fromResponse($response);
                        } catch (\Exception $e) {
                            \Log::error("SafeHttpWrapper error posting $url: " . $e->getMessage());
                            return $this->emptyResponse;
                        }
                    }
                };
            };

        /**
         * Robust RSS & Video image extractor.
         * Priority: YouTube ID detection → media:group thumbnail → media:thumbnail → media:content (image only) → image enclosure → iTunes image → content:encoded <img> / poster → <img> in description → OpenGraph Scraping → channel image
         */
        $extractImage = function ($item, string $channelImage = '', string $articleUrl = '') : string {
            // 1. Check for YouTube video ID in link / guid / description / content:encoded
            $contentEncoded = '';
            if (isset($item->children('http://purl.org/rss/1.0/modules/content/')->encoded)) {
                $contentEncoded = (string) $item->children('http://purl.org/rss/1.0/modules/content/')->encoded;
            } elseif (isset($item->children('content', true)->encoded)) {
                $contentEncoded = (string) $item->children('content', true)->encoded;
            }

            $candidates = [
                (string) ($item->link ?? ''),
                (string) ($item->guid ?? ''),
                (string) ($item->description ?? ''),
                $contentEncoded,
            ];

            foreach ($candidates as $str) {
                if (!empty($str) && preg_match('#(?:youtube\.com/(?:watch\?v=|shorts/|embed/|v/)|youtu\.be/)([a-zA-Z0-9_-]{11})#i', $str, $ytMatch)) {
                    return "https://img.youtube.com/vi/{$ytMatch[1]}/hqdefault.jpg";
                }
            }

            // 2. media:group -> media:thumbnail (Standard YouTube Atom & RSS feeds)
            $media = $item->children('http://search.yahoo.com/mrss/');
            if (isset($media->group)) {
                $groupMedia = $media->group->children('http://search.yahoo.com/mrss/');
                if (isset($groupMedia->thumbnail)) {
                    $url = (string) $groupMedia->thumbnail->attributes()->url;
                    if ($url && !str_contains($url, 'feedspot.co') && !str_contains($url, 'feedspot.com')) return $url;
                }
            }

            // 3. media:thumbnail (Yahoo MRss direct)
            if (isset($media->thumbnail)) {
                $url = (string) $media->thumbnail->attributes()->url;
                if ($url && !str_contains($url, 'feedspot.co') && !str_contains($url, 'feedspot.com')) return $url;
            }

            // 4. media:content (strictly validate it is an image, never a video or audio stream)
            if (isset($media->content)) {
                $attrs = $media->content->attributes();
                $type = strtolower((string) ($attrs->type ?? ''));
                $medium = strtolower((string) ($attrs->medium ?? ''));
                $url = (string) ($attrs->url ?? '');

                $isImage = str_contains($type, 'image') || $medium === 'image' || preg_match('/\.(jpg|jpeg|png|webp|avif|gif)(\?.*)?$/i', $url);
                $isVideoOrAudio = str_contains($type, 'video') || str_contains($type, 'audio') || $medium === 'video' || $medium === 'audio' || preg_match('/\.(mp4|mp3|m4a|webm|ogg|wav)(\?.*)?$/i', $url);

                if ($isImage && !$isVideoOrAudio && $url && !str_contains($url, 'feedspot.co') && !str_contains($url, 'feedspot.com')) {
                    return $url;
                }
            }

            // 5. enclosure (strictly check for image)
            if (isset($item->enclosure)) {
                $attrs = $item->enclosure->attributes();
                $type = strtolower((string) ($attrs->type ?? ''));
                $url = (string) ($attrs->url ?? $item->enclosure['url'] ?? '');

                $isImage = str_contains($type, 'image') || preg_match('/\.(jpg|jpeg|png|webp|avif|gif)(\?.*)?$/i', $url);
                $isVideoOrAudio = str_contains($type, 'video') || str_contains($type, 'audio') || preg_match('/\.(mp4|mp3|m4a|webm|ogg|wav)(\?.*)?$/i', $url);

                if ($isImage && !$isVideoOrAudio && $url && !str_contains($url, 'feedspot.co') && !str_contains($url, 'feedspot.com')) {
                    return $url;
                }
            }

            // 6. iTunes image (Substack & podcasts)
            if (isset($item->children('itunes', true)->image)) {
                $url = (string) $item->children('itunes', true)->image->attributes()->href;
                if ($url && !str_contains($url, 'feedspot.co') && !str_contains($url, 'feedspot.com')) return $url;
            }
            if (isset($item->children('http://www.itunes.com/dtds/podcast-1.0.dtd')->image)) {
                $url = (string) $item->children('http://www.itunes.com/dtds/podcast-1.0.dtd')->image->attributes()->href;
                if ($url && !str_contains($url, 'feedspot.co') && !str_contains($url, 'feedspot.com')) return $url;
            }

            // 7. first <img> or video poster inside content:encoded HTML
            if (!empty($contentEncoded)) {
                if (preg_match('/<img[^>]+(?:src|data-src)=["\']([^"\']+)["\']/i', $contentEncoded, $m)) {
                    if (!empty($m[1]) && !preg_match('/\.(mp4|mp3|m4a|webm|ogg|wav)(\?.*)?$/i', $m[1]) && !str_contains($m[1], 'feedspot.co') && !str_contains($m[1], 'feedspot.com') && !str_contains($m[1], 's.w.org') && !str_contains($m[1], 'emoji') && !str_contains($m[1], '.svg')) {
                        return $m[1];
                    }
                }
                if (preg_match('/<video[^>]+poster=["\']([^"\']+)["\']/i', $contentEncoded, $m)) {
                    if (!empty($m[1]) && !str_contains($m[1], 'feedspot.co') && !str_contains($m[1], 'feedspot.com')) return $m[1];
                }
            }

            // 8. first <img> or video poster inside description HTML
            $desc = (string) $item->description;
            if (!empty($desc)) {
                if (preg_match('/<img[^>]+(?:src|data-src)=["\']([^"\']+)["\']/i', $desc, $m)) {
                    if (!empty($m[1]) && !preg_match('/\.(mp4|mp3|m4a|webm|ogg|wav)(\?.*)?$/i', $m[1]) && !str_contains($m[1], 'feedspot.co') && !str_contains($m[1], 'feedspot.com') && !str_contains($m[1], 's.w.org') && !str_contains($m[1], 'emoji') && !str_contains($m[1], '.svg')) {
                        return $m[1];
                    }
                }
                if (preg_match('/<video[^>]+poster=["\']([^"\']+)["\']/i', $desc, $m)) {
                    if (!empty($m[1]) && !str_contains($m[1], 'feedspot.co') && !str_contains($m[1], 'feedspot.com')) return $m[1];
                }
            }

            // 9. Webpage scraping (OpenGraph, Twitter card, WordPress featured image) cached for 24h
            $link = (string)($articleUrl ?: ($item->link ?? ''));
            $isAudioLink = preg_match('/\.(mp3|wav|m4a|ogg)(\?.*)?$/i', $link) || str_contains($link, 'megaphone.fm') || str_contains($link, 'podtrac.com') || str_contains($link, 'libsyn.com');
            
            if (!empty($link) && filter_var($link, FILTER_VALIDATE_URL) && !$isAudioLink) {
                $scrapedImage = Cache::remember('article_hero_img_' . md5($link), 86400, function () use ($link) {
                    try {
                        $ch = curl_init();
                        curl_setopt_array($ch, [
                            CURLOPT_URL => $link,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_TIMEOUT => 4,
                            CURLOPT_CONNECTTIMEOUT => 2,
                            CURLOPT_ENCODING => '', // Enable gzip, deflate, br decompression
                            CURLOPT_HTTPHEADER => [
                                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                            ],
                        ]);
                        $html = curl_exec($ch);
                        curl_close($ch);

                        if (!empty($html)) {
                            $found = null;
                            // 1. og:image or twitter:image
                            if (preg_match('/<meta[^>]+property=["\']og:image["\'][^>]+content=["\']([^"\']+)["\']/i', $html, $m)) {
                                $found = html_entity_decode($m[1]);
                            } elseif (preg_match('/<meta[^>]+content=["\']([^"\']+)["\'][^>]+property=["\']og:image["\']/i', $html, $m)) {
                                $found = html_entity_decode($m[1]);
                            } elseif (preg_match('/<meta[^>]+name=["\']twitter:image["\'][^>]+content=["\']([^"\']+)["\']/i', $html, $m)) {
                                $found = html_entity_decode($m[1]);
                            }

                            // 2. WordPress featured image (wp-post-image, wp-block-post-featured-image, etc.)
                            if (!$found && preg_match('/<img[^>]+(?:src|data-src)=["\']([^"\']+)["\'][^>]+class=["\'][^"\']*(?:wp-post-image|wp-block-post-featured-image|featured-image|entry-thumb|attachment-post-thumbnail)[^"\']*["\']/i', $html, $m)) {
                                $found = html_entity_decode($m[1]);
                            }
                            if (!$found && preg_match('/<img[^>]+class=["\'][^"\']*(?:wp-post-image|wp-block-post-featured-image|featured-image|entry-thumb|attachment-post-thumbnail)[^"\']*["\'][^>]+(?:src|data-src)=["\']([^"\']+)["\']/i', $html, $m)) {
                                $found = html_entity_decode($m[1]);
                            }

                            // 3. Any featured image wrapper (figure or div)
                            if (!$found && preg_match('/<(?:div|figure)[^>]*class=["\'][^"\']*wp-block-post-featured-image[^"\']*["\'][^>]*>[\s\S]*?<img[^>]+(?:src|data-src)=["\']([^"\']+)["\']/i', $html, $m)) {
                                $found = html_entity_decode($m[1]);
                            }

                            // Filter out emojis, feedspot, and invalid icons
                            if ($found && (str_contains($found, 'feedspot') || str_contains($found, 's.w.org') || str_contains($found, 'emoji') || str_contains($found, '.svg'))) {
                                $found = null;
                            }

                            return $found;
                        }
                    } catch (\Throwable $e) {}
                    return null;
                });

                if ($scrapedImage) {
                    return $scrapedImage;
                }
            }

            // 10. Podcast / Audio source detection for feeds whose items link directly to .mp3 files
            $sourceText = (string) ($item->source ?? $item->author ?? $item->children('dc', true)->creator ?? $item->title ?? '');
            if (!empty($sourceText)) {
                if (stripos($sourceText, 'Inside Politics') !== false || stripos($sourceText, 'CNN Inside') !== false) {
                    return 'https://images.megaphone.fm/uI1H-7R2GfVqH1Mv6W4WJ0p11Xz.jpg';
                }
                if (stripos($sourceText, 'Democracy Now') !== false) {
                    return 'https://www.democracynow.org/images/story/25/83425/w320/seg-RSS.jpg';
                }
                if (stripos($sourceText, 'Erin Burnett') !== false || stripos($sourceText, 'OutFront') !== false) {
                    return 'https://cdn.cnn.com/cnnnext/dam/assets/outfront-logo.jpg';
                }
                if (stripos($sourceText, 'Majority Report') !== false || stripos($sourceText, 'majorityfm') !== false) {
                    return 'https://majorityfm.com/wp-content/uploads/2021/04/majority-report-artwork.jpg';
                }
                if (stripos($sourceText, 'NPR') !== false) {
                    return 'https://media.npr.org/images/podcasts/primary/npr_news_now.png';
                }
            }

            // 11. Channel-level image fallback (strictly ignore Feedspot logos and user account avatars)
            if (!empty($channelImage) && !str_contains($channelImage, 'feedspot.co') && !str_contains($channelImage, 'feedspot.com') && !str_contains($channelImage, 'amazonaws.com/feedspot/')) {
                return $channelImage;
            }

            return '/frontend/assets/images/no-image-found.png';
        };

        $latestInstagramPost = app(InstagramService::class)->getLatestPost();


        $politicsArticles = [];
        $sportsArticles = [];
        $businessArticles = [];
        $financeArticles = [];
        $spiritualityArticles = [];
        $blackfamilyArticles = [];
        $educationArticles = [];
        $entertainmentArticles = [];
        $worldpovertyArticles = [];
        $farmingArticles = [];
        $crimereportArticles = [];
        $cryptoArticles = [];
        $trendingArticles = [];
        $cultureArticles = [];
        $customArticles = [];
        $addictionArticles = [];
        $peopleArticles = [];
        $fashionPhotographyArticles = [];
        $sistersArticles = [];
        $atlantaArticles = [];
        $georgiaArticles = [];
        $womanArticles = [];
        $travelArticles = [];
        $SudanNewsArticles = [];
        $joeRoganArticles = [];
        $nativeLandPodArticles = [];
        $repJeffriesArticles = [];
        $unfiltered = [];
        $top_stories = [];
        $forYouArticles = [];
        $newsArticles = [];
        $worldNewsArticles = [];
        $topStoriesEpisodes = [];
        $unfilteredVideos = [];

        $podcastShows = [
            ['name' => 'Joy Reid',             'show_id' => '3i5n7CpeJrkZn6xYG5A7bM'],
            ['name' => 'Don Lemon',             'show_id' => '1yTkjHu5LULqrOUBK7i2CW'],
            ['name' => 'Rachel Maddow',             'show_id' => '7yfYvyKNKAuuqSX3PVyRYi'],
            ['name' => 'Lawrence O Donnell',             'show_id' => '0ee6281gg0Q4JguTOYA5xa'],
            ['name' => 'Jake Tapper',             'show_id' => '3VFKVvo7PTX9b7PKPsnVrQ'],
            ['name' => 'Jenn Psaki',             'show_id' => '2vxQdj1VlEWBRQdjwtZsED'],
            ['name' => 'Abbey Phillip',             'show_id' => '6uEjIt1cwRf3CBqTLiQ6QT'],
            ['name' => 'Roland Martin',             'show_id' => '7Kr2J8PM8AOVDnm1Uwvy4c'],
            ['name' => 'Van Lathan',             'show_id' => '4hI3rQ4C0e15rP3YKLKPut'],
            ['name' => 'Chris Hayes',             'show_id' => '1slNhLdI9aLv1KtmOfxmXL'],
            ['name' => 'Cori Bush',             'show_id' => '3eNtSs8Kq2HZpWZzfaFlzH'],
        ];

        $spotifyEpisodes = [];
        foreach ($podcastShows as $show) {
            $episode = $this->getLatestEpisode($show['show_id']);
            if ($episode && !empty($episode['id'])) {
                $spotifyEpisodes[] = [
                    'type'         => 'spotify',
                    'show_name'    => $show['name'],
                    'show_id'      => $show['show_id'],
                    'episode_name' => $episode['name'] ?? $show['name'],
                    'episode_id'   => $episode['id'],
                    'release_date' => $episode['release_date'] ?? now()->toDateString(),
                ];
            } else {
                $spotifyEpisodes[] = [
                    'type'         => 'spotify',
                    'show_name'    => $show['name'],
                    'show_id'      => $show['show_id'],
                    'episode_name' => $show['name'],
                    'episode_id'   => null,
                    'release_date' => now()->toDateString(),
                ];
            }
        }
    
        // Substack Videos
        $followed_channels = [
            // 'https://johnrobins.substack.com/feed',
            // 'https://byjohndavid.substack.com/feed',
            // 'https://jfradioshow.substack.com/feed',
            'https://repjasminecrockett.substack.com/feed',
            'https://aprildryan.substack.com/feed',
            'https://vanlathan.substack.com/feed',
            'https://maddowposts.substack.com/feed'
        ];
    
        $substackVideos = Cache::remember('substack_feed_videos', 900, function () use ($followed_channels, $extractImage) {
            $videos = [];
            foreach ($followed_channels as $url) {
                try {
                    $response = Http::timeout(4)->withOptions(['connect_timeout' => 2])->get($url);
                    if ($response->ok()) {
                        $xml = simplexml_load_string($response->body());
        
                        if ($xml && isset($xml->channel->item[0])) {
                            $item = $xml->channel->item[0]; 

                            $channelImg = '';
                            if (isset($xml->channel->image->url)) {
                                $channelImg = (string) $xml->channel->image->url;
                            } elseif (isset($xml->channel->children('itunes', true)->image)) {
                                $channelImg = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                            }

                            $thumbnail = $extractImage($item, $channelImg);
                            if (empty($thumbnail)) {
                                $thumbnail = '/frontend/assets/images/default-video-thumb.jpg';
                            }
        
                            $videos[] = [
                                'type' => 'substack',
                                'title' => (string)$item->title,
                                'link' => (string)$item->link,
                                'thumbnail' => $thumbnail,
                                'pubDate' => (string)$item->pubDate,
                                'timestamp' => strtotime((string)$item->pubDate),
                            ];
                        }
                    }
                } catch (\Exception $e) {
                    continue;
                }
            }
            return $videos;
        });

        if (!is_array($substackVideos)) {
            $substackVideos = [];
        }
    
        // Combine both
        $topStoriesItems = array_merge($spotifyEpisodes, $substackVideos);
    
        // Latest first sorting
        usort($topStoriesItems, function($a, $b) {
            $timeA = $a['release_date'] ?? $a['pubDate'] ?? 0;
            $timeB = $b['release_date'] ?? $b['pubDate'] ?? 0;
            return strtotime($timeB) - strtotime($timeA);
        });
    
        $topStoriesItems = array_slice($topStoriesItems, 0, 16);
        
        
        $api_url = 'https://newsapi.org/v2/everything';
        $playlist_id = '5LOf9RbuD75crqO2VULYpS';
        $joeroganplaylist_id = '4rOoJ6Egrf8K2IrywzwOMk';
        $politics_api_url = 'http://rss.feedspot.com/folder/8008703/rss';
        $politics_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Politics';
        $politics_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Politics';
        $trending_api_url_feed_spots = 'http://rss.feedspot.com/folder/8009646/rss';
        $jazzwax_api_url = 'https://www.inoreader.com/stream/user/1003917626/tag/Trendings';
        $for_you_feed_spots_api_url = 'http://rss.feedspot.com/folder/8009354/rss';
        $for_you_inoreader_api_url = 'https://www.inoreader.com/stream/user/1003917626/tag/FOR%20YOU%20';
        $custom_api_url = 'http://rss.feedspot.com/folder/8009356/rss';
        $custom_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Immigration';
        $culture_api_url = 'http://rss.feedspot.com/folder/7959925/rss';
        // $culture_api_url_inoreader = 'https://blavity.com/rss';
        $news_api_url = 'http://rss.feedspot.com/folder/8004712/rss';
        $news_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/News';
        $business_api_url = 'http://rss.feedspot.com/folder/8008719/rss';
        $business_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Business';
        $finance_api_url = 'http://rss.feedspot.com/folder/7933984/rss';
        $finance_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Finance';
        $spirituality_api_url = 'http://rss.feedspot.com/folder/7960095/rss';
        $spirituality_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Spirituality';
        $world_news_url = 'http://rss.feedspot.com/folder/7959930/rss';
        $world_news_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/World%20News';
        $blackfamily_api_url = 'http://rss.feedspot.com/folder/7933966/rss';
        $blackfamily_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Family';
        $education_api_url = 'http://rss.feedspot.com/folder/8006737/rss';
        $education_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Education';
        $entertainment_api_url = 'http://rss.feedspot.com/folder/7961576/rss';
        $entertainment_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Entertainment';
        $sports_api_url = 'http://rss.feedspot.com/folder/7935886/rss';
        $sports_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Sports';
        $worldpoverty_api_url = 'http://rss.feedspot.com/folder/8005372/rss';
        $worldpoverty_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/World%20Poverty';
        $farming_api_url = 'http://rss.feedspot.com/folder/8011085/rss';
        $farming_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Agriculture';
        $crimereport_api_url = 'http://rss.feedspot.com/folder/7960547/rss';
        $crimereport_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Gun%20Violence';
        $crypto_api_url = 'http://rss.feedspot.com/folder/8008704/rss';
        $crypto_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Crypto';
        $atlanta_api_url = 'http://rss.feedspot.com/folder/1556788/rss';
        $atlanta_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Atlanta';
        $georgia_api_url = 'http://rss.feedspot.com/folder/8009005/rss';
        $georgia_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Georgia';
        $woman_api_url = 'http://rss.feedspot.com/folder/8011143/rss';
        $woman_api_url_inoreader = 'https://www.inoreader.com/stream/user/1003917626/tag/Woman';
        $addiction_api_url = 'http://rss.feedspot.com/folder/8005365/rss';
        // $addiction_api_url_inoreader = 'https://www.jazzwax.com/feed';
        $fashion_photography_api_url = 'http://rss.feedspot.com/folder/8005384/rss';
        // $fashion_photography_api_url_inoreader = 'https://www.jazzwax.com/feed';
        $travel_api_url = 'http://rss.feedspot.com/folder/7960107/rss';
        // $travel_api_url_inoreader = 'https://www.jazzwax.com/feed';
        $people_api_url = 'http://rss.feedspot.com/folder/8004714/rss';
        // $people_api_url_inoreader = 'https://www.jazzwax.com/feed';
        $sisters_api_url = 'http://rss.feedspot.com/folder/7933983/rss';
        // $sisters_api_url_inoreader = 'https://www.jazzwax.com/feed';
        $joe_rogan_api_url = 'https://api.rss.app/v1/feeds/c9MYa4CFUhyFypIY';
        $native_land_pod_api_url = 'https://api.rss.app/v1/feeds/hWfAoIZVdYbYkcnn';
        // $repjeffries_api_url = 'https://api.rss.app/v1/feeds/0HN8eX0EuUWAglOl';
        $repjeffries_api_url = '';
        // $substack_url = 'https://misterponder.substack.com/feed';
        
        // $followed_channels = [
        //     // 'https://misterponder.substack.com/feed', 
        //     // 'https://another-personality.substack.com/feed',
        //     'https://johnross43.substack.com/feed',
        //     'https://johnrobins.substack.com/feed',
        //     'https://byjohndavid.substack.com/feed',
        //     'https://jfradioshow.substack.com/feed',
        // ];
        
        // $emptyFeedResponse is defined at the beginning of the index method

        $joeRogan = ($http())->withHeaders([
            'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
            'Accept' => 'application/json'
        ])->get($joe_rogan_api_url);
        $native_land_pod = ($http())->withHeaders([
            'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
            'Accept' => 'application/json'
        ])->get($native_land_pod_api_url);
        $repjeffries = ($http())->withHeaders([
            'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
            'Accept' => 'application/json'
        ])->get($repjeffries_api_url);
        $sports = ($http())->withHeaders([
            'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
            'Accept' => 'application/json'
        ])->get($sports_api_url, [
            'topic' => 'business'
        ]);
        $blackfamily = ($http())->withHeaders([
            'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
            'Accept' => 'application/json'
        ])->get($blackfamily_api_url, [
            'topic' => 'black family'
        ]);
        $education = ($http())->withHeaders([
            'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
            'Accept' => 'application/json'
        ])->get($education_api_url, [
            'topic' => 'Education'
        ]);
        $farming = ($http())->get($api_url, [
            'q' => 'farming',
            'apiKey' => env('NEWS_API_KEY')
        ]);
        $farming = ($http())->withHeaders([
            'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
            'Accept' => 'application/json'
        ])->get($farming_api_url, [
            'topic' => 'business'
        ]);
        $crimereport = ($http())->withHeaders([
            'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
            'Accept' => 'application/json'
        ])->get($crimereport_api_url, [
            'topic' => 'business'
        ]);
        // $crypto = Http::withHeaders([
        //     'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
        //     'Accept' => 'application/json'
        // ])->get($crypto_api_url, [
        //     'topic' => 'crypto'
        // ]);
        $addiction = ($http())->withHeaders([
            'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
            'Accept' => 'application/json'
        ])->get($addiction_api_url, [
            'topic' => 'addiction'
        ]);
        $people = ($http())->withHeaders([
            'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
            'Accept' => 'application/json'
        ])->get($people_api_url, [
            'topic' => 'people & sisters'
        ]);
        $sisters = ($http())->withHeaders([
            'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
            'Accept' => 'application/json'
        ])->get($sisters_api_url, [
            'topic' => 'sisters'
        ]);
        $atlanta = ($http())->withHeaders([
            'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
            'Accept' => 'application/json'
        ])->get($atlanta_api_url, [
            'topic' => 'atlanta'
        ]);
        // $georgia = Http::withHeaders([
        //     'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
        //     'Accept' => 'application/json'
        // ])->get($georgia_api_url, [
        //     'topic' => 'georgia'
        // ]);
        $sudanNews = ($http())->get($api_url, [
            'q' => 'Sudan News',
            'apiKey' => env('NEWS_API_KEY')
        ]);
        $for_you_response = ($http())->get($for_you_feed_spots_api_url);
        $for_you_inoreader_response = ($http())->get($for_you_inoreader_api_url);
        $trending_api_response_feed_spot = ($http())->get($trending_api_url_feed_spots);
        $trending_api_response_jazzwax = ($http())->get($jazzwax_api_url);
        $custom_api_url_response = ($http())->get($custom_api_url);
        $custom_api_url_response_inoreader = ($http())->get($custom_api_url_inoreader);
        $culture_api_url_response = ($http())->get($culture_api_url);
        // $culture_api_url_response_inoreader = Http::get($culture_api_url_inoreader);
        $politics_api_url_response = ($http())->get($politics_api_url);
        $politics_api_url_response_inoreader = ($http())->get($politics_api_url_inoreader);
        $news_api_url_response = ($http())->get($news_api_url);
        $news_api_url_inoreader_response = ($http())->get($news_api_url_inoreader);
        $business_api_url_response = ($http())->get($business_api_url);
        $business_api_url_response_inoreader = ($http())->get($business_api_url_inoreader);
        $finance_api_url_response = ($http())->get($finance_api_url);
        $finance_api_url_response_inoreader = ($http())->get($finance_api_url_inoreader);
        $spirituality_api_url_response = ($http())->get($spirituality_api_url);
        $spirituality_api_url_response_inoreader = ($http())->get($spirituality_api_url_inoreader);
        $world_news_url_response = ($http())->get($world_news_url);
        $world_news_url_response_inoreader = ($http())->get($world_news_url_inoreader);
        $blackfamily_api_url_response = ($http())->get($blackfamily_api_url);
        $blackfamily_api_url_response_inoreader = ($http())->get($blackfamily_api_url_inoreader);
        $education_api_url_response = ($http())->get($education_api_url);
        $education_api_url_response_inoreader = ($http())->get($education_api_url_inoreader);
        $entertainment_api_url_response = ($http())->get($entertainment_api_url);
        $entertainment_api_url_response_inoreader = ($http())->get($entertainment_api_url_inoreader);
        $sport_api_url_response = ($http())->get($sports_api_url);
        $sport_api_url_response_inoreader = ($http())->get($sports_api_url_inoreader);
        $worldpoverty_api_url_response_inoreader = ($http())->get($worldpoverty_api_url_inoreader);
        $worldpoverty_api_url_response = ($http())->get($worldpoverty_api_url);
        $farming_api_url_response = ($http())->get($farming_api_url);
        $farming_api_url_response_inoreader = ($http())->get($farming_api_url_inoreader);
        $crimereport_api_url_response = ($http())->get($crimereport_api_url);
        $crimereport_api_url_response_inoreader = ($http())->get($crimereport_api_url_inoreader);
        $crypto_api_url_response = ($http())->get($crypto_api_url);
        $crypto_api_url_response_inoreader = ($http())->get($crypto_api_url_inoreader);
        $atlanta_api_url_response = ($http())->get($atlanta_api_url);
        $atlanta_api_url_response_inoreader = ($http())->get($atlanta_api_url_inoreader);
        $georgia_api_url_response = ($http())->get($georgia_api_url);
        $georgia_api_url_response_inoreader = ($http())->get($georgia_api_url_inoreader);
        $woman_api_url_response = ($http())->get($woman_api_url);
        $woman_api_url_response_inoreader = ($http())->get($woman_api_url_inoreader);
        $addiction_api_url_response = ($http())->get($addiction_api_url);
        // $addiction_api_url_response_inoreader = Http::get($addiction_api_url_inoreader);
        $fashion_photography_api_url_response = ($http())->get($fashion_photography_api_url);
        // $fashion_photography_api_url_response_inoreader = Http::get($fashion_photography_api_url_inoreader);
        $travel_api_url_response = ($http())->get($travel_api_url);
        // $travel_api_url_response_inoreader = Http::get($travel_api_url_inoreader);
        $people_url_response = ($http())->get($people_api_url);
        // $people_url_response_inoreader = Http::get($people_api_url_inoreader);
        $sisters_api_url_response = ($http())->get($sisters_api_url);
        // $sisters_api_url_response_inoreader = Http::get($sisters_api_url_inoreader);
        $spotify_section_api = $spotify->getPlaylist($playlist_id);
        $joerogan_spotify_section_api = $spotify->getJoeRoganPlaylist($joeroganplaylist_id);
        // try {
        //     $response = Http::get($substack_url);
        //     $unfilteredVideos = [];
        
        //     if ($response->ok()) {
        //         $xml = simplexml_load_string($response->body());
                
        //         // Media namespace ko handle karne ke liye
        //         foreach ($xml->channel->item as $item) {
        //             $media = $item->children('http://search.yahoo.com/mrss/');
        //             $content = $item->children('http://purl.org/rss/1.0/modules/content/');
                    
        //             $thumbnail = '';
        
        //             // 1. Sabse pehle media:content dhoondein
        //             if (isset($media->content)) {
        //                 $thumbnail = (string)$media->content->attributes()->url;
        //             } 
        //             // 2. Agar nahi mila to enclosure check karein
        //             elseif (isset($item->enclosure)) {
        //                 $thumbnail = (string)$item->enclosure['url'];
        //             }
        //             // 3. Agar phir bhi nahi mila to description se image nikalein (Regex)
        //             else {
        //                 preg_match('/<img.*?src=["\'](.*?)["\']/', (string)$item->description, $matches);
        //                 if (isset($matches[1])) {
        //                     $thumbnail = $matches[1];
        //                 } else {
        //                     // Agar koi image nahi milti to koi default image laga dein
        //                     $thumbnail = '/frontend/assets/images/default-video-thumb.jpg'; 
        //                 }
        //             }
        
        //             $unfilteredVideos[] = [
        //                 'title'     => (string) $item->title,
        //                 'link'      => (string) $item->link,
        //                 'thumbnail' => $thumbnail,
        //                 'date'      => date('M d, Y', strtotime((string)$item->pubDate)),
        //             ];
        //         }
        //     }
        // } catch (\Exception $e) {
        //     $unfilteredVideos = [];
        // }

        // $unfilteredFeeds = [
        //     [
        //         'name' => 'Joy Reid',
        //         'feed_url' => 'https://rss.app/feed/JwvmWEjBN5XRX15d',
        //         'role' => 'American commentator and television host'
        //     ],
        //     [
        //         'name' => 'Trevor Noah',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/aNTlTisap74THUlj',
        //         'role' => 'South African comedian and writer'
        //     ],
        //     [
        //         'name' => 'Van Lathan',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/5i2q3Pj6oDjSRNDK',
        //         'role' => 'American journalist and producer'
        //     ],
        //     [
        //         'name' => 'Ana Kasparian',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/WtquqhYgU6PWcGzF',
        //         'role' => 'American commentator'
        //     ],
        //     [
        //         'name' => 'Jon Stewart',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/v7HNvc2JRagw338p',
        //         'role' => 'American comedian and writer'
        //     ],
        //     [
        //         'name' => 'Jimmy Kimmel',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/Cz6nTrprq9rzcyFo',
        //         'role' => 'American television host and comedian'
        //     ],
        //     [
        //         'name' => 'Chris Hayes',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/vshxQK3XgsYcnbcG',
        //         'role' => 'American commentator'
        //     ],
        //     [
        //         'name' => 'Jennifer Welch',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/FXaocGLeTDkSjeLb',
        //         'role' => 'Host'
        //     ],
        //     [
        //         'name' => 'Tucker Carlson',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/vtYRrpRW3ZbneJF7',
        //         'role' => 'American activist and commentator'
        //     ],
        //     [
        //         'name' => 'Saagar Enjeti',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/WCVhPgCyB76NsyoZ',
        //         'role' => 'American journalist'
        //     ],
        //     [
        //         'name' => 'John Kiriakoua',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/sgGVEkhmP7NzJdFA',
        //         'role' => 'CIA counterterrorism officer and analyst'
        //     ],
        //     [
        //         'name' => 'Jasmine Crockett',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/QXMU0s0aywzgqWrc',
        //         'role' => 'United States Representative'
        //     ],
        //     [
        //         'name' => 'Cori Bush',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/BfQjRmz3REZxCCcR',
        //         'role' => 'Nurse and former United States Representative'
        //     ],
        //     [
        //         'name' => 'Cenk Uygur',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/IikjfSrXJhZG2XAJ',
        //         'role' => 'Turkish-American political activist'
        //     ],
        //     [
        //         'name' => 'Jemele Hill',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/uc7V6WsTpmE2TRe0',
        //         'role' => 'American sports writer'
        //     ],
        //     [
        //         'name' => 'Karen Attiah',
        //         'feed_url' => 'https://api.rss.app/v1/feeds/dqHabu63BqCDKkOq',
        //         'role' => 'American writer and commentator'
        //     ],

        // ];

        $politicsArticles = [];
        $sportsArticles = [];
        $businessArticles = [];
        $financeArticles = [];
        $spiritualityArticles = [];
        $blackfamilyArticles = [];
        $educationArticles = [];
        $entertainmentArticles = [];
        $worldpovertyArticles = [];
        $farmingArticles = [];
        $crimereportArticles = [];
        $cryptoArticles = [];
        $trendingArticles = [];
        $cultureArticles = [];
        $customArticles = [];
        $addictionArticles = [];
        $peopleArticles = [];
        $fashionPhotographyArticles = [];
        $sistersArticles = [];
        $atlantaArticles = [];
        $georgiaArticles = [];
        $travelArticles = [];
        $SudanNewsArticles = [];
        $unfiltered = [];
        $top_stories = [];
        $forYouArticles = [];
        $newsArticles = [];
        $worldNewsArticles = [];
        $topStoriesEpisodes = [];
        // $substackVideos = [];
        // $spotifyEpisodes = [];
        
        // foreach ($followed_channels as $url) {
        //     try {
        //         $response = Http::timeout(6)->get($url);
        //         if ($response->ok()) {
        //             $xml = simplexml_load_string($response->body());
        //             if ($xml) {
        //                 foreach ($xml->channel->item as $item) {
        //                     $media = $item->children('http://search.yahoo.com/mrss/');
        //                     $thumbnail = '';
    
        //                     if (isset($media->content)) {
        //                         $thumbnail = (string)$media->content->attributes()->url;
        //                     } elseif (isset($item->enclosure)) {
        //                         $thumbnail = (string)$item->enclosure['url'];
        //                     } elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string)$item->description, $matches)) {
        //                         $thumbnail = $matches[1];
        //                     } else {
        //                         $thumbnail = '/frontend/assets/images/default-video-thumb.jpg';
        //                     }
    
        //                     $substackVideos[] = [
        //                         'type'        => 'substack',
        //                         'title'       => (string)$item->title,
        //                         'link'        => (string)$item->link,
        //                         'thumbnail'   => $thumbnail,
        //                         'pubDate'     => (string)$item->pubDate,
        //                         'timestamp'   => strtotime((string)$item->pubDate),
        //                     ];
        //                 }
        //             }
        //         }
        //     } catch (\Exception $e) {
        //         continue;
        //     }
        // }
        
        // $topStoriesItems = array_merge($spotifyEpisodes, $substackVideos);
        
        // usort($topStoriesItems, function($a, $b) {
        //     $timeA = $a['release_date'] ?? $a['pubDate'] ?? 0;
        //     $timeB = $b['release_date'] ?? $b['pubDate'] ?? 0;
        //     return strtotime($timeB) - strtotime($timeA);
        // });
    
        // $topStoriesItems = array_slice($topStoriesItems, 0, 10);
        
        // foreach ($podcastShows as $show) {
        //     $episode = $this->getLatestEpisode($show['show_id']);
        //     if ($episode) {
        //         $topStoriesEpisodes[] = [
        //             'show_name'    => $show['name'],
        //             'episode_name' => $episode['name'],
        //             'episode_id'   => $episode['id'],
        //             'release_date' => $episode['release_date'],
        //             'description'  => $episode['description'] ?? '',
        //         ];
        //     }
        // }
        
        // foreach ($podcastShows as $show) {
        //     $episode = $this->getLatestEpisode($show['show_id']);
        //     if ($episode) {
        //         $spotifyEpisodes[] = [
        //             'type'         => 'spotify',
        //             'show_name'    => $show['name'],
        //             'episode_name' => $episode['name'],
        //             'episode_id'   => $episode['id'],
        //             'release_date' => $episode['release_date'],
        //         ];
        //     }
        // }

        if ($sudanNews->successful()) {
            $SudanNewsArticles = $sudanNews->json()['articles'];
        }
        if ($for_you_response->successful()) {

            $xml = simplexml_load_string($for_you_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item, $channelImage);

                    $forYouArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        if ($for_you_inoreader_response->successful()) {

            $xml = simplexml_load_string($for_you_inoreader_response->getBody());

            if ($xml !== false) {

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item);

                    $forYouArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        // if ($addiction_api_url_response->successful()) {

        //     $xml = simplexml_load_string($addiction_api_url_response->getBody());

        //     if ($xml !== false) {

        //         foreach ($xml->channel->item as $item) {

        //             $image = ''; // ✅ NO default channel image

        //             // ✅ 1. enclosure image (ONLY if it's an actual image)
        //             if (isset($item->enclosure)) {
        //                 $type = (string) $item->enclosure->attributes()->type;

        //                 if (str_contains($type, 'image')) {
        //                     $image = (string) $item->enclosure->attributes()->url;
        //                 }
        //             }

        //             // ✅ 2. itunes image
        //             if (empty($image) && isset($item->children('itunes', true)->image)) {
        //                 $image = (string) $item->children('itunes', true)->image->attributes()->href;
        //             }

        //             // ✅ 3. description image (regex fallback)
        //             if (empty($image) && preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
        //                 $image = $matches[1];
        //             }

        //             $addictionArticles[] = [
        //                 'title' => (string) $item->title,
        //                 'description' => strip_tags((string) $item->description),
        //                 'description_text' => strip_tags((string) $item->description),
        //                 'date_published' => (string) $item->pubDate,
        //                 'pubDate' => (string) $item->pubDate,
        //                 'link' => (string) $item->link,

        //                 // ✅ FINAL IMAGE (empty ya valid URL)
        //                 'thumbnail' => $image,
        //                 'image' => $image,

        //                 // ✅ AUTHOR
        //                 'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

        //                 'dc_creator' => isset($item->children('dc', true)->creator)
        //                     ? (string) $item->children('dc', true)->creator
        //                     : '',

        //                 // ✅ AUDIO (safe)
        //                 'audio' => isset($item->enclosure)
        //                     ? (string) $item->enclosure->attributes()->url
        //                     : '',
        //             ];

        //             if (count($addictionArticles) >= 10)
        //                 break;
        //         }
        //     }
        // }     
        // if ($addiction_api_url_response_inoreader->successful()) {

        //     $xml = simplexml_load_string($addiction_api_url_response_inoreader->getBody());

        //     if ($xml !== false) {

        //         $count = 0;

        //         foreach ($xml->channel->item as $item) {

        //             if ($count >= 10)
        //                 break;

        //             $image = '';

        //             if (isset($item->enclosure)) {
        //                 $type = (string) $item->enclosure->attributes()->type;
        //                 if (str_contains($type, 'image')) {
        //                     $image = (string) $item->enclosure->attributes()->url;
        //                 }
        //             } elseif (isset($item->children('itunes', true)->image)) {
        //                 $image = (string) $item->children('itunes', true)->image->attributes()->href;
        //             } elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
        //                 $image = $matches[1];
        //             }

        //             $addictionArticles[] = [
        //                 'title' => (string) $item->title,
        //                 'description' => strip_tags((string) $item->description),
        //                 'description_text' => strip_tags((string) $item->description),
        //                 'date_published' => (string) $item->pubDate,
        //                 'pubDate' => (string) $item->pubDate,
        //                 'link' => (string) $item->link,
        //                 'thumbnail' => $image,
        //                 'image' => $image,
        //                 'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
        //                 'dc_creator' => isset($item->children('dc', true)->creator)
        //                     ? (string) $item->children('dc', true)->creator
        //                     : '',
        //             ];

        //             $count++;
        //         }
        //     }
        // }
        if ($fashion_photography_api_url_response->successful()) {

            $xml = simplexml_load_string($fashion_photography_api_url_response->getBody());

            if ($xml !== false) {

                foreach ($xml->channel->item as $item) {

                    $image = ''; // ✅ NO channel default image

                    // ✅ 1. enclosure image (ONLY real image)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    if (empty($image) && isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. description image fallback
                    if (empty($image) && preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $fashionPhotographyArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,

                        // ✅ FINAL IMAGE
                        'thumbnail' => $image,
                        'image' => $image,

                        // ✅ AUTHOR
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',

                        // ✅ AUDIO SAFE
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($fashionPhotographyArticles) >= 10)
                        break;
                }
            }
        }
        // if ($fashion_photography_api_url_response_inoreader->successful()) {

        //     $xml = simplexml_load_string($fashion_photography_api_url_response_inoreader->getBody());

        //     if ($xml !== false) {

        //         $count = 0;

        //         foreach ($xml->channel->item as $item) {

        //             if ($count >= 10)
        //                 break;

        //             $image = '';

        //             if (isset($item->enclosure)) {
        //                 $type = (string) $item->enclosure->attributes()->type;
        //                 if (str_contains($type, 'image')) {
        //                     $image = (string) $item->enclosure->attributes()->url;
        //                 }
        //             } elseif (isset($item->children('itunes', true)->image)) {
        //                 $image = (string) $item->children('itunes', true)->image->attributes()->href;
        //             } elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
        //                 $image = $matches[1];
        //             }

        //             $fashionPhotographyArticles[] = [
        //                 'title' => (string) $item->title,
        //                 'description' => strip_tags((string) $item->description),
        //                 'description_text' => strip_tags((string) $item->description),
        //                 'date_published' => (string) $item->pubDate,
        //                 'pubDate' => (string) $item->pubDate,
        //                 'link' => (string) $item->link,
        //                 'thumbnail' => $image,
        //                 'image' => $image,
        //                 'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
        //                 'dc_creator' => isset($item->children('dc', true)->creator)
        //                     ? (string) $item->children('dc', true)->creator
        //                     : '',
        //             ];

        //             $count++;
        //         }
        //     }
        // }
        if ($addiction_api_url_response->successful()) {

            $xml = simplexml_load_string($addiction_api_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {

                    $image = $channelImage; // default

                    // ✅ 1. enclosure image (MAIN FIX)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    elseif (isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. fallback: description image
                    elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $addictionArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,

                        // ==================== AUTHOR NAME ADD KARO ====================
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        // Extra safe fallback
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',

                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($addictionArticles) >= 10)
                        break;
                }
            }
        }
        if ($atlanta_api_url_response->successful()) {

            $xml = simplexml_load_string($atlanta_api_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {

                    $image = $channelImage; // default

                    // ✅ 1. enclosure image (MAIN FIX)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    elseif (isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. fallback: description image
                    elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $atlantaArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,

                        // ==================== AUTHOR NAME ADD KARO ====================
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        // Extra safe fallback
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',

                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($atlantaArticles) >= 10)
                        break;
                }
            }
        }
        if ($atlanta_api_url_response_inoreader->successful()) {

            $xml = simplexml_load_string($atlanta_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item);

                    $atlantaArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        if ($georgia_api_url_response->successful()) {
            $xml = simplexml_load_string($georgia_api_url_response->getBody());
        
            if ($xml !== false) {
                $count = 0;
                foreach ($xml->channel->item as $item) {
                    if ($count >= 10)
                        break;
                    $image = '';
                
                    // 1. Enclosure Check (Har item ke liye pehle ye check karein)
                    if (isset($item->enclosure)) {
                        // Hum pehle enclosure ko check kar rahe hain
                        foreach ($item->enclosure as $enc) {
                            $attr = $enc->attributes();
                            if (isset($attr['url'])) {
                                $url = (string)$attr['url'];
                                $type = isset($attr['type']) ? (string)$attr['type'] : '';
                
                                // Check karein agar URL image hai ya type image hai
                                if (str_contains($type, 'image') || preg_match('/\.(jpg|jpeg|png|gif|webp)/i', $url)) {
                                    $image = $url;
                                    // Agar image mil gayi, to loop break karein taaki audio URL na uth jaye
                                    if (str_contains($type, 'image')) break; 
                                }
                            }
                        }
                    }
                
                    // 2. iTunes Image Check (Agar enclosure khali mila - khaas kar podcasts ke liye)
                    if (empty($image)) {
                        $itunesNS = $item->children('http://www.itunes.com/dtds/podcast-1.0.dtd');
                        if (isset($itunesNS->image)) {
                            $image = (string)$itunesNS->image->attributes()->href;
                        }
                    }
                
                    // 3. Data array mein save karein
                    $georgiaArticles[] = [
                        'title' => (string) $item->title,
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image, // Ensure ye value pass ho rahi hai
                        'author' => (string) ($item->children('dc', true)->creator ?? 'The Georgia Straight'),
                    ];
                }
            }
        }
        if ($georgia_api_url_response_inoreader->successful()) {

            $xml = simplexml_load_string($georgia_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item);

                    $georgiaArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        if ($woman_api_url_response->successful()) {
            $xml = simplexml_load_string($woman_api_url_response->getBody());
        
            if ($xml !== false) {
                $count = 0;
                foreach ($xml->channel->item as $item) {
                    if ($count >= 10)
                        break;
                    $image = '';
                
                    // 1. Enclosure Check (Har item ke liye pehle ye check karein)
                    if (isset($item->enclosure)) {
                        // Hum pehle enclosure ko check kar rahe hain
                        foreach ($item->enclosure as $enc) {
                            $attr = $enc->attributes();
                            if (isset($attr['url'])) {
                                $url = (string)$attr['url'];
                                $type = isset($attr['type']) ? (string)$attr['type'] : '';
                
                                // Check karein agar URL image hai ya type image hai
                                if (str_contains($type, 'image') || preg_match('/\.(jpg|jpeg|png|gif|webp)/i', $url)) {
                                    $image = $url;
                                    // Agar image mil gayi, to loop break karein taaki audio URL na uth jaye
                                    if (str_contains($type, 'image')) break; 
                                }
                            }
                        }
                    }
                
                    // 2. iTunes Image Check (Agar enclosure khali mila - khaas kar podcasts ke liye)
                    if (empty($image)) {
                        $itunesNS = $item->children('http://www.itunes.com/dtds/podcast-1.0.dtd');
                        if (isset($itunesNS->image)) {
                            $image = (string)$itunesNS->image->attributes()->href;
                        }
                    }
                
                    // 3. Data array mein save karein
                    $womanArticles[] = [
                        'title' => (string) $item->title,
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image, // Ensure ye value pass ho rahi hai
                        'author' => (string) ($item->children('dc', true)->creator ?? 'The Georgia Straight'),
                    ];
                }
            }
        }
        if ($woman_api_url_response_inoreader->successful()) {

            $xml = simplexml_load_string($woman_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item);

                    $womanArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        if ($people_url_response->successful()) {

            $xml = simplexml_load_string($people_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {

                    $image = $channelImage; // default

                    // ✅ 1. enclosure image (MAIN FIX)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    elseif (isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. fallback: description image
                    elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $peopleArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,

                        // ==================== AUTHOR NAME ADD KARO ====================
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        // Extra safe fallback
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',

                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($peopleArticles) >= 10)
                        break;
                }
            }
        }
        // if ($people_url_response_inoreader->successful()) {

        //     $xml = simplexml_load_string($people_url_response_inoreader->getBody());

        //     if ($xml !== false) {

        //         $count = 0;

        //         foreach ($xml->channel->item as $item) {

        //             if ($count >= 10)
        //                 break;

        //             $image = '';

        //             if (isset($item->enclosure)) {
        //                 $type = (string) $item->enclosure->attributes()->type;
        //                 if (str_contains($type, 'image')) {
        //                     $image = (string) $item->enclosure->attributes()->url;
        //                 }
        //             } elseif (isset($item->children('itunes', true)->image)) {
        //                 $image = (string) $item->children('itunes', true)->image->attributes()->href;
        //             } elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
        //                 $image = $matches[1];
        //             }

        //             $peopleArticles[] = [
        //                 'title' => (string) $item->title,
        //                 'description' => strip_tags((string) $item->description),
        //                 'description_text' => strip_tags((string) $item->description),
        //                 'date_published' => (string) $item->pubDate,
        //                 'pubDate' => (string) $item->pubDate,
        //                 'link' => (string) $item->link,
        //                 'thumbnail' => $image,
        //                 'image' => $image,
        //                 'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
        //                 'dc_creator' => isset($item->children('dc', true)->creator)
        //                     ? (string) $item->children('dc', true)->creator
        //                     : '',
        //             ];

        //             $count++;
        //         }
        //     }
        // }
        if ($education_api_url_response->successful()) {

            $xml = simplexml_load_string($education_api_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {

                    $image = $channelImage; // default

                    // ✅ 1. enclosure image (MAIN FIX)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    elseif (isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. fallback: description image
                    elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $educationArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,

                        // ==================== AUTHOR NAME ADD KARO ====================
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        // Extra safe fallback
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',

                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($educationArticles) >= 10)
                        break;
                }
            }
        }
        if ($education_api_url_response_inoreader->successful()) {
            $xml = simplexml_load_string($education_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0; // 👈 counter

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break; // 👈 sirf 3 items

                    $image = $extractImage($item);

                    $educationArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Source'),
                        'pubDate' => (string) $item->pubDate,
                    ];

                    $count++; // 👈 increment
                }
            }
        }
        if ($blackfamily_api_url_response->successful()) {

            $xml = simplexml_load_string($blackfamily_api_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {

                    $image = $channelImage; // default

                    // ✅ 1. enclosure image (MAIN FIX)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    elseif (isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. fallback: description image
                    elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $blackfamilyArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,

                        // ==================== AUTHOR NAME ADD KARO ====================
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        // Extra safe fallback
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',

                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($blackfamilyArticles) >= 10)
                        break;
                }
            }
        }
        if ($blackfamily_api_url_response_inoreader->successful()) {
            $xml = simplexml_load_string($blackfamily_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0; // 👈 counter

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break; // 👈 sirf 3 items

                    $image = $extractImage($item);

                    $blackfamilyArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Source'),
                        'pubDate' => (string) $item->pubDate,
                    ];

                    $count++; // 👈 increment
                }
            }
        }
        if ($sisters_api_url_response->successful()) {

            $xml = simplexml_load_string($sisters_api_url_response->getBody());

            if ($xml !== false) {

                foreach ($xml->channel->item as $item) {

                    $image = ''; // ✅ NO channel default image

                    // ✅ 1. enclosure image (ONLY real image)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    if (empty($image) && isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. description image fallback
                    if (empty($image) && preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $sistersArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,

                        // ✅ FINAL IMAGE
                        'thumbnail' => $image,
                        'image' => $image,

                        // ✅ AUTHOR
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',

                        // ✅ AUDIO SAFE
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($sistersArticles) >= 10)
                        break;
                }
            }
        }       
        // if ($sisters_api_url_response_inoreader->successful()) {
        //     $xml = simplexml_load_string($sisters_api_url_response_inoreader->getBody());

        //     if ($xml !== false) {

        //         $count = 0; // 👈 counter

        //         foreach ($xml->channel->item as $item) {

        //             if ($count >= 10)
        //                 break; // 👈 sirf 3 items

        //             $image = '';

        //             if (isset($item->enclosure)) {
        //                 $type = (string) $item->enclosure->attributes()->type;
        //                 if (str_contains($type, 'image')) {
        //                     $image = (string) $item->enclosure->attributes()->url;
        //                 }
        //             } elseif (isset($item->children('itunes', true)->image)) {
        //                 $image = (string) $item->children('itunes', true)->image->attributes()->href;
        //             } elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
        //                 $image = $matches[1];
        //             }

        //             $sistersArticles[] = [
        //                 'title' => (string) $item->title,
        //                 'description' => strip_tags((string) $item->description),
        //                 'link' => (string) $item->link,
        //                 'thumbnail' => $image,
        //                 'image' => $image,
        //                 'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Source'),
        //                 'pubDate' => (string) $item->pubDate,
        //             ];

        //             $count++; // 👈 increment
        //         }
        //     }
        // }
        if ($trending_api_response_feed_spot->successful()) {

            $xml = simplexml_load_string($trending_api_response_feed_spot->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break; // 👈 LIMIT 3

                    $image = $extractImage($item, $channelImage);

                    $trendingArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),
                        'pubDate' => (string) $item->pubDate,
                    ];

                    $count++;
                }
            }
        }
        if ($trending_api_response_jazzwax->successful()) {
            $xml = simplexml_load_string($trending_api_response_jazzwax->getBody());

            if ($xml !== false) {

                $count = 0; // 👈 counter

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break; // 👈 sirf 3 items

                    $image = $extractImage($item);

                    $trendingArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Source'),
                        'pubDate' => (string) $item->pubDate,
                    ];

                    $count++; // 👈 increment
                }
            }
        }
        if ($custom_api_url_response_inoreader->successful()) {
            $xml = simplexml_load_string($custom_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                $count = 0; // 👈 counter

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break; // 👈 sirf 3 items

                    $image = $extractImage($item, $channelImage);

                    $customArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'link' => (string) $item->link,
                        'url' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'urlToImage' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Source'),
                        'dc_creator' => isset($item->children('dc', true)->creator) ? (string) $item->children('dc', true)->creator : '',
                        'pubDate' => (string) $item->pubDate,
                        'date_published' => (string) $item->pubDate,
                    ];

                    $count++; // 👈 increment
                }
            }
        }
        if ($custom_api_url_response->successful()) {
            $xml = simplexml_load_string($custom_api_url_response->getBody());

            if ($xml !== false) {

                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                $count = 0; // 👈 counter

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break; // 

                    $image = $extractImage($item, $channelImage);

                    $customArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'link' => (string) $item->link,
                        'url' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'urlToImage' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Source'),
                        'dc_creator' => isset($item->children('dc', true)->creator) ? (string) $item->children('dc', true)->creator : '',
                        'pubDate' => (string) $item->pubDate,
                        'date_published' => (string) $item->pubDate,
                    ];

                    $count++; // 👈 increment
                }
            }
        }
        if ($world_news_url_response->successful()) {
            $xml = simplexml_load_string($world_news_url_response->getBody());

            if ($xml !== false) {

                $count = 0; // 👈 counter

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break; // 👈 sirf 3 items

                    $image = $extractImage($item);

                    $worldNewsArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'link' => (string) $item->link,
                        'url' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'urlToImage' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Source'),
                        'dc_creator' => isset($item->children('dc', true)->creator) ? (string) $item->children('dc', true)->creator : '',
                        'pubDate' => (string) $item->pubDate,
                        'date_published' => (string) $item->pubDate,
                    ];

                    $count++; // 👈 increment
                }
            }
        }
        if ($world_news_url_response_inoreader->successful()) {
            $xml = simplexml_load_string($world_news_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0; // 👈 counter

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break; // 👈 sirf 3 items

                    $image = $extractImage($item);

                    $worldNewsArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'link' => (string) $item->link,
                        'url' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'urlToImage' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Source'),
                        'dc_creator' => isset($item->children('dc', true)->creator) ? (string) $item->children('dc', true)->creator : '',
                        'pubDate' => (string) $item->pubDate,
                        'date_published' => (string) $item->pubDate,
                    ];

                    $count++; // 👈 increment
                }
            }
        }
        if ($culture_api_url_response->successful()) {

            $xml = simplexml_load_string($culture_api_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item, $channelImage);

                    $cultureArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'link' => (string) $item->link,
                        'url' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'urlToImage' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),
                        'dc_creator' => isset($item->children('dc', true)->creator) ? (string) $item->children('dc', true)->creator : '',
                        'pubDate' => (string) $item->pubDate,
                        'date_published' => (string) $item->pubDate,
                    ];

                    $count++;
                }
            }
        }
        // if ($culture_api_url_response_inoreader->successful()) {

        //     $xml = simplexml_load_string($culture_api_url_response_inoreader->getBody());

        //     if ($xml !== false) {

        //         $count = 0;

        //         foreach ($xml->channel->item as $item) {

        //             if ($count >= 10)
        //                 break;

        //             $image = '';

        //             if (isset($item->enclosure)) {
        //                 $type = (string) $item->enclosure->attributes()->type;
        //                 if (str_contains($type, 'image')) {
        //                     $image = (string) $item->enclosure->attributes()->url;
        //                 }
        //             } elseif (isset($item->children('itunes', true)->image)) {
        //                 $image = (string) $item->children('itunes', true)->image->attributes()->href;
        //             } elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
        //                 $image = $matches[1];
        //             }

        //             $cultureArticles[] = [
        //                 'title' => (string) $item->title,
        //                 'description' => strip_tags((string) $item->description),
        //                 'description_text' => strip_tags((string) $item->description),
        //                 'date_published' => (string) $item->pubDate,
        //                 'pubDate' => (string) $item->pubDate,
        //                 'link' => (string) $item->link,
        //                 'thumbnail' => $image,
        //                 'image' => $image,
        //                 'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
        //                 'dc_creator' => isset($item->children('dc', true)->creator)
        //                     ? (string) $item->children('dc', true)->creator
        //                     : '',
        //             ];

        //             $count++;
        //         }
        //     }
        // }
        if ($politics_api_url_response->successful()) {

            $xml = simplexml_load_string($politics_api_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {
                    $image = $extractImage($item, $channelImage, (string)$item->link);

                    $politicsArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,

                        // ✅ FIXED IMAGE
                        'thumbnail' => $image,
                        'image' => $image,
                        // ==================== AUTHOR NAME ADD KARO ====================
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        // Extra safe fallback
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',


                        // 🔥 audio fallback safe
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($politicsArticles) >= 10)
                        break;
                }
            }
        }
        if ($politics_api_url_response_inoreader->successful()) {

            $xml = simplexml_load_string($politics_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item);

                    $politicsArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        if ($finance_api_url_response->successful()) {

            $xml = simplexml_load_string($finance_api_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {

                    $image = $channelImage; // default

                    // ✅ 1. enclosure image (MAIN FIX)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    elseif (isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. fallback: description image
                    elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $financeArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,

                        // ✅ FIXED THUMBNAIL
                        'thumbnail' => $image,
                        'image' => $image,
                        // ==================== AUTHOR NAME ADD KARO ====================
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        // Extra safe fallback
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',


                        // 🔥 audio safe
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($financeArticles) >= 10)
                        break;
                }
            }
        }      
        if ($finance_api_url_response_inoreader->successful()) {

            $xml = simplexml_load_string($finance_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item);

                    $financeArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        if ($spirituality_api_url_response->successful()) {

            $xml = simplexml_load_string($spirituality_api_url_response->getBody());

            if ($xml !== false) {

                foreach ($xml->channel->item as $item) {

                    $image = ''; // ✅ NO channel default image

                    // ✅ 1. enclosure image (ONLY real image)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    if (empty($image) && isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. description image fallback
                    if (empty($image) && preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $spiritualityArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,

                        // ✅ FINAL IMAGE
                        'thumbnail' => $image,
                        'image' => $image,

                        // ✅ AUTHOR
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',

                        // ✅ AUDIO SAFE
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($spiritualityArticles) >= 10)
                        break;
                }
            }
        }
        // if ($spirituality_api_url_response_inoreader->successful()) {

        //     $xml = simplexml_load_string($spirituality_api_url_response_inoreader->getBody());

        //     if ($xml !== false) {

        //         $count = 0;

        //         foreach ($xml->channel->item as $item) {

        //             if ($count >= 10)
        //                 break;

        //             $image = '';

        //             if (isset($item->enclosure)) {
        //                 $type = (string) $item->enclosure->attributes()->type;
        //                 if (str_contains($type, 'image')) {
        //                     $image = (string) $item->enclosure->attributes()->url;
        //                 }
        //             } elseif (isset($item->children('itunes', true)->image)) {
        //                 $image = (string) $item->children('itunes', true)->image->attributes()->href;
        //             } elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
        //                 $image = $matches[1];
        //             }

        //             $spiritualityArticles[] = [
        //                 'title' => (string) $item->title,
        //                 'description' => strip_tags((string) $item->description),
        //                 'description_text' => strip_tags((string) $item->description),
        //                 'date_published' => (string) $item->pubDate,
        //                 'pubDate' => (string) $item->pubDate,
        //                 'link' => (string) $item->link,
        //                 'thumbnail' => $image,
        //                 'image' => $image,
        //                 'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
        //                 'dc_creator' => isset($item->children('dc', true)->creator)
        //                     ? (string) $item->children('dc', true)->creator
        //                     : '',
        //             ];

        //             $count++;
        //         }
        //     }
        // }
        if ($entertainment_api_url_response->successful()) {

            $xml = simplexml_load_string($entertainment_api_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {

                    $image = $extractImage($item, $channelImage);

                    $entertainmentArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'url' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'urlToImage' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($entertainmentArticles) >= 10)
                        break;
                }
            }
        }
        if ($entertainment_api_url_response_inoreader->successful()) {

            $xml = simplexml_load_string($entertainment_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item);

                    $entertainmentArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        if ($crimereport_api_url_response->successful()) {

            $xml = simplexml_load_string($crimereport_api_url_response->getBody());

            if ($xml !== false) {

                foreach ($xml->channel->item as $item) {

                    $image = ''; // ✅ NO channel default image

                    // ✅ 1. enclosure image (ONLY real image)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    if (empty($image) && isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. description image fallback
                    if (empty($image) && preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $crimereportArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,

                        // ✅ FINAL IMAGE
                        'thumbnail' => $image,
                        'image' => $image,

                        // ✅ AUTHOR
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',

                        // ✅ AUDIO SAFE
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($crimereportArticles) >= 10)
                        break;
                }
            }
        }
        if ($crimereport_api_url_response_inoreader->successful()) {

            $xml = simplexml_load_string($crimereport_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item);

                    $crimereportArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        if ($news_api_url_response->successful()) {

            $xml = simplexml_load_string($news_api_url_response->getBody());

            if ($xml !== false) {

                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {
                    $image = $extractImage($item, $channelImage, (string)$item->link);

                    $newsArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,

                        // ✅ FINAL IMAGE (empty ya valid URL)
                        'thumbnail' => $image,
                        'image' => $image,

                        // ✅ AUTHOR
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',

                        // ✅ AUDIO (safe)
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($newsArticles) >= 10)
                        break;
                }
            }
        }
        if ($news_api_url_inoreader_response->successful()) {

            $xml = simplexml_load_string($news_api_url_inoreader_response->getBody());

            if ($xml !== false) {

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item);

                    $newsArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        if ($travel_api_url_response->successful()) {

            $xml = simplexml_load_string($travel_api_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {

                    $image = $channelImage; // default

                    // ✅ 1. enclosure image (MAIN FIX)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    elseif (isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. fallback: description image
                    elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $travelArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,

                        // ✅ FIXED THUMBNAIL
                        'thumbnail' => $image,
                        'image' => $image,
                        // ==================== AUTHOR NAME ADD KARO ====================
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        // Extra safe fallback
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',


                        // 🔥 audio safe
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($travelArticles) >= 10)
                        break;
                }
            }
        }
        // if ($travel_api_url_response_inoreader->successful()) {

        //     $xml = simplexml_load_string($travel_api_url_response_inoreader->getBody());

        //     if ($xml !== false) {

        //         $count = 0;

        //         foreach ($xml->channel->item as $item) {

        //             if ($count >= 10)
        //                 break;

        //             $image = '';

        //             if (isset($item->enclosure)) {
        //                 $type = (string) $item->enclosure->attributes()->type;
        //                 if (str_contains($type, 'image')) {
        //                     $image = (string) $item->enclosure->attributes()->url;
        //                 }
        //             } elseif (isset($item->children('itunes', true)->image)) {
        //                 $image = (string) $item->children('itunes', true)->image->attributes()->href;
        //             } elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
        //                 $image = $matches[1];
        //             }

        //             $travelArticles[] = [
        //                 'title' => (string) $item->title,
        //                 'description' => strip_tags((string) $item->description),
        //                 'description_text' => strip_tags((string) $item->description),
        //                 'date_published' => (string) $item->pubDate,
        //                 'pubDate' => (string) $item->pubDate,
        //                 'link' => (string) $item->link,
        //                 'thumbnail' => $image,
        //                 'image' => $image,
        //                 'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
        //                 'dc_creator' => isset($item->children('dc', true)->creator)
        //                     ? (string) $item->children('dc', true)->creator
        //                     : '',
        //             ];

        //             $count++;
        //         }
        //     }
        // }
        if ($farming_api_url_response->successful()) {

            $xml = simplexml_load_string($farming_api_url_response->getBody());

            if ($xml !== false) {

                foreach ($xml->channel->item as $item) {

                    $image = ''; // ✅ NO channel default image

                    // ✅ 1. enclosure image (ONLY real image)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    if (empty($image) && isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. description image fallback
                    if (empty($image) && preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $farmingArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,

                        // ✅ FINAL IMAGE
                        'thumbnail' => $image,
                        'image' => $image,

                        // ✅ AUTHOR
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',

                        // ✅ AUDIO SAFE
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($farmingArticles) >= 10)
                        break;
                }
            }
        }
        if ($farming_api_url_response_inoreader->successful()) {

            $xml = simplexml_load_string($farming_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item);

                    $farmingArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        if ($crypto_api_url_response->successful()) {

            $xml = simplexml_load_string($crypto_api_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {

                    $image = $channelImage; // default

                    // ✅ 1. enclosure image (MAIN FIX)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    elseif (isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. fallback: description image
                    elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $cryptoArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,

                        // ✅ FIXED THUMBNAIL
                        'thumbnail' => $image,
                        'image' => $image,
                        // ==================== AUTHOR NAME ADD KARO ====================
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        // Extra safe fallback
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',


                        // 🔥 audio safe
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($cryptoArticles) >= 10)
                        break;
                }
            }
        }
        if ($crypto_api_url_response_inoreader->successful()) {

            $xml = simplexml_load_string($crypto_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item);

                    $cryptoArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        if ($fashion_photography_api_url_response->successful()) {

            $xml = simplexml_load_string($fashion_photography_api_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {

                    $image = $channelImage; // default

                    // ✅ 1. enclosure image (MAIN FIX)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    elseif (isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. fallback: description image
                    elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $fashionPhotographyArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,

                        // ✅ FIXED THUMBNAIL
                        'thumbnail' => $image,
                        'image' => $image,
                        // ==================== AUTHOR NAME ADD KARO ====================
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        // Extra safe fallback
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',


                        // 🔥 audio safe
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($fashionPhotographyArticles) >= 10)
                        break;
                }
            }
        }
        if ($sport_api_url_response->successful()) {

            $xml = simplexml_load_string($sport_api_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {

                    $image = $channelImage; // default

                    // ✅ 1. enclosure image (MAIN FIX)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    elseif (isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. fallback: description image
                    elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $sportsArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,

                        // ✅ FIXED THUMBNAIL
                        'thumbnail' => $image,
                        'image' => $image,
                        // ==================== AUTHOR NAME ADD KARO ====================
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        // Extra safe fallback
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',


                        // 🔥 audio safe
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($sportsArticles) >= 10)
                        break;
                }
            }
        }
        if ($sport_api_url_response_inoreader->successful()) {

            $xml = simplexml_load_string($sport_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item);

                    $sportsArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        if ($business_api_url_response->successful()) {
    
                $xml = simplexml_load_string($business_api_url_response->getBody());
    
                if ($xml !== false) {
    
                    // Channel Image
                    $channelImage = '';
                    if (isset($xml->channel->image->url)) {
                        $channelImage = (string) $xml->channel->image->url;
                    } elseif (isset($xml->channel->children('itunes', true)->image)) {
                        $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                    }
    
                    foreach ($xml->channel->item as $item) {
    
                        // $image = $channelImage; // default
    
                        // ✅ 1. enclosure image (MAIN FIX)
                        if (isset($item->enclosure)) {
                            $type = (string) $item->enclosure->attributes()->type;
    
                            if (str_contains($type, 'image')) {
                                $image = (string) $item->enclosure->attributes()->url;
                            }
                        }
    
                        // ✅ 2. itunes image
                        elseif (isset($item->children('itunes', true)->image)) {
                            $image = (string) $item->children('itunes', true)->image->attributes()->href;
                        }
    
                        // ✅ 3. fallback: description image
                        elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                            $image = $matches[1];
                        }
    
                        $businessArticles[] = [
                            'title' => (string) $item->title,
                            'description' => strip_tags((string) $item->description),
                            'description_text' => strip_tags((string) $item->description),
                            'date_published' => (string) $item->pubDate,
                            'pubDate' => (string) $item->pubDate,
                            'link' => (string) $item->link,
    
                            // ✅ FIXED THUMBNAIL
                            'thumbnail' => $image,
                            'image' => $image,
                            // ==================== AUTHOR NAME ADD KARO ====================
                            'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),
    
                            // Extra safe fallback
                            'dc_creator' => isset($item->children('dc', true)->creator)
                                ? (string) $item->children('dc', true)->creator
                                : '',
    
    
                            // 🔥 audio safe
                            'audio' => isset($item->enclosure)
                                ? (string) $item->enclosure->attributes()->url
                                : '',
                        ];
    
                        if (count($businessArticles) >= 10)
                            break;
                    }
                }
            }    
        if ($business_api_url_response_inoreader->successful()) {
    
                $xml = simplexml_load_string($business_api_url_response_inoreader->getBody());
    
                if ($xml !== false) {
    
                    $count = 0;
    
                    foreach ($xml->channel->item as $item) {
    
                        if ($count >= 10)
                            break;
    
                        $image = '';
    
                        if (isset($item->enclosure)) {
                            $type = (string) $item->enclosure->attributes()->type;
                            if (str_contains($type, 'image')) {
                                $image = (string) $item->enclosure->attributes()->url;
                            }
                        } elseif (isset($item->children('itunes', true)->image)) {
                            $image = (string) $item->children('itunes', true)->image->attributes()->href;
                        } elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                            $image = $matches[1];
                        }
    
                        $businessArticles[] = [
                            'title' => (string) $item->title,
                            'description' => strip_tags((string) $item->description),
                            'description_text' => strip_tags((string) $item->description),
                            'date_published' => (string) $item->pubDate,
                            'pubDate' => (string) $item->pubDate,
                            'link' => (string) $item->link,
                            'thumbnail' => $image,
                            'image' => $image,
                            'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                            'dc_creator' => isset($item->children('dc', true)->creator)
                                ? (string) $item->children('dc', true)->creator
                                : '',
                        ];
    
                        $count++;
                    }
                }
            }
        // if ($business_api_url_response_inoreader->successful()) {

        //     $xml = simplexml_load_string($business_api_url_response_inoreader->getBody());

        //     if ($xml !== false) {

        //         $count = 0;

        //         foreach ($xml->channel->item as $item) {

        //             if ($count >= 10)
        //                 break;

        //             $image = '';

        //             if (isset($item->enclosure)) {
        //                 $type = (string) $item->enclosure->attributes()->type;
        //                 if (str_contains($type, 'image')) {
        //                     $image = (string) $item->enclosure->attributes()->url;
        //                 }
        //             } elseif (isset($item->children('itunes', true)->image)) {
        //                 $image = (string) $item->children('itunes', true)->image->attributes()->href;
        //             } elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
        //                 $image = $matches[1];
        //             }

        //             $businessArticles[] = [
        //                 'title' => (string) $item->title,
        //                 'description' => strip_tags((string) $item->description),
        //                 'description_text' => strip_tags((string) $item->description),
        //                 'date_published' => (string) $item->pubDate,
        //                 'pubDate' => (string) $item->pubDate,
        //                 'link' => (string) $item->link,
        //                 'thumbnail' => $image,
        //                 'image' => $image,
        //                 'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
        //                 'dc_creator' => isset($item->children('dc', true)->creator)
        //                     ? (string) $item->children('dc', true)->creator
        //                     : '',
        //             ];

        //             $count++;
        //         }
        //     }
        // }
        if ($worldpoverty_api_url_response->successful()) {

            $xml = simplexml_load_string($worldpoverty_api_url_response->getBody());

            if ($xml !== false) {

                // Channel Image
                $channelImage = '';
                if (isset($xml->channel->image->url)) {
                    $channelImage = (string) $xml->channel->image->url;
                } elseif (isset($xml->channel->children('itunes', true)->image)) {
                    $channelImage = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                }

                foreach ($xml->channel->item as $item) {

                    $image = $channelImage; // default

                    // ✅ 1. enclosure image (MAIN FIX)
                    if (isset($item->enclosure)) {
                        $type = (string) $item->enclosure->attributes()->type;

                        if (str_contains($type, 'image')) {
                            $image = (string) $item->enclosure->attributes()->url;
                        }
                    }

                    // ✅ 2. itunes image
                    elseif (isset($item->children('itunes', true)->image)) {
                        $image = (string) $item->children('itunes', true)->image->attributes()->href;
                    }

                    // ✅ 3. fallback: description image
                    elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $worldpovertyArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,

                        // FIXED THUMBNAIL
                        'thumbnail' => $image,
                        'image' => $image,
                        // ==================== AUTHOR NAME ADD KARO ====================
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        // Extra safe fallback
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',


                        // audio safe
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($worldpovertyArticles) >= 10)
                        break;
                }
            }
        }     
        if ($worldpoverty_api_url_response_inoreader->successful()) {

            $xml = simplexml_load_string($worldpoverty_api_url_response_inoreader->getBody());

            if ($xml !== false) {

                $count = 0;

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break;

                    $image = $extractImage($item);

                    $worldpovertyArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image,
                        'image' => $image,
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? 'Chicago Defender'),
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',
                    ];

                    $count++;
                }
            }
        }
        $joeRoganArticles = $joeRogan->successful() ? $joeRogan->json()['items'] ?? [] : [];
        $nativeLandPodArticles = $native_land_pod->successful() ? $native_land_pod->json()['items'] ?? [] : [];
        $repJeffriesArticles = $repjeffries->successful() ? $repjeffries->json()['items'] ?? [] : [];
        // foreach ($unfilteredFeeds as $feed) {
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
        //         'Accept' => 'application/json'
        //     ])->get($feed['feed_url']);

        //     if ($response->successful() && !empty($response->json()['items'][0])) {
        //         $item = $response->json()['items'][0];
        //         $url = $item['link'] ?? $item['url'] ?? '';

        //         // YouTube ID nikaalo (agar hai)
        //         $youtubeId = $this->extractYoutubeVideoId($url);

        //         // Instagram reel ID nikaalo (naya function banao)
        //         $instagramReelId = $this->extractInstagramReelId($url);

        //         $unfiltered[] = [
        //             'name' => $feed['name'],
        //             'role' => $feed['role'],
        //             'title' => $item['title'],
        //             'description' => strip_tags($item['description_text'] ?? $item['description'] ?? ''),
        //             'pubDate' => $item['date_published'] ?? $item['pubDate'],
        //             'link' => $url,
        //             'youtube_id' => $youtubeId,
        //             'instagram_id' => $instagramReelId,     // ← naya field
        //             'is_instagram' => !empty($instagramReelId),
        //         ];
        //     }
        // }
        
        // $unfilteredVideos = $spotify->getPlaylist($playlist_id);
        
        $unfilteredVideos = [];
        
        foreach ($followed_channels as $url) {
            try {
                $response = Http::timeout(6)->get($url);
                if ($response->ok()) {
                    $xml = simplexml_load_string($response->body());
        
                    if ($xml && isset($xml->channel->item[0])) {
                        $item = $xml->channel->item[0]; 

                        $channelImg = '';
                        if (isset($xml->channel->image->url)) {
                            $channelImg = (string) $xml->channel->image->url;
                        } elseif (isset($xml->channel->children('itunes', true)->image)) {
                            $channelImg = (string) $xml->channel->children('itunes', true)->image->attributes()->href;
                        }

                        $thumbnail = $extractImage($item, $channelImg);
                        if (empty($thumbnail)) {
                            $thumbnail = '/frontend/assets/images/default-video-thumb.jpg';
                        }
        
                        $unfilteredVideos[] = [
                            'type' => 'substack',
                            'title' => (string)$item->title,
                            'link' => (string)$item->link,
                            'thumbnail' => $thumbnail,
                            'pubDate' => (string)$item->pubDate,
                            'timestamp' => strtotime((string)$item->pubDate),
                        ];
                    }
                }
            } catch (\Exception $e) {
                continue;
            }
        }

    //     foreach ($followed_channels as $url) {
    //     try {
    //         $response = Http::timeout(5)->get($url);
    //         if ($response->ok()) {
    //             $xml = simplexml_load_string($response->body());
    //             if ($xml) {
    //                 foreach ($xml->channel->item as $item) {
    //                     $media = $item->children('http://search.yahoo.com/mrss/');
    //                     $thumbnail = '';

    //                     if (isset($media->content)) {
    //                         $thumbnail = (string)$media->content->attributes()->url;
    //                     } elseif (isset($item->enclosure)) {
    //                         $thumbnail = (string)$item->enclosure['url'];
    //                     } elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string)$item->description, $matches)) {
    //                         $thumbnail = $matches[1];
    //                     } else {
    //                         $thumbnail = '/frontend/assets/images/default-video-thumb.jpg';
    //                     }

    //                     $unfilteredVideos[] = [
    //                         'title'     => (string)$item->title,
    //                         'link'      => (string)$item->link,
    //                         'thumbnail' => $thumbnail,
    //                     ];
    //                 }
    //             }
    //         }
    //     } catch (\Exception $e) {
    //         continue;
    //     }
    // }

        usort($unfilteredVideos, function($a, $b) {
            return strtotime($b['pubDate'] ?? '') - strtotime($a['pubDate'] ?? '');
        });
        $unfilteredVideos = array_slice($unfilteredVideos, 0, 12);

        $shawnRyanShowVideo = $this->fetchLatestYoutubeShort('https://www.youtube.com/@ShawnRyanShow/shorts', 'Ee3B7XJt4Zs', 'Shawn Ryan Show');
        $donLemonShowVideo = $this->fetchLatestYoutubeShort('https://www.youtube.com/@TheDonLemonShow/shorts', 'KehBe4ihgNE', 'The Don Lemon Show');
        $pivotPodcastVideo = $this->fetchLatestYoutubeShort('https://www.youtube.com/@thepivotpodcast/shorts', 'KxuqqO1rJcE', 'The Pivot Podcast');
        $fallonTonightVideo = $this->fetchLatestYoutubeShort('https://www.youtube.com/@fallontonight/shorts', '-uyVEo2VVyU', 'Fallon Tonight');
        $flagrantAndFunnyVideo = $this->fetchLatestYoutubeShort('https://www.youtube.com/@FlagrantandFunny/shorts', 'Z4c2g6y0a28', 'Flagrant and Funny');
        $dlHughleyVideo = $this->fetchLatestYoutubeShort('https://www.youtube.com/@DLHughleyTV/shorts', 'CuaDaGBS9KI', 'The DL Hughley Show');
        $tuckerCarlsonVideo = $this->fetchLatestYoutubeShort('https://www.youtube.com/@TuckerCarlson/shorts', '109i90G_wWc', 'Tucker Carlson');
        
        return view('home', [
            'shawnRyanShowVideo' => $shawnRyanShowVideo,
            'donLemonShowVideo' => $donLemonShowVideo,
            'pivotPodcastVideo' => $pivotPodcastVideo,
            'fallonTonightVideo' => $fallonTonightVideo,
            'flagrantAndFunnyVideo' => $flagrantAndFunnyVideo,
            'dlHughleyVideo' => $dlHughleyVideo,
            'tuckerCarlsonVideo' => $tuckerCarlsonVideo,
            'politics' => $politicsArticles,
            'sports' => $sportsArticles,
            'business' => $businessArticles,
            'finance' => $financeArticles,
            'spirituality' => $spiritualityArticles,
            'blackfamily' => $blackfamilyArticles,
            'education' => $educationArticles,
            'entertainment' => $entertainmentArticles,
            'worldpoverty' => $worldpovertyArticles,
            'farming' => $farmingArticles,
            'crimereport' => $crimereportArticles,
            'crypto' => $cryptoArticles,
            'trending' => $trendingArticles,
            'culture' => $cultureArticles,
            'custom' => $customArticles,
            'addiction' => $addictionArticles,
            'people' => $peopleArticles,
            'fashion_photography' => $fashionPhotographyArticles,
            'sisters' => $sistersArticles,
            'atlanta' => $atlantaArticles,
            'georgia' => $georgiaArticles,
            'woman' => $womanArticles,
            'travel' => $travelArticles,
            'spotify_section' => $spotify_section_api,
            'joerogan_spotify_playlist' => $joerogan_spotify_section_api,
            'sudanNews' => $SudanNewsArticles,
            'joeRogan' => $joeRoganArticles,
            'NativeLandPod' => $nativeLandPodArticles,
            'repjeffries' => $repJeffriesArticles,
            'unfiltered' => $unfiltered,
            'top_stories' => $top_stories,
            'for_you' => $forYouArticles,
            'news' => $newsArticles,
            'World_news' => $worldNewsArticles, 
            'topStoriesId' => $topStoriesEpisodes, 
            // 'unfilteredId' => $unfilteredId, 
            // 'unfilteredVideos' => $unfilteredVideos, 
            'topStoriesEpisodes' => $topStoriesEpisodes,
            'topStoriesItems' => $topStoriesItems,    
            'unfilteredVideos' => $unfilteredVideos,
            'latestInstagramPost' => $latestInstagramPost,

        ]);
    }


    private function extractInstagramReelId($url)
    {
        if (empty($url))
            return '';

        // reel/ ya p/ dono ko catch karega
        if (preg_match('/instagram\.com\/(?:reel|p)\/([A-Za-z0-9_-]+)/', $url, $matches)) {
            return $matches[1];
        }
        return '';
    }



    public function renderHeroSection(ThinkerSpotifyPlaylist $spotify)
    {
        $api_url = 'https://newsapi.org/v2/everything';
        // $api_playlist_url = 'https://api.spotify.com/v1/playlists/5LOf9RbuD75crqO2VULYpS';
        $playlist_id = '5LOf9RbuD75crqO2VULYpS';
        $joeroganplaylist_id = '4rOoJ6Egrf8K2IrywzwOMk';

        $sudanNews = Http::get($api_url, [
            'q' => 'Sudan News',
            'apiKey' => env('NEWS_API_KEY')
        ]);

        $Immigration_Deportations_Crisis = Http::get($api_url, [
            'q' => '$Immigration Deportations Crisis',
            'apiKey' => env('NEWS_API_KEY')
        ]);

        $War_in_Gaza = Http::get($api_url, [
            'q' => '$War in Gaza',
            'apiKey' => env('NEWS_API_KEY')
        ]);
        $United_Nations = Http::get($api_url, [
            'q' => '$United Nations',
            'apiKey' => env('NEWS_API_KEY')
        ]);


        $spotify_section_api = $spotify->getPlaylist($playlist_id);
        $joerogan_spotify_section_api = $spotify->getJoeRoganPlaylist($joeroganplaylist_id);


        $SudanNewsArticles = [];
        $Immigration_Deportations_CrisisArticles = [];
        $War_in_GazaArticles = [];
        $United_NationsArticles = [];


        if ($sudanNews->successful()) {
            $SudanNewsArticles = $sudanNews->json()['articles'];
        }

        if ($Immigration_Deportations_Crisis->successful()) {
            $Immigration_Deportations_CrisisArticles = $Immigration_Deportations_Crisis->json()['articles'];
        }

        if ($War_in_Gaza->successful()) {
            $War_in_GazaArticles = $War_in_Gaza->json()['articles'];
        }
        if ($United_Nations->successful()) {
            $United_NationsArticles = $United_Nations->json()['articles'];
        }


        return view('layouts.herosection', [
            'sudanNews' => $SudanNewsArticles,
            'Immigration_Deportations_Crisis' => $Immigration_Deportations_CrisisArticles,
            'War_in_Gaza' => $War_in_GazaArticles,
            'United_Nations' => $United_NationsArticles,


        ]);
    }



    public function sports()
    {
        $sports_api_url = 'https://api.rss.app/v1/feeds/tmEDyDk0uDdhGjEp';

        $response = Http::get($sports_api_url, [
            'q' => 'sports',
            'apiKey' => env('NEWS_API_KEY')
        ]);

        $rawArticles = $response->successful()
            ? ($response->json()['items'] ?? $response->json()['articles'] ?? [])
            : [];

        $sportsArticles = $this->normalizeArticles($rawArticles);

        return view('sports', [
            'sports' => $sportsArticles,
        ]);
    }

    public function politics()
    {
        $politics_api_url = 'http://rss.feedspot.com/folder/8008703/rss';
        $articles = [];
        $feedDescription = '';

        try {
            $cacheKey = 'feed_politics_page';
            $data = Cache::remember($cacheKey, 600, function () use ($politics_api_url) {
                $resp = Http::timeout(5)->withOptions(['connect_timeout' => 3])
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->get($politics_api_url);
                return $resp->successful() ? $resp->body() : '';
            });

            if (!empty($data)) {
                $xml = @simplexml_load_string($data);
                if ($xml) {
                    $feedDescription = (string)($xml->channel->description ?? '');
                    foreach ($xml->channel->item as $item) {
                        $link = (string)$item->link;
                        $img = $this->extractArticleImage($item, '', $link);
                        $articles[] = [
                            'title' => (string)$item->title,
                            'description_text' => strip_tags((string)$item->description),
                            'date_published' => (string)$item->pubDate,
                            'url' => $link,
                            'link' => $link,
                            'thumbnail' => $img,
                            'image' => $img,
                            'authors' => [['name' => (string)($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Author')]],
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error("politics method error: " . $e->getMessage());
        }

        return view('politics', [
            'politics' => $articles,
            'feedDescription' => $feedDescription,
        ]);
    }

    public function finance()
    {
        $finance_api_url = 'http://rss.feedspot.com/folder/7933984/rss';
        $articles = [];

        try {
            $data = Cache::remember('feed_finance_page', 600, function () use ($finance_api_url) {
                $resp = Http::timeout(5)->withOptions(['connect_timeout' => 3])
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->get($finance_api_url);
                return $resp->successful() ? $resp->body() : '';
            });

            if (!empty($data)) {
                $xml = @simplexml_load_string($data);
                if ($xml) {
                    foreach ($xml->channel->item as $item) {
                        $link = (string)$item->link;
                        $img = $this->extractArticleImage($item, '', $link);
                        $articles[] = [
                            'title' => (string)$item->title,
                            'description_text' => strip_tags((string)$item->description),
                            'date_published' => (string)$item->pubDate,
                            'url' => $link,
                            'link' => $link,
                            'thumbnail' => $img,
                            'image' => $img,
                            'author' => (string)($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Author'),
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error("finance method error: " . $e->getMessage());
        }

        return view('finance', [
            'finance' => $articles,
        ]);
    }

    public function spirituality()
    {
        $spirituality_api_url = 'http://rss.feedspot.com/folder/7960095/rss';
        $articles = [];

        try {
            $data = Cache::remember('feed_spirituality_page', 600, function () use ($spirituality_api_url) {
                $resp = Http::timeout(5)->withOptions(['connect_timeout' => 3])
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->get($spirituality_api_url);
                return $resp->successful() ? $resp->body() : '';
            });

            if (!empty($data)) {
                $xml = @simplexml_load_string($data);
                if ($xml) {
                    foreach ($xml->channel->item as $item) {
                        $link = (string)$item->link;
                        $img = $this->extractArticleImage($item, '', $link);
                        $articles[] = [
                            'title' => (string)$item->title,
                            'description_text' => strip_tags((string)$item->description),
                            'date_published' => (string)$item->pubDate,
                            'url' => $link,
                            'link' => $link,
                            'thumbnail' => $img,
                            'image' => $img,
                            'author' => (string)($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Author'),
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error("spirituality method error: " . $e->getMessage());
        }

        return view('spirituality', [
            'spirituality' => $articles,
        ]);
    }

    public function entertainment()
    {
        $entertainment_api_url = 'http://rss.feedspot.com/folder/7961576/rss';
        $articles = [];

        try {
            $data = Cache::remember('feed_entertainment_page', 600, function () use ($entertainment_api_url) {
                $resp = Http::timeout(5)->withOptions(['connect_timeout' => 3])
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->get($entertainment_api_url);
                return $resp->successful() ? $resp->body() : '';
            });

            if (!empty($data)) {
                $xml = @simplexml_load_string($data);
                if ($xml) {
                    foreach ($xml->channel->item as $item) {
                        $link = (string)$item->link;
                        $img = $this->extractArticleImage($item, '', $link);
                        $articles[] = [
                            'title' => (string)$item->title,
                            'description_text' => strip_tags((string)$item->description),
                            'date_published' => (string)$item->pubDate,
                            'url' => $link,
                            'link' => $link,
                            'thumbnail' => $img,
                            'image' => $img,
                            'author' => (string)($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Author'),
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error("entertainment method error: " . $e->getMessage());
        }

        return view('entertainment', [
            'entertainment' => $articles,
        ]);
    }

    public function business()
    {
        $business_api_url = 'http://rss.feedspot.com/folder/8008719/rss';
        $articles = [];
        $feedDescription = '';

        try {
            $data = Cache::remember('feed_business_page', 600, function () use ($business_api_url) {
                $resp = Http::timeout(5)->withOptions(['connect_timeout' => 3])
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->get($business_api_url);
                return $resp->successful() ? $resp->body() : '';
            });

            if (!empty($data)) {
                $xml = @simplexml_load_string($data);
                if ($xml) {
                    $feedDescription = (string)($xml->channel->description ?? '');
                    foreach ($xml->channel->item as $item) {
                        $link = (string)$item->link;
                        $img = $this->extractArticleImage($item, '', $link);
                        $articles[] = [
                            'title' => (string)$item->title,
                            'description_text' => strip_tags((string)$item->description),
                            'date_published' => (string)$item->pubDate,
                            'url' => $link,
                            'link' => $link,
                            'thumbnail' => $img,
                            'image' => $img,
                            'author' => (string)($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Author'),
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error("business method error: " . $e->getMessage());
        }

        return view('business', [
            'business' => $articles,
            'feedDescription' => $feedDescription,
        ]);
    }

    public function blackfamily()
    {
        $blackfamily_api_url = 'http://rss.feedspot.com/folder/7933966/rss';
        $articles = [];

        try {
            $data = Cache::remember('feed_blackfamily_page', 600, function () use ($blackfamily_api_url) {
                $resp = Http::timeout(5)->withOptions(['connect_timeout' => 3])
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->get($blackfamily_api_url);
                return $resp->successful() ? $resp->body() : '';
            });

            if (!empty($data)) {
                $xml = @simplexml_load_string($data);
                if ($xml) {
                    foreach ($xml->channel->item as $item) {
                        $link = (string)$item->link;
                        $img = $this->extractArticleImage($item, '', $link);
                        $articles[] = [
                            'title' => (string)$item->title,
                            'description_text' => strip_tags((string)$item->description),
                            'date_published' => (string)$item->pubDate,
                            'url' => $link,
                            'link' => $link,
                            'thumbnail' => $img,
                            'image' => $img,
                            'author' => (string)($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Author'),
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error("blackfamily method error: " . $e->getMessage());
        }

        return view('blackfamily', [
            'blackfamily' => $articles,
        ]);
    }

    public function education()
    {
        $education_api_url = 'http://rss.feedspot.com/folder/8006737/rss';
        $articles = [];

        try {
            $data = Cache::remember('feed_education_page', 600, function () use ($education_api_url) {
                $resp = Http::timeout(5)->withOptions(['connect_timeout' => 3])
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->get($education_api_url);
                return $resp->successful() ? $resp->body() : '';
            });

            if (!empty($data)) {
                $xml = @simplexml_load_string($data);
                if ($xml) {
                    foreach ($xml->channel->item as $item) {
                        $link = (string)$item->link;
                        $img = $this->extractArticleImage($item, '', $link);
                        $articles[] = [
                            'title' => (string)$item->title,
                            'description_text' => strip_tags((string)$item->description),
                            'date_published' => (string)$item->pubDate,
                            'url' => $link,
                            'link' => $link,
                            'thumbnail' => $img,
                            'image' => $img,
                            'author' => (string)($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Author'),
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error("education method error: " . $e->getMessage());
        }

        return view('education', [
            'education' => $articles,
        ]);
    }

    public function worldpoverty()
    {
        $worldpoverty_api_url = 'http://rss.feedspot.com/folder/8005372/rss';
        $articles = [];

        try {
            $data = Cache::remember('feed_worldpoverty_page', 600, function () use ($worldpoverty_api_url) {
                $resp = Http::timeout(5)->withOptions(['connect_timeout' => 3])
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->get($worldpoverty_api_url);
                return $resp->successful() ? $resp->body() : '';
            });

            if (!empty($data)) {
                $xml = @simplexml_load_string($data);
                if ($xml) {
                    foreach ($xml->channel->item as $item) {
                        $link = (string)$item->link;
                        $img = $this->extractArticleImage($item, '', $link);
                        $articles[] = [
                            'title' => (string)$item->title,
                            'description_text' => strip_tags((string)$item->description),
                            'date_published' => (string)$item->pubDate,
                            'url' => $link,
                            'link' => $link,
                            'thumbnail' => $img,
                            'image' => $img,
                            'author' => (string)($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Author'),
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error("worldpoverty method error: " . $e->getMessage());
        }

        return view('worldpoverty', [
            'worldpoverty' => $articles,
        ]);
    }

    public function farming()
    {
        $farming_api_url = 'http://rss.feedspot.com/folder/8011085/rss';
        $articles = [];

        try {
            $data = Cache::remember('feed_farming_page', 600, function () use ($farming_api_url) {
                $resp = Http::timeout(5)->withOptions(['connect_timeout' => 3])
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->get($farming_api_url);
                return $resp->successful() ? $resp->body() : '';
            });

            if (!empty($data)) {
                $xml = @simplexml_load_string($data);
                if ($xml) {
                    foreach ($xml->channel->item as $item) {
                        $link = (string)$item->link;
                        $img = $this->extractArticleImage($item, '', $link);
                        $articles[] = [
                            'title' => (string)$item->title,
                            'description_text' => strip_tags((string)$item->description),
                            'date_published' => (string)$item->pubDate,
                            'url' => $link,
                            'link' => $link,
                            'thumbnail' => $img,
                            'image' => $img,
                            'author' => (string)($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Author'),
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error("farming method error: " . $e->getMessage());
        }

        return view('farming', [
            'farming' => $articles,
        ]);
    }

    public function crimereport()
    {
        $crimereport_api_url = 'http://rss.feedspot.com/folder/7960547/rss';
        $articles = [];

        try {
            $data = Cache::remember('feed_crimereport_page', 600, function () use ($crimereport_api_url) {
                $resp = Http::timeout(5)->withOptions(['connect_timeout' => 3])
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->get($crimereport_api_url);
                return $resp->successful() ? $resp->body() : '';
            });

            if (!empty($data)) {
                $xml = @simplexml_load_string($data);
                if ($xml) {
                    foreach ($xml->channel->item as $item) {
                        $link = (string)$item->link;
                        $img = $this->extractArticleImage($item, '', $link);
                        $articles[] = [
                            'title' => (string)$item->title,
                            'description_text' => strip_tags((string)$item->description),
                            'date_published' => (string)$item->pubDate,
                            'url' => $link,
                            'link' => $link,
                            'thumbnail' => $img,
                            'image' => $img,
                            'author' => (string)($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Author'),
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error("crimereport method error: " . $e->getMessage());
        }

        return view('crimereport', [
            'crimereport' => $articles,
        ]);
    }

    public function crypto()
    {
        $crypto_api_url = 'http://rss.feedspot.com/folder/8008704/rss';
        $articles = [];

        try {
            $data = Cache::remember('feed_crypto_page', 600, function () use ($crypto_api_url) {
                $resp = Http::timeout(5)->withOptions(['connect_timeout' => 3])
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->get($crypto_api_url);
                return $resp->successful() ? $resp->body() : '';
            });

            if (!empty($data)) {
                $xml = @simplexml_load_string($data);
                if ($xml) {
                    foreach ($xml->channel->item as $item) {
                        $link = (string)$item->link;
                        $img = $this->extractArticleImage($item, '', $link);
                        $articles[] = [
                            'title' => (string)$item->title,
                            'description_text' => strip_tags((string)$item->description),
                            'date_published' => (string)$item->pubDate,
                            'url' => $link,
                            'link' => $link,
                            'thumbnail' => $img,
                            'image' => $img,
                            'author' => (string)($item->children('dc', true)->creator ?? $item->author ?? 'Unknown Author'),
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error("crypto method error: " . $e->getMessage());
        }

        return view('crypto', [
            'crypto' => $articles,
        ]);
    }

    public function extractArticleImage($item, string $channelImage = '', string $articleUrl = ''): string
    {
        $contentEncoded = '';
        if (isset($item->children('http://purl.org/rss/1.0/modules/content/')->encoded)) {
            $contentEncoded = (string) $item->children('http://purl.org/rss/1.0/modules/content/')->encoded;
        } elseif (isset($item->children('content', true)->encoded)) {
            $contentEncoded = (string) $item->children('content', true)->encoded;
        }

        $candidates = [
            (string) ($item->link ?? ''),
            (string) ($item->guid ?? ''),
            (string) ($item->description ?? ''),
            $contentEncoded,
        ];

        foreach ($candidates as $str) {
            if (!empty($str) && preg_match('#(?:youtube\.com/(?:watch\?v=|shorts/|embed/|v/)|youtu\.be/)([a-zA-Z0-9_-]{11})#i', $str, $ytMatch)) {
                return "https://img.youtube.com/vi/{$ytMatch[1]}/hqdefault.jpg";
            }
        }

        $media = $item->children('http://search.yahoo.com/mrss/');
        if (isset($media->group)) {
            $groupMedia = $media->group->children('http://search.yahoo.com/mrss/');
            if (isset($groupMedia->thumbnail)) {
                $url = (string) $groupMedia->thumbnail->attributes()->url;
                if ($url && !str_contains($url, 'feedspot.co') && !str_contains($url, 'feedspot.com')) return $url;
            }
        }

        if (isset($media->thumbnail)) {
            $url = (string) $media->thumbnail->attributes()->url;
            if ($url && !str_contains($url, 'feedspot.co') && !str_contains($url, 'feedspot.com')) return $url;
        }

        if (isset($media->content)) {
            $attrs = $media->content->attributes();
            $type = strtolower((string) ($attrs->type ?? ''));
            $medium = strtolower((string) ($attrs->medium ?? ''));
            $url = (string) ($attrs->url ?? '');

            $isImage = str_contains($type, 'image') || $medium === 'image' || preg_match('/\.(jpg|jpeg|png|webp|avif|gif)(\?.*)?$/i', $url);
            $isVideoOrAudio = str_contains($type, 'video') || str_contains($type, 'audio') || $medium === 'video' || $medium === 'audio' || preg_match('/\.(mp4|mp3|m4a|webm|ogg|wav)(\?.*)?$/i', $url);

            if ($isImage && !$isVideoOrAudio && $url && !str_contains($url, 'feedspot.co') && !str_contains($url, 'feedspot.com')) {
                return $url;
            }
        }

        if (isset($item->enclosure)) {
            $attrs = $item->enclosure->attributes();
            $type = strtolower((string) ($attrs->type ?? ''));
            $url = (string) ($attrs->url ?? $item->enclosure['url'] ?? '');

            $isImage = str_contains($type, 'image') || preg_match('/\.(jpg|jpeg|png|webp|avif|gif)(\?.*)?$/i', $url);
            $isVideoOrAudio = str_contains($type, 'video') || str_contains($type, 'audio') || preg_match('/\.(mp4|mp3|m4a|webm|ogg|wav)(\?.*)?$/i', $url);

            if ($isImage && !$isVideoOrAudio && $url && !str_contains($url, 'feedspot.co') && !str_contains($url, 'feedspot.com')) {
                return $url;
            }
        }

        if (isset($item->children('itunes', true)->image)) {
            $url = (string) $item->children('itunes', true)->image->attributes()->href;
            if ($url && !str_contains($url, 'feedspot.co') && !str_contains($url, 'feedspot.com')) return $url;
        }
        if (isset($item->children('http://www.itunes.com/dtds/podcast-1.0.dtd')->image)) {
            $url = (string) $item->children('http://www.itunes.com/dtds/podcast-1.0.dtd')->image->attributes()->href;
            if ($url && !str_contains($url, 'feedspot.co') && !str_contains($url, 'feedspot.com')) return $url;
        }

        if (!empty($contentEncoded)) {
            if (preg_match('/<img[^>]+(?:src|data-src)=["\']([^"\']+)["\']/i', $contentEncoded, $m)) {
                if (!empty($m[1]) && !preg_match('/\.(mp4|mp3|m4a|webm|ogg|wav)(\?.*)?$/i', $m[1]) && !str_contains($m[1], 'feedspot.co') && !str_contains($m[1], 'feedspot.com') && !str_contains($m[1], 's.w.org') && !str_contains($m[1], 'emoji') && !str_contains($m[1], '.svg')) {
                    return $m[1];
                }
            }
            if (preg_match('/<video[^>]+poster=["\']([^"\']+)["\']/i', $contentEncoded, $m)) {
                if (!empty($m[1]) && !str_contains($m[1], 'feedspot.co') && !str_contains($m[1], 'feedspot.com')) return $m[1];
            }
        }

        $desc = (string) $item->description;
        if (!empty($desc)) {
            if (preg_match('/<img[^>]+(?:src|data-src)=["\']([^"\']+)["\']/i', $desc, $m)) {
                if (!empty($m[1]) && !preg_match('/\.(mp4|mp3|m4a|webm|ogg|wav)(\?.*)?$/i', $m[1]) && !str_contains($m[1], 'feedspot.co') && !str_contains($m[1], 'feedspot.com') && !str_contains($m[1], 's.w.org') && !str_contains($m[1], 'emoji') && !str_contains($m[1], '.svg')) {
                    return $m[1];
                }
            }
            if (preg_match('/<video[^>]+poster=["\']([^"\']+)["\']/i', $desc, $m)) {
                if (!empty($m[1]) && !str_contains($m[1], 'feedspot.co') && !str_contains($m[1], 'feedspot.com')) return $m[1];
            }
        }

        $link = (string)($articleUrl ?: ($item->link ?? ''));
        $isAudioLink = preg_match('/\.(mp3|wav|m4a|ogg)(\?.*)?$/i', $link) || str_contains($link, 'megaphone.fm') || str_contains($link, 'podtrac.com') || str_contains($link, 'libsyn.com');

        if (!empty($link) && filter_var($link, FILTER_VALIDATE_URL) && !$isAudioLink) {
            $scrapedImage = Cache::remember('article_hero_img_' . md5($link), 86400, function () use ($link) {
                try {
                    $ch = curl_init();
                    curl_setopt_array($ch, [
                        CURLOPT_URL => $link,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_TIMEOUT => 4,
                        CURLOPT_CONNECTTIMEOUT => 2,
                        CURLOPT_ENCODING => '',
                        CURLOPT_HTTPHEADER => [
                            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                        ],
                    ]);
                    $html = curl_exec($ch);
                    curl_close($ch);

                    if (!empty($html)) {
                        $found = null;
                        if (preg_match('/<meta[^>]+property=["\']og:image["\'][^>]+content=["\']([^"\']+)["\']/i', $html, $m)) {
                            $found = html_entity_decode($m[1]);
                        } elseif (preg_match('/<meta[^>]+content=["\']([^"\']+)["\'][^>]+property=["\']og:image["\']/i', $html, $m)) {
                            $found = html_entity_decode($m[1]);
                        } elseif (preg_match('/<meta[^>]+name=["\']twitter:image["\'][^>]+content=["\']([^"\']+)["\']/i', $html, $m)) {
                            $found = html_entity_decode($m[1]);
                        }

                        if (!$found && preg_match('/<img[^>]+(?:src|data-src)=["\']([^"\']+)["\'][^>]+class=["\'][^"\']*(?:wp-post-image|wp-block-post-featured-image|featured-image|entry-thumb|attachment-post-thumbnail)[^"\']*["\']/i', $html, $m)) {
                            $found = html_entity_decode($m[1]);
                        }
                        if (!$found && preg_match('/<img[^>]+class=["\'][^"\']*(?:wp-post-image|wp-block-post-featured-image|featured-image|entry-thumb|attachment-post-thumbnail)[^"\']*["\'][^>]+(?:src|data-src)=["\']([^"\']+)["\']/i', $html, $m)) {
                            $found = html_entity_decode($m[1]);
                        }
                        if (!$found && preg_match('/<(?:div|figure)[^>]*class=["\'][^"\']*wp-block-post-featured-image[^"\']*["\'][^>]*>[\s\S]*?<img[^>]+(?:src|data-src)=["\']([^"\']+)["\']/i', $html, $m)) {
                            $found = html_entity_decode($m[1]);
                        }

                        if ($found && (str_contains($found, 'feedspot') || str_contains($found, 's.w.org') || str_contains($found, 'emoji') || str_contains($found, '.svg'))) {
                            $found = null;
                        }

                        return $found;
                    }
                } catch (\Throwable $e) {}
                return null;
            });

            if ($scrapedImage) {
                return $scrapedImage;
            }
        }

        $sourceText = (string) ($item->source ?? $item->author ?? $item->children('dc', true)->creator ?? $item->title ?? '');
        if (!empty($sourceText)) {
            if (stripos($sourceText, 'Inside Politics') !== false || stripos($sourceText, 'CNN Inside') !== false) {
                return 'https://images.megaphone.fm/uI1H-7R2GfVqH1Mv6W4WJ0p11Xz.jpg';
            }
            if (stripos($sourceText, 'Democracy Now') !== false) {
                return 'https://www.democracynow.org/images/story/25/83425/w320/seg-RSS.jpg';
            }
            if (stripos($sourceText, 'Erin Burnett') !== false || stripos($sourceText, 'OutFront') !== false) {
                return 'https://cdn.cnn.com/cnnnext/dam/assets/outfront-logo.jpg';
            }
            if (stripos($sourceText, 'Majority Report') !== false || stripos($sourceText, 'majorityfm') !== false) {
                return 'https://majorityfm.com/wp-content/uploads/2021/04/majority-report-artwork.jpg';
            }
            if (stripos($sourceText, 'NPR') !== false) {
                return 'https://media.npr.org/images/podcasts/primary/npr_news_now.png';
            }
        }

        if (!empty($channelImage) && !str_contains($channelImage, 'feedspot.co') && !str_contains($channelImage, 'feedspot.com') && !str_contains($channelImage, 'amazonaws.com/feedspot/')) {
            return $channelImage;
        }

        return '/frontend/assets/images/no-image-found.png';
    }

    private function normalizeArticles(array $items): array
    {
        $normalized = [];
        foreach ($items as $item) {
            $thumb = $item['thumbnail'] ?? $item['image'] ?? $item['urlToImage'] ?? '';
            
            // Check for YouTube video ID in url / link
            $url = $item['url'] ?? $item['link'] ?? '';
            if (empty($thumb) && !empty($url)) {
                if (preg_match('#(?:youtube\.com/(?:watch\?v=|shorts/|embed/|v/)|youtu\.be/)([a-zA-Z0-9_-]{11})#i', $url, $ytMatch)) {
                    $thumb = "https://img.youtube.com/vi/{$ytMatch[1]}/hqdefault.jpg";
                }
            }

            // Check for <img> in description or content
            if (empty($thumb)) {
                $desc = $item['description'] ?? $item['content'] ?? '';
                if (preg_match('/<img[^>]+(?:src|data-src)=["\']([^"\']+)["\']/i', $desc, $m)) {
                    if (!preg_match('/\.(mp4|mp3|m4a|webm|ogg|wav)(\?.*)?$/i', $m[1]) && !str_contains($m[1], 'feedspot.co') && !str_contains($m[1], 'feedspot.com')) {
                        $thumb = $m[1];
                    }
                }
            }

            // OpenGraph fallback if URL exists
            if (empty($thumb) && !empty($url) && filter_var($url, FILTER_VALIDATE_URL)) {
                $ogImage = Cache::remember('og_img_' . md5($url), 86400, function () use ($url) {
                    try {
                        $html = Http::timeout(3)->withOptions(['connect_timeout' => 2])
                            ->withHeaders([
                                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'
                            ])->get($url)->body();
                        if ($html) {
                            if (preg_match('/<meta[^>]+property=["\']og:image["\'][^>]+content=["\']([^"\']+)["\']/i', $html, $m)) {
                                return html_entity_decode($m[1]);
                            }
                            if (preg_match('/<meta[^>]+content=["\']([^"\']+)["\'][^>]+property=["\']og:image["\']/i', $html, $m)) {
                                return html_entity_decode($m[1]);
                            }
                            if (preg_match('/<meta[^>]+name=["\']twitter:image["\'][^>]+content=["\']([^"\']+)["\']/i', $html, $m)) {
                                return html_entity_decode($m[1]);
                            }
                        }
                    } catch (\Exception $e) {}
                    return null;
                });
                if ($ogImage && !str_contains($ogImage, 'feedspot.co') && !str_contains($ogImage, 'feedspot.com')) {
                    $thumb = $ogImage;
                }
            }

            if (empty($thumb) || str_contains($thumb, 'feedspot.co') || str_contains($thumb, 'feedspot.com')) {
                $thumb = '/frontend/assets/images/no-image-found.png';
            }

            $item['thumbnail'] = $thumb;
            $item['image'] = $thumb;
            $item['urlToImage'] = $thumb;
            $normalized[] = $item;
        }
        return $normalized;
    }
    public function getBusinessNews()
    {
        $api_url = 'https://newsapi.org/v2/top-headlines';

        $response = Http::get($api_url, [
            'country' => 'us',
            'category' => 'business',
            'apiKey' => env('NEWS_API_KEY')
        ]);

        if ($response->successful()) {
            $articles = $response->json()['articles'];
            // return view('home', compact('articles'));
            return response()->json(['articles' => $articles]);
        } else {
            return response()->json(['error' => 'Failed to fetch news']);
        }
    }

    /**
     * Get Latest Joe Rogan Video from Inoreader (Safe & Silent)
     */
    // private function getLatestJoeRoganVideo()
    // {
    //     $inoreader_rss_url = 'https://api.rss.app/v1/feeds/c9MYa4CFUhyFypIY';

    //     try {
    //         $response = Http::timeout(8)           // 8 seconds timeout
    //                         ->connectTimeout(5)
    //                         ->get($inoreader_rss_url);

    //         if (!$response->successful() || $response->body() === '') {
    //             return [];
    //         }

    //         $xml = simplexml_load_string($response->body());

    //         if (!$xml || !isset($xml->channel->item[0])) {
    //             return [];
    //         }

    //         $item = $xml->channel->item[0];

    //         $videoUrl = (string) $item->link;
    //         $videoId  = $this->extractYoutubeVideoId($videoUrl);

    //         if (empty($videoId)) {
    //             return [];
    //         }

    //         return [
    //             'title'       => (string) $item->title,
    //             'link'        => $videoUrl,
    //             'description' => strip_tags((string) $item->description),
    //             'pubDate'     => (string) $item->pubDate,
    //             'video_id'    => $videoId,
    //             'thumbnail'   => "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg",
    //             'embed_url'   => "https://www.youtube.com/embed/{$videoId}",
    //         ];

    //     } catch (\Exception $e) {
    //         // \Log::warning('Joe Rogan RSS failed: ' . $e->getMessage());
    //         return [];
    //     }
    // }

    /**
     * Get Weather Data from weather.gov (NWS) with caching and rate limit defense.
     */
    public function getWeather(Request $request)
    {
        $lat = $request->input('lat');
        $lon = $request->input('lon');
        $locationName = $request->input('name');

        if (is_null($lat) || is_null($lon)) {
            $ip = $request->ip();
            // Fallback to California IP if testing locally on loopback
            if ($ip === '127.0.0.1' || $ip === '::1' || empty($ip)) {
                $ip = '76.220.16.0'; // A California IP
            }

            try {
                $geoResponse = Http::timeout(3)->get("http://ip-api.com/json/{$ip}");
                if ($geoResponse->successful()) {
                    $geoData = $geoResponse->json();
                    if (isset($geoData['status']) && $geoData['status'] === 'success') {
                        $lat = $geoData['lat'] ?? null;
                        $lon = $geoData['lon'] ?? null;
                        $city = $geoData['city'] ?? '';
                        $region = $geoData['region'] ?? '';
                        if ($city && $region) {
                            $locationName = "{$city}, {$region}";
                        } elseif ($city) {
                            $locationName = $city;
                        }
                    }
                }
            } catch (\Exception $e) {
                // Ignore exception and use fallback coordinates
            }

            // Default fallback if IP geolocation failed or returned empty
            if (is_null($lat) || is_null($lon)) {
                $lat = 33.7490;
                $lon = -84.3880;
                $locationName = 'Atlanta, GA';
            }
        }

        // Round coordinates to 4 decimal places as per NWS guidelines
        $lat = round(floatval($lat), 4);
        $lon = round(floatval($lon), 4);

        $cacheKeyPoints = "weather_points_{$lat}_{$lon}";
        
        // Step 1: Resolve lat/lon to NWS forecast URL
        $forecastUrl = \Illuminate\Support\Facades\Cache::remember($cacheKeyPoints, 86400 * 30, function () use ($lat, $lon) {
            try {
                $response = Http::withHeaders([
                    'User-Agent' => 'ThinkersNewsApp/1.0 (contact@thinkersnews.com)'
                ])->timeout(5)->get("https://api.weather.gov/points/{$lat},{$lon}");

                if ($response->successful()) {
                    return $response->json()['properties']['forecast'] ?? null;
                }
            } catch (\Exception $e) {
                // Return null if fails
            }
            return null;
        });

        if (!$forecastUrl) {
            // Fallback gridpoint forecast URL for Atlanta if resolution failed
            if (abs($lat - 33.7490) < 0.1 && abs($lon - -84.3880) < 0.1) {
                $forecastUrl = 'https://api.weather.gov/gridpoints/FFC/52,88/forecast';
            } else {
                return response()->json(['error' => 'Unable to resolve coordinates to NWS points'], 500);
            }
        }

        $cacheKeyForecast = "weather_forecast_" . md5($forecastUrl);

        // Step 2: Fetch the forecast data (cached for 30 minutes)
        $forecastPeriods = \Illuminate\Support\Facades\Cache::remember($cacheKeyForecast, 1800, function () use ($forecastUrl) {
            try {
                $response = Http::withHeaders([
                    'User-Agent' => 'ThinkersNewsApp/1.0 (contact@thinkersnews.com)'
                ])->timeout(5)->get($forecastUrl);

                if ($response->successful()) {
                    return $response->json()['properties']['periods'] ?? null;
                }
            } catch (\Exception $e) {
                // Return null if fails
            }
            return null;
        });

        if (!$forecastPeriods) {
            return response()->json(['error' => 'Unable to fetch weather forecast from NWS'], 500);
        }

        return response()->json([
            'success' => true,
            'coordinates' => ['lat' => $lat, 'lon' => $lon],
            'periods' => $forecastPeriods,
            'locationName' => $locationName ?? 'Local Weather'
        ]);
    }

    /**
     * Extract YouTube Video ID
     */
    private function extractYoutubeVideoId($url)
    {
        if (empty($url))
            return '';

        $pattern = '/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([^&\n?#]+)/';
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }

        return '';
    }

    /**
     * Fetch real video title via YouTube oEmbed API
     */
    private function getYoutubeVideoTitle($videoId, $default = '')
    {
        if (empty($videoId)) return $default;
        try {
            $response = Http::timeout(3)->get("https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v={$videoId}&format=json");
            if ($response->successful()) {
                $data = $response->json();
                if (!empty($data['title'])) {
                    return $data['title'];
                }
            }
        } catch (\Exception $e) {}
        return $default;
    }

    /**
     * Fetch latest YouTube Short for a channel
     */
    private function fetchLatestYoutubeShort($shortsChannelUrl, $fallbackId, $fallbackTitle)
    {
        $videoData = [
            'title' => $fallbackTitle,
            'video_id' => $fallbackId,
            'thumbnail' => "https://img.youtube.com/vi/{$fallbackId}/hqdefault.jpg",
            'link' => "https://www.youtube.com/shorts/{$fallbackId}",
            'published' => date('Y-m-d'),
        ];

        try {
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'Accept-Language' => 'en-US,en;q=0.9'
            ])->timeout(5)->get($shortsChannelUrl);

            if ($response->successful()) {
                $html = $response->body();
                if (preg_match_all('#/shorts/([a-zA-Z0-9_-]{11})#', $html, $matches) && !empty($matches[1])) {
                    $ids = array_values(array_unique($matches[1]));
                    $latestId = $ids[0];
                    $title = $this->getYoutubeVideoTitle($latestId, $fallbackTitle);

                    $videoData = [
                        'title' => $title,
                        'video_id' => $latestId,
                        'thumbnail' => "https://img.youtube.com/vi/{$latestId}/hqdefault.jpg",
                        'link' => "https://www.youtube.com/shorts/{$latestId}",
                        'published' => date('Y-m-d'),
                    ];
                }
            }
        } catch (\Exception $e) {
            \Log::error("Failed to fetch Shorts from {$shortsChannelUrl}: " . $e->getMessage());
        }

        return $videoData;
    }
}
