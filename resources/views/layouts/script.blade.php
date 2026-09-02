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

    if (document.querySelector('.mySwiper')) {
        new Swiper('.mySwiper', {
            slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 7000,
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

    let videoSwiper = null;

    if (document.querySelector('.videoSwiper')) {
        videoSwiper = new Swiper('.videoSwiper', {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 7000,
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

    if (document.querySelector('.teamSwiper')) {
        new Swiper('.teamSwiper', {
            slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 7000,
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

    document.querySelectorAll('.lastSwiper').forEach((slider) => {
        new Swiper(slider, {
            slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 7000,
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

    if (document.querySelector('.testimonialSwiper')) {
        new Swiper('.testimonialSwiper', {
            slidesPerView: 1,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
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

</script>


<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script async src="https://www.instagram.com/embed.js"></script>

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

</script>
</body>
</html>