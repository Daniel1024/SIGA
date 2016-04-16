$(document).ready(function (){
   /*if (localStorage.menu != null) {
      if (localStorage.menu != 'false') {
         $('#checkbox__hack').prop('checked', true);
      }
   }*/
   var $URLactual = window.location.pathname;
   var $menu = $('.sidebar');
   //--------------------------------------------------------------------------------------------------------------
   /*codigo solo para github borrar en produccion*/
   if (window.location.host.toString() == 'daniel1024.github.io') {
      $menu.find('a').each(function() {
         var $textGit = $(this).attr('href');
         //console.log($textGit);
         if ($textGit !== '#') {
            $(this).attr('href', '/SIGA' + $textGit);
         }
      });
   }
   /*codigo solo para github borrar en produccion*/
   //--------------------------------------------------------------------------------------------------------------
   $menu.find('a').each(function() {
      //console.log( index + ": " + $(this).attr('href') );
      var $text = $(this).attr('href');
      if ($text[0] !== '/') {
         $text = '/' + $text;
      }
      //console.log( $URLactual + ' ' + $text);
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
   //--------------------------------------------------------------------------------------------------------------
   /*Codigo para el dropdown del menu*/
   $menu.on('click', 'li.parent>a', function (ev){
      ev.preventDefault();
      var $elemento = $(this);
      $elemento.find('>i').toggleClass('fa-chevron-circle-up').toggleClass('fa-chevron-circle-down');
      $(this).next().slideToggle();
      //console.log($(this))
   });
   /*Codigo para el dropdown del menu*/
   //--------------------------------------------------------------------------------------------------------------
   /*Codigo para cerrar las alertas*/
   $('.alert').on('click', 'a', function(arg) {
      arg.preventDefault();
      $(this).parent().fadeOut("slow");
   })
   /*Codigo para cerrar las alertas*/
   /*$('#checkbox__hack').click(function() {
      localStorage.menu = $('#checkbox__hack').prop('checked');
   });*/
   //--------------------------------------------------------------------------------------------------------------
   /*Codigo para abrir y cerrar el sidebar*/
   $('#btn-menu').click(function(arg) {
      arg.preventDefault();
      $menu.toggleClass('sidebar-hide');
      $('.main').toggleClass('main-full');
   })
   /*Codigo para abrir y cerrar el sidebar*/
   //--------------------------------------------------------------------------------------------------------------
});