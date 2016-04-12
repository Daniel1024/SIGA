$(document).ready(function (){
   $('#toggle-menu').click(function(ev) {
      ev.preventDefault();
      $(this).next().slideToggle();
   });
   var $menu = $('.menu').find('li');
   $menu.on('click', 'a.scroll', function (ev){
      ev.preventDefault();
      var $toggle = $('#toggle-menu')
      if ($toggle.css('display') == 'block') {
         $toggle.next().slideToggle();
      }
      //console.log($($(this).attr('href')).offset().top);
      $('html, body').animate({
         scrollTop: ($($(this).attr('href')).offset().top - 63)
      }, 1000);
   });
   $('.owl-banner').owlCarousel({
      loop:true,
      //nav:true,
      dots:true,
      items:1,
      center:true,
      autoplay:true,
      autoplayHoverPause:true,
      autoplayTimeout:10000,
      smartSpeed:500
      //navText:['<i class="fa fa-caret-left fa-5x"></i>', '<i class="fa fa-caret-right fa-5x"></i>']
   });
   $('.owl-clientes').owlCarousel({
      loop:true,
      nav:false,
      //dots:true,
      items:1,
      //center:true,
      autoplay:true,
      margin:20,
      autoplayHoverPause:true,
      autoplayTimeout:10000,
      smartSpeed:500,
      navText:['<i class="fa fa-chevron-left fa-3x"></i>', '<i class="fa fa-chevron-right fa-3x"></i>'],
      responsive : {
         991 : {
           items:2,
           nav:true
         },
         767 : {
            nav:true
         }
      }
   });
   $('.fancybox').fancybox();
});