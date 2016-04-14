$(document).ready(function (){
   var $URLactual = window.location.pathname;
   var $menu = $('.sidebar').find('ul');
   $('.sidebar').find('a').each(function(index) {
      //console.log( index + ": " + $(this).attr('href') );
      var $text = $(this).attr('href');
      if ($text[0] !== '/') {
         $text = '/' + $text;
      }
      if ($URLactual === $text) {
         $(this).parent().addClass('active');
         //console.log($(this).parent().parent().parent().hasClass('parent'));
         if (!$(this).parent().parent().parent().hasClass('parent')) {
            $menu.find('li.parent>ul').hide();
         }
         return false;
      }
   });
   //console.log($URLactual);
   /*Codigo para el dropdown del menu*/
   $menu.on('click', 'li.parent>a', function (ev){
      ev.preventDefault();
      var $elemento = $(this);
      $elemento.find('>i').toggleClass('fa-chevron-circle-up').toggleClass('fa-chevron-circle-down');
      $(this).next().slideToggle();
      //console.log($(this))
   });
   /*Codigo para el dropdown del menu*/
});