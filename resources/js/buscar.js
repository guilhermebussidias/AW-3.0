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
  
  $.datepicker.setDefaults($.datepicker.regional["es"]);

  $("#input-fecha-ini-noticia").datepicker({
    changeMonth: true,
    changeYear: true
  });
  //$("#input-fecha-ini-noticia").datepicker("option", $.datepicker.regional["fr"]);

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
