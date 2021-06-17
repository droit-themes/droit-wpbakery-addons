;
jQuery(function($) {
    "use strict"
 
   // Show popup when click on play button 

   let popUpButton =   $('.show-video-pupup');
   let popUpButton2 =   $('.show-video-popup-2');
   let popUpbutton3 = $('.svp-3');
   let popUpClose = $('.close-vidoe-modal');
  
   popUpButton.on('click', function(){

        let videoLink = $(this).data('video');
        $(this).siblings('.vidoe-pop-up-wrapper').fadeIn('slow');
        $(this).siblings('.vidoe-pop-up-wrapper').find('iframe').attr('src', videoLink);
        // prevent mouse scroll when popup show 
        $('.pop-up').bind('mousewheel',function(){ return false; });

        return false;

   });
   popUpButton2.on('click', function(){

        let videoLink = $(this).data('video');
        $(this).parents('.corporate_video_icon').siblings('.vidoe-pop-up-wrapper').fadeIn('slow');
        $(this).parents('.corporate_video_icon').siblings('.vidoe-pop-up-wrapper').find('iframe').attr('src', videoLink);
        // prevent mouse scroll when popup show 
        $('.pop-up').bind('mousewheel',function(){ return false; });

        return false;

   });

   //  pup up button 3 

   popUpbutton3.on('click', function(){
      let videoLink = $(this).attr('href');
      $(this).parents('.shop_video').siblings('.vidoe-pop-up-wrapper').fadeIn('slow');
      $(this).parents('.shop_video').siblings('.vidoe-pop-up-wrapper').find('iframe').attr('src', videoLink);
   });

   //  close popup when click on close button 

   popUpClose.on('click', function() {

      $(this).parents('.pop-up').fadeOut();
       // reset video url 
      $(this).parents('.pop-up-content').find('iframe').attr('src', '');
    
    return false;

   });

 //  close popup when click on popup   
   $('.pop-up').on('click', function(e) {

    if (e.target !== this)
      return;

      $(this).fadeOut();
      // reset video url 
      $(this).parents('.pop-up-content').find('iframe').attr('src', '');
  });
  

});