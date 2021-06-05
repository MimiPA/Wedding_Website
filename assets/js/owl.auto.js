$(document).ready(function(){
    $(".owl-carousel").owlCarousel();
  });




var owl = $('.owl-carousel');
owl.owlCarousel({
    items:3,
    loop:true,
    margin:50,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})