var dialog = $("#dialog-form").dialog({
  autoOpen: false,
  height: 350,
  width: 350,
  modal: true,
  buttons: {
    "Login": doLogin,
    "Cancelar": function() {
      dialog.dialog("close");
    }
  },
  close: function() {
    form[0].reset();
    allFields.removeClass("ui-state-error");
  }
});

function doLogin() {
  $("#jquery-login-form").submit();
  return true;
}

$(function() {
  $("#enlace-login").click(function() {
    dialog.dialog("open");
  });
});
