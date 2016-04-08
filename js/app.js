$(document).ready(function (){
   $('#toggle-menu').click(function(ev) {
      ev.preventDefault();
      $(this).next().slideToggle();
   });
   var $menu = $('.menu').find('li');
   $menu.on('click', 'a', function (ev){
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
   $('.owl-carousel').owlCarousel({
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
   $('.fancybox').fancybox();
});