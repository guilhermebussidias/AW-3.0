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
  $logic = new \aw\logic\Usuario();
  $user = $logic->findByName($_REQUEST["name"]);
  if (strcmp($_REQUEST["password"], $user["pass"]) === 0) {
    login($user["usuario"], $user["rol"]);
    redirect(getBasePath());
  } else {
    redirect(getBasePath() . "nuevoUsuario.php");
  }
} else {
  // -> Logout
  logout();
  redirect(getBasePath());
}
?>
