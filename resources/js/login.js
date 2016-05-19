$(document).ready(function() {

  var dialog = $("#dialog-form").dialog({
    autoOpen: false,
    height: 350,
    width: 350,
    modal: true,
    buttons: {
      "Login": function() {
        $("#jquery-login-form").submit();
        return true;
      },
      "Cancelar": function() {
        dialog.dialog("close");
      }
    },
    close: function() {
    }
  });

  $("#enlace-login").click(function(event) {
    event.preventDefault();
    dialog.dialog("open");
  });

});
