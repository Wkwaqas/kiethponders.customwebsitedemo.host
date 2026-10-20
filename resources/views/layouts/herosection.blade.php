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

        .hero-section-heading-wrap {
            display: inline-flex;
            align-items: center;
            margin-bottom: 12px;
            pointer-events: auto;
        }

        .hero-section-heading {
            font-size: clamp(16px, 1.8vw, 24px);
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #ffffff;
            margin: 0;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 6px 16px;
            background: linear-gradient(135deg, rgba(174, 31, 56, 0.95), rgba(174, 31, 56, 0.6));
            border-left: 4px solid #ff4d6d;
            border-radius: 0 6px 6px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
        }

        .hero-heading-bullet {
            width: 8px;
            height: 8px;
            background: #ff4d6d;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 10px #ff4d6d;
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
        }

        .hero-source-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
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

        .live-dot-indicator {
            width: 7px;
            height: 7px;
            background-color: #28a745;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 8px #28a745;
            animation: livePulse 1.6s infinite ease-in-out;
        }

        @keyframes livePulse {
            0% { transform: scale(0.9); opacity: 0.6; }
            50% { transform: scale(1.3); opacity: 1; box-shadow: 0 0 12px #28a745; }
            100% { transform: scale(0.9); opacity: 0.6; }
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
                <div class="slide" data-slide-index="{{ $index }}">
                    <div class="slide-bg" style="background-image: url('{{ $bgImage }}');"></div>
                    
                    <div class="parallax-content">
                        <div class="hero-section-heading-wrap">
                            <h2 class="hero-section-heading">
                                <span class="hero-heading-bullet"></span>Top Stories News
                            </h2>
                        </div>
                        <div class="hero-source-badge">
                            <span class="live-dot-indicator"></span>
                            <span class="slide-source-text">{{ $sourceName }}</span>
                        </div>
                        <h1 class="hero-title"><span class="slide-title-text">{{ Str::limit($title, 65, '...') }}</span><span class="dot-accent">.</span></h1>
                        <p class="hero-description"><span class="slide-desc-text">{{ Str::limit($desc, 130, '...') }}</span></p>
                        <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="cta-button slide-cta-link">Read Full Story</a>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="pagination-dots">
            @foreach ($heroArticles as $index => $article)
                <div class="p-dot {{ $index === 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})"></div>
            @endforeach
        </div>
    </div>

    <script>
        const track = document.getElementById('track');
        const dots = document.querySelectorAll('.p-dot');
        const hero = document.getElementById('hero');
        const slides = document.querySelectorAll('.slide');
        const totalSlides = slides.length;
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
            
            clearInterval(autoPlayTimer);
            startAutoPlay();
        }

        function startAutoPlay() {
            autoPlayTimer = setInterval(() => {
                currentIdx = (currentIdx + 1) % totalSlides;
                goToSlide(currentIdx);
            }, 6000); // Change slide every 6 seconds
        }
        
        startAutoPlay();

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
            if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 40) {
                if (diffX > 0) {
                    currentIdx = (currentIdx + 1) % totalSlides;
                    goToSlide(currentIdx);
                } else {
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

        // --- 60-Second Real-Time Live News Polling (Replaces 5 Hero Slides) ---
        (function initLiveHeroSliderFeed() {
            const fallbackBgs = [
                '/frontend/assets/images/hero-section-img-4.jpg',
                '/frontend/assets/images/hero-section-img-5.jpg',
                '/frontend/assets/images/hero-section-img-6.jpg',
                '/frontend/assets/images/hero-section-img-4.jpg',
                '/frontend/assets/images/hero-section-img-5.jpg',
            ];

            function truncateText(str, maxLen) {
                if (!str) return '';
                return str.length > maxLen ? str.substring(0, maxLen) + '...' : str;
            }

            function updateHeroSlides(articles) {
                if (!articles || !articles.length) return;
                
                const slideElements = document.querySelectorAll('.slide');
                articles.forEach((article, idx) => {
                    if (idx >= slideElements.length) return;
                    const slide = slideElements[idx];
                    
                    const sourceTextEl = slide.querySelector('.slide-source-text');
                    const titleTextEl = slide.querySelector('.slide-title-text');
                    const descTextEl = slide.querySelector('.slide-desc-text');
                    const ctaLinkEl = slide.querySelector('.slide-cta-link');
                    const bgEl = slide.querySelector('.slide-bg');

                    if (sourceTextEl && article.source) {
                        sourceTextEl.textContent = article.source;
                    }
                    if (titleTextEl && article.title) {
                        titleTextEl.textContent = truncateText(article.title, 65);
                    }
                    if (descTextEl && article.description) {
                        descTextEl.textContent = truncateText(article.description, 130);
                    }
                    if (ctaLinkEl && article.link) {
                        ctaLinkEl.href = article.link;
                    }
                    if (bgEl && article.image) {
                        bgEl.style.backgroundImage = `url('${article.image}')`;
                    }
                });
            }

            function pollLiveFeed() {
                fetch('/api/live-breaking-feed', { credentials: 'same-origin' })
                    .then(res => res.json())
                    .then(data => {
                        if (data && data.articles && data.articles.length > 0) {
                            updateHeroSlides(data.articles);
                        }
                    })
                    .catch(err => {
                        console.warn('Live hero slide update warning:', err);
                    });
            }

            // Periodically fetch new live headlines from CNN & Reuters every 60 seconds
            setInterval(pollLiveFeed, 60000);
        })();

    </script>
</body>
</html>