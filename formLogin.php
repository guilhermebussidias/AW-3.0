<?php

require_once __DIR__ . "/src/App.php";

$usr = new \aw\logic\Usuario();

$ok = $usr->login($_REQUEST["name"], $_REQUEST["password"]);

if ($ok) {
  redirect(getBasePath());
} else {
  redirect(getBasePath() . "nuevoUsuario.php");
}

?>
