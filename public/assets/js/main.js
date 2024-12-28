// Scroll To Top Button
$(window).scroll(function(){ 
  if ($(this).scrollTop() > 200) { 
    $('#scrollTopBtn').fadeIn(); 
  } else { 
    $('#scrollTopBtn').fadeOut(); 
  } 
}); 
$('#scrollTopBtn').click(function(){ 
  $("html, body").scrollTop(0);
  //$("html, body").animate({ scrollTop: 0 }, 600); 
  return false; 
}); 

// Fixed Sticky Header
$scroll = $(this).scrollTop();
if($scroll>=80){
  $('.header-main').addClass('fixed-header');
}else{
  $('.header-main').removeClass('fixed-header');
}
$(window).scroll(function(){
  $scroll = $(this).scrollTop();
  if($scroll>=80){
    $('.header-main').addClass('fixed-header');
  }else{
    $('.header-main').removeClass('fixed-header');
  }
});

// Indicator Arrow Show Hide
$scroll = $(this).scrollTop();
  if($scroll>=200){
    $('.indicator-arrow-bottom').css('display','none');
  }
$(window).scroll(function(){
  $scroll = $(this).scrollTop();
  if($scroll>=200){
    setTimeout(function(){
      $('.indicator-arrow-bottom').css('display','none');
    },500);
    $('.indicator-arrow-bottom').css('opacity','0');
  }else{
    setTimeout(function(){
      $('.indicator-arrow-bottom').css('display','none');
    },500);
    $('.indicator-arrow-bottom').css('opacity','0');
  }
});

// Navbar Toggle Button For Mini Device
$('.navbar-menu-toggle-btn').click(function(){
  $('.navbar-main').toggleClass('menu-visible');
  $('body').toggleClass('body-overflow');
});

// Navbar Item Submenu Collapse Show Hide For Small Devices
$(window).on('load', function() {
  if($(window).width() <= 1024){
    $('.nav-item-submenu').addClass('collapse');
  }else{
    $('body').removeClass('body-overflow');
    $('.nav-item-submenu').removeClass('collapse');
  }
});
$(window).on('resize', function() {
  if($(window).width() <= 1024){
    $('.nav-item-submenu').addClass('collapse');
  }else{
    $('body').removeClass('body-overflow');
    $('.nav-item-submenu').removeClass('collapse');
  }
  if($(window).width() >= 1024){
    $('body').removeClass('body-overflow');
  }
});

// Navbar Toggle Button For Mini Device
$(".item-has-submenu .nav-item-link").click(function(e){
  e.preventDefault();
    $(this).parent().find(".collapse").collapse('toggle');
});

// Owl-Carousel Slider
// $('.home-main-slider-inner-').owlCarousel({
//   loop:true,
//   margin:0,
//   mouseDrag:true,
//   autoplay:true,
//   // animateOut: 'slideOutDown',
//   // animateIn: 'flipInX',
//   smartSpeed:1000,
//   autoplayTimeout:5000,
//   autoplayHoverPause: false,
//   responsiveClass: true,
//   responsive:{
//       0:{
//           items:1
//       },
//       600:{
//           items:1
//       },
//       1000:{
//           items:1
//       }
//   },
//   dots: true,
//   nav:false,
// });

// JS for Progress Bar
$('.progressbar').progressBar({
    shadow: true,
    percentage: true,
    animation: true,
    barColor: "#00A99D",
});



// Slick Slider
// $('.slider-for').slick({
//   slidesToShow: 1,
//   slidesToScroll: 1,
//   arrows: true,
//   fade: true,
//   asNavFor: '.slider-nav'
// });
// $('.slider-nav').slick({
//   slidesToShow: 4,
//   slidesToScroll: 1,
//   asNavFor: '.slider-for',
//   arrows: true,
//   centerMode: true,
//   focusOnSelect: true
// });


// Section Scroll on homepage

$(".cm-services").click(function(e) {
    e.preventDefault();
    if($('#cm-services').length > 0){
      $(".nav-item-link").removeClass('active');
      $(this).addClass('active');
      $('html,body').animate({
        scrollTop: $('#cm-services').offset().top+20},
      500);
    }
    
});
$(window).scroll(function(){
  setTimeout(function(){
    $scroll = $(this).scrollTop();
    if($('#cm-services').length > 0){
      if($scroll <= 100){
        $(".nav-item-link").removeClass('active');
        $(".nav-item-main:first-child .nav-item-link").addClass('active');
      }else{
        $(".nav-item-link").removeClass('active');
        $(".nav-item-link.cm-services").addClass('active');
      }
    }
  },1000)
})