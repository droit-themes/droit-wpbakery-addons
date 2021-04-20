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
	};

	if ($('.main_slider').length) {
		$('.main_slider').on('init', function (e, slick) {
			var $firstAnimatingElements = $('div.slider_item:first-child').find(
				'[data-animation]'
			);
			doAnimations($firstAnimatingElements);
		});
		$('.main_slider').on(
			'beforeChange',
			function (e, slick, currentSlide, nextSlide) {
				var $animatingElements = $(
					'div.slider_item[data-slick-index="' + nextSlide + '"]'
				).find('[data-animation]');
				doAnimations($animatingElements);
			}
		);
		var slideCount = null;

		$('.main_slider').slick({
			autoplay: true,
			autoplaySpeed: 5000,
			dots: true,
			fade: true,
			dots: false,
			prevArrow: '.left_arrow',
			nextArrow: '.right_arrow',
		});

		function doAnimations(elements) {
			var animationEndEvents =
				'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
			elements.each(function () {
				var $this = $(this);
				var $animationDelay = $this.data('delay');
				var $animationType = 'animated ' + $this.data('animation');
				$this.css({
					'animation-delay': $animationDelay,
					'-webkit-animation-delay': $animationDelay,
				});
				$this.addClass($animationType).one(animationEndEvents, function () {
					$this.removeClass($animationType);
				});
			});
		}
	}
});