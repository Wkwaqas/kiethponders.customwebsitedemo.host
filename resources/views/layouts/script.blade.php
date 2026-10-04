<div class="form-check form-switch theme-toggle sticky-toggle-btn" aria-label="Toggle theme" id="themeSwitch">
  <input class="form-check-input" type="checkbox" />
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script async src="https://www.instagram.com/embed.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const swiperTouchConfig = {
        allowTouchMove: true,
        simulateTouch: true,
        touchRatio: 1,
        touchAngle: 45,
        threshold: 5,
        touchStartPreventDefault: false,
        touchMoveStopPropagation: false,
        touchReleaseOnEdges: true,
        resistance: true,
        resistanceRatio: 0.85,
        grabCursor: true,
        preventClicks: true,
        preventClicksPropagation: true,
        slideToClickedSlide: false,
        watchSlidesProgress: true,
        observer: true,
        observeParents: true,
        resizeObserver: true,
    };

    if (document.querySelector('.mySwiper')) {
        new Swiper('.mySwiper', {
            ...swiperTouchConfig,
            slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 4 },
            }
        });
    }

    let videoSwiper = null;

    if (document.querySelector('.videoSwiper')) {
        videoSwiper = new Swiper('.videoSwiper', {
            ...swiperTouchConfig,
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                576: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                992: { slidesPerView: 2 },
            }
        });

        document.querySelectorAll('.videoSwiper video').forEach(video => {
            video.addEventListener('mouseenter', () => {
                if (videoSwiper && videoSwiper.autoplay) videoSwiper.autoplay.stop();
            });

            video.addEventListener('mouseleave', () => {
                if (videoSwiper && videoSwiper.autoplay) videoSwiper.autoplay.start();
            });

            video.addEventListener('play', () => {
                if (videoSwiper && videoSwiper.autoplay) videoSwiper.autoplay.stop();
            });

            video.addEventListener('pause', () => {
                if (videoSwiper && videoSwiper.autoplay) videoSwiper.autoplay.start();
            });

            video.addEventListener('ended', () => {
                if (videoSwiper && videoSwiper.autoplay) videoSwiper.autoplay.start();
            });
        });
    }

    if (document.querySelector('.teamSwiper')) {
        const teamEl = document.querySelector('.teamSwiper');
        const teamSlides = teamEl.querySelectorAll('.swiper-slide').length;
        new Swiper('.teamSwiper', {
            ...swiperTouchConfig,
            slidesPerView: 1,
            spaceBetween: 20,
            loop: teamSlides > 3,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 4 },
            }
        });
    }

    document.querySelectorAll('.lastSwiper:not(.sports-politics-swiper)').forEach((slider) => {
        const slideCount = slider.querySelectorAll('.swiper-slide').length;
        new Swiper(slider, {
            ...swiperTouchConfig,
            slidesPerView: 1,
            spaceBetween: 16,
            loop: slideCount > 1,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                0: { slidesPerView: 1, spaceBetween: 16 },
                576: { slidesPerView: 2, spaceBetween: 20 },
                768: { slidesPerView: 3, spaceBetween: 20 },
                992: { slidesPerView: 4, spaceBetween: 20 }
            }
        });
    });

    document.querySelectorAll('.sports-politics-swiper').forEach((slider) => {
        const slideCount = slider.querySelectorAll('.swiper-slide').length;
        new Swiper(slider, {
            ...swiperTouchConfig,
            slidesPerView: 1,
            spaceBetween: 16,
            loop: slideCount > 1,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                0: { slidesPerView: 1, spaceBetween: 16 },
                576: { slidesPerView: 2, spaceBetween: 20 },
                992: { slidesPerView: 3, spaceBetween: 20 }
            }
        });
    });

    if (document.querySelector('.testimonialSwiper')) {
        new Swiper('.testimonialSwiper', {
            ...swiperTouchConfig,
            slidesPerView: 1,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            speed: 1200,
        });
    }

    if (localStorage.getItem('theme') === 'dark') {
        $('body').addClass('dark-theme');
        $('.theme-toggle input').prop('checked', true);
    }

    $(".theme-toggle input").change(function() {
        $('body').toggleClass('dark-theme');
        localStorage.setItem('theme', $('body').hasClass('dark-theme') ? 'dark' : 'light');
    });
    
    if (document.querySelector('.podcast-swiper')) {
        new Swiper('.podcast-swiper', {
            ...swiperTouchConfig,
            loop: true,
            spaceBetween: 30,
            navigation: {
                nextEl: '.podcast-swiper-next',
                prevEl: '.podcast-swiper-prev',
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                576: { slidesPerView: 2 },
                992: { slidesPerView: 3 }
            }
        });
    }

});
</script>

<script>
let ytPlayers = [];

let chainedCallback = window.onYouTubeIframeAPIReady;
window.onYouTubeIframeAPIReady = function () {
    if (typeof chainedCallback === 'function') {
        try { chainedCallback(); } catch(e) {}
    }

    document.querySelectorAll('iframe').forEach((iframe) => {

        if (!iframe.id) return;

        try {
            let player = new YT.Player(iframe.id, {
                events: {
                    onStateChange: function (event) {
                        if (event.data === YT.PlayerState.PLAYING) {
                            ytPlayers.forEach(p => {
                                if (p !== event.target && p.pauseVideo) {
                                    try { p.pauseVideo(); } catch(e) {}
                                }
                            });
                        }
                    }
                }
            });

            ytPlayers.push(player);
        } catch(e) {}

    });
};

function openVideo(url) {
    // Substack link ko embed link mein badalna
    // Misal: substack.com/p/video-name -> substack.com/embed/p/video-name
    let embedUrl = url.replace('/p/', '/embed/p/');
    
    const iframe = document.getElementById('videoIframe');
    iframe.src = embedUrl;
    
    // Modal dikhana
    var myModal = new bootstrap.Modal(document.getElementById('videoModal'));
    myModal.show();
}

// Auto-Pause Logic: Jab modal band ho to video stop ho jaye
const videoModalEl = document.getElementById('videoModal');
if (videoModalEl) {
    videoModalEl.addEventListener('hidden.bs.modal', function () {
        const videoIframe = document.getElementById('videoIframe');
        if (videoIframe) videoIframe.src = "";
    });
}

document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelector('#unfilteredSwiper')) {
        const swiper = new Swiper("#unfilteredSwiper", {
            allowTouchMove: true,
            simulateTouch: true,
            touchRatio: 1,
            touchAngle: 45,
            threshold: 5,
            touchStartPreventDefault: false,
            touchMoveStopPropagation: false,
            touchReleaseOnEdges: true,
            resistance: true,
            resistanceRatio: 0.85,
            grabCursor: true,
            preventClicks: true,
            preventClicksPropagation: true,
            slideToClickedSlide: false,
            watchSlidesProgress: true,
            observer: true,
            observeParents: true,
            resizeObserver: true,
            slidesPerView: 1,      // Mobile par 1 card
            spaceBetween: 20,      // Cards ke beech gap
            loop: true,
            navigation: {
                nextEl: "#unfilteredSwiper .swiper-button-next",
                prevEl: "#unfilteredSwiper .swiper-button-prev",
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4, // Baray Desktop par 4 cards dikhayega
                }
            }
        });
    }
});

</script>
</body>
</html>