;
jQuery(function($) {
    'use strict';
    if ($('.dt-architecture').length) {
		var $slide = $('.dt-architecture')
			.slick({
				infinite: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				fade: true,
				speed: 1000,
				autoplaySpeed: 3000,
				autoplay: true,
			})
			.on({
				beforeChange: function (event, slick, currentSlide, nextSlide) {
					$('.slick-slide', this).eq(currentSlide).addClass('preve-slide');
					$('.slick-slide', this).eq(nextSlide).addClass('slide-animation');
				},
				afterChange: function () {
					$('.preve-slide', this).removeClass('preve-slide　slide-animation');
				},
			});
		$slide.find('.slick-slide').eq(0).addClass('slide-animation');
	}
});