;
jQuery(function($){
   "use strict";
     
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
	}

});