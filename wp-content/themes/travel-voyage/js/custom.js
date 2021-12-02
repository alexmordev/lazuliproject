jQuery(document).ready(function($) {

    var slider_auto, slider_loop, rtl;
    
    if( chic_lite_data.auto == '1' ){
        slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( chic_lite_data.loop == '1' ){
        slider_loop = true;
    }else{
        slider_loop = false;
    }
    
    if( chic_lite_data.rtl == '1' ){
        rtl = true;
    }else{
        rtl = false;
    }


   //Banner slider js
   $('.site-banner.style-five .item-wrap').owlCarousel({
        items: 4,
        autoplay: slider_auto,
        loop: slider_loop,
        nav: true,
        dots: false,
        autoplaySpeed : 800,
        autoplayTimeout: 3000,
        rtl: rtl,
        responsive : {
            0 : {
                items: 1,
            }, 
            768 : {
                items: 2,
            }, 
            1025 : {
                items: 3,
            }, 
            1367 : {
                items: 4,
            }
        }
    });
});
