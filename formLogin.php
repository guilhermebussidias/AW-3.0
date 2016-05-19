<?php

require_once __DIR__ . "/src/App.php";

if (is_null(getRole())) {
  $name = $_REQUEST["name"];
  $pass = $_REQUEST["password"];

  $logic = new \aw\logic\Usuario();
  $user = $logic->checkLogin($name, $pass);

  if (!is_null($user)) {
    sessionLogin($user["usuario"], $user["rol"], $user["id"]);
    redirect(getBasePath());
  } else {
    redirect(getBasePath() . "nuevoUsuario.php");
  }
} else {
  sessionLogout();
  redirect(getBasePath());
}

?>
