<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultra Smooth Hero Slider</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&family=Plus+Jakarta+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #0d0d0d;
            color: #fff;
            overflow: hidden;
            height: 100vh;
        }

        /* Hero Container */
        .hero-viewport {
            position: relative;
            height: 100vh;
            width: 100vw;
            overflow: hidden;
            /* Background color fallback */
            background: #111;
        }

        /* Slider Track (Moves Left/Right) */
        .slider-track {
            display: flex;
            width: max-content;
            height: 100%;
            /* Smoother Cubic Bezier curve and longer duration */
            transition: transform 1.2s cubic-bezier(0.23, 1, 0.32, 1);
            will-change: transform; /* Performance optimization */
        }

        /* Individual Slide */
        .slide {
            width: 100vw;
            flex-shrink: 0;
            height: 100%;
            display: flex;
            align-items: center;
            padding: 0 7%;
            position: relative;
            overflow: hidden;
        }

        /* --- New Background Image Styles --- */
        .slide-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            z-index: 0;
            /* Optional: Add slight parallax to BG too for depth */
            transform: scale(1.1); 
            transition: transform 0.5s ease-out;
        }

        /* Dark overlay on top of images so text is readable */
        .slide-bg::after {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(to right, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.7) 50%, rgba(0,0,0,0.55) 100%);
            z-index: 1;
        }

        /* --- Content Styling --- */
        /* Is par ab hum JS se smooth parallax lagayenge */
        .parallax-content {
            position: relative;
            z-index: 5;
            max-width: 850px;
            pointer-events: none; /* Important for smooth mouse interaction */
            /* CSS transition hata di hai kyunki ab JS handle karega */
            will-change: transform;
        }

        .hero-source-badge {
            display: inline-block;
            background: rgba(174, 31, 56, 0.95);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            padding: 5px 14px;
            border-radius: 4px;
            margin-bottom: 14px;
            pointer-events: auto;
            box-shadow: 0 4px 15px rgba(174, 31, 56, 0.4);
        }

        .hero-title {
            font-size: clamp(28px, 4vw, 54px);
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 16px;
            letter-spacing: -0.5px;
            max-width: 820px;
            pointer-events: auto;
            text-shadow: 0 4px 20px rgba(0,0,0,0.8);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            word-break: break-word;
        }

        .dot-accent { color: #ae1f38; }

        .hero-description {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: clamp(15px, 1.3vw, 18px);
            line-height: 1.5;
            color: #d8d8d8;
            margin-bottom: 24px;
            max-width: 650px;
            pointer-events: auto;
            text-shadow: 0 3px 15px rgba(0,0,0,0.8);
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            word-break: break-word;
        }

        .cta-button {
            display: inline-block;
            background-color: #ae1f38;
            color: #ffffff;
            padding: 12px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 700;
            transition: 0.3s ease-out;
            pointer-events: auto;
            box-shadow: 0 8px 20px -6px rgba(174, 31, 56, 0.6);
        }
        .cta-button:hover {
            transform: translateY(-2px);
            background-color: #c72441;
            color: #ffffff;
        }

        /* Navigation Dots */
        .pagination-dots {
            position: absolute;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 14px;
            z-index: 10;
        }

        .p-dot {
            width: 12px;
            height: 12px;
            border: 2px solid rgba(255,255,255,0.4);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease-out;
        }

        .p-dot.active {
            background-color: #fff;
            border-color: #fff;
            transform: scale(1.3);
            box-shadow: 0 0 15px rgba(255,255,255,0.5);
        }

        @media (max-width: 768px) {
            .slide { padding: 0 6%; text-align: left; justify-content: flex-start; }
            .pagination-dots { right: 12px; gap: 10px; }
            .hero-source-badge { font-size: 11px; padding: 4px 10px; margin-bottom: 10px; }
            .hero-title { font-size: clamp(22px, 5.5vw, 32px); line-height: 1.2; margin-bottom: 10px; -webkit-line-clamp: 2; }
            .hero-description { font-size: 13px; margin-bottom: 16px; line-height: 1.4; -webkit-line-clamp: 2; }
            .cta-button { padding: 9px 22px; font-size: 13px; }
            .hero-live-ticker {
                bottom: 12px;
                left: 12px;
                right: 12px;
                max-width: calc(100% - 24px);
                padding: 7px 12px;
                font-size: 12px;
            }
            .hero-live-ticker .ticker-badge {
                font-size: 10px;
                padding: 3px 8px;
            }
            .hero-live-ticker .ticker-headline {
                font-size: 12px;
            }
        }

        /* --- Floating Real-Time Breaking Ticker --- */
        .hero-live-ticker {
            position: absolute;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 20;
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(10, 10, 15, 0.78);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.14);
            padding: 8px 18px;
            border-radius: 50px;
            max-width: 820px;
            width: 90%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            pointer-events: auto;
            transition: all 0.3s ease;
        }
        .hero-live-ticker:hover {
            background: rgba(15, 15, 22, 0.92);
            border-color: rgba(220, 53, 69, 0.45);
        }
        .ticker-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #dc3545;
            color: #ffffff;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            padding: 4px 10px;
            border-radius: 30px;
            text-transform: uppercase;
            flex-shrink: 0;
            box-shadow: 0 0 12px rgba(220, 53, 69, 0.7);
        }
        .pulse-dot {
            width: 7px;
            height: 7px;
            background-color: #ffffff;
            border-radius: 50%;
            display: inline-block;
            animation: pulseAnim 1.4s infinite ease-in-out;
        }
        @keyframes pulseAnim {
            0% { transform: scale(0.9); opacity: 0.6; }
            50% { transform: scale(1.35); opacity: 1; }
            100% { transform: scale(0.9); opacity: 0.6; }
        }
        .ticker-content {
            display: flex;
            align-items: center;
            gap: 10px;
            overflow: hidden;
            white-space: nowrap;
            flex: 1;
            min-width: 0;
        }
        .ticker-source {
            color: #ffc107;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            flex-shrink: 0;
        }
        .ticker-headline {
            color: #f1f1f1;
            font-size: 13.5px;
            font-weight: 500;
            text-decoration: none;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: inline-block;
            transition: color 0.2s ease, opacity 0.3s ease;
        }
        .ticker-headline:hover {
            color: #ffffff;
            text-decoration: underline;
        }
        .ticker-headline.fading {
            opacity: 0;
            transform: translateY(-4px);
        }
        .ticker-time {
            color: #9aa0aa;
            font-size: 11px;
            flex-shrink: 0;
            margin-left: auto;
        }
    </style>
