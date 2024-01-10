
$(function() {
    
	$('header nav li a').click(function(){
	$('html , body').animate({
	scrollTop : $('#' + $(this).data('value')).offset().top},1500);
	
	
});
   
	});

$(document).ready(function(){
  $('.gallary').slick(
  {
      slidesToShow: 3,
       slidesToScroll: 1,
        infinite: true,
       speed: 500,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows:false,
      
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,

      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
  }
  );
});

