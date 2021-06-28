;
jQuery(function($){
   "use strict";

 //  WooCommerce Quick view 
 function splitting() {
	var split = $('[data-splitting]');
	split.each(function () {
		Splitting();
	});
}

if($('[data-splitting]').length) {
	splitting();
}


 if ($('#wavescroll').length > 0) {
	$('#wavescroll').fullpage({
		navigation: true,
		navigationPosition: 'right',
		autoScrolling: true,
		scrollBar: false,
		scrollOverflow: true,
		animateAnchor: true,
		css3: true,
		verticalCentered: true,
		scrollingSpeed: 1000,
		afterResponsive: function (isResponsive) {},
		afterLoad: function (anchorLink, index) {

			let totalSection = $('#wavescroll section').length;
			
			if (index == totalSection) {
				$('.full_footer').addClass('content-black');
			} else {
				$('.full_footer').removeClass('content-black');
			}

			if ($(window).width() < 767) {
				if (index == 1 || index == totalSection) {
					$('.full_footer').css('display', 'block');
				} else {
					$('.full_footer').css('display', 'none');
				}
			}
		},
	});
	
	$('#moveDown').click(function () {
		$.fn.fullpage.moveSectionDown();
	});

	$('#fp-nav ul').empty();
	var $dataName = document.querySelectorAll('[data-name]');
	var datatitle = '';
	[...$dataName].forEach((title) =>
		$('#fp-nav ul').append(
			"<li><a href='#'><span>" +
				title.getAttribute('data-name') +
				'</span></a></li>'
		)
	);
	$('#fp-nav ul li a').first().addClass('active');
}

 let quickView = $('.button.yith-wcqv-button');
 let compaireButton = $('.compare.button');
 if(compaireButton.length > 0 ) {
	compaireButton.html('<i class="ti-loop"></i>'); 
	compaireButton.addClass('product_nav_action_item dl_tooltip_top');
	compaireButton.removeClass('button');
 }
	if(quickView.length > 0 ) {
		quickView.html('<i class="ti-eye"></i>');
		quickView.addClass('product_nav_action_item dl_tooltip_top');
	}

   //  one page section setting 
   let onePageSection = $('.page-template-onepage #wavescroll .section');
   
   if(onePageSection.length > 0 ){
	onePageSection.each(function(i, e){
        
		if(i === 0) {
			$(this).addClass('agency_scroll_section_one');
		}else if (i === 1) {
			$(this).addClass('agency_scroll_section_two');
		} else if(i === (onePageSection.length - 1)){
			$(this).addClass('agency_scroll_contact');
		}else{
			$(this).addClass('section agency_scroll_section');	
		}

	});
   }

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