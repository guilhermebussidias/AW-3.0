<?php

require_once __DIR__ . "/src/App.php";

/*
$usr = new \aw\logic\Usuario();

$ok = $usr->login($_REQUEST["name"], $_REQUEST["password"]);

if ($ok) {
  redirect(getBasePath());
} else {
  redirect(getBasePath() . "nuevoUsuario.php");
}
*/

if (is_null(getRole())) {
  // -> Login
  $name = $_REQUEST["name"];
  $pass = $_REQUEST["password"];

  $logic = new \aw\logic\Usuario();
  $user = $logic->checkLogin($name, $pass);

  if (!is_null($user)) {
    sessionLogin($user["usuario"], $user["rol"]);
    redirect(getBasePath());
  } else {
    redirect(getBasePath() . "nuevoUsuario.php");
  }
} else {
  // -> Logout
  sessionLogout();
  redirect(getBasePath());
}

?>