</head>
<body>

    <div class="hero-viewport" id="hero">
        <div class="slider-track" id="track">
            @php
                $fallbackBgs = [
                    '/frontend/assets/images/hero-section-img-4.jpg',
                    '/frontend/assets/images/hero-section-img-5.jpg',
                    '/frontend/assets/images/hero-section-img-6.jpg',
                    '/frontend/assets/images/hero-section-img-4.jpg',
                    '/frontend/assets/images/hero-section-img-5.jpg',
                ];
            @endphp

            @foreach ($heroArticles as $index => $article)
                @php
                    $bgImage = !empty($article['image']) ? $article['image'] : ($fallbackBgs[$index % count($fallbackBgs)]);
                    $sourceName = $article['source'] ?? 'Breaking News';
                    $title = $article['title'] ?? 'Top Headline';
                    $desc = $article['description'] ?? '';
                    $link = $article['link'] ?? '#';
                @endphp
                <div class="slide">
                    <div class="slide-bg" style="background-image: url('{{ $bgImage }}');"></div>
                    
                    <div class="parallax-content">
                        <div class="hero-source-badge">{{ $sourceName }}</div>
                        <h1 class="hero-title">{{ Str::limit($title, 65, '...') }}<span class="dot-accent">.</span></h1>
                        <p class="hero-description">{{ Str::limit($desc, 130, '...') }}</p>
                        <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="cta-button">Read Full Story</a>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="pagination-dots">
            @foreach ($heroArticles as $index => $article)
                <div class="p-dot {{ $index === 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})"></div>
            @endforeach
        </div>

        <!-- Floating Real-Time Breaking News Ticker (CNN + Reuters) -->
        <div class="hero-live-ticker" id="heroLiveTicker" style="display: none;">
            <div class="ticker-badge">
                <span class="pulse-dot"></span> LIVE
            </div>
            <div class="ticker-content">
                <span class="ticker-source" id="tickerSource">CNN</span>
                <a href="#" target="_blank" rel="noopener noreferrer" class="ticker-headline" id="tickerHeadline">Loading real-time breaking news...</a>
            </div>
            <span class="ticker-time" id="tickerTime">Just now</span>
        </div>
    </div>

    <script>
        const track = document.getElementById('track');
        const dots = document.querySelectorAll('.p-dot');
        const hero = document.getElementById('hero');
        const slides = document.querySelectorAll('.slide');
        const totalSlides = slides.length;
        // Select all parallax content blocks
        const contents = document.querySelectorAll('.parallax-content');
        
        // --- Slider Logic ---
        let currentIdx = 0;
        let autoPlayTimer;

        function goToSlide(index) {
            currentIdx = index;
            track.style.transform = `translateX(-${index * 100}vw)`;
            dots.forEach(d => d.classList.remove('active'));
            if (dots[index]) {
                dots[index].classList.add('active');
            }
            
            // Reset Auto Play timer on manual interaction
            clearInterval(autoPlayTimer);
            startAutoPlay();
        }

        function startAutoPlay() {
            autoPlayTimer = setInterval(() => {
                currentIdx = (currentIdx + 1) % totalSlides;
                goToSlide(currentIdx);
            }, 6000); // Change slide every 6 seconds
        }
        
        startAutoPlay(); // Start initially

        // Touch Swipe Support for Mobile
        let touchStartX = 0;
        let touchEndX = 0;
        let touchStartY = 0;
        let touchEndY = 0;

        hero.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            touchStartY = e.changedTouches[0].screenY;
        }, { passive: true });

        hero.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            touchEndY = e.changedTouches[0].screenY;
            handleHeroSwipe();
        }, { passive: true });

        function handleHeroSwipe() {
            const diffX = touchStartX - touchEndX;
            const diffY = touchStartY - touchEndY;
            // Only trigger if horizontal swipe is dominant and exceeds threshold
            if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 40) {
                if (diffX > 0) {
                    // Swiped Left -> Next Slide
                    currentIdx = (currentIdx + 1) % totalSlides;
                    goToSlide(currentIdx);
                } else {
                    // Swiped Right -> Previous Slide
                    currentIdx = (currentIdx - 1 + totalSlides) % totalSlides;
                    goToSlide(currentIdx);
                }
            }
        }

        // --- Ultra-Smooth Parallax Logic (Lerp) ---
        let targetX = 0, targetY = 0;
        let currentX = 0, currentY = 0;
        const friction = 0.08; 

        hero.addEventListener('mousemove', (e) => {
            targetX = (window.innerWidth / 2 - e.clientX) / 25;
            targetY = (window.innerHeight / 2 - e.clientY) / 25;
        });

        function animateParallax() {
            currentX += (targetX - currentX) * friction;
            currentY += (targetY - currentY) * friction;
            contents.forEach(content => {
                content.style.transform = `translate3d(${currentX}px, ${currentY}px, 0)`;
            });
            requestAnimationFrame(animateParallax);
        }
        animateParallax();

        hero.addEventListener('mouseleave', () => {
            targetX = 0;
            targetY = 0;
        });

        // --- 60-Second Real-Time Live Breaking News Polling (CNN + Reuters) ---
        (function initLiveBreakingFeed() {
            const tickerEl = document.getElementById('heroLiveTicker');
            const sourceEl = document.getElementById('tickerSource');
            const headlineEl = document.getElementById('tickerHeadline');
            const timeEl = document.getElementById('tickerTime');

            let feedArticles = [];
            let tickerIdx = 0;
            let rotateInterval;

            function formatTimeAgo(dateStr) {
                if (!dateStr) return 'Just now';
                const diffMs = Date.now() - new Date(dateStr).getTime();
                const diffMins = Math.floor(diffMs / 60000);
                if (diffMins <= 1) return 'Just now';
                if (diffMins < 60) return `${diffMins}m ago`;
                const diffHours = Math.floor(diffMins / 60);
                if (diffHours < 24) return `${diffHours}h ago`;
                return 'Today';
            }

            function displayCurrentItem() {
                if (!feedArticles.length) return;
                const item = feedArticles[tickerIdx % feedArticles.length];
                headlineEl.classList.add('fading');
                setTimeout(() => {
                    sourceEl.textContent = item.source || 'Breaking';
                    headlineEl.textContent = item.title;
                    headlineEl.href = item.link || '#';
                    timeEl.textContent = formatTimeAgo(item.publishedAt);
                    headlineEl.classList.remove('fading');
                }, 200);
            }

            function cycleHeadline() {
                if (feedArticles.length > 1) {
                    tickerIdx = (tickerIdx + 1) % feedArticles.length;
                    displayCurrentItem();
                }
            }

            function fetchLiveFeed() {
                fetch('/api/live-breaking-feed', { credentials: 'same-origin' })
                    .then(res => res.json())
                    .then(data => {
                        if (data && data.articles && data.articles.length > 0) {
                            feedArticles = data.articles;
                            tickerEl.style.display = 'flex';
                            displayCurrentItem();

                            if (!rotateInterval) {
                                rotateInterval = setInterval(cycleHeadline, 8000); // cycle headline view every 8s
                            }
                        }
                    })
                    .catch(err => {
                        console.warn('Could not fetch real-time breaking feed:', err);
                    });
            }

            // Initial fetch
            fetchLiveFeed();

            // Auto-refresh the live feed every 60 seconds (60,000ms) from CNN + Reuters
            setInterval(fetchLiveFeed, 60000);
        })();

    </script>
</body>
</html>