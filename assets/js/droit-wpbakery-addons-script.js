;
jQuery(function($){
   "use strict";

	// MAILCHIMP
	if ($(".mailchimp").length > 0) {
		

		$(".mailchimp").ajaxChimp({
			callback: mailchimpCallback,
			url: $(".mailchimp").data('url')
		});
	}
	$(".memail").on("focus", function () {
		$(".mchimp-errmessage").fadeOut();
		$(".mchimp-sucmessage").fadeOut();
	});
	$(".memail").on("keydown", function () {
		$(".mchimp-errmessage").fadeOut();
		$(".mchimp-sucmessage").fadeOut();
	});
	$(".memail").on("click", function () {
		$(".memail").val("");
	});

	function mailchimpCallback(resp) {
		if (resp.result === "success") {
			$(".mchimp-errmessage").html(resp.msg).fadeIn(1000);
			$(".mchimp-sucmessage").fadeOut(500);
		} else if (resp.result === "error") {
			$(".mchimp-errmessage").html(resp.msg).fadeIn(1000);
		}
	}

     
   	/*===============================================
               Parallax Init
        ================================================*/
    	// if (
		// 	$(
		// 		'#apps_craft_animation,#craft_animation,.stratup_banner_area,.banner_area'
		// 	).length > 0
		// ) {
		// 	$(
		// 		'#apps_craft_animation,#craft_animation,.stratup_banner_area,.banner_area'
		// 	).parallax({
		// 		scalarX: 10.0,
		// 		scalarY: 10.0,
		// 	});
		// }
		if ($('.home_features_slider').length) {
			$('.home_features_slider').slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				centerMode: true,
				autoplay: true,
				centerPadding: '30px',
				prevArrow: '.prev',
				nextArrow: '.next',
				autoplaySpeed: 2000,
				pauseOnHover: false,
				responsive: [
					{
						breakpoint: 1199,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
						},
					},
					{
						breakpoint: 780,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1,
						},
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							centerMode: 'false',
						},
					},
				],
			});
		}
//  counter up 

	if ($('.counter_item').length) {
		$('.counter_item').each(function () {
			$(this).isInViewport(function (status) {
				if (status === 'entered') {
					for (
						var i = 0;
						i < document.querySelectorAll('.odometer').length;
						i++
					) {
						var el = document.querySelectorAll('.odometer')[i];
						el.innerHTML = el.getAttribute('data-odometer-final');
					}
				}
			});
		});
	};
 
	// testimonial Slider 
	
	if ($('.h_testimonial_slider_inner').length) {
		$('.h_testimonial_slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			draggable: false,
			swipe: false,
			pauseOnHover: false,
			autoplay: true,
			asNavFor: '.h_testimonial_thumb',
		});
		$('.h_testimonial_thumb').slick({
			slidesToShow: 6,
			slidesToScroll: 1,
			asNavFor: '.h_testimonial_slider',
			draggable: false,
			swipe: false,
			arrows: false,
			dots: false,
			autoplay: true,
			infinite: false,
			focusOnSelect: true,
			responsive: [],
		});
	}
	new WOW().init();

	if (
		$(
			'#apps_craft_animation,#craft_animation,.stratup_banner_area,.banner_area'
		).length > 0
	) {
		$(
			'#apps_craft_animation,#craft_animation,.stratup_banner_area,.banner_area'
		).parallax({
			scalarX: 10.0,
			scalarY: 10.0,
		});
	}

	function parallax() {
		if ($('.parallaxie').length) {
			if ($(window).width() > 767) {
				$('.parallaxie').parallaxie({
					speed: 0.5,
				});
			}
		}
	}
	parallax();
});