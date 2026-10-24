<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reuters Top Stories - Apple News+ Hero</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Inter', 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #000000;
            color: #ffffff;
            overflow: hidden;
            height: 100vh;
            width: 100vw;
            display: flex;
            align-items: center;
            justify-content: center;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Hero Wrapper */
        .hero-viewport {
            position: relative;
            width: 100%;
            height: 100%;
            max-width: 860px;
            margin: 0 auto;
            padding: 18px 24px 20px 24px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Apple News+ "Top Stories" Section Heading */
        .hero-header-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
            padding: 0 4px;
        }

        .hero-section-heading {
            font-size: clamp(24px, 3.4vw, 36px);
            font-weight: 900;
            color: #ff2d55; /* Apple News+ signature vibrant red/pink */
            letter-spacing: -0.6px;
            line-height: 1.1;
            margin: 0;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }


        /* Slider Track Window */
        .cards-slider-window {
            position: relative;
            width: 100%;
            overflow: hidden;
            border-radius: 20px;
        }

        .slider-track {
            display: flex;
            width: 100%;
            transition: transform 0.65s cubic-bezier(0.25, 1, 0.3, 1);
            will-change: transform;
        }

        /* Individual Story Card Slide */
        .story-slide {
            flex: 0 0 100%;
            width: 100%;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        /* Apple News+ Dark Card Container */
        .apple-news-card {
            width: 100%;
            background: #1c1c1e; /* Apple Dark Mode card color */
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 16px 45px rgba(0, 0, 0, 0.7);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: #ffffff;
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        }

        .apple-news-card:hover {
            transform: translateY(-2px);
            border-color: rgba(255, 255, 255, 0.16);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.85);
        }

        /* Featured News Image on Top */
        .card-image-wrap {
            position: relative;
            width: 100%;
            height: clamp(220px, 31vw, 350px);
            background: #2a2a2c;
            overflow: hidden;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .apple-news-card:hover .card-image {
            transform: scale(1.02);
        }

        /* Subtle gradient shadow over bottom edge of photo */
        .card-image-wrap::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 40px;
            background: linear-gradient(to bottom, rgba(28, 28, 30, 0) 0%, rgba(28, 28, 30, 0.45) 100%);
            pointer-events: none;
        }

        /* Card Content Area below photo */
        .card-content {
            background: #1c1c1e;
            padding: 20px 24px 22px 24px;
            display: flex;
            flex-direction: column;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        /* Publisher Branding Header: Reuters Logo + "Reuters" */
        .publisher-brand {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 12px;
        }

        .reuters-sunburst {
            width: 22px;
            height: 22px;
            display: block;
            flex-shrink: 0;
        }

        .publisher-name {
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.2px;
        }

        /* Main Headline: Bold, High-contrast, Apple style */
        .headline-link {
            text-decoration: none;
            color: #ffffff;
            display: block;
        }

        .headline-text {
            font-size: clamp(20px, 2.5vw, 29px);
            font-weight: 800;
            line-height: 1.18;
            color: #ffffff;
            letter-spacing: -0.4px;
            margin-bottom: 18px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            word-break: break-word;
            transition: color 0.2s ease;
        }

        .headline-link:hover .headline-text {
            color: #ff4d6d;
        }

        /* Card Footer: Category Pill Button + 3-dots action */
        .card-footer-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
        }

        .category-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: -0.2px;
            padding: 7px 18px;
            border-radius: 9999px;
            text-decoration: none;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .category-pill:hover {
            background: rgba(255, 255, 255, 0.22);
            transform: translateY(-1px);
        }

        .card-ellipsis-btn {
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            padding: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: color 0.2s ease, background 0.2s ease;
        }

        .card-ellipsis-btn:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.1);
        }

        /* Navigation Arrows */
        .nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(20, 20, 22, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        .nav-btn:hover {
            background: rgba(255, 45, 85, 0.85);
            border-color: #ff2d55;
            transform: translateY(-50%) scale(1.08);
        }

        .nav-btn-prev { left: 8px; }
        .nav-btn-next { right: 8px; }

        /* Pagination Indicators */
        .pagination-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 14px;
        }

        .p-dot {
            width: 8px;
            height: 8px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 9999px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.25, 1, 0.3, 1);
        }

        .p-dot.active {
            width: 26px;
            background: #ff2d55;
            box-shadow: 0 0 10px rgba(255, 45, 85, 0.6);
        }

        /* Responsive Breakpoints */
        @media (max-width: 768px) {
            .hero-viewport {
                padding: 12px 14px;
                max-width: 100%;
            }
            .hero-section-heading {
                font-size: 22px;
            }
            .card-image-wrap {
                height: 200px;
            }
            .card-content {
                padding: 14px 16px 16px 16px;
            }
            .publisher-name {
                font-size: 16px;
            }
            .headline-text {
                font-size: 19px;
                line-height: 1.2;
                margin-bottom: 14px;
                -webkit-line-clamp: 2;
            }
            .category-pill {
                font-size: 13px;
                padding: 6px 14px;
            }
            .nav-btn {
                display: none; /* Mobile uses natural touch swipe */
            }
            .pagination-bar {
                margin-top: 10px;
            }
        }

        @media (max-width: 480px) {
            .hero-viewport {
                padding: 8px 10px;
            }
            .card-image-wrap {
                height: 180px;
            }
            .headline-text {
                font-size: 17px;
            }
            .category-pill {
                font-size: 12px;
                padding: 5px 12px;
            }
        }
    </style>
