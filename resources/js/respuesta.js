$(document).ready(function() {
  var direccion = $("#redireccion").text();
  var dialogE = $("#mensaje").dialog({
    autoOpen: true,
    maxHeight: 250,
    maxWidth: 200,
    modal: true,
    buttons: {
      "Aceptar": function() {
        dialogE.dialog("close");
        window.location.href = direccion;
      }
    },
    close: function() {
      window.location.href = direccion;
    }
  });
});