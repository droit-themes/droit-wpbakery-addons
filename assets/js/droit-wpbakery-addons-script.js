;
jQuery(function($){
   "use strict";
   $('.canvus_menu_btn,.nav_button,.shopping_cart').on('click', function (e) {
	e.preventDefault();
	$('body').removeClass('menu-is-closed').addClass('menu-is-opened');

	if ($('.nav_button,.shopping_cart').hasClass('active')) {
		$('.nav_button,.shopping_cart').removeClass('active');
		$('body').removeClass('menu-is-opened');
	} else {
		$('.nav_button,.shopping_cart').addClass('active');
		$('body').addClass('menu-is-opened');
	}
});

$('.close, .body_capture').on('click', function () {
	$('body').removeClass('menu-is-opened').addClass('menu-is-closed');
	$('.nav_button,.shopping_cart').removeClass('active');
});

function menu_dropdown_two() {
	if ($(window).width()) {
		$('.offcanvas_menu > li .mobile_dropdown_icon').on(
			'click',
			function (event) {
				event.preventDefault();
				$(this).parent().find('ul').first().slideToggle(700);
				$(this).parent().siblings().find('ul').slideUp(700);
			}
		);
	}
}
menu_dropdown_two();

$('.offcanvas_menu > li > .mobile_dropdown_icon').each(function () {
	var $this = $(this);
	$this.on('click', function (e) {
		var has = $this.parent().hasClass('menu_active');
		$('.offcanvas_menu > li').removeClass('menu_active');
		if (has) {
			$this.parent().first().removeClass('menu_active');
		} else {
			$this.parent().addClass('menu_active');
		}
	});
});

function menu_dropdown() {
	if ($(window).width() < 992) {
		$('.menu > li .mobile_dropdown_icon').on('click', function (event) {
			event.preventDefault();
			$(this).parent().find('.submenu_dropdown').first().slideToggle(700);
			$(this).parent().siblings().find('.submenu_dropdown').slideUp(700);
		});
	}
}
menu_dropdown();

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

	if ($('.testimonial_slider').length) {
		$('.testimonial_slider').slick({
			slidesToShow: 2,
			slidesToScroll: 1,
			centerMode: true,
			centerPadding: '350px',
			autoplay: true,
			nextArrow: '.next',
			pauseOnHover: true,
			autoplaySpeed: '1500',

			responsive: [
				{
					breakpoint: 1000,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						centerPadding: '200px',
					},
				},
				{
					breakpoint: 670,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						centerPadding: '400px',
					},
				},
				{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						centerPadding: '0px',
						centerMode: false,
					},
				},
			],
		});
	}
});