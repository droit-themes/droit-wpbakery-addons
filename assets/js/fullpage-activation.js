;jQuery(function($){
    "use strict"; 

    function ShowcaseCarousel() {
        console.log($('#vartical_parallax_banner .swiper-wrapper .swiper-slide').length)
        if ($('#vartical_parallax_banner .swiper-wrapper .swiper-slide').length) {
            var names = [];
            $('#vartical_parallax_banner .swiper-wrapper .swiper-slide').each(
                function (i) {
                    names.push($(this).data('name'));
                }
            );
            const slider = document.getElementById('vartical_parallax_banner');
            const interleaveOffset = 0.75;
            const swiper = new Swiper(slider, {
                loop: false,
                direction: 'vertical',
                speed: 750,
                watchSlidesProgress: true,
                slidesPerView: 1,
                mousewheel: true,
                mousewheelControl: true,
                mousewheelForceToAxis: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        return (
                            '<div class="' +
                            className +
                            '"> <span>' +
                            names[index] +
                            '</span> </div>'
                        );
                    },
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper_next',
                    prevEl: '.swiper_prev',
                },
                on: {
                    progress: function () {
                        let swiper = this;
    
                        for (let i = 0; i < swiper.slides.length; i++) {
                            let slideProgress = swiper.slides[i].progress;
                            let innerOffset = swiper.height * interleaveOffset;
                            let innerTranslate = slideProgress * innerOffset;
                            TweenMax.set(swiper.slides[i].querySelector('.slide-inner'), {
                                y: innerTranslate,
                            });
                        }
                    },
                    touchStart: function () {
                        let swiper = this;
                        for (let i = 0; i < swiper.slides.length; i++) {
                            swiper.slides[i].style.transition = '';
                        }
                    },
                    setTransition: function (speed) {
                        let swiper = this;
                        for (let i = 0; i < swiper.slides.length; i++) {
                            swiper.slides[i].style.transition = speed + 'ms';
                            swiper.slides[i].querySelector('.slide-inner').style.transition =
                                speed + 'ms';
                        }
                    },
                    slideChangeTransitionEnd: function () {
                        if (this.isEnd) {
                            this.navigation.$nextEl.css('display', 'none');
                        } else {
                            this.navigation.$nextEl.css('display', 'block');
                        }
                    },
                    init: function () {
                        $('.swiper_next').removeClass('animate');
                        $('.swiper_next').removeClass('active');
                        $('.swiper_next').eq(0).addClass('animate');
                        $('.swiper_next').eq(0).addClass('active');
                    },
                    slideChangeTransitionStart: function () {
                        $('.swiper_next').removeClass('animate');
                        $('.swiper_next').removeClass('active');
                        $('.swiper_next').eq(0).addClass('active');
                    },
                    slideChangeTransitionEnd: function () {
                        $('.swiper_next').eq(0).addClass('animate');
                    },
                },
            });
            // var swiper = $("#const_masonry,.travel_gallery_info,#masonry2");
            var startScroll, touchStart, touchCurrent;
            swiper.slides.on(
                'touchstart',
                function (e) {
                    startScroll = this.scrollTop;
                    touchStart = e.targetTouches[0].pageY;
                },
                true
            );
            swiper.slides.on(
                'touchmove',
                function (e) {
                    touchCurrent = e.targetTouches[0].pageY;
                    var touchesDiff = touchCurrent - touchStart;
                    var slide = this;
                    var onlyScrolling =
                        slide.scrollHeight > slide.offsetHeight &&
                        ((touchesDiff < 0 && startScroll === 0) ||
                            (touchesDiff > 0 &&
                                startScroll === slide.scrollHeight - slide.offsetHeight) ||
                            (startScroll > 0 &&
                                startScroll < slide.scrollHeight - slide.offsetHeight));
                    if (onlyScrolling) {
                        e.stopPropagation();
                    }
                },
                true
            );
        }
    }
    ShowcaseCarousel();
});