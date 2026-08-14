@extends('layouts.master')
@section('main-content')

    <iframe src="{{ route('hero.section') }}" width="100%" height="700px" style="border: none;"></iframe>

    <!-- section-one start -->
    <!--<section class="podcast-section">-->
    <!--    <div class="container text-center">-->
    <!--        <h2 class="section-title text-danger">top Stories</h2>-->

    <!-- Swiper container -->
    <!--        <div class="swiper podcast-swiper">-->
    <!--            <div class="swiper-wrapper">-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/fcec6109803c4adc33f02b14ba7a57f2~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                            <div class="card-bottm"><div class="podcast-title">Joy Ried</div>-->
    <!--                        <a href="https://www.tiktok.com/@joyreidofficial?_t=ZT-8y6lHJdw1Pb&_r=1" target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn" style="margin-left: 15px;"><i-->
    <!--                                    class="fa-brands fa-tiktok"></i>View on tiktok</button>-->
    <!--                        </a></div>-->

    <!--                    </div>-->
    <!--                </div>-->

    <!--                    <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/a15c6cb2d779405b2ca443339b54f9a0~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                            <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Ana Kasparian</div>-->
    <!--                        <a href="https://www.tiktok.com/@anakasparianrage?_t=ZT-8yTVwQ8EVmY&_r=1" target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn" style="margin-left: 15px;"><i-->
    <!--                                    class="fa-brands fa-tiktok"></i>View on tiktok</button>-->
    <!--                        </a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/c96e2b99b565edc626bbf731332cbc40~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                            <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Tucker Carlson</div>-->
    <!--                        <a href="https://www.tiktok.com/@tuckercarlson/video/7531107743357308174?_r=1&_t=ZT-8yTWBJWDMmT" target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn" style=" margin-left: 15px;"><i-->
    <!--                                    class="fa-brands fa-tiktok"></i>View on tiktok</button>-->
    <!--                        </a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/Screenshot 2025-07-30 045436.png" alt="Podcast 1">-->
    <!--                          <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Lawrence O'Donnell</div>-->
    <!--                        <a href="https://www.tiktok.com/@j_chris_pf7_1996/video/7530107491099692319?_r=1&_t=ZT-8yRP94wnm86"-->
    <!--                            target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn" style="margin-left: 15px;"><i-->
    <!--                                    class="fa-brands fa-tiktok"></i>View on tiktok</button>-->
    <!--                        </a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/Screenshot 2025-07-31 040550.png" alt="Podcast 1">-->
    <!--                          <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Keith Boykin</div>-->
    <!--                        <a href="https://www.tiktok.com/@keithboykin1/video/7531039015479397662?_r=1&_t=ZT-8yT9D9aPPN0"-->
    <!--                            target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn" style="margin-left: 15px;"><i-->
    <!--                                    class="fa-brands fa-tiktok"></i>View on tiktok</button>-->
    <!--                        </a>-->
    <!--                         </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/334fdfb3a8bf616344c920d9579d9835~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                              <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Abby Phillip</div>-->
    <!--                        <a href="https://www.tiktok.com/@abbydphillip?_t=ZT-8yRPMcS4Qqk&_r=1" target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn" style=" margin-left: 15px;"><i-->
    <!--                                    class="fa-brands fa-tiktok"></i>View on tiktok</button>-->
    <!--                        </a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/ec892e8044b24d26bd8f567f40913585~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                              <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Don Lemon</div>-->
    <!--                        <a href="https://www.tiktok.com/@donlemon?_t=ZT-8y6kz7VWsj0&_r=1" target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn" style="margin-top: 15px; margin-left: 15px;"><i-->
    <!--                                    class="fa-brands fa-tiktok"></i>View on tiktok</button>-->
    <!--                        </a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/7311349848178556934~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                              <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Rachel Maddow</div>-->
    <!--                        <a href="https://www.tiktok.com/@maddowshow?_t=ZT-8y6lGtOJsmE&_r=1" target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn" style="margin-left: 15px;"><i-->
    <!--                                    class="fa-brands fa-tiktok"></i>View on tiktok</button>-->
    <!--                        </a>-->
    <!--                          </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/d7af2c0b82183a53f5994f120f2190a2~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                              <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Jake Tapper</div>-->
    <!--                        <a href="https://www.tiktok.com/@jaketapper?_t=ZT-8yRQC0tIS7r&_r=1" target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn" style=" margin-left: 15px;"><i-->
    <!--                                    class="fa-brands fa-tiktok"></i>View on tiktok</button>-->
    <!--                        </a>-->
    <!--                      </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/733a17dd660bc4d3fc6648a003d85903~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                              <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Roland Martin</div>-->
    <!--                        <a href="https://www.tiktok.com/@user6067318449212?_t=ZT-8yRR6UvzC0V&_r=1" target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn"-->
    <!--                                style=" margin-left: 15px;"><i class="fa-brands fa-tiktok"></i>View-->
    <!--                                on tiktok</button>-->
    <!--                        </a>-->
    <!--                           </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/d2cf0bf1792330ef4ee79a849864e45d~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                              <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Jonathan Capert</div>-->
    <!--                        <a href="https://www.tiktok.com/@jonathancapehartlivechat?_t=ZT-8yRRlPVT5Bd&_r=1"-->
    <!--                            target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn"-->
    <!--                                style=" margin-left: 15px;"><i class="fa-brands fa-tiktok"></i>View-->
    <!--                                on tiktok</button>-->
    <!--                        </a>-->
    <!--                   </div>-->

    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/03f58123c6556de6b2949ed20375fa40~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                              <div class="card-bottm">-->
    <!--                        <div class="podcast-title">TYT</div>-->
    <!--                        <a href="https://www.tiktok.com/@tyt_clips?_t=ZT-8yRSTTGlDFv&_r=1" target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn"-->
    <!--                                style="margin-left: 15px;"><i class="fa-brands fa-tiktok"></i>View-->
    <!--                                on tiktok</button>-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                       </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/037586bdcf64219a3d3fa410b1a924ae~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                              <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Stephanie Rhule</div>-->
    <!--                        <a href="https://www.tiktok.com/@stephruhle.tv?_t=ZT-8yRSs0iy96L&_r=1" target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn"-->
    <!--                                style=" margin-left: 15px;"><i class="fa-brands fa-tiktok"></i>View-->
    <!--                                on tiktok</button>-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                </div>-->

    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/7320027221563818030~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                              <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Noticias Telemundo</div>-->
    <!--                        <a href="https://www.tiktok.com/@noticiastelemundo?_t=ZT-8yRcRBuwsH7&_r=1" target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn"-->
    <!--                                style=" margin-left: 15px;"><i class="fa-brands fa-tiktok"></i>View-->
    <!--                                on tiktok</button>-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/Screenshot 2025-07-30 054357.png" alt="Podcast 1">-->
    <!--                          <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Al Jazeera</div>-->
    <!--                        <a href="https://www.tiktok.com/@aljazeeraenglish/video/7532255357704391966?_r=1&_t=ZT-8yRcYwKT7QD"-->
    <!--                            target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn"-->
    <!--                                style="margin-left: 15px;"><i class="fa-brands fa-tiktok"></i>View-->
    <!--                                on tiktok</button>-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                       </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/651ae5dfb4fb235b119587b5f5aa0a44~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                              <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Africa 24</div>-->
    <!--                        <a href="https://www.tiktok.com/@africa24official?_t=ZT-8yRcrFbhOQp&_r=1" target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn"-->
    <!--                                style=" margin-left: 15px;"><i class="fa-brands fa-tiktok"></i>View-->
    <!--                                on tiktok</button>-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                       </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="podcast-card h-100">-->
    <!--                        <img src="/frontend/assets/images/6edea633877f8e0c06294cce80812a41~tplv-tiktokx-cropcenter_1080_1080.jpeg"-->
    <!--                            alt="Podcast 1">-->
    <!--                              <div class="card-bottm">-->
    <!--                        <div class="podcast-title">Pete Buttigieg</div>-->
    <!--                        <a href="https://www.tiktok.com/@petebuttigieg" target="_blank">-->
    <!--                            <button type="button" class="btn  sec-btn"-->
    <!--                                style=" margin-left: 15px;"><i class="fa-brands fa-tiktok"></i>View-->
    <!--                                on tiktok</button>-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                       </div>-->
    <!--                </div>-->
    <!--            </div>-->


    <!-- Optional arrows -->
    <!--            <div class="swiper-button-next podcast-swiper-next"></div>-->
    <!--            <div class="swiper-button-prev podcast-swiper-prev"></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- section-one-end -->
    
    <!-- Start Top Stories Section -->
    <section class="section-two text-center bg-black py-4 py-md-5">
        <div class="container">
            <h2 class="section-title text-danger mb-4">Unfiltered</h2>
    
            @if(count($topStoriesItems) > 0)
                <div class="swiper topStoriesSwiper">
                    <div class="swiper-wrapper">
                        @foreach($topStoriesItems as $item)
                            <div class="swiper-slide">
                                @if($item['type'] == 'spotify')
                                    <div class="podcast-embed-card">
                                        <div class="unfiltered-media-box">
                                            <iframe 
                                                src="https://open.spotify.com/embed/{{ !empty($item['episode_id']) ? 'episode/' . $item['episode_id'] : 'show/' . ($item['show_id'] ?? '') }}?utm_source=generator" 
                                                frameBorder="0" 
                                                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
                                                loading="lazy">
                                            </iframe>
                                        </div>
                                        <div class="podcast-info p-3 d-flex flex-column flex-grow-1 justify-content-between text-start">
                                            <div>
                                                <h6 class="text-danger mb-1" style="font-size: 0.85rem; font-weight: 700; text-transform: uppercase;">{{ $item['show_name'] ?? 'Podcast' }}</h6>
                                                <h5 class="text-white fw-bold mb-0" style="font-size: 0.95rem; line-height: 1.3;">{{ Str::limit($item['episode_name'] ?? ($item['show_name'] ?? 'Listen on Spotify'), 70) }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="podcast-card">
                                        <div class="unfiltered-media-box position-relative">
                                            <img src="{{ $item['thumbnail'] ?? '/frontend/assets/images/default-video-thumb.jpg' }}" 
                                                 alt="{{ $item['title'] ?? 'Video' }}"
                                                 onerror="this.onerror=null; this.src='/frontend/assets/images/default-video-thumb.jpg';"
                                                 referrerpolicy="no-referrer">
                                            <div class="video-play-overlay">
                                                <a href="javascript:void(0)" onclick="openVideo('{{ $item['link'] }}')" aria-label="Play video">
                                                    <i class="fa-solid fa-circle-play text-white" style="font-size: 3.5rem; opacity: 0.9;"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="p-3 d-flex flex-column flex-grow-1 justify-content-between text-start">
                                            <h5 class="text-white fw-bold mb-3" style="font-size: 0.95rem; line-height: 1.3;">
                                                {{ Str::limit($item['title'] ?? '', 70) }}
                                            </h5>
                                            <a href="{{ $item['link'] }}" target="_blank" class="btn btn-danger btn-sm w-100 mt-auto">
                                                Watch on Substack
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
    
                    <div class="swiper-button-next top-stories-next"></div>
                    <div class="swiper-button-prev top-stories-prev"></div>
                </div>
            @else
                <p class="text-white">Loading Top Stories...</p>
            @endif
        </div>
    </section>
    <!-- End Top Stories Section -->
    
    <!-- Start Trending Section -->
    <section class="blog-section">
        <div class="container blog-sec-in">
            <h2 class="section-title">
                <span class="trending-color">Trending</span>
            </h2>
            <div class="swiper lastSwiper">
                <div class="swiper-wrapper">
                   @foreach ($trending as $trending_items)
                        <div class="swiper-slide">
                            <div class="blog-card full-screen">
                                <div class="blog-image">
                                    <img src="{{ $trending_items['thumbnail'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                        onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                        alt="{{ $trending_items['title'] }}">
                                </div>

                                <h3 class="blog-title">
                                    {{ $trending_items['title'] }}
                                </h3>

                                <p class="card-text small text-muted">
                                    {{ Str::limit($trending_items['description_text'] ?? '', 100) }}
                                </p>

                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <small class="text-primary fw-semibold">
                                        By:
                                        <strong>
                                            {{ $trending_items['author'] ?? ($trending_items['dc_creator'] ?? 'Unknown Source') }}
                                        </strong>
                                    </small>

                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($trending_items['date_published'] ?? now())->format('M d, Y') }}
                                    </small>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--End Trending Section-->

    <!--Start For You Section-->
    <!--<section class="blog-section">-->
    <!--    <div class="container blog-sec-in"> -->
    <!--        <h2 class="section-title">-->
    <!--          <span class="spotify">For You</span>-->
    <!--        </h2>-->
    <!--        <p class="text-white">{{ $for_you['description'] ?? '' }}</p>-->


    <!--        <div class="swiper lastSwiper">-->
    <!--            <div class="swiper-wrapper">-->
    <!--                @foreach (array_slice($for_you, 0, 10) as $for_you_items)
    -->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="blog-card full-screen">-->
    <!--                        <div class="blog-image">-->
    <!--                            <img src="{{ $for_you_items['thumbnail'] ?? '' }}"-->
    <!--                            onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"-->
    <!--                            alt="News Image">-->
    <!--<span class="blog-date">05.07.2024</span>-->
    <!--                        </div>-->
    <!--                        <h3 class="blog-title">{{ $for_you_items['title'] }}</h3>-->
    <!--                        <p class="card-text small text-muted">-->
    <!--                            {{ Str::limit($for_you_items['description_text'] ?? '', 100) }}-->
    <!--                        </p>-->
    <!--                        <small class="text-muted">-->
    <!--                            {{ \Carbon\Carbon::parse($for_you_items['date_published'] ?? now())->format('M d, Y') }}-->
    <!--                        </small>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--
    @endforeach-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!--End For You Section-->

    <!--Start For You Section-->
    <section class="blog-section">
        <div class="container blog-sec-in">
            <h2 class="section-title">
                <span class="spotify">For You</span>
            </h2>
            @if (count($for_you) > 0)
                <!--<p class="text-white">{{ Str::limit($for_you[0]['description'] ?? '', 150) }}</p>-->
                <div class="swiper lastSwiper">
                    <div class="swiper-wrapper">
                        @foreach (array_slice($for_you, 0, 15) as $for_you_items)
                            <div class="swiper-slide">
                                <div class="blog-card full-screen">
                                    <div class="blog-image">
                                        <img src="{{ $for_you_items['thumbnail'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                            onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                            alt="{{ $for_you_items['title'] }}">
                                    </div>
                                    <h3 class="blog-title">{{ $for_you_items['title'] }}</h3>
                                    <p class="card-text small text-muted">
                                        {{ Str::limit($for_you_items['description_text'] ?? '', 100) }}
                                    </p>
                                    <!-- Author Name + Date -->
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-primary fw-semibold">
                                            By:
                                            <strong>
                                                {{ $for_you_items['author'] ?? ($for_you_items['dc_creator'] ?? 'Unknown Source') }}
                                            </strong>
                                        </small>

                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($for_you_items['date_published'] ?? now())->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-white">No For You content available right now.</p>
            @endif
        </div>
    </section>
    <!--End For You Section-->


    <!-- Start Unfiltered Section -->
    <!--<section class="podcast-section mt-5" style="background: #000; padding: 0px 0;">-->
    <!--    <div class="container">-->
    <!--        <h2 class="section-title text-danger mb-4 text-center" style="font-weight: 800; text-transform: uppercase;">Unfiltered</h2>-->
    
    <!--        <div class="swiper" id="unfilteredSwiper" style="overflow: hidden; padding-bottom: 30px;">-->
    <!--            <div class="swiper-wrapper">-->
    <!--            </div>-->
    
    <!--            <div class="swiper-button-next" style="color: #ff0000;"></div>-->
    <!--            <div class="swiper-button-prev" style="color: #ff0000;"></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- End Unfiltered Section -->

    <!-- Start Spotify Section -->
    <section class="top-shows-section text-center">
        <div class="container top-shows-content">
            <h2 class="display-5 fw-bold mb-5 text-warning section-title">Spotify</h2>
            <div class="row g-4 justify-content-center">
                @foreach (['1'] as $index)
                    <div class="col-lg-6 mb-4">
                        <!-- Card -->
                        <div class="show-card position-relative">
                            <!--<img src="{{ $spotify_section['images'][1]['url'] ?? '/frontend/assets/images/top-img-01.jpg' }}" alt="Show {{ $index }}">-->
                            <div class="show-card-body text-start">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>thinker</h5>
                                        <small>Public Playlist</small>
                                    </div>
                                    <div class="col-lg-6 text-end mb-4">
                                        <button class="btn btn-outline-light mt-3 toggle-icon-btn" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#spotifyTrackList{{ $index }}" aria-expanded="false"
                                            aria-controls="spotifyTrackList{{ $index }}">
                                            <i class="bi bi-chevron-down"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Audio Player -->
                                <div class="audio-player d-flex align-items-center gap-3">
                                    <button class="btn btn-light play-icon" data-card="{{ $index }}">
                                        <i class="fas fa-play"></i>
                                    </button>
                                    <div class="audio-timer">00:00 | 00:00</div>
                                </div>
                            </div>
                        </div>

                        <!-- Collapse Track List -->
                        <div class="collapse mt-3" id="spotifyTrackList{{ $index }}">
                            <div class="row">
                                {{-- Yahan check lagayein ki variable set hai aur null nahi hai --}}
                                @if (!empty($spotify_section) && isset($spotify_section['tracks']['items']))
                                    @foreach ($spotify_section['tracks']['items'] as $trackIndex => $track)
                                        @php $trackInfo = $track['track']; @endphp
                                        <div class="col-md-12 mb-3">
                                            <div class="d-flex align-items-center p-2 bg-dark text-white rounded shadow-sm track-item"
                                                data-card="{{ $index }}"
                                                data-audio="audio-{{ $index }}-{{ $trackIndex }}">
                                                <img src="{{ $trackInfo['album']['images'][0]['url'] ?? '' }}"
                                                    alt="Album Cover" width="60" height="60"
                                                    class="me-3 rounded">
                                                <div class="flex-grow-1">
                                                    <strong>{{ $trackInfo['name'] ?? '' }}</strong><br>
                                                    <small>{{ $trackInfo['artists'][0]['name'] ?? '' }}</small>
                                                </div>
                                                @if (!empty($trackInfo['preview_url']))
                                                    <audio id="audio-{{ $index }}-{{ $trackIndex }}">
                                                        <source src="{{ $trackInfo['preview_url'] }}" type="audio/mpeg">
                                                    </audio>
                                                @else
                                                    <span class="text-muted ms-3">No preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12 text-white">
                                        <p>Playlist data currently unavailable.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Spotify Section -->

    <!-- Start U.S. Customs Section -->
    <section class="blog-section">
        <div class="container blog-sec-in">
            <h2 class="section-title">
                <span class="text-primary">Deportation</span>
            </h2>
            <h3>Immigrations US border control</h3>
            @if (!empty($custom) && count($custom) > 0)
                <!-- ✅ description first item se -->
                <!--<p class="text-white">-->
                <!--    {{ Str::limit($culture[0]['description'] ?? '', 150) }}-->
                <!--</p>-->
                <div class="swiper lastSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($custom as $culture_items)
                            <div class="swiper-slide">
                                <div class="blog-card full-screen">
                                    <div class="blog-image">
                                        <a href="{{ $culture_items['link'] ?? ($culture_items['url'] ?? '#') }}" target="_blank">
                                            <img src="{{ $culture_items['thumbnail'] ?? $culture_items['image'] ?? $culture_items['urlToImage'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                                onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                                referrerpolicy="no-referrer"
                                                alt="{{ $culture_items['title'] ?? 'Customs News' }}">
                                        </a>
                                    </div>
                                    <h3 class="blog-title">
                                        <a href="{{ $culture_items['link'] ?? ($culture_items['url'] ?? '#') }}" target="_blank" class="text-decoration-none text-white">
                                            {{ $culture_items['title'] ?? '' }}
                                        </a>
                                    </h3>
                                    <p class="card-text small text-muted">
                                        {{ Str::limit($culture_items['description_text'] ?? ($culture_items['description'] ?? ''), 100) }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-primary fw-semibold">
                                            By:
                                            <strong>
                                                {{ $culture_items['author'] ?? ($culture_items['dc_creator'] ?? 'Unknown Source') }}
                                            </strong>
                                        </small>

                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($culture_items['date_published'] ?? ($culture_items['pubDate'] ?? now()))->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-white">No content available right now.</p>
            @endif
        </div>
    </section>
    <!-- End U.S. Customs Section -->

    <!-- Start Culture Section -->
    <section class="blog-section">
        <div class="container blog-sec-in">
            <h2 class="section-title">
                <span class="text-info">Culture</span>
            </h2>
            @if (!empty($culture) && count($culture) > 0)
                <div class="swiper lastSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($culture as $culture_items)
                            <div class="swiper-slide">
                                <div class="blog-card full-screen">
                                    <div class="blog-image">
                                        <a href="{{ $culture_items['link'] ?? ($culture_items['url'] ?? '#') }}" target="_blank">
                                            <img src="{{ $culture_items['thumbnail'] ?? $culture_items['image'] ?? $culture_items['urlToImage'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                                onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                                referrerpolicy="no-referrer"
                                                alt="{{ $culture_items['title'] ?? 'Culture News' }}">
                                        </a>
                                    </div>
                                    <h3 class="blog-title">
                                        <a href="{{ $culture_items['link'] ?? ($culture_items['url'] ?? '#') }}" target="_blank" class="text-decoration-none text-white">
                                            {{ $culture_items['title'] ?? '' }}
                                        </a>
                                    </h3>
                                    <p class="card-text small text-muted">
                                        {{ Str::limit($culture_items['description_text'] ?? ($culture_items['description'] ?? ''), 100) }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-info fw-semibold">
                                            By:
                                            <strong>
                                                {{ $culture_items['author'] ?? ($culture_items['dc_creator'] ?? 'Unknown Source') }}
                                            </strong>
                                        </small>

                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($culture_items['date_published'] ?? ($culture_items['pubDate'] ?? now()))->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-white">No Culture content available right now.</p>
            @endif
        </div>
    </section>
    <!-- End Culture Section -->

    <!-- Start iHeartRadio Section -->
    <section id="iheartradio-section" class="blog-section iheartradio-section-container py-5 text-white" style="background: #000;">
        <div class="container">
            <h2 class="section-title mb-4">
                <span class="text-danger"><i class="fa-solid fa-radio me-2"></i>iHeartRadio & NPR Morning Edition</span>
            </h2>
            
            <div class="row g-4">
                <!-- Playlist Section -->
                <div class="col-md-6">
                    <div class="p-4 rounded-4 iheart-card h-100 d-flex flex-column justify-content-between" style="background: rgba(17, 17, 17, 0.85); border: 1px solid rgba(255, 255, 255, 0.1); backdrop-filter: blur(15px); box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);">
                        <div>
                            <h4 class="text-muted text-uppercase tracking-wider small fw-bold mb-3 d-flex align-items-center">
                                <span class="badge bg-danger me-2" style="font-size: 0.65rem; padding: 0.4em 0.8em; background-color: #e11127 !important;">PLAYLIST</span>
                                Music Festival Playlist
                            </h4>
                            <div class="rounded-3 overflow-hidden" style="height: 500px; background: #1a1a1a;">
                                <iframe allow="autoplay" width="100%" height="500" src="https://www.iheart.com/playlist/iheartradio-music-festival-playlist-312064750-3KhLPeXGicEa6Y9K3V91Ks?embed=true" frameborder="0" style="border: none; display: block;"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- NPR Morning Edition & WABE 90.1 Section -->
                <div class="col-12 col-md-6">
                    <div class="p-4 rounded-4 iheart-card h-100 d-flex flex-column justify-content-between" style="background: rgba(17, 17, 17, 0.85); border: 1px solid rgba(255, 255, 255, 0.1); backdrop-filter: blur(15px); box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);">
                        <div>
                            <h4 class="text-muted text-uppercase tracking-wider small fw-bold mb-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="badge bg-primary me-2" style="font-size: 0.65rem; padding: 0.4em 0.8em; background-color: #0056b3 !important;">NPR LIVE</span>
                                    WABE 90.1 & Morning Edition
                                </div>
                                <a href="https://www.npr.org/programs/morning-edition/" target="_blank" rel="noopener noreferrer" class="text-info text-decoration-none small">
                                    <i class="fa-solid fa-arrow-up-right-from-square me-1"></i>npr.org
                                </a>
                            </h4>
                            <div class="rounded-3 overflow-hidden d-flex flex-column justify-content-between align-items-center text-center p-4" style="min-height: 500px; background: linear-gradient(135deg, #111827 0%, #1e293b 100%); border: 1px solid rgba(255, 255, 255, 0.05);">
                                <div class="w-100 my-auto">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 85px; height: 85px; background: rgba(0, 86, 179, 0.2); border: 2px solid #0056b3; box-shadow: 0 0 25px rgba(0, 86, 179, 0.4);">
                                        <i class="fa-solid fa-radio text-primary fa-2xl" id="radioStatusIcon"></i>
                                    </div>
                                    <h3 class="text-white fw-bold mb-1" id="currentStationTitle">LIVE WABE 90.1</h3>
                                    <p class="text-muted small mb-2" id="currentStationSub">Morning Edition • Atlanta NPR Broadcast</p>
                                    <span class="badge rounded-pill bg-danger px-3 py-2 animate-pulse mb-3" id="liveBadge"><i class="fa-solid fa-circle fa-2xs me-1"></i> LIVE STREAMING</span>

                                    <!-- Quick Big Play Button -->
                                    <div class="mb-3">
                                        <button class="btn btn-primary btn-lg rounded-pill px-4 py-2 fw-bold shadow-lg" id="nprPlayToggleBtn" onclick="toggleNprLiveAudio()">
                                            <i class="fa-solid fa-play me-2" id="playBtnIcon"></i> <span id="playBtnText">Play Live Broadcast</span>
                                        </button>
                                    </div>

                                    <!-- Station Selector Dropdown -->
                                    <div class="mb-3 w-100 px-2">
                                        <select class="form-select bg-dark text-white border-secondary text-center rounded-3 py-2 small" id="nprStationSelect" onchange="changeNprStation(this)">
                                            <option value="https://playerservices.streamtheworld.com/api/livestream-redirect/WABEFM_HD1.mp3" data-title="LIVE WABE 90.1" data-sub="Morning Edition • Atlanta NPR Broadcast" selected>📡 LIVE WABE 90.1 (Atlanta NPR)</option>
                                            <option value="https://playerservices.streamtheworld.com/api/livestream-redirect/WABE_HD2_CLASSICAL.mp3" data-title="LIVE WABE CLASSICAL" data-sub="Classical Music • Atlanta WABE">🎼 LIVE WABE CLASSICAL</option>
                                            <option value="https://npr-ice.streamguys1.com/live.mp3" data-title="NPR 24-HOUR PROGRAM" data-sub="NPR National Live Program Stream">📻 NPR 24-HOUR PROGRAM STREAM</option>
                                            <option value="https://kuer.streamguys1.com/high_icy" data-title="KUER NPR UTAH" data-sub="NPR News & Talk Broadcast">🏔️ KUER 90.1 (NPR News)</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Standard HTML5 Player -->
                                <div class="w-100 px-3 py-3 rounded-4 mb-3" style="background: rgba(0, 0, 0, 0.5); border: 1px solid rgba(255, 255, 255, 0.1);">
                                    <audio id="nprLiveAudio" controls class="w-100" style="outline: none;" preload="none">
                                        <source id="nprAudioSource" src="https://playerservices.streamtheworld.com/api/livestream-redirect/WABEFM_HD1.mp3" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>

                                <div class="d-flex gap-2 justify-content-center w-100">
                                    <a href="https://www.npr.org/programs/morning-edition/" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light btn-sm px-4 py-2 rounded-pill w-100">
                                        <i class="fa-solid fa-newspaper me-2"></i>Morning Edition Broadcast Notes
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                function toggleNprLiveAudio() {
                    const audio = document.getElementById('nprLiveAudio');
                    const btnText = document.getElementById('playBtnText');
                    const btnIcon = document.getElementById('playBtnIcon');

                    if (audio.paused) {
                        const playPromise = audio.play();
                        if (playPromise !== undefined) {
                            playPromise.then(() => {
                                btnText.textContent = 'Pause Broadcast';
                                btnIcon.className = 'fa-solid fa-pause me-2';
                            }).catch(error => {
                                console.log('Playback error:', error);
                                const source = document.getElementById('nprAudioSource');
                                source.src = 'https://playerservices.streamtheworld.com/api/livestream-redirect/WABEFM_HD1.mp3';
                                audio.load();
                                audio.play();
                                btnText.textContent = 'Pause Broadcast';
                                btnIcon.className = 'fa-solid fa-pause me-2';
                            });
                        }
                    } else {
                        audio.pause();
                        btnText.textContent = 'Play Live Broadcast';
                        btnIcon.className = 'fa-solid fa-play me-2';
                    }
                }

                function changeNprStation(selectEl) {
                    const audio = document.getElementById('nprLiveAudio');
                    const source = document.getElementById('nprAudioSource');
                    const title = document.getElementById('currentStationTitle');
                    const sub = document.getElementById('currentStationSub');
                    const btnText = document.getElementById('playBtnText');
                    const btnIcon = document.getElementById('playBtnIcon');

                    const selectedOption = selectEl.options[selectEl.selectedIndex];
                    const streamUrl = selectedOption.value;
                    const stationTitle = selectedOption.getAttribute('data-title');
                    const stationSub = selectedOption.getAttribute('data-sub');

                    title.textContent = stationTitle;
                    sub.textContent = stationSub;

                    audio.pause();
                    source.src = streamUrl;
                    audio.load();
                    audio.play().then(() => {
                        btnText.textContent = 'Pause Broadcast';
                        btnIcon.className = 'fa-solid fa-pause me-2';
                    }).catch(e => {
                        btnText.textContent = 'Play Live Broadcast';
                        btnIcon.className = 'fa-solid fa-play me-2';
                    });
                }

                document.addEventListener('DOMContentLoaded', function() {
                    const audio = document.getElementById('nprLiveAudio');
                    if (audio) {
                        audio.addEventListener('play', function() {
                            document.getElementById('playBtnText').textContent = 'Pause Broadcast';
                            document.getElementById('playBtnIcon').className = 'fa-solid fa-pause me-2';
                        });
                        audio.addEventListener('pause', function() {
                            document.getElementById('playBtnText').textContent = 'Play Live Broadcast';
                            document.getElementById('playBtnIcon').className = 'fa-solid fa-play me-2';
                        });
                    }
                });
                </script>
            </div>
        </div>
    </section>

    <!-- iHeartRadio Custom Styles -->
    <style>
        .iheart-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .iheart-card:hover {
            transform: translateY(-5px);
            border-color: rgba(225, 17, 39, 0.5) !important;
            box-shadow: 0 15px 35px rgba(225, 17, 39, 0.2) !important;
        }
        .iheart-card h4 {
            font-size: 0.9rem;
            letter-spacing: 0.05em;
        }
    </style>
    <!-- End iHeartRadio Section -->

    {{-- 
    <!-- Start Weather Section -->
    <section class="blog-section weather-section-container py-5 text-white" style="background: #000;">
        <div class="container">
            <h2 class="section-title mb-4">
                <span class="text-warning">Local Weather</span>
            </h2>
            
            <!-- Preset cities toolbar -->
            <div class="d-flex flex-wrap gap-2 mb-4 align-items-center justify-content-start weather-cities-bar">
                <button class="btn btn-sm btn-outline-warning active weather-city-btn" data-lat="33.7490" data-lon="-84.3880" data-name="Atlanta, GA">
                    <i class="fa-solid fa-location-dot me-1"></i> Atlanta, GA
                </button>
                <button class="btn btn-sm btn-outline-warning weather-city-btn" data-lat="32.0809" data-lon="-81.0912" data-name="Savannah, GA">
                    Savannah, GA
                </button>
                <button class="btn btn-sm btn-outline-warning weather-city-btn" data-lat="40.7128" data-lon="-74.0060" data-name="New York, NY">
                    New York, NY
                </button>
                <button class="btn btn-sm btn-outline-warning weather-city-btn" data-lat="34.0522" data-lon="-118.2437" data-name="Los Angeles, CA">
                    Los Angeles, CA
                </button>
                <button class="btn btn-sm btn-outline-warning weather-city-btn" data-lat="38.8951" data-lon="-77.0364" data-name="Washington, DC">
                    Washington, DC
                </button>
                <button class="btn btn-sm btn-danger ms-auto weather-geo-btn" id="weatherGeoBtn">
                    <i class="fa-solid fa-crosshairs me-1"></i> Use My Location
                </button>
            </div>

            <!-- Main Weather Display Card -->
            <div class="weather-card-wrapper p-4 p-md-5 rounded-4 position-relative overflow-hidden" style="background: rgba(17, 17, 17, 0.85); border: 1px solid rgba(255, 255, 255, 0.1); backdrop-filter: blur(15px); box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);">
                <!-- Animated background element -->
                <div class="position-absolute" style="top: -50px; right: -50px; width: 180px; height: 180px; background: radial-gradient(circle, rgba(255, 193, 7, 0.15) 0%, rgba(255, 193, 7, 0) 70%); filter: blur(30px); pointer-events: none;"></div>
                
                <!-- Loading Overlay -->
                <div id="weatherLoader" class="position-absolute inset-0 d-flex align-items-center justify-content-center bg-black bg-opacity-75 z-3 rounded-4 transition-all" style="display: none !important;">
                    <div class="text-center">
                        <div class="spinner-border text-warning" role="status" style="width: 3rem; height: 3rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3 text-muted">Fetching latest forecast from NWS...</p>
                    </div>
                </div>

                <div class="row g-4 align-items-stretch">
                    <!-- Current Conditions Left Panel -->
                    <div class="col-lg-5 d-flex flex-column justify-content-between border-lg-end-custom pe-lg-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h4 class="text-muted text-uppercase tracking-wider small fw-bold mb-1" id="weatherLocationLabel">Loading Location...</h4>
                                    <h3 class="fw-black text-white mb-0" id="weatherPeriodLabel">Today</h3>
                                </div>
                                <span class="badge bg-warning text-dark fw-bold px-3 py-2 rounded-pill" id="weatherTempLabel">--°F</span>
                            </div>

                            <div class="my-4 d-flex align-items-center gap-3">
                                <div class="weather-icon-container p-2 rounded-3 bg-dark bg-opacity-50 border border-secondary border-opacity-25" style="width: 90px; height: 90px; display: flex; align-items: center; justify-content: center;">
                                    <img id="weatherMainIcon" src="" alt="Weather Icon" class="img-fluid rounded" style="width: 70px; height: 70px; object-fit: cover;">
                                </div>
                                <div>
                                    <div class="fs-3 fw-bold text-white leading-tight" id="weatherConditionLabel">--</div>
                                    <div class="text-muted small mt-1" id="weatherWindLabel"><i class="fa-solid fa-wind me-1"></i> Wind: --</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="mb-0 text-white-50 small leading-relaxed p-3 rounded-3" style="background: rgba(255,255,255,0.03); border-left: 3px solid #ffc107;" id="weatherDetailedLabel">
                                Retrieving detailed forecast summary...
                            </p>
                        </div>
                    </div>

                    <!-- 3-Day Forecast Right Panel -->
                    <div class="col-lg-7 d-flex flex-column justify-content-center ps-lg-4">
                        <h5 class="text-warning text-uppercase tracking-wider small fw-bold mb-3"><i class="fa-regular fa-calendar-days me-2"></i> Upcoming Forecast</h5>
                        
                        <div class="row g-3" id="weatherForecastContainer">
                            <!-- Forecast items injected here dynamically -->
                            <div class="col-md-4 text-center">
                                <div class="p-3 rounded-3 bg-dark bg-opacity-25 border border-secondary border-opacity-10 h-100 placeholder-glow">
                                    <span class="placeholder col-6 bg-secondary mb-2"></span>
                                    <div class="my-2"><span class="placeholder col-4 bg-secondary" style="height: 40px; width: 40px; border-radius: 50%;"></span></div>
                                    <span class="placeholder col-8 bg-secondary"></span>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="p-3 rounded-3 bg-dark bg-opacity-25 border border-secondary border-opacity-10 h-100 placeholder-glow">
                                    <span class="placeholder col-6 bg-secondary mb-2"></span>
                                    <div class="my-2"><span class="placeholder col-4 bg-secondary" style="height: 40px; width: 40px; border-radius: 50%;"></span></div>
                                    <span class="placeholder col-8 bg-secondary"></span>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="p-3 rounded-3 bg-dark bg-opacity-25 border border-secondary border-opacity-10 h-100 placeholder-glow">
                                    <span class="placeholder col-6 bg-secondary mb-2"></span>
                                    <div class="my-2"><span class="placeholder col-4 bg-secondary" style="height: 40px; width: 40px; border-radius: 50%;"></span></div>
                                    <span class="placeholder col-8 bg-secondary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Weather custom styles -->
    <style>
        .tracking-wider {
            letter-spacing: 0.1em;
        }
        .fw-black {
            font-weight: 900;
        }
        .leading-tight {
            line-height: 1.25;
        }
        .leading-relaxed {
            line-height: 1.6;
        }
        @media (min-width: 992px) {
            .border-lg-end-custom {
                border-right: 1px solid rgba(255, 255, 255, 0.1);
            }
        }
        @media (max-width: 767.98px) {
            .weather-cities-bar {
                overflow-x: auto;
                white-space: nowrap;
                flex-wrap: nowrap !important;
                padding-bottom: 8px;
                scrollbar-width: none; /* Firefox */
            }
            .weather-cities-bar::-webkit-scrollbar {
                display: none; /* Chrome/Safari */
            }
            .weather-cities-bar button {
                flex: 0 0 auto;
            }
            .weather-card-wrapper {
                padding: 1.5rem !important;
            }
        }
        .weather-forecast-card {
            transition: all 0.3s ease;
        }
        .weather-forecast-card:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.05) !important;
            border-color: rgba(255, 193, 7, 0.3) !important;
        }
    </style>

    <!-- Weather JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const weatherLoader = document.getElementById('weatherLoader');
            const weatherForecastContainer = document.getElementById('weatherForecastContainer');
            
            function loadWeather(lat, lon, locationName) {
                // Show loader
                weatherLoader.style.setProperty('display', 'flex', 'important');
                
                const requestData = {};
                if (lat !== undefined && lon !== undefined) {
                    requestData.lat = lat;
                    requestData.lon = lon;
                }
                if (locationName !== undefined) {
                    requestData.name = locationName;
                }
                
                $.ajax({
                    url: '/api/weather',
                    type: 'GET',
                    data: requestData,
                    success: function (response) {
                        if (response.success && response.periods && response.periods.length > 0) {
                            const periods = response.periods;
                            const current = periods[0];
                            const displayName = locationName || response.locationName || 'Local Weather';
                            
                            // Set main weather conditions
                            document.getElementById('weatherLocationLabel').textContent = displayName;
                            document.getElementById('weatherPeriodLabel').textContent = current.name;
                            document.getElementById('weatherTempLabel').textContent = `${current.temperature}°${current.temperatureUnit}`;
                            document.getElementById('weatherMainIcon').src = current.icon;
                            document.getElementById('weatherConditionLabel').textContent = current.shortForecast;
                            document.getElementById('weatherWindLabel').innerHTML = `<i class="fa-solid fa-wind me-1"></i> Wind: ${current.windSpeed} ${current.windDirection}`;
                            document.getElementById('weatherDetailedLabel').textContent = current.detailedForecast;
                            
                            // Load forecast periods (periods 1 to 4 - e.g. Tonight, Tomorrow, Tomorrow Night, Next Day)
                            let forecastHtml = '';
                            const forecastPeriods = periods.slice(1, 4); // get next 3 periods
                            
                            forecastPeriods.forEach(period => {
                                forecastHtml += `
                                    <div class="col-md-4">
                                        <div class="weather-forecast-card p-3 rounded-3 text-center h-100 d-flex flex-column justify-content-between" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.05);">
                                            <div>
                                                <h6 class="text-white small fw-bold mb-2">${period.name}</h6>
                                                <div class="my-2">
                                                    <img src="${period.icon}" alt="${period.shortForecast}" class="rounded-circle" style="width: 45px; height: 45px; object-fit: cover; border: 1.5px solid rgba(255,193,7,0.2);">
                                                </div>
                                                <div class="fw-bold text-warning small">${period.temperature}°${period.temperatureUnit}</div>
                                            </div>
                                            <div class="text-muted small mt-2 leading-tight" style="font-size: 0.75rem;">${period.shortForecast}</div>
                                        </div>
                                    </div>
                                `;
                            });
                            
                            weatherForecastContainer.innerHTML = forecastHtml;
                        } else {
                            showWeatherError();
                        }
                    },
                    error: function () {
                        showWeatherError();
                    },
                    complete: function () {
                        // Hide loader
                        weatherLoader.style.setProperty('display', 'none', 'important');
                    }
                });
            }
            
            function showWeatherError() {
                document.getElementById('weatherLocationLabel').textContent = "Connection Error";
                document.getElementById('weatherPeriodLabel').textContent = "Service Unavailable";
                document.getElementById('weatherTempLabel').textContent = "--";
                document.getElementById('weatherConditionLabel').textContent = "Unable to reach weather.gov";
                document.getElementById('weatherDetailedLabel').textContent = "Weather services are currently experiencing high traffic or coordinates are outside the US. Please select another city or try again later.";
                weatherForecastContainer.innerHTML = `
                    <div class="col-12 text-center text-muted small py-4">
                        <i class="fa-solid fa-triangle-exclamation text-danger fs-4 mb-2"></i>
                        <p class="mb-0">Failed to load forecast data from weather.gov.</p>
                    </div>
                `;
            }
            
            // City button click handler
            $('.weather-city-btn').on('click', function () {
                $('.weather-city-btn').removeClass('active btn-warning text-dark').addClass('btn-outline-warning');
                $(this).addClass('active').removeClass('btn-outline-warning');
                
                const lat = $(this).data('lat');
                const lon = $(this).data('lon');
                const name = $(this).data('name');
                
                loadWeather(lat, lon, name);
            });
            
            // Geolocation handler
            document.getElementById('weatherGeoBtn').addEventListener('click', function () {
                const btn = this;
                const originalText = btn.innerHTML;
                
                if (navigator.geolocation) {
                    btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin me-1"></i> Getting location...';
                    btn.disabled = true;
                    
                    navigator.geolocation.getCurrentPosition(function (position) {
                        const lat = position.coords.latitude;
                        const lon = position.coords.longitude;
                        
                        // Set active state on button
                        $('.weather-city-btn').removeClass('active');
                        
                        loadWeather(lat, lon, "My Location");
                        btn.innerHTML = '<i class="fa-solid fa-crosshairs me-1"></i> Local Weather Loaded';
                        setTimeout(() => {
                            btn.innerHTML = originalText;
                            btn.disabled = false;
                        }, 5000);
                    }, function (error) {
                        // Fallback to IP geolocation
                        $('.weather-city-btn').removeClass('active');
                        loadWeather();
                        btn.innerHTML = '<i class="fa-solid fa-circle-check me-1"></i> IP Location Loaded';
                        setTimeout(() => {
                            btn.innerHTML = originalText;
                            btn.disabled = false;
                        }, 5000);
                    });
                } else {
                    btn.innerHTML = 'Not Supported';
                }
            });
            
            // Initial default load (Auto-detect by client IP)
            loadWeather();
        });
    </script>
    <!-- End Weather Section -->
    --}}
    
    <!-- Start Addiction Section -->
    <!-- End Addiction Section -->


    
    <!-- Start Best Film Studios & Latest Video Section-->
    <section class="film-section">
        <div class="container gap-3 full-screen">
            <!-- Row 1 -->
            <!--<div class="row align-items-center mb-5 sec-five-in">-->
            <!--    <div class="col-md-6 mb-4 mb-md-0 sec-five-in-img-left full-screen">-->
            <!--        <img src="/frontend/assets/images/cms_1-1.jpg" alt="Best Film Studios" class="film-img">-->
            <!--    </div>-->
            <!--    <div class="col-md-6">-->
            <!--        <h2 class="mb-3">Best Film Studios</h2>-->
            <!--        <p>Contrary to popular belief, Lorem Ipsum is not simply random text.<br>-->
            <!--            It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.-->
            <!--            Richard McClintoc-->
            <!--        </p>-->
            <!--        <button class="film-btn mt-3">Read More</button>-->
            <!--    </div>-->
            <!--</div>-->
            <!-- Row 2 -->
            <!--<div class="row align-items-center flex-md-row-reverse">-->
            <!--    <div class="col-md-6 mb-4 mb-md-0 sec-five-in-img-right full-screen">-->
            <!--        <img src="/frontend/assets/images/cms_2-1.jpg" alt="Film Awards" class="film-img">-->
            <!--    </div>-->
            <!--    <div class="col-md-6">-->
            <!--        <h2 class="mb-3">Film Awards 2023</h2>-->
            <!--        <p>Contrary to popular belief, Lorem Ipsum is not simply random text.<br>-->
            <!--            It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.-->
            <!--            Richard McClintoc-->
            <!--        </p>-->
            <!--        <button class="film-btn mt-3">Read More</button>-->
            <!--    </div>-->
            <!--</div>-->
            <!-- Row 1 - Latest Videos from Video News Feed -->
            <div class="row align-items-center flex-md-row-reverse mb-3 mb-md-5">
                <!-- Right Side: Title, Description & Button -->
                <div class="col-md-6 mb-3 mb-md-5">
                    @if (!empty($NativeLandPod) && isset($NativeLandPod[0]))
                        @php $firstVideo = $NativeLandPod[0]; @endphp

                        <h2 class="mb-3">Native Land Pod</h2>

                        <h5 class="mb-2">{{ $firstVideo['title'] ?? 'Latest Video' }}</h5>

                        <p class="text-muted small mb-3">
                            {{ \Carbon\Carbon::parse($firstVideo['date_published'] ?? now())->diffForHumans() }}
                        </p>

                        <p class="mb-4">
                            {!! Str::limit(strip_tags($firstVideo['description_text'] ?? ($firstVideo['description'] ?? '')), 220, '...') !!}
                        </p>

                        <a href="{{ $firstVideo['link'] ?? ($firstVideo['url'] ?? '#') }}" target="_blank"
                            class="film-btn">
                            Watch Full Video
                        </a>
                    @else
                        <!-- Fallback Content -->
                        <h2 class="mb-3" id="yt-film-channel">Native Land Pod</h2>
                        <h5 class="mb-2" id="yt-film-title">Loading...</h5>
                        <p class="mb-4" id="yt-film-desc"></p>
                        <a href="#" id="yt-film-link" target="_blank" class="film-btn" style="display: none;">
                            Watch Full Video
                        </a>
                    @endif
                </div>
                <!-- Left Side: Video Embed -->
                <div class="col-md-6 mb-2 mb-md-0 sec-five-in-img-right full-screen">
                    @if (!empty($NativeLandPod) && isset($NativeLandPod[0]))
                        @php
                            $firstVideo = $NativeLandPod[0];
                            $youtubeId = null;
                            $url = $firstVideo['link'] ?? ($firstVideo['url'] ?? '');

                            // YouTube ID extract karo
                            if (
                                preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $m) ||
                                preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $m) ||
                                preg_match('/youtube\.com\/embed\/([a-zA-Z0-9_-]+)/', $url, $m)
                            ) {
                                $youtubeId = $m[1];
                            }
                        @endphp
                        @if ($youtubeId)
                            <iframe width="100%" height="315"
                                src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                title="{{ $firstVideo['title'] ?? '' }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen>
                            </iframe>
                        @else
                            <!-- Agar YouTube na ho to thumbnail -->
                            <img src="{{ $firstVideo['thumbnail'] ?? '/frontend/assets/images/cms_2-1.jpg' }}"
                                class="film-img" alt="Video">
                        @endif
                    @else
                        <!-- YouTube Latest Video Widget (no API key needed) -->
                        <div id="yt-film-widget" style="width:100%;">
                            <div id="yt-film-player"></div>
                        </div>
                        <script src="https://www.youtube.com/iframe_api"></script>
                        <script>
                            (function() {
                                var CHANNEL_ID = 'UCPwDm9ID1xdHlHnkYDizCCA';
                                var rss = 'https://www.youtube.com/feeds/videos.xml?channel_id=' + CHANNEL_ID;
                                var apiUrl = 'https://api.rss2json.com/v1/api.json?rss_url=' + encodeURIComponent(rss);
                                var filmVideoId = '', filmTitle = '', filmThumb = '', filmDesc = '', filmChannel = '';
                                var filmPlayer = null;

                                fetch(apiUrl).then(function(r){ return r.json(); }).then(function(data) {
                                    if (!data.items || !data.items.length) return;
                                    var latest  = data.items[0];
                                    if (latest.guid && latest.guid.indexOf('yt:video:') !== -1) {
                                        filmVideoId = latest.guid.replace('yt:video:', '');
                                    } else if (latest.link && latest.link.indexOf('/shorts/') !== -1) {
                                        filmVideoId = latest.link.split('/shorts/')[1].split('?')[0];
                                    } else if (latest.link && latest.link.indexOf('v=') !== -1) {
                                        filmVideoId = latest.link.split('v=')[1].split('&')[0];
                                    }
                                    filmTitle   = latest.title;
                                    filmThumb   = latest.thumbnail || ('https://img.youtube.com/vi/' + filmVideoId + '/hqdefault.jpg');
                                    filmChannel = data.feed && data.feed.title ? data.feed.title : 'Kieth Ponders';
                                    // Strip HTML tags from description and trim to ~200 chars
                                    var rawDesc = latest.description || latest.content || '';
                                    var tmp = document.createElement('div');
                                    tmp.innerHTML = rawDesc;
                                    filmDesc = (tmp.textContent || tmp.innerText || '').replace(/\s+/g, ' ').trim().substring(0, 200);
                                    if ((tmp.textContent || tmp.innerText || '').length > 200) filmDesc += '...';

                                    var ytChannelEl = document.getElementById('yt-film-channel');
                                    var ytTitleEl = document.getElementById('yt-film-title');
                                    var ytDescEl = document.getElementById('yt-film-desc');
                                    var ytLinkEl = document.getElementById('yt-film-link');

                                    if (ytChannelEl) ytChannelEl.textContent = filmChannel;
                                    if (ytTitleEl) ytTitleEl.textContent = filmTitle;
                                    if (ytDescEl) ytDescEl.textContent = filmDesc;
                                    if (ytLinkEl) {
                                        ytLinkEl.href = latest.link;
                                        ytLinkEl.style.display = 'inline-block';
                                    }

                                    if (window.YT && window.YT.Player) { createFilmPlayer(); }
                                }).catch(function(){});

                                var oldCallback = window.onYouTubeIframeAPIReady;
                                window.onYouTubeIframeAPIReady = function() {
                                    if (typeof oldCallback === 'function') {
                                        try { oldCallback(); } catch(e){}
                                    }
                                    if (filmVideoId) createFilmPlayer();
                                };

                                function createFilmPlayer() {
                                    filmPlayer = new YT.Player('yt-film-player', {
                                        width: '100%', height: '315',
                                        videoId: filmVideoId,
                                        playerVars: { rel: 0 },
                                        events: {
                                            onError: function(e) {
                                                if ([101,150,153].indexOf(e.data) !== -1) showFilmFallback();
                                            }
                                        }
                                    });
                                }

                                function showFilmFallback() {
                                    document.getElementById('yt-film-player').outerHTML =
                                        '<a href="https://www.youtube.com/watch?v=' + filmVideoId + '" target="_blank" rel="noopener" style="display:block;position:relative;line-height:0;border-radius:8px;overflow:hidden;">' +
                                        '<img src="' + filmThumb + '" alt="' + filmTitle + '" style="width:100%;border-radius:8px;" onerror="this.src=\'https://img.youtube.com/vi/' + filmVideoId + '/hqdefault.jpg\'">' +
                                        '<span style="position:absolute;inset:0;background:rgba(0,0,0,0.25);"></span>' +
                                        '<span style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:64px;height:64px;background:rgba(255,0,0,0.9);border-radius:50%;display:flex;align-items:center;justify-content:center;">' +
                                        '<svg width="26" height="26" viewBox="0 0 24 24" fill="white"><polygon points="9,6 20,12 9,18"/></svg></span></a>';
                                }
                            })();
                        </script>
                    @endif
                </div>
            </div>

        </div>
    </section>
    <!-- End Best Film Studios & Latest Video Section-->

    <!-- Start Featured Section -->
    <div class="container about-news py-2 py-lg-4">
        <div class="row">
            <!-- Main Article -->
            <div class="col-lg-4 none d-none d-lg-block">
                <div class="sticky-sidebar">
                    <h4 class="pt-5">Featured</h4>
                    @if (!empty($politics) && count($politics) > 0)
                        @foreach (array_slice($politics, 0, 1) as $politics_item)
                            <a href="{{ $politics_item['link'] ?? ($politics_item['url'] ?? '#') }}" target="_blank" class="text-decoration-none text-white">
                                <div class="featured-article">
                                    <img src="{{ $politics_item['thumbnail'] ?? $politics_item['image'] ?? $politics_item['urlToImage'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                        onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                        referrerpolicy="no-referrer"
                                        alt="{{ $politics_item['title'] ?? 'Politics News' }}">
                                    <div>
                                        <h6>{{ $politics_item['title'] ?? '' }}</h6>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p class="text-white">No Politics content available.</p>
                    @endif
                    @foreach (array_slice($sports, 0, 1) as $sports_items)
                        <a href="{{ $sports_items['link'] ?? ($sports_items['url'] ?? '#') }}" target="_blank" class="text-decoration-none text-white">
                            <div class="featured-article">
                                <img src="{{ $sports_items['thumbnail'] ?? $sports_items['image'] ?? $sports_items['urlToImage'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                    onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                    referrerpolicy="no-referrer"
                                    alt="{{ $sports_items['title'] ?? 'Sports News' }}">
                                <div>
                                    <h6>{{ $sports_items['title'] ?? '' }}</h6>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    @foreach (array_slice($education, 0, 1) as $education_items)
                        <a href="{{ $education_items['link'] ?? ($education_items['url'] ?? '#') }}" target="_blank" class="text-decoration-none text-white">
                            <div class="featured-article">
                                <img src="{{ $education_items['thumbnail'] ?? $education_items['image'] ?? $education_items['urlToImage'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                    onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                    referrerpolicy="no-referrer"
                                    alt="{{ $education_items['title'] ?? 'Education News' }}">
                                <div>
                                    <h6>{{ $education_items['title'] ?? '' }}</h6>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    @if (!empty($entertainment) && count($entertainment) > 0)
                        @foreach (array_slice($entertainment, 0, 1) as $entertainment_items)
                            <a href="{{ $entertainment_items['link'] ?? ($entertainment_items['url'] ?? '#') }}" target="_blank" class="text-decoration-none text-white">
                                <div class="featured-article">
                                    <img src="{{ $entertainment_items['thumbnail'] ?? $entertainment_items['image'] ?? $entertainment_items['urlToImage'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                        onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                        referrerpolicy="no-referrer"
                                        alt="{{ $entertainment_items['title'] ?? 'Entertainment News' }}">
                                    <div>
                                        <h6>{{ $entertainment_items['title'] ?? '' }}</h6>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p class="text-white">No Entertainment content available.</p>
                    @endif
                    @foreach (array_slice($farming, 0, 1) as $farming_items)
                        <a href="{{ $farming_items['link'] ?? ($farming_items['url'] ?? '#') }}" target="_blank" class="text-decoration-none text-white">
                            <div class="featured-article">
                                <img src="{{ $farming_items['thumbnail'] ?? $farming_items['image'] ?? $farming_items['urlToImage'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                    onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                    referrerpolicy="no-referrer"
                                    alt="{{ $farming_items['title'] ?? 'Farming News' }}">
                                <div>
                                    <h6>{{ $farming_items['title'] ?? '' }}</h6>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    @foreach (array_slice($crimereport, 0, 1) as $crimereport_items)
                        <a href="{{ $crimereport_items['link'] ?? ($crimereport_items['url'] ?? '#') }}" target="_blank" class="text-decoration-none text-white">
                            <div class="featured-article">
                                <img src="{{ $crimereport_items['thumbnail'] ?? $crimereport_items['image'] ?? $crimereport_items['urlToImage'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                    onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                    referrerpolicy="no-referrer"
                                    alt="{{ $crimereport_items['title'] ?? 'Crime Report' }}">
                                <div>
                                    <h6>{{ $crimereport_items['title'] ?? '' }}</h6>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    @foreach (array_slice($woman, 0, 1) as $georgia_items)
                        <a href="{{ $georgia_items['link'] ?? ($georgia_items['url'] ?? '#') }}" target="_blank" class="text-decoration-none text-white">
                            <div class="featured-article">
                                <img src="{{ $georgia_items['thumbnail'] ?? $georgia_items['image'] ?? $georgia_items['urlToImage'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                    onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                    referrerpolicy="no-referrer"
                                    alt="{{ $georgia_items['title'] ?? 'Women News' }}">
                                <div>
                                    <h6>{{ $georgia_items['title'] ?? '' }}</h6>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    <!--<h2>Working</h2>-->
                </div>
            </div>
            <div class="col-lg-8">
                <!-- Related Articles -->
                <div class="related-articles">
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="fw-bold">Politics</h4>
                            <!--<a href="/politics" class="see-more-link">See More</a>-->
                        </div>

                        <div class="swiper lastSwiper sports-politics-swiper">
                            <div class="swiper-wrapper">
                                @foreach (array_slice($politics, 0, 10) as $item)
                                    <div class="swiper-slide">
                                        <a href="{{ $item['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-dark d-block">
                                        <div class="related-article-card card h-100 shadow-sm full-screen">
                                            <img src="{{ $item['thumbnail'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                                onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                                alt="{{ Str::limit($item['title'] ?? 'Politics News', 60) }}"
                                                class="card-img-top w-100" loading="lazy" style="height: 200px; object-fit: cover;">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $item['title'] }}</h6>
                                                <p class="card-text small text-muted">
                                                    {{ Str::limit($item['description_text'] ?? '', 100) }}
                                                </p>
                                              <div class="d-flex justify-content-between align-items-center mt-2">
                                                <small class="text-primary fw-semibold">
                                                    By:
                                                    <strong>
                                                        {{  $item['author'] ?? ( $item['dc_creator'] ?? 'Unknown Source') }}
                                                    </strong>
                                                </small>

                                                <small class="text-muted">
                                                    {{ \Carbon\Carbon::parse( $item['date_published'] ?? now())->format('M d, Y') }}
                                                </small>
                                            </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold">News</h4>
                        </div>
                    
                        @foreach (array_slice($news, 0, 10) as $item)
                            <div class="col-md-4 mb-4 full-screen">
                                <a href="{{ $item['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-dark">
                                    <div class="related-article-card card h-100 shadow-sm full-screen">
                                        <img src="{{ $item['thumbnail'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                             onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                             alt="{{ Str::limit($item['title'] ?? 'Politics News', 60) }}"
                                             class="card-img-top" loading="lazy" style="height: 200px; object-fit: cover;">
                                        
                                        <div class="card-body">
                                            <h6 class="card-title fw-bold">{{ $item['title'] }}</h6>
                                            <p class="card-text small text-muted">
                                                {{ Str::limit($item['description_text'] ?? '', 100) }}
                                            </p>
                                            
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <small class="text-primary fw-semibold">
                                                    By: <strong>{{ $item['author'] ?? ($item['dc_creator'] ?? 'Unknown Source') }}</strong>
                                                </small>
                    
                                                <small class="text-muted">
                                                    {{ \Carbon\Carbon::parse($item['date_published'] ?? now())->format('M d, Y') }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{--
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Finance</h4>
                            <!--<a href="/finance" class="see-more-link">See More</a>-->
                        </div>
                        @foreach (array_slice($finance, 0, 10) as $item)
                            <div class="col-md-4 full-screen">
                                <a href="{{ $item['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-dark">
                                <div class="related-article-card full-screen">
                                    <img src="{{ $item['thumbnail'] ?? '' }}"
                                        onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                        alt="News Image">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">{{ $item['title'] }}</h6>
                                    <p class="card-text small text-muted">
                                        {{ Str::limit($item['description_text'] ?? '', 100) }}
                                    </p>
                                  <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-primary fw-semibold">
                                            By:
                                            <strong>
                                                {{  $item['author'] ?? ( $item['dc_creator'] ?? 'Unknown Source') }}
                                            </strong>
                                        </small>

                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse( $item['date_published'] ?? now())->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    --}}
                    {{--
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 style="color: #FFBF00;">
                                Spirituality
                            </h4>
                            <!--<a href="/spirituality" class="see-more-link">See More</a>-->
                        </div>
                        @foreach ( $spirituality as $item)
                            <div class="col-md-4 full-screen">
                                <a href="{{ $item['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-dark">
                                <div class="related-article-card full-screen">
                                    <img src="{{ $item['thumbnail'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                        onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png'"
                                        alt="News Image">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">{{ $item['title'] }}</h6>
                                    <p class="card-text small text-muted">
                                        {{ Str::limit($item['description_text'] ?? '', 100) }}
                                    </p>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-primary fw-semibold">
                                            By:
                                            <strong>
                                                {{  $item['author'] ?? ( $item['dc_creator'] ?? 'Unknown Source') }}
                                            </strong>
                                        </small>

                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse( $item['date_published'] ?? now())->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    --}}
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 style="color: #FFBF00;">
                                World News
                            </h4>
                            <!--<a href="/spirituality" class="see-more-link">See More</a>-->
                        </div>
                        @foreach (array_slice($World_news, 0, 10) as $item)
                            <div class="col-md-4 full-screen">
                                <a href="{{ $item['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-dark">
                                <div class="related-article-card full-screen">
                                    <img src="{{ $item['thumbnail'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                        onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png'"
                                        alt="News Image">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">{{ $item['title'] }}</h6>
                                    <p class="card-text small text-muted">
                                        {{ Str::limit($item['description_text'] ?? '', 100) }}
                                    </p>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-primary fw-semibold">
                                            By:
                                            <strong>
                                                {{  $item['author'] ?? ( $item['dc_creator'] ?? 'Unknown Source') }}
                                            </strong>
                                        </small>

                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse( $item['date_published'] ?? now())->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{--
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Education</h4>
                            <!--<a href="/education" class="see-more-link">See More</a>-->
                        </div>

                        @foreach (array_slice($education, 0, 10) as $item)
                            <div class="col-md-4 full-screen">
                                <a href="{{ $item['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-dark">
                                <div class="related-article-card full-screen">
                                    <img src="{{ $item['thumbnail'] ?? '' }}"
                                        onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png'"
                                        alt="News Image">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">{{ $item['title'] }}</h6>
                                    <p class="card-text small text-muted">
                                        {{ Str::limit($item['description_text'] ?? '', 100) }}
                                    </p>
                               <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-primary fw-semibold">
                                            By:
                                            <strong>
                                                {{  $item['author'] ?? ( $item['dc_creator'] ?? 'Unknown Source') }}
                                            </strong>
                                        </small>

                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse( $item['date_published'] ?? now())->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach


                    </div>
                    --}}
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Entertainment</h4>
                            <!--<a href="/entertainment" class="see-more-link">See More</a>-->
                        </div>
                        @foreach (array_slice($entertainment, 0, 10) as $item)
                            <div class="col-md-4 full-screen">
                                <a href="{{ $item['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-dark">
                                <div class="related-article-card full-screen">
                                    <img src="{{ $item['thumbnail'] ?? '' }}"
                                        onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png'"
                                        alt="News Image">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">{{ $item['title'] }}</h6>
                                    <p class="card-text small text-muted">
                                        {{ Str::limit($item['description_text'] ?? '', 100) }}
                                    </p>
                                 <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-primary fw-semibold">
                                            By:
                                            <strong>
                                                {{  $item['author'] ?? ( $item['dc_creator'] ?? 'Unknown Source') }}
                                            </strong>
                                        </small>

                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse( $item['date_published'] ?? now())->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Sports</h4>
                            <!--<a href="/sports" class="see-more-link">See More</a>-->
                        </div>
                        <div class="swiper lastSwiper sports-politics-swiper">
                            <div class="swiper-wrapper">
                                @foreach (array_slice($sports, 0, 10) as $item)
                                    <div class="swiper-slide">
                                        <a href="{{ $item['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-dark d-block">
                                        <div class="related-article-card card h-100 shadow-sm full-screen">
                                            <img src="{{ $item['thumbnail'] ?? '' }}"
                                                onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png'"
                                                alt="News Image" class="card-img-top w-100" loading="lazy" style="height: 200px; object-fit: cover;">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $item['title'] }}</h6>
                                                <p class="card-text small text-muted">
                                                    {{ Str::limit($item['description_text'] ?? '', 100) }}
                                                </p>
                                           <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <small class="text-primary fw-semibold">
                                                        By:
                                                        <strong>
                                                            {{  $item['author'] ?? ( $item['dc_creator'] ?? 'Unknown Source') }}
                                                        </strong>
                                                    </small>

                                                    <small class="text-muted">
                                                        {{ \Carbon\Carbon::parse( $item['date_published'] ?? now())->format('M d, Y') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{--
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-primary">World Poverty</h4>
                            <!--<a href="worldpoverty" class="see-more-link">See More</a>-->
                        </div>
                        @foreach (array_slice($worldpoverty, 0, 10) as $item)
                            <div class="col-md-4 full-screen">
                                <a href="{{ $item['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-dark">
                                <div class="related-article-card full-screen">
                                    <img src="{{ $item['image'] ?? '' }}"
                                        onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png'"
                                        alt="News Image">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">{{ $item['title'] }}</h6>
                                    <p class="card-text small text-muted">
                                        {{ Str::limit(html_entity_decode($item['description_text'] ?? ''), 100) }}
                                    </p>
                                  <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-primary fw-semibold">
                                            By:
                                            <strong>
                                                {{  $item['author'] ?? ( $item['dc_creator'] ?? 'Unknown Source') }}
                                            </strong>
                                        </small>

                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse( $item['date_published'] ?? now())->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                    --}}
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-success">Environment</h4>
                            <!--<a href="/farming" class="see-more-link">See More</a>-->
                        </div>
                        @foreach (array_slice($farming, 0, 10) as $item)
                            <div class="col-md-4 full-screen">
                                <a href="{{ $item['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-dark">
                                <div class="related-article-card full-screen">
                                    <img src="{{ $item['thumbnail'] ?? '' }}"
                                        onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png'"
                                        alt="News Image">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">{{ $item['title'] }}</h6>
                                    <p class="card-text small text-muted">
                                        {{ Str::limit($item['description_text'] ?? '', 100) }}
                                    </p>
                                  <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-primary fw-semibold">
                                            By:
                                            <strong>
                                                {{  $item['author'] ?? ( $item['dc_creator'] ?? 'Unknown Source') }}
                                            </strong>
                                        </small>

                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse( $item['date_published'] ?? now())->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{--
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-danger">Gun Violence</h4>
                            <!--<a href="/crimereport" class="see-more-link">See More</a>-->
                        </div>
                        @if (!empty($crimereport) && count($crimereport) > 0)
                            @foreach (array_slice($crimereport, 0, 10) as $item)
                                <div class="col-md-4 full-screen">
                                    <a href="{{ $item['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-dark">
                                    <div class="related-article-card full-screen">
                                        <img src="{{ $item['thumbnail'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                            onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png'"
                                            alt="{{ $item['title'] }}">
                                    </div>

                                    <div class="card-body">
                                        <h6 class="card-title">{{ $item['title'] }}</h6>

                                        <p class="card-text small text-muted">
                                            {{ Str::limit($item['description_text'] ?? '', 100) }}
                                        </p>

                                         <div class="d-flex justify-content-between align-items-center mt-2">
                                            <small class="text-primary fw-semibold">
                                                By:
                                                <strong>
                                                    {{  $item['author'] ?? ( $item['dc_creator'] ?? 'Unknown Source') }}
                                                </strong>
                                            </small>
    
                                            <small class="text-muted">
                                                {{ \Carbon\Carbon::parse( $item['date_published'] ?? now())->format('M d, Y') }}
                                            </small>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p class="text-white">No Crime Report content available.</p>
                        @endif
                    </div>
                    --}}
                    {{--
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="atlanta-color">Atlanta</h4>
                            <!--<a href="crypto" class="see-more-link">See More</a>-->
                        </div>
                        @foreach (array_slice($atlanta, 0, 10) as $item)
                            <div class="col-md-4 full-screen">
                                <div class="related-article-card full-screen">
                                    <img src="{{ $item['thumbnail'] ?? '' }}"
                                        onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png'"
                                        alt="News Image">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">{{ $item['title'] }}</h6>
                                    <p class="card-text small text-muted">
                                        {{ Str::limit($item['description_text'] ?? '', 100) }}
                                    </p>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-primary fw-semibold">
                                            By:
                                            <strong>
                                                {{  $item['author'] ?? ( $item['dc_creator'] ?? 'Unknown Source') }}
                                            </strong>
                                        </small>

                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse( $item['date_published'] ?? now())->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    --}}
                </div>
            </div>
            <!-- Featured Sidebar -->
        </div>
    </div>
    <!-- End Featured Section -->

    <!-- Start Podcast section -->
    <div class="section-related-post">
        <div class="container py-5">
            <div class="row align-items-center g-5">
                <!-- Left Image -->
                <div class="col-lg-6 full-screen">
                    <img src="/frontend/assets/images/yaKHjHARGN0KKefshKMiii72ag (1).jpg" class="img-fluid rounded"
                        alt="Podcast Host">
                </div>
                <!-- Right Content -->
                <div class="col-lg-6">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-danger mb-0 fw-bold">Podcast</h6>
                        <a href="#" class="text-decoration-none small">view all →</a>
                    </div>
                    <p class="mb-4">Dive into our Top 5 selection of the best podcasts, featuring everything from latest
                        tech to trending tunes. Press the play button now!</p>
                        
                    <!-- Podcast Item 1 -->
                    <div class="d-flex mb-4">
                        <img src="/frontend/assets/images/vbTbiPvjA8FnWKb3wM1cUh3Xo.jpg"
                            class="flex-shrink-0 me-3 rounded" width="80" height="80" alt="Tech Tomorrow">
                        <div>
                            <h6 class="mb-1 text-danger fw-semibold">Tech Tomorrow</h6>
                            <p class="mb-0  small">Stay ahead of the curve with the latest advancements in technology. From
                                AI breakthroughs to the future...</p>
                        </div>
                    </div>
                    <!-- Podcast Item 2 -->
                    <div class="d-flex mb-4">
                        <img src="/frontend/assets/images/iHOlyDcj050n5XFIPAyaWShJA.jpg"
                            class="flex-shrink-0 me-3 rounded" width="80" height="80" alt="Culture Connect">
                        <div>
                            <h6 class="mb-1 text-danger fw-semibold">Culture Connect</h6>
                            <p class="mb-0  small">Explore the rich tapestry of global cultures in this podcast that takes
                                you on a journey across continents...</p>
                        </div>
                    </div>
                    <!-- Podcast Item 3 -->
                    <div class="d-flex">
                        <img src="/frontend/assets/images/uJjmygpXuubbfyWqUR9JVVv0lZA.jpg"
                            class="flex-shrink-0 me-3 rounded" width="100" height="100" alt="The Green Voices">
                        <div>
                            <h6 class="mb-1 text-danger fw-semibold">The Green Voices</h6>
                            <p class="mb-0 small">Tune into the most pressing environmental issues of our time. From
                                climate change to conservation...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Podcast section -->


    <!-- Start What we Do section -->
    <section class="what-we-do text-center py-4">
        <div class="container">
            <div class="section-subtitle mb-1">Now in Cinema</div>
            <h2 class="section-heading mb-5 text-success">What we Do</h2>
            <div class="row g-4 justify-content-center">
                <!-- Card 1: Shawn Ryan Show -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-2">
                    <div class="shorts-card h-100 p-0 bg-transparent text-start">
                        @if(!empty($shawnRyanShowVideo) && !empty($shawnRyanShowVideo['video_id']))
                            <div class="shorts-frame-wrapper mb-2" style="position: relative; width: 100%; aspect-ratio: 9 / 16; border-radius: 12px; overflow: hidden; background: #000;">
                                <iframe width="100%" height="100%"
                                    src="https://www.youtube.com/embed/{{ $shawnRyanShowVideo['video_id'] }}?rel=0"
                                    title="{{ $shawnRyanShowVideo['title'] ?? 'Shawn Ryan Show' }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin"
                                    allowfullscreen
                                    style="width: 100%; height: 100%; border: none; border-radius: 12px;">
                                </iframe>
                            </div>
                            <div class="px-1">
                                <a href="{{ $shawnRyanShowVideo['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-white">
                                    <div class="item-title fw-bold text-white" style="font-size: 0.92rem; line-height: 1.35; max-height: 2.7em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $shawnRyanShowVideo['title'] ?? 'Shawn Ryan Show' }}</div>
                                </a>
                                <div class="item-genre text-danger small mt-1 fw-semibold"><i class="fab fa-youtube me-1"></i> Shawn Ryan Show</div>
                            </div>
                        @elseif(!empty($shawnRyanShowVideo) && !empty($shawnRyanShowVideo['thumbnail']))
                            <a href="{{ $shawnRyanShowVideo['link'] ?? '#' }}" target="_blank">
                                <img src="{{ $shawnRyanShowVideo['thumbnail'] }}" class="what-we-do-img" alt="Shawn Ryan Show" style="border-radius: 12px; aspect-ratio: 9/16; width: 100%; object-fit: cover;">
                            </a>
                            <div class="px-1 mt-2">
                                <div class="item-title fw-bold text-white" style="font-size: 0.92rem;">{{ Str::limit($shawnRyanShowVideo['title'] ?? 'Shawn Ryan Show', 50) }}</div>
                                <div class="item-genre text-danger small fw-semibold">Shawn Ryan Show</div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Card 2: The Don Lemon Show -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-2">
                    <div class="shorts-card h-100 p-0 bg-transparent text-start">
                        @if(!empty($donLemonShowVideo) && !empty($donLemonShowVideo['video_id']))
                            <div class="shorts-frame-wrapper mb-2" style="position: relative; width: 100%; aspect-ratio: 9 / 16; border-radius: 12px; overflow: hidden; background: #000;">
                                <iframe width="100%" height="100%"
                                    src="https://www.youtube.com/embed/{{ $donLemonShowVideo['video_id'] }}?rel=0"
                                    title="{{ $donLemonShowVideo['title'] ?? 'The Don Lemon Show' }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin"
                                    allowfullscreen
                                    style="width: 100%; height: 100%; border: none; border-radius: 12px;">
                                </iframe>
                            </div>
                            <div class="px-1">
                                <a href="{{ $donLemonShowVideo['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-white">
                                    <div class="item-title fw-bold text-white" style="font-size: 0.92rem; line-height: 1.35; max-height: 2.7em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $donLemonShowVideo['title'] ?? 'The Don Lemon Show' }}</div>
                                </a>
                                <div class="item-genre text-danger small mt-1 fw-semibold"><i class="fab fa-youtube me-1"></i> The Don Lemon Show</div>
                            </div>
                        @elseif(!empty($donLemonShowVideo) && !empty($donLemonShowVideo['thumbnail']))
                            <a href="{{ $donLemonShowVideo['link'] ?? '#' }}" target="_blank">
                                <img src="{{ $donLemonShowVideo['thumbnail'] }}" class="what-we-do-img" alt="The Don Lemon Show" style="border-radius: 12px; aspect-ratio: 9/16; width: 100%; object-fit: cover;">
                            </a>
                            <div class="px-1 mt-2">
                                <div class="item-title fw-bold text-white" style="font-size: 0.92rem;">{{ Str::limit($donLemonShowVideo['title'] ?? 'The Don Lemon Show', 50) }}</div>
                                <div class="item-genre text-danger small fw-semibold">The Don Lemon Show</div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Card 3: The Pivot Podcast -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-2">
                    <div class="shorts-card h-100 p-0 bg-transparent text-start">
                        @if(!empty($pivotPodcastVideo) && !empty($pivotPodcastVideo['video_id']))
                            <div class="shorts-frame-wrapper mb-2" style="position: relative; width: 100%; aspect-ratio: 9 / 16; border-radius: 12px; overflow: hidden; background: #000;">
                                <iframe width="100%" height="100%"
                                    src="https://www.youtube.com/embed/{{ $pivotPodcastVideo['video_id'] }}?rel=0"
                                    title="{{ $pivotPodcastVideo['title'] ?? 'The Pivot Podcast' }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin"
                                    allowfullscreen
                                    style="width: 100%; height: 100%; border: none; border-radius: 12px;">
                                </iframe>
                            </div>
                            <div class="px-1">
                                <a href="{{ $pivotPodcastVideo['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-white">
                                    <div class="item-title fw-bold text-white" style="font-size: 0.92rem; line-height: 1.35; max-height: 2.7em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $pivotPodcastVideo['title'] ?? 'The Pivot Podcast' }}</div>
                                </a>
                                <div class="item-genre text-danger small mt-1 fw-semibold"><i class="fab fa-youtube me-1"></i> The Pivot Podcast</div>
                            </div>
                        @elseif(!empty($pivotPodcastVideo) && !empty($pivotPodcastVideo['thumbnail']))
                            <a href="{{ $pivotPodcastVideo['link'] ?? '#' }}" target="_blank">
                                <img src="{{ $pivotPodcastVideo['thumbnail'] }}" class="what-we-do-img" alt="The Pivot Podcast" style="border-radius: 12px; aspect-ratio: 9/16; width: 100%; object-fit: cover;">
                            </a>
                            <div class="px-1 mt-2">
                                <div class="item-title fw-bold text-white" style="font-size: 0.92rem;">{{ Str::limit($pivotPodcastVideo['title'] ?? 'The Pivot Podcast', 50) }}</div>
                                <div class="item-genre text-danger small fw-semibold">The Pivot Podcast</div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Card 4: Fallon Tonight -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-2">
                    <div class="shorts-card h-100 p-0 bg-transparent text-start">
                        @if(!empty($fallonTonightVideo) && !empty($fallonTonightVideo['video_id']))
                            <div class="shorts-frame-wrapper mb-2" style="position: relative; width: 100%; aspect-ratio: 9 / 16; border-radius: 12px; overflow: hidden; background: #000;">
                                <iframe width="100%" height="100%"
                                    src="https://www.youtube.com/embed/{{ $fallonTonightVideo['video_id'] }}?rel=0"
                                    title="{{ $fallonTonightVideo['title'] ?? 'Fallon Tonight' }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin"
                                    allowfullscreen
                                    style="width: 100%; height: 100%; border: none; border-radius: 12px;">
                                </iframe>
                            </div>
                            <div class="px-1">
                                <a href="{{ $fallonTonightVideo['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-white">
                                    <div class="item-title fw-bold text-white" style="font-size: 0.92rem; line-height: 1.35; max-height: 2.7em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $fallonTonightVideo['title'] ?? 'Fallon Tonight' }}</div>
                                </a>
                                <div class="item-genre text-danger small mt-1 fw-semibold"><i class="fab fa-youtube me-1"></i> Fallon Tonight</div>
                            </div>
                        @elseif(!empty($fallonTonightVideo) && !empty($fallonTonightVideo['thumbnail']))
                            <a href="{{ $fallonTonightVideo['link'] ?? '#' }}" target="_blank">
                                <img src="{{ $fallonTonightVideo['thumbnail'] }}" class="what-we-do-img" alt="Fallon Tonight" style="border-radius: 12px; aspect-ratio: 9/16; width: 100%; object-fit: cover;">
                            </a>
                            <div class="px-1 mt-2">
                                <div class="item-title fw-bold text-white" style="font-size: 0.92rem;">{{ Str::limit($fallonTonightVideo['title'] ?? 'Fallon Tonight', 50) }}</div>
                                <div class="item-genre text-danger small fw-semibold">Fallon Tonight</div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Card 5: The DL Hughley Show -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-2">
                    <div class="shorts-card h-100 p-0 bg-transparent text-start">
                        @if(!empty($dlHughleyVideo) && !empty($dlHughleyVideo['video_id']))
                            <div class="shorts-frame-wrapper mb-2" style="position: relative; width: 100%; aspect-ratio: 9 / 16; border-radius: 12px; overflow: hidden; background: #000;">
                                <iframe width="100%" height="100%"
                                    src="https://www.youtube.com/embed/{{ $dlHughleyVideo['video_id'] }}?rel=0"
                                    title="{{ $dlHughleyVideo['title'] ?? 'The DL Hughley Show' }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin"
                                    allowfullscreen
                                    style="width: 100%; height: 100%; border: none; border-radius: 12px;">
                                </iframe>
                            </div>
                            <div class="px-1">
                                <a href="{{ $dlHughleyVideo['link'] ?? '#' }}" target="_blank" class="text-decoration-none text-white">
                                    <div class="item-title fw-bold text-white" style="font-size: 0.92rem; line-height: 1.35; max-height: 2.7em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $dlHughleyVideo['title'] ?? 'The DL Hughley Show' }}</div>
                                </a>
                                <div class="item-genre text-danger small mt-1 fw-semibold"><i class="fab fa-youtube me-1"></i> The DL Hughley Show</div>
                            </div>
                        @elseif(!empty($dlHughleyVideo) && !empty($dlHughleyVideo['thumbnail']))
                            <a href="{{ $dlHughleyVideo['link'] ?? '#' }}" target="_blank">
                                <img src="{{ $dlHughleyVideo['thumbnail'] }}" class="what-we-do-img" alt="The DL Hughley Show" style="border-radius: 12px; aspect-ratio: 9/16; width: 100%; object-fit: cover;">
                            </a>
                            <div class="px-1 mt-2">
                                <div class="item-title fw-bold text-white" style="font-size: 0.92rem;">{{ Str::limit($dlHughleyVideo['title'] ?? 'The DL Hughley Show', 50) }}</div>
                                <div class="item-genre text-danger small fw-semibold">The DL Hughley Show</div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Card 6: Happiness / Retro -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-2">
                    <div class="shorts-card h-100 p-0 bg-transparent text-center">
                        <img src="/frontend/assets/images/book-04-1.jpg" class="what-we-do-img mb-2" alt="Happiness" style="border-radius: 12px; aspect-ratio: 9/16; width: 100%; object-fit: cover;">
                        <div class="item-title fw-bold text-white mt-1" style="font-size: 0.95rem;">HAPPINESS</div>
                        <div class="item-genre text-white-50 small">Retro</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End What we Do section -->

    <!-- Start Fashion Photography Section -->
    <section>
        <div class="container">
            <h4 class="section-title">
                <span class="f-p-color">Fashion Photography</span>
            </h4>
            <div class="row">
                @foreach (array_slice($fashion_photography, 0, 10) as $fashion_photography_items)
                    <div class="col-12 col-lg-4 mb-4">
                        <article class="fashion-card fashion-card--tall">
                            <a href="#" class="fashion-card__link"
                                title="{{ $fashion_photography_items['title'] ?? 'Fashion Photography' }}">

                                <!-- Image -->
                                <img src="{{ $fashion_photography_items['thumbnail'] ?? '' }}"
                                    onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                    class="fashion-card__image" <!-- class add kar di for CSS control -->
                                alt="{{ $fashion_photography_items['title'] ?? 'Fashion Image' }}">
                                <div class="fashion-card__overlay"></div>
                                <span class="fashion-card__category">Fashion</span>
                                <!-- Content (bottom) -->
                                <div class="fashion-card__content">
                                    <h3 class="fashion-card__title">
                                        {{ $fashion_photography_items['title'] ?? 'Untitled' }}
                                    </h3>
                                    <small class="text-muted peopel-section-date">
                                        {{ \Carbon\Carbon::parse($fashion_photography_items['date_published'] ?? now())->format('M d, Y') }}
                                    </small>
                                </div>
                            </a>
                        </article>
                    </div>
                @endforeach
            </div> <!-- row close -->
        </div>
    </section>
    <!-- End Fashion Photography Section -->

    {{--
    <!-- Start Travel & Resorts Section -->
    <section>
        <div class="container">
            <h4 class="section-title">
                <span class="text-warning">Travel & Resorts</span>
            </h4>
            <div class="row">
                @foreach (array_slice($travel, 0, 10) as $travel_items)
                    <div class="col-12 col-lg-4 mb-4">
                        <article class="fashion-card fashion-card--tall">
                            <a href="#" class="fashion-card__link"
                                title="{{ $travel_items['title'] ?? 'Fashion Photography' }}">

                                <!-- Image -->
                                <img src="{{ $travel_items['thumbnail'] ?? '' }}"
                                    onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                    class="fashion-card__image" <!-- class add kar di for CSS control -->
                                alt="{{ $travel_items['title'] ?? 'Fashion Image' }}">
                                <div class="fashion-card__overlay"></div>
                                <!--<span class="fashion-card__category">Fashion</span>-->
                                <!-- Content (bottom) -->
                                <div class="fashion-card__content">
                                    <h3 class="fashion-card__title">
                                        {{ $travel_items['title'] ?? 'Untitled' }}
                                    </h3>
                                    <small class="text-muted peopel-section-date">
                                        {{ \Carbon\Carbon::parse($travel_items['date_published'] ?? now())->format('M d, Y') }}
                                    </small>
                                </div>
                            </a>
                        </article>
                    </div>
                @endforeach
            </div> <!-- row close -->
        </div>
    </section>
    <!-- End Travel & Resorts Section -->
    --}}

    {{--
    <!-- Start People Section -->
    <section class="blog-section">
        <div class="container blog-sec-in">
            <h2 class="section-title">
                <span class="text-primary">People</span>
            </h2>
            <!--<p class="text-white">{{ $custom_items['description'] ?? '' }}</p>-->
            <div class="swiper lastSwiper">
                <div class="swiper-wrapper">
                    @foreach (array_slice($people, 0, 10) as $people_items)
                        <div class="swiper-slide">
                            <div class="blog-card full-screen">
                                <div class="blog-image">
                                    <img src="{{ $people_items['thumbnail'] ?? '' }}"
                                        onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                        alt="News Image">
                                </div>
                                <h3 class="blog-title">{{ $people_items['title'] }}</h3>

                                <p class="card-text small text-muted">
                                    {{ Str::limit($people_items['description_text'] ?? '', 100) }}
                                </p>

                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <small class="text-primary fw-semibold">
                                        By:
                                        <strong>
                                            {{ $people_items['author'] ?? ($people_items['dc_creator'] ?? 'Unknown Source') }}
                                        </strong>
                                    </small>

                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($people_items['date_published'] ?? now())->format('M d, Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End People Section -->
    --}}

    <!-- Start Traffic Fatalities Section -->
    <section class="blog-section">
        <div class="container blog-sec-in">
            <h2 class="section-title">
                <span class="text-info">Traffic Fatalities</span>
            </h2>
            <div class="swiper lastSwiper">
                <div class="swiper-wrapper">
                    @foreach ($sisters as $sisters_items)
                        <div class="swiper-slide">
                            <div class="blog-card full-screen">
                                <div class="blog-image">
                                    <img src="{{ $sisters_items['thumbnail'] ?? '' }}"
                                        onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                        alt="{{ $sisters_items['title'] ?? 'People Image' }}">

                                    <!-- Strong dark gradient overlay (bottom heavy) -->
                                    <div class="blog-overlay"></div>

                                    <!-- Top black bar with category -->
                                    <div class="blog-header">
                                        <span class="blog-category">Women</span>
                                        <div class="blog-underline"></div>
                                    </div>
                                </div>
                                
                                <!-- Bottom content with semi-transparent bg -->
                                <div class="blog-content">
                                    <h3 class="blog-title">
                                        {{ $sisters_items['title'] ?? 'Ut suscipit eros nisl senectus quisque leo' }}
                                    </h3>
                                    <p class="card-text small text-muted">
                                        {{ Str::limit($sisters_items['description_text'] ?? '', 100) }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-primary fw-semibold">
                                            By:
                                            <strong>
                                                {{ $sisters_items['author'] ?? ($sisters_items['dc_creator'] ?? 'Unknown Source') }}
                                            </strong>
                                        </small>
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($sisters_items['date_published'] ?? now())->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                                <!--<a href="{{ $people_items['url'] ?? '#' }}" class="stretched-link" aria-label="Read more"></a>-->
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Swiper controls -->
                <!--<div class="swiper-button-prev"></div>-->
                <!--<div class="swiper-button-next"></div>-->
                <!--<div class="swiper-pagination"></div>-->
            </div>
        </div>
    </section>
    <!-- End Traffic Fatalities Section -->

    
    <!-- Start Traffic News Section -->
    <section class="blog-section">
        <div class="container blog-sec-in">
            <!--<div class="section-subtitle">OUR BLOG</div>-->
            <h2 class="section-title">
                <span class="spotify">Traffic News</span>
                <!--<span class="spotify">Spotify</span>-->
                <!--<span class="instagram">Instagram</span>-->
                <!--<span class="tiktok">TikTok</span>-->
                <!--<span class="twitter">Twitter (X)</span>-->
                <!--<span class="youtube">YouTube</span>-->
            </h2>
            <p class="text-white">The leading cause of death for 15-34 years olds in USA is traffic fatalities</p>
            <div class="swiper lastSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog-card full-screen">
                            <div class="blog-image">
                                <img src="/frontend/assets/images/blog-img-01.jpg" alt="Blog 1">
                                <span class="blog-date">05.07.2024</span>
                            </div>
                            <h3 class="blog-title">LIVING IN NEW YORK AS A MUSICIAN OF T...</h3>
                            <p class="blog-desc">Phasellus Ultricies Nec Dolor Quis Mollis. Donec Dictum Justo Magna.
                                Nulla...</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card full-screen">
                            <div class="blog-image">
                                <img src="/frontend/assets/images/blog-img-02.jpg" alt="Blog 2">
                                <span class="blog-date">05.07.2024</span>
                            </div>
                            <h3 class="blog-title">HOW TO GAIN THE POWER TO CREATE MU...</h3>
                            <p class="blog-desc">Donec Aliquet Enim At Dui Congue, Ac Laoreet Ex Viverra. Nulla Dapibus...
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card full-screen">
                            <div class="blog-image">
                                <img src="/frontend/assets/images/blog-img-05.jpg" alt="Blog 3">
                                <span class="blog-date">05.07.2024</span>
                            </div>
                            <h3 class="blog-title">THE COMPLETE DEFINITION OF THE MUSIC</h3>
                            <p class="blog-desc">Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sed Rutrum
                                Magna...</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card full-screen">
                            <div class="blog-image">
                                <img src="/frontend/assets/images/blog-img-02.jpg" alt="Blog 3">
                                <span class="blog-date">05.07.2024</span>
                            </div>
                            <h3 class="blog-title">THE COMPLETE DEFINITION OF THE MUSIC</h3>
                            <p class="blog-desc">Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sed Rutrum
                                Magna...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Traffic News Section -->


    <!-- Start DISTRACTED DRIVING Section -->
    <section class="gallery-section">
        <div class="section-subtitle">Now in Cinema</div>
        <h2 class="text-warning">DISTRACTED DRIVING</h2>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="/frontend/assets/images/gl-01-1.jpg" /></div>
                <div class="swiper-slide"><img src="/frontend/assets/images/gl-02-1.jpg" /></div>
                <div class="swiper-slide"><img src="/frontend/assets/images/gl-03-1.jpg" /></div>
                <div class="swiper-slide"><img src="/frontend/assets/images/gl-04-1.jpg" /></div>
                <div class="swiper-slide"><img src="/frontend/assets/images/gl-05-1.jpg" /></div>
            </div>
            <!-- <div class="swiper-button-next"></div>                                                                                                                                                                                                                                                                                                                                                                                                      <div class="swiper-button-prev"></div> -->
        </div>
    </section>
    <!-- End DISTRACTED DRIVING Section -->

    <!-- Start Testimonial Slider Section -->
    <section class="testimonialsection">
        <div class="swiper testimonialSwiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="testimonial-slider">
                        <p class="testimonial-text">
                            "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in classical
                            Latin literature over 2000 years ago."
                        </p>
                        <div class="quote-icon">❝❞</div>
                        <div class="author">VHON WORN</div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="testimonial-slider">
                        <p class="testimonial-text">
                            "Lorem Ipsum has survived not only five centuries, but also the leap into electronic
                            typesetting."
                        </p>
                        <div class="quote-icon">❝❞</div>
                        <div class="author">JANE DOE</div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="testimonial-slider">
                        <p class="testimonial-text">
                            "More recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                            Ipsum."
                        </p>
                        <div class="quote-icon">❝❞</div>
                        <div class="author">MARK SMITH</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Slider Section -->

    <!-- Start Addiction Section -->
    <!-- End Addiction Section -->
    

    <!-- Start CAST & CREW Section -->
    <section class="team-section">
        <div class="container">
            <div class="section-subtitle mb-1">Our Teams</div>
            <h2 class="text-danger">CAST & CREW</h2>
            <p class="section-subtitle-text">Meet the talented people behind our radio shows.</p>
            <div class="swiper teamSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="/frontend/assets/images/cast-01-1.png" alt="Emilia C." class="team-img">
                        <div class="team-name">EMILIA C.</div>
                        <div class="team-role">Producer</div>
                    </div>
                    <div class="swiper-slide">
                        <img src="/frontend/assets/images/cast-02-1.png" alt="Ommy M." class="team-img">
                        <div class="team-name">OMMY M.</div>
                        <div class="team-role">Producer</div>
                    </div>
                    <div class="swiper-slide">
                        <img src="/frontend/assets/images/cast-03-1.png" alt="Tronc R." class="team-img">
                        <div class="team-name">TRONC R.</div>
                        <div class="team-role">Producer</div>
                    </div>
                    <div class="swiper-slide">
                        <img src="/frontend/assets/images/cast-04-1.png" alt="Pincy A." class="team-img">
                        <div class="team-name">PINCY A.</div>
                        <div class="team-role">Producer</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End CAST & CREW Section -->
@endsection
<style>
    .section-subtitle-text {
        font-size: 16px;
        color: #777;
        margin-bottom: 30px;
    }

    small.text-muted.blog-date {
        left: 190px;
        top: 30px;
        background: blueviolet;
    }


    /* Carousel container */
    .banner-carousel {
        width: 100%;
        position: relative;
    }

    .promo-banner--wide {
        position: relative;
        width: 100%;
        height: 520px;
        overflow: hidden;
    }

    .promo-banner--wide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .promo-banner--wide::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.3) 50%, transparent 85%);
        pointer-events: none;
        z-index: 1;
    }

    .banner-controls {
        position: absolute;
        right: 16px;
        bottom: 16px;
        z-index: 10;
        display: flex;
        gap: 8px;
    }

    .banner-arrow {
        width: 40px;
        height: 34px;
        background: rgba(0, 0, 0, 0.75);
        border: none;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0.9;
        transition: all 0.25s ease;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
    }

    .banner-arrow:hover {
        opacity: 1;
        background: rgba(0, 0, 0, 0.95);
        transform: scale(1.05);
    }

    /* White arrows (← →) */
    .banner-arrow .carousel-control-prev-icon,
    .banner-arrow .carousel-control-next-icon {
        width: 18px;
        height: 18px;
        filter: brightness(0) invert(1);
        background-size: contain;
    }

    .trending-color {
        color: #800080;
    }

    @media (max-width: 576px) {
        .banner-arrow {
            width: 36px;
            height: 30px;
        }

        .banner-controls {
            right: 12px;
            bottom: 12px;
        }
    }


    .fashion-card {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        height: 100%;
        background-color: #111;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .fashion-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
    }

    .fashion-card__link {
        display: block;
        height: 100%;
        text-decoration: none;
        color: inherit;
    }

    .fashion-card__image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }

    .fashion-card:hover .fashion-card__image {
        transform: scale(1.08);
    }

    .fashion-card__overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top,
                rgba(0, 0, 0, 0.85) 0%,
                rgba(0, 0, 0, 0.55) 40%,
                rgba(0, 0, 0, 0.15) 70%,
                transparent 100%);
        pointer-events: none;
        z-index: 1;
    }

    .fashion-card__category {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 3;
        background-color: #fe6c61;
        color: white;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        padding: 6px 14px;
        border-radius: 4px;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    /* Content – bottom pe */
    .fashion-card__content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 30px 25px 25px;
        z-index: 3;
        color: white;
    }

    .fashion-card__title {
        font-size: 1.65rem;
        font-weight: 800;
        line-height: 1.2;
        margin: 0 0 10px 0;
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.7);
    }

    .fashion-card__date {
        font-size: 0.95rem;
        font-weight: 500;
        opacity: 0.9;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Responsive – mobile pe thoda adjust */
    @media (max-width: 991px) {
        .fashion-card__title {
            font-size: 1.45rem;
        }

        .fashion-card__category {
            top: 16px;
            left: 16px;
            padding: 5px 12px;
            font-size: 0.8rem;
        }
    }

    @media (max-width: 576px) {
        .fashion-card__title {
            font-size: 1.35rem;
        }

        .fashion-card {
            border-radius: 6px;
        }
    }



    .blog-section {
        padding: 7x 4px;
    }
    section.blog-section {
        padding: 15px 5px;
    }

    .blog-card.full-screen {
        position: relative;
        height: 100%;
        width: 100%;
        border-radius: 0;
        /* screenshot mein sharp corners */
        overflow: hidden;
        background: #000;
    }

    .swiper.lastSwiper {
        width: 100%;
        height: 580px;
        /* tall feel – adjust kar sakte ho */
    }

    /* Override heights for sports and politics swiper to prevent mobile cut off */
    .swiper.lastSwiper.sports-politics-swiper {
        height: 370px;
    }
    .shorts-card {
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
    }
    .swiper-slide .related-article-card {
        margin: 0 !important;
        height: 100%;
    }

    .blog-image {
        position: relative;
        height: 100%;
    }

    .blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .blog-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.6) 60%, rgba(0, 0, 0, 0.9) 100%);
        z-index: 1;
    }

    /* Top black bar + category + underline */
    .blog-header {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 60px;
        background: rgba(0, 0, 0, 0.85);
        z-index: 3;
        display: flex;
        align-items: center;
        padding: 0 25px;
    }

    .blog-category {
        color: #fe6c61;
        /* red shade */
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .blog-underline {
        flex: 1;
        height: 2px;
        background: white;
        margin-left: 20px;
        opacity: 0.7;
    }

    /* Bottom content with semi-transparent bg (screenshot jaisa) */
    .blog-content {
        /*position: absolute;*/
        bottom: 0;
        left: 0;
        right: 0;
        padding: 35px 30px 30px;
        background: linear-gradient(to top, rgba(30, 30, 30, 0.95) 0%, rgba(30, 30, 30, 0.7) 100%);
        z-index: 3;
        color: white;
    }

    .blog-title {
        font-size: 1.9rem;
        font-weight: 800;
        line-height: 1.2;
        margin: 0 0 12px;
    }

    .peopel-section-date {
        font-size: 1rem;
        font-weight: 500;
        color: #ccc;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    /* Link full area */
    .stretched-link {
        position: absolute;
        inset: 0;
        z-index: 2;
    }

    /* Swiper arrows/pagination styling */
    .swiper-button-prev,
    .swiper-button-next {
        color: white !important;
        background: rgba(0, 0, 0, 0.6);
        width: 45px;
        height: 45px;
        border-radius: 50%;
        --swiper-navigation-size: 20px;
    }

    .swiper-pagination-bullet-active {
        background: #fe6c61;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .film-section,
        section.film-section {
            padding: 20px 0 !important;
        }

        .about-news,
        div.about-news,
        .container.about-news {
            padding-top: 10px !important;
            padding-bottom: 10px !important;
        }

        section.blog-section,
        .blog-section {
            padding: 15px 0 !important;
        }

        .what-we-do,
        section.what-we-do {
            padding: 20px 0 !important;
        }

        section.section-three {
            padding: 20px 0 !important;
        }

        .hero-section-main {
            padding: 25px 0 !important;
        }

        .testimonialsection {
            padding: 25px 0 !important;
            height: auto !important;
        }

        .iheartradio-section-container,
        .weather-section-container {
            padding: 20px 0 !important;
        }

        .sec-five-in {
            padding-bottom: 10px !important;
        }

        .sec-five-in-img-right {
            padding-left: 0 !important;
        }

        .col-lg-4.none {
            display: none !important;
        }

        .about-news .pt-5 {
            padding-top: 0 !important;
        }

        .film-section .mb-5 {
            margin-bottom: 1rem !important;
        }

        .blog-sec-in {
            height: auto !important;
            padding: 10px 0 !important;
        }

        .swiper.lastSwiper {
            height: 471px;
        }

        .swiper.lastSwiper.sports-politics-swiper {
            height: 360px;
        }

        .blog-title {
            font-size: 1.6rem;
        }

        .blog-category {
            top: 16px;
            padding: 5px 14px;
            font-size: 0.85rem;
        }
    }

    @media (max-width: 576px) {
        .film-section,
        section.film-section {
            padding: 12px 0 !important;
        }

        .about-news,
        div.about-news,
        .container.about-news {
            padding-top: 5px !important;
            padding-bottom: 5px !important;
        }

        section.blog-section,
        .blog-section {
            padding: 10px 0 !important;
        }

        .what-we-do,
        section.what-we-do {
            padding: 15px 0 !important;
        }

        .iheartradio-section-container,
        .weather-section-container {
            padding: 12px 0 !important;
        }

        .film-section .row.mb-5 {
            margin-bottom: 0.5rem !important;
        }

        .film-section .col-md-6.mb-5 {
            margin-bottom: 0.75rem !important;
        }

        .swiper.lastSwiper {
            height: 380px;
        }

        .swiper.lastSwiper.sports-politics-swiper {
            height: 340px;
        }

        .swiper.lastSwiper.sports-politics-swiper img.card-img-top {
            height: 160px !important;
        }

        .blog-content {
            bottom: 20px;
            left: 20px;
            right: 20px;
        }
    }

    /* Hide Instagram unwanted elements */
    .instagram-media {
        max-width: 100% !important;
    }

    /* Hide "View profile", "Original audio" etc. */
    .instagram-media iframe {
        border-radius: 8px;
    }

    /* Optional: Better spacing */
    .casting-card {
        background: transparent;
        border: none;
        padding: 0;
    }

    .video-container {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6);
        transition: transform 0.3s ease;
    }

    .casting-card:hover .video-container {
        /*transform: scale(1.03);*/
        /*transform: scale(1.01);*/
        border: 1px solid #BDC0C0 !important;
    }

    /* ===== Instagram Header Hide - Strong Fix ===== */
    .instagram-media,
    .instagram-wrapper {
        position: relative;
        overflow: hidden;
    }

    .instagram-media::before,
    .instagram-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 85px;
        /* Header height cover */
        background: #000;
        z-index: 10;
        /*border-top-left-radius: 12px;*/
        /*border-top-right-radius: 12px;*/
    }

    /* Hide View Profile Button & Original Audio */
    .instagram-media iframe {
        border-radius: 12px !important;
    }

    /* Extra safe hide for Instagram elements */
    .instagram-media * [style*="View profile"],
    .instagram-media * [style*="Original audio"],
    .instagram-media header,
    .instagram-media [role="button"] {
        display: none !important;
        visibility: hidden !important;
        height: 0 !important;
        opacity: 0 !important;
    }


    .instagram-wrapper iframe {
        border: unset !important;
    }

    .casting-role.text-muted.small {
        text-align: left;
    }

    .podcast-title {
        margin: 0px;
    }
    
    /* ✅ Arrows Styling */
        .swiper-button-next,
        .swiper-button-prev {
            color: #fff;
        }

        .swiper-button-prev:after,
        .swiper-rtl .swiper-button-next:after {
            position: relative;
            top: -80px;
        }



        .swiper-button-next:after,
        .swiper-rtl .swiper-button-prev:after {
            position: relative;
            top: -80px;
        }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.toggle-icon-btn').each(function() {
            var $btn = $(this);
            var $icon = $btn.find('i');
            var target = $btn.data('bs-target');

            $(target).on('show.bs.collapse', function() {
                $icon.removeClass('bi-chevron-down').addClass('bi-chevron-up');
            });

            $(target).on('hide.bs.collapse', function() {
                $icon.removeClass('bi-chevron-up').addClass('bi-chevron-down');
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentAudio = null; // currently playing audio
        let currentPlayBtn = null; // the play button controlling it
        let currentCardIndex = null; // which card is active

        // Handle track item click (playlist)
        document.querySelectorAll('.track-item').forEach(track => {
            track.addEventListener('click', function() {
                const audioId = this.dataset.audio;
                const cardIndex = this.dataset.card;
                const audio = document.getElementById(audioId);
                if (!audio) return;

                // Pause previous audio if playing
                if (currentAudio && currentAudio !== audio) {
                    currentAudio.pause();
                    if (currentPlayBtn) currentPlayBtn.innerHTML =
                        '<i class="fas fa-play"></i>';
                }

                currentAudio = audio;
                currentCardIndex = cardIndex;

                // Update the main card play button
                currentPlayBtn = document.querySelector(`.play-icon[data-card="${cardIndex}"]`);
                currentAudio.play();
                if (currentPlayBtn) currentPlayBtn.innerHTML = '<i class="fas fa-pause"></i>';
            });
        });

        // Handle card-level play/pause button
        document.querySelectorAll('.play-icon').forEach(btn => {
            btn.addEventListener('click', function() {
                const cardIndex = this.dataset.card;

                // If no track selected yet, select first track
                if (!currentAudio || currentCardIndex !== cardIndex) {
                    const firstAudio = document.querySelector(
                        `#spotifyTrackList${cardIndex} audio`);
                    if (!firstAudio) return;

                    currentAudio = firstAudio;
                    currentCardIndex = cardIndex;
                    currentPlayBtn = this;
                    currentAudio.play();
                    this.innerHTML = '<i class="fas fa-pause"></i>';
                    return;
                }

                // Toggle play/pause
                if (!currentAudio.paused) {
                    currentAudio.pause();
                    this.innerHTML = '<i class="fas fa-play"></i>';
                } else {
                    currentAudio.play();
                    this.innerHTML = '<i class="fas fa-pause"></i>';
                }
            });
        });

        // Optional: Update audio timer
        document.querySelectorAll('audio').forEach(audio => {
            const timer = audio.closest('.show-card') ? .querySelector('.audio-timer');

            if (timer) {
                audio.addEventListener('timeupdate', () => {
                    const cur = formatTime(audio.currentTime);
                    const dur = formatTime(audio.duration);
                    timer.textContent = `${cur} | ${dur || '00:00'}`;
                });
            }
        });

        function formatTime(sec) {
            if (isNaN(sec)) return '00:00';
            const m = Math.floor(sec / 60);
            const s = Math.floor(sec % 60);
            return `${m.toString().padStart(2,'0')}:${s.toString().padStart(2,'0')}`;
        }
    });
