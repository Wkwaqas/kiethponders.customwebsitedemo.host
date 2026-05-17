<div class="form-check form-switch theme-toggle sticky-toggle-btn" aria-label="Toggle theme" id="themeSwitch">
  <input class="form-check-input" type="checkbox" />
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script async src="https://www.instagram.com/embed.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // =========================
    // Gallery Swiper
    // =========================
    if (document.querySelector('.mySwiper')) {
        new Swiper('.mySwiper', {
            slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 4 },
            }
        });
    }

    // =========================
    // Video Swiper
    // =========================
    let videoSwiper = null;

    if (document.querySelector('.videoSwiper')) {
        videoSwiper = new Swiper('.videoSwiper', {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
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
                if (videoSwiper?.autoplay) videoSwiper.autoplay.stop();
            });

            video.addEventListener('mouseleave', () => {
                if (videoSwiper?.autoplay) videoSwiper.autoplay.start();
            });

            video.addEventListener('play', () => {
                if (videoSwiper?.autoplay) videoSwiper.autoplay.stop();
            });

            video.addEventListener('pause', () => {
                if (videoSwiper?.autoplay) videoSwiper.autoplay.start();
            });

            video.addEventListener('ended', () => {
                if (videoSwiper?.autoplay) videoSwiper.autoplay.start();
            });
        });
    }

    // =========================
    // Team Swiper
    // =========================
    if (document.querySelector('.teamSwiper')) {
        new Swiper('.teamSwiper', {
            slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: true,
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 3 },
            }
        });
    }

    // =========================
    // Blog / lastSwiper sections
    // =========================
    document.querySelectorAll('.lastSwiper').forEach((slider) => {
        new Swiper(slider, {
            slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: true,
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 4 }
            }
        });
    });

    // =========================
    // Testimonial Swiper
    // =========================
    if (document.querySelector('.testimonialSwiper')) {
        new Swiper('.testimonialSwiper', {
            slidesPerView: 1,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            speed: 1200,
        });
    }

    // =========================
    // Theme Toggle
    // =========================
    if (localStorage.getItem('theme') === 'dark') {
        $('body').addClass('dark-theme');
        $('.theme-toggle input').prop('checked', true);
    }

    $(".theme-toggle input").change(function() {
        $('body').toggleClass('dark-theme');
        localStorage.setItem('theme', $('body').hasClass('dark-theme') ? 'dark' : 'light');
    });

    // =========================
    // Podcast Swiper
    // =========================
    if (document.querySelector('.podcast-swiper')) {
        new Swiper('.podcast-swiper', {
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

  
<!-- Swiper CSS -->
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>-->

<!-- Swiper JS -->
<!--<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>-->
<!--<script src="https://www.youtube.com/iframe_api"></script>-->
<!--<script async src="https://www.instagram.com/embed.js"></script>-->

<!--<script>-->
<!--let ytPlayers = [];-->

/* =========================
   YOUTUBE API READY (GLOBAL)
========================= */
<!--window.onYouTubeIframeAPIReady = function () {-->

<!--    const iframes = document.querySelectorAll('#unfilteredSwiper iframe');-->

<!--    iframes.forEach((iframe) => {-->

<!--        if (!iframe.id) return;-->

<!--        const player = new YT.Player(iframe.id, {-->
<!--            events: {-->
<!--                onStateChange: function (event) {-->

                    // Only one video plays at a time
<!--                    if (event.data === YT.PlayerState.PLAYING) {-->
<!--                        ytPlayers.forEach((p) => {-->
<!--                            if (p !== event.target && p.pauseVideo) {-->
<!--                                try { p.pauseVideo(); } catch(e) {}-->
<!--                            }-->
<!--                        });-->
<!--                    }-->
<!--                }-->
<!--            }-->
<!--        });-->

<!--        ytPlayers.push(player);-->
<!--    });-->
<!--};-->




<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script async src="https://www.instagram.com/embed.js"></script>

<script>
let ytPlayers = [];

/* =========================
   YOUTUBE INIT
========================= */
window.onYouTubeIframeAPIReady = function () {

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

/* =========================
   SWIPER 1
========================= */
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
document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
    document.getElementById('videoIframe').src = "";
});

document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper("#unfilteredSwiper", {
        slidesPerView: 1,      // Mobile par 1 card
        spaceBetween: 20,      // Cards ke beech gap
        loop: true,
        navigation: {
            nextEl: "#unfilteredSwiper .swiper-button-next",
            prevEl: "#unfilteredSwiper .swiper-button-prev",
        },
        // Yeh hissa Desktop design theek karega
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
});

// Top Stories Swiper
if (document.querySelector('.topStoriesSwiper')) {
    new Swiper('.topStoriesSwiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        // autoplay: {
        //     delay: 4500,
        //     disableOnInteraction: false,
        // },
        navigation: {
            nextEl: '.top-stories-next',
            prevEl: '.top-stories-prev',
        },
        breakpoints: {
            768:  { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
            1200: { slidesPerView: 4 }
        }
    });
}
</script>
</body>
</html>