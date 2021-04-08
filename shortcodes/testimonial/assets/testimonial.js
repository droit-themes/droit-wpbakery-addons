; 
jQuery(function($){

	if ($('.agency_testimonial_slider,.restaurent_testimonial_slider').length) {
		$('.agency_testimonial_slider,.restaurent_testimonial_slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			autoplay: true,
		});
	}
});