// Owlcarousel
$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
  	loop:true,
    margin:10,
    center: true,
    navText: [
	    "<i class='fa fa-angle-left'></i>",
	    "<i class='fa fa-angle-right'></i>"
	],
    responsive:{
        0:{
            items:1,
            nav:false,
	        autoplay:false
        },
        600:{
            items:1,
            nav:false,
	        autoplay:false
        },
        1000:{
            items:3,
            nav:true,
	        autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        }
    }
  });
});