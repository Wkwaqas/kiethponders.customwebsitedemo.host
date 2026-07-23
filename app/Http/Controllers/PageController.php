<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\ThinkerSpotifyPlaylist;
use App\Services\InstagramService;
use Feeds;

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
        if (app()->environment('local')) {
            return null;
        }

        $clientId = env('SPOTIFY_CLIENT_ID');
        $clientSecret = env('SPOTIFY_CLIENT_SECRET');
        $refreshToken = env('SPOTIFY_API_REFRESH_TOKEN');
    
        try {
            $tokenResponse = Http::timeout(1)->withOptions(['connect_timeout' => 1])->asForm()->withHeaders([
                'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret),
            ])->post('https://accounts.spotify.com/api/token', [
                'grant_type' => 'refresh_token',
                'refresh_token' => $refreshToken,
            ]);
        
            if ($tokenResponse->failed()) {
                return null;
            }
        
            $accessToken = $tokenResponse->json()['access_token'];
        
            $response = Http::timeout(1)->withOptions(['connect_timeout' => 1])->withToken($accessToken)
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
    }

    public function index(ThinkerSpotifyPlaylist $spotify)
    {
        // $topStoriesId = $this->getSpotifyLatestEpisode('3i5n7CpeJrkZn6xYG5A7bM');
        // $unfilteredId = $this->getSpotifyLatestEpisode('4rOoJ6Egrf8K2IrywzwOMk');
        
            @set_time_limit(180);
            libxml_use_internal_errors(true);

            $emptyFeedResponse = new \Illuminate\Http\Client\Response(new \GuzzleHttp\Psr7\Response(599, [], ''));

            $http = static function () use ($emptyFeedResponse) {
                $client = Http::timeout(1)->withOptions(['connect_timeout' => 1]);
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
                        try {
                            return $this->client->get($url, $query);
                        } catch (\Exception $e) {
                            \Log::error("SafeHttpWrapper error fetching $url: " . $e->getMessage());
                            return $this->emptyResponse;
                        }
                    }
                    public function post($url, $data = []) {
                        try {
                            return $this->client->post($url, $data);
                        } catch (\Exception $e) {
                            \Log::error("SafeHttpWrapper error posting $url: " . $e->getMessage());
                            return $this->emptyResponse;
                        }
                    }
                };
            };

        /**
         * Robust RSS image extractor.
         * Priority: media:thumbnail → media:content → image enclosure → iTunes image → <img> in description → channel image
         */
        $extractImage = function ($item, string $channelImage = '') : string {
            // 1. media:thumbnail (most reliable – Yahoo MRss)
            $media = $item->children('http://search.yahoo.com/mrss/');
            if (isset($media->thumbnail)) {
                $url = (string) $media->thumbnail->attributes()->url;
                if ($url) return $url;
            }

            // 2. media:content with image mime type
            if (isset($media->content)) {
                $attrs = $media->content->attributes();
                $type  = (string) ($attrs->type ?? '');
                if (str_contains($type, 'image') || str_starts_with($type, 'image/') || empty($type)) {
                    $url = (string) $attrs->url;
                    if ($url) return $url;
                }
            }

            // 3. enclosure – only when type indicates an image; fall through otherwise
            if (isset($item->enclosure)) {
                $type = (string) $item->enclosure->attributes()->type;
                if (str_contains($type, 'image')) {
                    $url = (string) $item->enclosure->attributes()->url;
                    if ($url) return $url;
                }
            }

            // 4. iTunes image
            if (isset($item->children('itunes', true)->image)) {
                $url = (string) $item->children('itunes', true)->image->attributes()->href;
                if ($url) return $url;
            }

            // 5. first <img> inside description HTML
            if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/', (string) $item->description, $m)) {
                return $m[1];
            }

            // 6. channel-level image fallback
            return $channelImage;
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
            ['name' => 'Jake Tapper',             'show_id' => '3eHWHZwp53CUnetsUB33bp'],
            ['name' => 'Jenn Psaki',             'show_id' => '2vxQdj1VlEWBRQdjwtZsED'],
            ['name' => 'Abbey Phillip',             'show_id' => '6uEjIt1cwRf3CBqTLiQ6QT'],
            ['name' => 'Roland Martin',             'show_id' => '1FYRGfci9MOehrH8rSKIcM'],
            ['name' => 'April Ryan',             'show_id' => '6shAGwCHP9n1syujZm0M6p'],
            ['name' => 'Van Lathan',             'show_id' => '4hI3rQ4C0e15rP3YKLKPut'],
            ['name' => 'Chris Hayes',             'show_id' => '1slNhLdI9aLv1KtmOfxmXL'],
            ['name' => 'Cori Bush',             'show_id' => '22aWa4G5WbCE688jSujLY8'],
        ];

        $spotifyEpisodes = [];
        foreach ($podcastShows as $show) {
            $episode = $this->getLatestEpisode($show['show_id']);
            if ($episode) {
                $spotifyEpisodes[] = [
                    'type'         => 'spotify',
                    'show_name'    => $show['name'],
                    'episode_name' => $episode['name'],
                    'episode_id'   => $episode['id'],
                    'release_date' => $episode['release_date'],
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
            // 'https://vanlathan.substack.com/feed',
            // 'https://maddowposts.substack.com/feed'
        ];
    
        $substackVideos = [];
        if (! app()->environment('local')) {
            foreach ($followed_channels as $url) {
                try {
                    $response = Http::timeout(1)->withOptions(['connect_timeout' => 1])->get($url);
                    if ($response->ok()) {
                        $xml = simplexml_load_string($response->body());
        
                        // YAHAN CHANGE HAI: foreach hatakar sirf pehla item liya gaya hai
                        if ($xml && isset($xml->channel->item[0])) {
                            $item = $xml->channel->item[0]; 
        
                            $media = $item->children('http://search.yahoo.com/mrss/');
                            $thumbnail = '';
        
                            if (isset($media->content)) {
                                $thumbnail = (string)$media->content->attributes()->url;
                            } elseif (isset($item->enclosure)) {
                                $thumbnail = (string)$item->enclosure['url'];
                            } elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string)$item->description, $matches)) {
                                $thumbnail = $matches[1];
                            } else {
                                $thumbnail = '/frontend/assets/images/default-video-thumb.jpg';
                            }
        
                            $substackVideos[] = [
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
        }
    
        // Combine both
        $topStoriesItems = array_merge($spotifyEpisodes, $substackVideos);
    
        // Latest first sorting
        usort($topStoriesItems, function($a, $b) {
            $timeA = $a['release_date'] ?? $a['pubDate'] ?? 0;
            $timeB = $b['release_date'] ?? $b['pubDate'] ?? 0;
            return strtotime($timeB) - strtotime($timeA);
        });
    
        $topStoriesItems = array_slice($topStoriesItems, 0, 10);
        
        
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
        $repjeffries_api_url = 'https://api.rss.app/v1/feeds/0HN8eX0EuUWAglOl';
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

        if (app()->environment('local')) {
            $joeRogan = $emptyFeedResponse;
            $native_land_pod = $emptyFeedResponse;
            $repjeffries = $emptyFeedResponse;
            $sports = $emptyFeedResponse;
            $blackfamily = $emptyFeedResponse;
            $education = $emptyFeedResponse;
            $farming = $emptyFeedResponse;
            $crimereport = $emptyFeedResponse;
            $addiction = $emptyFeedResponse;
            $people = $emptyFeedResponse;
            $sisters = $emptyFeedResponse;
            $atlanta = $emptyFeedResponse;
            $sudanNews = $emptyFeedResponse;
            $for_you_response = $emptyFeedResponse;
            $for_you_inoreader_response = $emptyFeedResponse;
            $trending_api_response_feed_spot = $emptyFeedResponse;
            $trending_api_response_jazzwax = $emptyFeedResponse;
            $custom_api_url_response = $emptyFeedResponse;
            $custom_api_url_response_inoreader = $emptyFeedResponse;
            $culture_api_url_response = $emptyFeedResponse;
            $politics_api_url_response = $emptyFeedResponse;
            $politics_api_url_response_inoreader = $emptyFeedResponse;
            $news_api_url_response = $emptyFeedResponse;
            $news_api_url_inoreader_response = $emptyFeedResponse;
            $business_api_url_response = $emptyFeedResponse;
            $business_api_url_response_inoreader = $emptyFeedResponse;
            $finance_api_url_response = $emptyFeedResponse;
            $finance_api_url_response_inoreader = $emptyFeedResponse;
            $spirituality_api_url_response = $emptyFeedResponse;
            $spirituality_api_url_response_inoreader = $emptyFeedResponse;
            $world_news_url_response = $emptyFeedResponse;
            $world_news_url_response_inoreader = $emptyFeedResponse;
            $blackfamily_api_url_response = $emptyFeedResponse;
            $blackfamily_api_url_response_inoreader = $emptyFeedResponse;
            $education_api_url_response = $emptyFeedResponse;
            $education_api_url_response_inoreader = $emptyFeedResponse;
            $entertainment_api_url_response = $emptyFeedResponse;
            $entertainment_api_url_response_inoreader = $emptyFeedResponse;
            $sport_api_url_response = $emptyFeedResponse;
            $sport_api_url_response_inoreader = $emptyFeedResponse;
            $worldpoverty_api_url_response_inoreader = $emptyFeedResponse;
            $worldpoverty_api_url_response = $emptyFeedResponse;
            $farming_api_url_response = $emptyFeedResponse;
            $farming_api_url_response_inoreader = $emptyFeedResponse;
            $crimereport_api_url_response = $emptyFeedResponse;
            $crimereport_api_url_response_inoreader = $emptyFeedResponse;
            $crypto_api_url_response = $emptyFeedResponse;
            $crypto_api_url_response_inoreader = $emptyFeedResponse;
            $atlanta_api_url_response = $emptyFeedResponse;
            $atlanta_api_url_response_inoreader = $emptyFeedResponse;
            $georgia_api_url_response = $emptyFeedResponse;
            $georgia_api_url_response_inoreader = $emptyFeedResponse;
            $woman_api_url_response = $emptyFeedResponse;
            $woman_api_url_response_inoreader = $emptyFeedResponse;
            $addiction_api_url_response = $emptyFeedResponse;
            $fashion_photography_api_url_response = $emptyFeedResponse;
            $travel_api_url_response = $emptyFeedResponse;
            $people_url_response = $emptyFeedResponse;
            $sisters_api_url_response = $emptyFeedResponse;
        } else {
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
        }
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

                $count = 0; // 👈 counter

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break; // 👈 sirf 3 items

                    $image = $extractImage($item);

                    $customArticles[] = [
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
        if ($custom_api_url_response->successful()) {
            $xml = simplexml_load_string($custom_api_url_response->getBody());

            if ($xml !== false) {

                $count = 0; // 👈 counter

                foreach ($xml->channel->item as $item) {

                    if ($count >= 10)
                        break; // 

                    $image = $extractImage($item);

                    $customArticles[] = [
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
        if ($world_news_url_response->successful()) {
            $xml = simplexml_load_string($world_news_url_response->getBody());

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

                    // ✅ 1. enclosure image (MOST IMPORTANT for your feed)
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

                    // ✅ 3. fallback: description se image nikal lo (optional pro)
                    elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

                    $worldNewsArticles[] = [
                        'title' => (string) $item->title,
                        'description' => strip_tags((string) $item->description),
                        'description_text' => strip_tags((string) $item->description),
                        'date_published' => (string) $item->pubDate,
                        'pubDate' => (string) $item->pubDate,
                        'link' => (string) $item->link,
                        'thumbnail' => $image, // ✅ now correct
                        'image' => $image,

                        // ==================== AUTHOR NAME ADD KARO ====================
                        'author' => (string) ($item->children('dc', true)->creator ?? $item->author ?? $item->source ?? 'Unknown Source'),

                        // Extra safe fallback
                        'dc_creator' => isset($item->children('dc', true)->creator)
                            ? (string) $item->children('dc', true)->creator
                            : '',


                        // 🔥 agar audio bhi chahiye
                        'audio' => isset($item->enclosure)
                            ? (string) $item->enclosure->attributes()->url
                            : '',
                    ];

                    if (count($worldNewsArticles) >= 10)
                        break;
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
                        break; // 👈 LIMIT 3

                    $image = $extractImage($item, $channelImage);

                    $cultureArticles[] = [
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

                    $image = $channelImage; // default

                    // ✅ 1. enclosure image (IMPORTANT FIX)
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

                    $image = $channelImage; // default

                    // ✅ 1. enclosure image (IMPORTANT FIX)
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

                    $entertainmentArticles[] = [
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

                foreach ($xml->channel->item as $item) {

                    $image = ''; // ✅ NO default channel image

                    // ✅ 1. enclosure image (ONLY if it's an actual image)
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

                    // ✅ 3. description image (regex fallback)
                    if (empty($image) && preg_match('/<img.*?src=["\'](.*?)["\']/', (string) $item->description, $matches)) {
                        $image = $matches[1];
                    }

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
        
                    // YAHAN CHANGE HAI: foreach hatakar sirf pehla item liya gaya hai
                    if ($xml && isset($xml->channel->item[0])) {
                        $item = $xml->channel->item[0]; 
        
                        $media = $item->children('http://search.yahoo.com/mrss/');
                        $thumbnail = '';
        
                        if (isset($media->content)) {
                            $thumbnail = (string)$media->content->attributes()->url;
                        } elseif (isset($item->enclosure)) {
                            $thumbnail = (string)$item->enclosure['url'];
                        } elseif (preg_match('/<img.*?src=["\'](.*?)["\']/', (string)$item->description, $matches)) {
                            $thumbnail = $matches[1];
                        } else {
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

        $shawnRyanShowVideo = null;
        try {
            $response = Http::timeout(5)->get('https://www.youtube.com/feeds/videos.xml?playlist_id=PL4pqo9Uoh0WuUKxw0BmaK1yrg9Kd7E4lk');
            if ($response->successful()) {
                $xml = simplexml_load_string($response->body());
                if ($xml && isset($xml->entry[0])) {
                    $entry = $xml->entry[0];
                    $ytNS = $entry->children('http://www.youtube.com/xml/schemas/2015');
                    $mediaNS = $entry->children('http://search.yahoo.com/mrss/');
                    
                    $videoId = (string)$ytNS->videoId;
                    if (empty($videoId)) {
                        $url = (string)$entry->link->attributes()->href;
                        if (preg_match('/v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
                            $videoId = $matches[1];
                        }
                    }
                    
                    $thumbnail = '';
                    if (isset($mediaNS->group->thumbnail)) {
                        $thumbnail = (string)$mediaNS->group->thumbnail->attributes()->url;
                    }
                    
                    $shawnRyanShowVideo = [
                        'title' => (string)$entry->title,
                        'video_id' => $videoId,
                        'thumbnail' => $thumbnail,
                        'link' => (string)$entry->link->attributes()->href,
                        'published' => (string)$entry->published,
                    ];
                }
            }
        } catch (\Exception $e) {
            \Log::error("Failed to fetch Shawn Ryan Show video: " . $e->getMessage());
        }
        
        return view('home', [
            'shawnRyanShowVideo' => $shawnRyanShowVideo,
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

        $sportsArticles = $response->successful()
            ? $response->json()['articles']
            : [];

        return view('sports', [
            'sports' => $sportsArticles,
        ]);
    }

    public function business()
    {
        $business_api_url = 'https://api.rss.app/v1/feeds/tOFWacW1rgGYC7jR';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('RSS_API_KEY'),
            'Accept' => 'application/json'
        ])->get($business_api_url, [
                    // 'limit' => 10
                ]);

        if ($response->successful()) {
            $data = $response->json();
            $businessArticles = $data['items'] ?? [];
            $feedDescription = $data['description'] ?? '';
        } else {
            $businessArticles = [];
            $feedDescription = '';
        }

        return view('business', [
            'business' => $businessArticles,
            'feedDescription' => $feedDescription,
        ]);
    }


    public function blackfamily()
    {
        $blackfamily_api_url = 'https://api.rss.app/v1/feeds/tgvHrS7FNQkBNKGS';

        $response = Http::get($blackfamily_api_url, [
            'q' => 'blackfamily',
            'apiKey' => env('NEWS_API_KEY')
        ]);

        $blackfamilyArticles = $response->successful()
            ? $response->json()['articles']
            : [];

        return view('blackfamily', [
            'blackfamily' => $blackfamilyArticles,
        ]);
    }
    public function education()
    {
        $education_api_url = 'https://api.rss.app/v1/feeds/tcmxw7tN76u1DJsa';

        $response = Http::get($education_api_url, [
            'q' => 'education',
            'apiKey' => env('NEWS_API_KEY')
        ]);

        $educationArticles = $response->successful()
            ? $response->json()['articles']
            : [];

        return view('education', [
            'education' => $educationArticles,
        ]);
    }



    public function worldpoverty()
    {
        $apiUrl = 'https://newsapi.org/v2/everything';

        $response = Http::get($apiUrl, [
            'q' => 'world-poverty',
            'apiKey' => env('NEWS_API_KEY')
        ]);

        $worldpovertyArticles = $response->successful()
            ? $response->json()['articles']
            : [];

        return view('worldpoverty', [
            'worldpoverty' => $worldpovertyArticles,
        ]);
    }

    public function farming()
    {
        $apiUrl = 'https://newsapi.org/v2/everything';

        $response = Http::get($apiUrl, [
            'q' => 'farming',
            'apiKey' => env('NEWS_API_KEY')
        ]);

        $farmingArticles = $response->successful()
            ? $response->json()['articles']
            : [];

        return view('farming', [
            'farming' => $farmingArticles,
        ]);
    }

    public function crimereport()
    {
        $apiUrl = 'https://newsapi.org/v2/everything';

        $response = Http::get($apiUrl, [
            'q' => 'crimereport',
            'apiKey' => env('NEWS_API_KEY')
        ]);

        $crimereportArticles = $response->successful()
            ? $response->json()['articles']
            : [];

        return view('crimereport', [
            'crimereport' => $crimereportArticles,
        ]);
    }
    public function crypto()
    {
        $apiUrl = 'https://newsapi.org/v2/everything';

        $response = Http::get($apiUrl, [
            'q' => 'crypto',
            'apiKey' => env('NEWS_API_KEY')
        ]);

        $cryptoArticles = $response->successful()
            ? $response->json()['articles']
            : [];

        return view('crypto', [
            'crypto' => $cryptoArticles,
        ]);
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
}