</head>
<body>

    <div class="hero-viewport" id="heroViewport">
        <!-- Top Heading matching Apple News+ -->
        <div class="hero-header-wrap">
            <h1 class="hero-section-heading">Top Stories</h1>
        </div>

        <!-- Card Slider Window -->
        <div class="cards-slider-window" id="sliderWindow">
            <button class="nav-btn nav-btn-prev" id="btnPrev" aria-label="Previous Story">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>
            <button class="nav-btn nav-btn-next" id="btnNext" aria-label="Next Story">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>

            <div class="slider-track" id="sliderTrack">
                @php
                    $fallbackImages = [
                        '/frontend/assets/images/hero-section-img-4.jpg',
                        '/frontend/assets/images/hero-section-img-5.jpg',
                        '/frontend/assets/images/hero-section-img-6.jpg',
                    ];
                @endphp

                @foreach ($heroArticles as $index => $article)
                    @php
                        $imageSrc = !empty($article['image']) ? $article['image'] : ($fallbackImages[$index % count($fallbackImages)]);
                        $title = $article['title'] ?? 'Top Breaking Headline from Reuters';
                        $link = $article['link'] ?? 'https://www.reuters.com';
                        $category = $article['category'] ?? 'More Reuters coverage';
                    @endphp
                    <div class="story-slide" data-slide-index="{{ $index }}">
                        <div class="apple-news-card">
                            <!-- Featured Image on Top -->
                            <div class="card-image-wrap">
                                <a href="{{ $link }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ $imageSrc }}" 
                                         alt="{{ $title }}" 
                                         class="card-image slide-img-target"
                                         loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                                         onerror="this.src='/frontend/assets/images/hero-section-img-4.jpg';">
                                </a>
                            </div>

                            <!-- Content Below Image -->
                            <div class="card-content">
                                <!-- Reuters Logo & Name -->
                                <div class="publisher-brand">
                                    <svg class="reuters-sunburst" viewBox="0 0 24 24" fill="#ffffff" aria-hidden="true">
                                        <!-- Outer ring of 16 dots -->
                                        <circle cx="12" cy="2.2" r="1.3" />
                                        <circle cx="15.8" cy="3.2" r="1.3" />
                                        <circle cx="18.9" cy="5.8" r="1.4" />
                                        <circle cx="20.8" cy="9.4" r="1.4" />
                                        <circle cx="21.5" cy="13.3" r="1.4" />
                                        <circle cx="20.5" cy="17" r="1.4" />
                                        <circle cx="18.1" cy="20" r="1.3" />
                                        <circle cx="14.6" cy="21.7" r="1.3" />
                                        <circle cx="10.8" cy="21.8" r="1.3" />
                                        <circle cx="7.2" cy="20.6" r="1.3" />
                                        <circle cx="4.5" cy="18" r="1.4" />
                                        <circle cx="2.8" cy="14.5" r="1.4" />
                                        <circle cx="2.5" cy="10.7" r="1.4" />
                                        <circle cx="3.8" cy="7" r="1.4" />
                                        <circle cx="6.3" cy="4.2" r="1.3" />
                                        <circle cx="9.6" cy="2.6" r="1.3" />
                                        <!-- Inner ring of 8 dots -->
                                        <circle cx="12" cy="6.2" r="1.2" />
                                        <circle cx="15.8" cy="7.7" r="1.2" />
                                        <circle cx="17.6" cy="11.5" r="1.2" />
                                        <circle cx="16.2" cy="15.4" r="1.2" />
                                        <circle cx="12.5" cy="17.3" r="1.2" />
                                        <circle cx="8.7" cy="16.2" r="1.2" />
                                        <circle cx="6.6" cy="12.6" r="1.2" />
                                        <circle cx="7.8" cy="8.7" r="1.2" />
                                        <!-- Center dot -->
                                        <circle cx="12" cy="12" r="1.1" />
                                    </svg>
                                    <span class="publisher-name">Reuters</span>
                                </div>

                                <!-- Big Bold Headline -->
                                <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="headline-link slide-link-target">
                                    <h2 class="headline-text slide-title-target">{{ $title }}</h2>
                                </a>

                                <!-- Bottom Row: Category Pill & Ellipsis Action -->
                                <div class="card-footer-row">
                                    <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="category-pill slide-cat-target">
                                        <span class="cat-text">{{ $category }}</span>
                                    </a>

                                    <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="card-ellipsis-btn" title="View options">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <circle cx="5" cy="12" r="2" />
                                            <circle cx="12" cy="12" r="2" />
                                            <circle cx="19" cy="12" r="2" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Bottom Pagination Dots -->
        <div class="pagination-bar" id="paginationBar">
            @foreach ($heroArticles as $index => $article)
                <div class="p-dot {{ $index === 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})" data-dot-index="{{ $index }}"></div>
            @endforeach
        </div>
    </div>

    <script>
        const track = document.getElementById('sliderTrack');
        const dots = document.querySelectorAll('.p-dot');
        const sliderWindow = document.getElementById('sliderWindow');
        const slides = document.querySelectorAll('.story-slide');
        const totalSlides = slides.length;
        const btnPrev = document.getElementById('btnPrev');
        const btnNext = document.getElementById('btnNext');

        let currentIndex = 0;
        let autoPlayTimer = null;

        function goToSlide(index) {
            if (index < 0) {
                currentIndex = totalSlides - 1;
            } else if (index >= totalSlides) {
                currentIndex = 0;
            } else {
                currentIndex = index;
            }

            track.style.transform = `translateX(-${currentIndex * 100}%)`;

            dots.forEach((dot, idx) => {
                dot.classList.toggle('active', idx === currentIndex);
            });

            restartAutoPlay();
        }

        function restartAutoPlay() {
            clearInterval(autoPlayTimer);
            autoPlayTimer = setInterval(() => {
                goToSlide(currentIndex + 1);
            }, 6500);
        }

        if (btnPrev && btnNext) {
            btnPrev.addEventListener('click', (e) => {
                e.preventDefault();
                goToSlide(currentIndex - 1);
            });

            btnNext.addEventListener('click', (e) => {
                e.preventDefault();
                goToSlide(currentIndex + 1);
            });
        }

        // Pause auto-play on hover
        sliderWindow.addEventListener('mouseenter', () => clearInterval(autoPlayTimer));
        sliderWindow.addEventListener('mouseleave', () => restartAutoPlay());

        // Touch Swipe Gesture Support for Mobile
        let touchStartX = 0;
        let touchEndX = 0;
        let touchStartY = 0;
        let touchEndY = 0;

        sliderWindow.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            touchStartY = e.changedTouches[0].screenY;
        }, { passive: true });

        sliderWindow.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            touchEndY = e.changedTouches[0].screenY;
            handleTouchSwipe();
        }, { passive: true });

        function handleTouchSwipe() {
            const diffX = touchStartX - touchEndX;
            const diffY = touchStartY - touchEndY;
            // Only trigger if horizontal swipe is dominant and > 35px
            if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 35) {
                if (diffX > 0) {
                    goToSlide(currentIndex + 1);
                } else {
                    goToSlide(currentIndex - 1);
                }
            }
        }

        // Start autoplay initially
        restartAutoPlay();

        // 60-Second Real-Time Live Feed Refresh
        (function initRealtimeFeed() {
            function updateSlides(articles) {
                if (!articles || !articles.length) return;
                const slideElements = document.querySelectorAll('.story-slide');

                articles.forEach((art, idx) => {
                    if (idx >= slideElements.length) return;
                    const slide = slideElements[idx];
                    
                    const titleEl = slide.querySelector('.slide-title-target');
                    const imgEl = slide.querySelector('.slide-img-target');
                    const linkTargets = slide.querySelectorAll('.slide-link-target, .slide-cat-target');
                    const catTextEl = slide.querySelector('.cat-text');

                    if (titleEl && art.title) {
                        titleEl.textContent = art.title;
                    }
                    if (imgEl && art.image) {
                        imgEl.src = art.image;
                    }
                    if (art.link) {
                        linkTargets.forEach(el => el.href = art.link);
                    }
                    if (catTextEl && art.category) {
                        catTextEl.textContent = art.category;
                    }
                });
            }

            function pollLiveFeed() {
                fetch('/api/live-breaking-feed', { credentials: 'same-origin' })
                    .then(res => res.json())
                    .then(data => {
                        if (data && data.articles && data.articles.length > 0) {
                            updateSlides(data.articles);
                        }
                    })
                    .catch(err => {
                        console.warn('Hero live updates polling notice:', err);
                    });
            }

            setInterval(pollLiveFeed, 60000);
        })();
    </script>
</body>
</html>