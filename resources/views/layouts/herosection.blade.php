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
            width: 300vw;
            height: 100%;
            /* Smoother Cubic Bezier curve and longer duration */
            transition: transform 1.2s cubic-bezier(0.23, 1, 0.32, 1);
            will-change: transform; /* Performance optimization */
        }

        /* Individual Slide */
        .slide {
            width: 100vw;
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
            background: rgba(0,0,0,0.6); /* Adjust opacity as needed */
            z-index: 1;
        }

        /* --- Content Styling --- */
        /* Is par ab hum JS se smooth parallax lagayenge */
        .parallax-content {
            position: relative;
            z-index: 5;
            pointer-events: none; /* Important for smooth mouse interaction */
            /* CSS transition hata di hai kyunki ab JS handle karega */
            will-change: transform;
        }

        .hero-title {
            font-size: clamp(50px, 8vw, 130px);
            font-weight: 800;
            line-height: 0.9;
            margin-bottom: 25px;
            letter-spacing: -2px;
            pointer-events: auto;
            text-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .dot-accent { color: #ae1f38; }

        .hero-description {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: clamp(18px, 2vw, 22px);
            line-height: 1.5;
            color: #e0e0e0;
            margin-bottom: 40px;
            max-width: 600px;
            pointer-events: auto;
            text-shadow: 0 5px 20px rgba(0,0,0,0.5);
        }

        .cta-button {
            display: inline-block;
            background-color: #ae1f38;
            color: #ffffff;
            padding: 16px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s ease-out;
            pointer-events: auto;
            box-shadow: 0 10px 20px -10px rgba(174, 31, 56, 0.5);
        }
        .cta-button:hover {
            transform: translateY(-3px);
            background-color: #c72441;
        }

        /* Navigation Dots */
        .pagination-dots {
            position: absolute;
            right: 50px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 15px;
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
            transform: scale(1.4);
            box-shadow: 0 0 15px rgba(255,255,255,0.3);
        }

        @media (max-width: 768px) {
            .slide { padding: 0 5%; text-align: center; justify-content: center; }
            .pagination-dots { right: 20px; }
            .hero-title { font-size: clamp(40px, 10vw, 60px); }
        }
    </style>
</head>
<body>

    <div class="hero-viewport" id="hero">
        <div class="slider-track" id="track">
            
            <div class="slide">
                <div class="slide-bg" style="background-image: url('/frontend/assets/images/hero-section-img-4.jpg');"></div>
                
                <div class="parallax-content">
                    <h1 class="hero-title">Breaking <br>News<span class="dot-accent">.</span></h1>
                    <p class="hero-description">Stay ahead with real-time updates from across the United States. From the halls of Capitol Hill to the streets of New York, we bring you the stories that define the American spirit and shape the nation's future.</p>
                    <a href="#" class="cta-button">Read More</a>
                </div>
            </div>

            <div class="slide">
                 <div class="slide-bg" style="background-image: url('/frontend/assets/images/hero-section-img-5.jpg');"></div>

                <div class="parallax-content">
                    <h1 class="hero-title">Silicon <br>Frontier<span class="dot-accent">.</span></h1>
                    <p class="hero-description">Exploring the next wave of American innovation. We track the tech giants and bold startups redefining AI, space exploration, and the global digital economy from the heart of the USA.</p>
                    <a href="#" class="cta-button">Read More</a>
                </div>
            </div>

            <div class="slide">
                 <div class="slide-bg" style="background-image: url('/frontend/assets/images/hero-section-img-6.jpg');"></div>

                <div class="parallax-content">
                    <h1 class="hero-title">The Global <br>Lead<span class="dot-accent">.</span></h1>
                    <p class="hero-description">Analyzing America’s role in an evolving world. Deep dives into foreign policy, international trade agreements, and the diplomatic shifts that position the United States on the global stage.</p>
                    <a href="#" class="cta-button">Read More</a>
                </div>
            </div>

        </div>

        <div class="pagination-dots">
            <div class="p-dot active" onclick="goToSlide(0)"></div>
            <div class="p-dot" onclick="goToSlide(1)"></div>
            <div class="p-dot" onclick="goToSlide(2)"></div>
        </div>
    </div>

    <script>
        const track = document.getElementById('track');
        const dots = document.querySelectorAll('.p-dot');
        const hero = document.getElementById('hero');
        // Select all parallax content blocks
        const contents = document.querySelectorAll('.parallax-content');
        
        // --- Slider Logic ---
        let currentIdx = 0;
        let autoPlayTimer;

        function goToSlide(index) {
            currentIdx = index;
            track.style.transform = `translateX(-${index * 100}vw)`;
            dots.forEach(d => d.classList.remove('active'));
            dots[index].classList.add('active');
            
            // Reset Auto Play timer on manual interaction
            clearInterval(autoPlayTimer);
            startAutoPlay();
        }

        function startAutoPlay() {
            autoPlayTimer = setInterval(() => {
                currentIdx = (currentIdx + 1) % 3;
                goToSlide(currentIdx);
            }, 6000); // Change slide every 6 seconds
        }
        
        startAutoPlay(); // Start initially

        // --- Ultra-Smooth Parallax Logic (Lerp) ---
        // Targets are where the mouse IS, Currents are where the element IS.
        let targetX = 0, targetY = 0;
        let currentX = 0, currentY = 0;
        
        // Friction: Lower value = smoother but slower following (more lag)
        const friction = 0.08; 

        hero.addEventListener('mousemove', (e) => {
            // Calculate distance from center of screen
            // Divide by higher number to reduce movement range (e.g., /30 instead of /20)
            targetX = (window.innerWidth / 2 - e.clientX) / 25;
            targetY = (window.innerHeight / 2 - e.clientY) / 25;
        });

        // Animation Loop function
        function animateParallax() {
            // Lerp formula: current + (target - current) * fraction
            currentX += (targetX - currentX) * friction;
            currentY += (targetY - currentY) * friction;

            // Apply the smooth current positions to all content blocks
            contents.forEach(content => {
                 // Using translate3d for hardware acceleration
                content.style.transform = `translate3d(${currentX}px, ${currentY}px, 0)`;
            });

            // Keep the loop running
            requestAnimationFrame(animateParallax);
        }

        // Start the animation loop
        animateParallax();

        // Optional: Reset slightly when mouse leaves window
        hero.addEventListener('mouseleave', () => {
            targetX = 0;
            targetY = 0;
        });

    </script>
</body>
</html>