</script>
<script>
    const teamMembers = [{
        name: "Joy Reid",
        role: "American commentator and television host",
        image: "/frontend/assets/images/joy-reid.jpg"
    }, {
        name: "Trevor Noah",
        role: "South African comedian and writer",
        image: "/frontend/assets/images/trevor-noah.jpg"
    }, {
        name: "Van Lathan",
        role: "American journalist and producer",
        image: "/frontend/assets/images/van-lathan.jpg"
    }, {
        name: "Ana Kasparian",
        role: "American commentator",
        image: "/frontend/assets/images/ana-kasparian.jpg"
    }, {
        name: "Jon Stewart",
        role: "American comedian and writer",
        image: "/frontend/assets/images/jon-stewart.jpg"
    }, {
        name: "Jimmy Kimmel",
        role: "American television host and comedian",
        image: "/frontend/assets/images/jimmy-kimmel.jpg"
    }, {
        name: "Chris Hayes",
        role: "American commentator",
        image: "/frontend/assets/images/chris-hayes.jpg"
    }, {
        name: "Jennifer Welch",
        role: "Host",
        image: "/frontend/assets/images/jennifer-welch.png"
    }, {
        name: "Tucker Carlson",
        role: "American activist and commentator",
        image: "/frontend/assets/images/tucker-carlson.jpg"
    }, {
        name: "Saagar Enjeti",
        role: "American journalist",
        image: "/frontend/assets/images/saagar-enjeti.png"
    }, {
        name: "John Kiriakoua",
        role: "CIA counterterrorism officer and analyst",
        image: "/frontend/assets/images/john-kiriakoua.jpg"
    }, {
        name: "Jasmine Crockett",
        role: "United States Representative",
        image: "/frontend/assets/images/jasmine-crockett.jpg"
    }, {
        name: "Cori Bush",
        role: "Nurse and former United States Representative",
        image: "/frontend/assets/images/jasmine-crockett.jpg"
    }, {
        name: "Cori Bush",
        role: "Nurse and former United States Representative",
        image: "/frontend/assets/images/cori-bush.jpg"
    }, {
        name: "Cenk Uygur",
        role: "Turkish-American political activist",
        image: "/frontend/assets/images/cenk-uygur.jpg"
    }, {
        name: "Jemele Hill",
        role: "American sports writer",
        image: "/frontend/assets/images/jemele-hill.jpg"
    }, {
        name: "Karen Attiah",
        role: "American writer and commentator",
        image: "/frontend/assets/images/karen-attiah.jpg"
    }, {
        name: "Michelle Alexander",
        role: "American writer and attorney",
        image: "/frontend/assets/images/michelle-alexander.jpg"
    }, ];
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var swiper = new Swiper(".lastSwiper", {
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });
    });
</script>
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".instagram-slider", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        centeredSlides: true,

        autoplay: {
            delay: 7000,
            disableOnInteraction: false,
        },

        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1200: {
                slidesPerView: 3,
            }
        }
    });
    
    
document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.topStoriesSwiper')) {
        new Swiper('.topStoriesSwiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,

            navigation: {
                nextEl: '.top-stories-next',
                prevEl: '.top-stories-prev',
            },

            breakpoints: {
                768:  { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
                1200: { slidesPerView: 4 }
            },

            observer: true,
            observeParents: true
        });
    }
});
</script>