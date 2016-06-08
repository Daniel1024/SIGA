$(document).ready(function (){

   var $URLactual = window.location.href;
   var $menu = $('.sidebar');

   //--------------------------------------------------------------------------------------------------------------
   $menu.find('a').each(function() {

      var $text = $(this).attr('href');
      //console.log($URLactual);
      if ($URLactual === $text) {
         $(this).click(function (arg) {
            arg.preventDefault();
         });
         $(this).parent().addClass('active');
         if ($(this).parent().parent().parent().hasClass('parent')) {
            $(this).parent().parent().show();
         } else {
            $(this).next().show();
         }


         //console.log($(this).parent().parent().parent().hasClass('parent'));
         /*if (!$(this).parent().parent().parent().hasClass('parent')) {
            $menu.find('li.parent>ul').hide();
         }*/

         return false;
      }
   });
   //console.log($URLactual);
   //--------------------------------------------------------------------------------------------------------------
   /*Codigo para el dropdown del menu*/
   $menu.on('click', 'li.parent>a', function (ev){
      var $elemento = $(this);
      if ($elemento.attr('href') == '#') {
         ev.preventDefault();
         $elemento.find('>i').toggleClass('fa-chevron-circle-up').toggleClass('fa-chevron-circle-down');
         $(this).next().slideToggle();
      }
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
   /*Codigo para el datatable avanzado*/
   $('#example').DataTable({
            "language": {
               "sProcessing":     "Procesando...",
               "sLengthMenu":     "Mostrar _MENU_ registros",
               "sZeroRecords":    "No se encontraron resultados",
               "sEmptyTable":     "Ningún dato disponible en esta tabla",
               "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
               "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
               "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
               "sInfoPostFix":    "",
               "sSearch":         "Buscar:",
               "sUrl":            "",
               "sInfoThousands":  ",",
               "sLoadingRecords": "Cargando...",
               "oPaginate": {
                  "sFirst":    "<i class='fa fa-angle-double-right' aria-hidden='true'></i>",
                  "sLast":     "<i class='fa fa-angle-double-left' aria-hidden='true'></i>",
                  "sNext":     "<i class='fa fa-angle-right' aria-hidden='true'></i>",
                  "sPrevious": "<i class='fa fa-angle-left' aria-hidden='true'></i>"
               },
               "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
               }
            }
        } );
   /*Codigo para el datatable avanzado*/
   //--------------------------------------------------------------------------------------------------------------
   //
/*
   $('a.btn-link').fancybox();
   $text = $('#codeigniter_profiler');
   $('#codeigniter_profiler').remove();
   $('section.main').append($text);
*/
});

/*Mensajes para mostrar al usuario

function mensaje_error($mensaje) {
   $.fancybox.open('<div style="width: 400px; margin-bottom: 0; height: 65px" class="alert danger"><span>' + $mensaje +
       '</span><a href="javascript:$.fancybox.close();"></a></div>',
       {
          //autoSize : false,
          modal: true,
          padding : 0
       } );
   $('.alert').parent().append('<style>.fancybox-inner{height:65px!important;}</style>');
}

function mensaje_ok($mensaje) {
   $.fancybox.open('<div style="width: 400px; margin-bottom: 0; height: 65px" class="alert success"><span>' + $mensaje +
       '</span><a href="javascript:$.fancybox.close();"></a></div>',
       {
          modal: true,
          padding : 0
       } );
   $('.alert').parent().append('<style>.fancybox-inner{height:65px!important;}</style>');
}

function mensaje_info($mensaje) {
   $.fancybox.open('<div style="width: 400px; margin-bottom: 0; height: 65px" class="alert primary"><span>' + $mensaje +
       '</span><a href="javascript:$.fancybox.close();"></a></div>',
       {
          autoSize : false,
          modal: true,
          padding : 0
       } );
   $('.alert').parent().append('<style>.fancybox-inner{height:65px!important;}</style>');
}

function mensaje_warning($mensaje) {
   $.fancybox.open('<div style="width: 400px; margin-bottom: 0; height: 65px" class="alert warning"><span>' + $mensaje +
       '</span><a href="javascript:$.fancybox.close();"></a></div>',
       {
          modal: true,
          padding : 0
       } );
   $('.alert').parent().append('<style>.fancybox-inner{height:65px!important;}</style>');
}*/