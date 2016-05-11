$(document).ready(function () {

  /*
  $("input[name='search-type']").change(function () {
    var duration = 500;
    var effect = "slide";

    var value = $(this).val(); // noticias | servicios | eventos
    var box_id = "#busca-" + value;

    var needs_delay = $(".fragmento-busqueda:visible").length > 0;

    $(".fragmento-busqueda").hide(effect, {}, duration);

    if (needs_delay) {
      $(box_id).delay(duration).show(effect, {}, duration);
    } else {
      $(box_id).show(effect, {}, duration);
    }
  });
  */
  
// $.datepicker.setDefaults($.datepicker.regional["es"]);
 // $.datepicker->setDate(date('Y'), date('m'), date('d'));
 // $.datepicker->startMonday(true);

  $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'yy-mm-dd',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);

$("#input-fecha-ini-noticia").datepicker({
  
  });

  $("#input-fecha-fin-noticia").datepicker({
    changeMonth: true,
    changeYear: true
  });

  $("#input-fecha-ini-evento").datepicker({
    changeMonth: true,
    changeYear: true
  });

  $("#input-fecha-fin-evento").datepicker({
    changeMonth: true,
    changeYear: true
  });

  $("#slider-puntuacion-servicio").slider({
    range: "max",
    min: 1,
    max: 10,
    value: 5,
    slide: function(event, ui) {
      $("#input-puntuacion-servicio").val(ui.value);
    }
  });

  $("#input-categoria-servicio").selectmenu();

  $("#contenedor-fragmentos").tabs();

});
