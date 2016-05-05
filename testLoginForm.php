<?php

require_once __DIR__ . "/src/App.php";

$ctrl = new \aw\ctrl\CtrlUsuario();

$ok = $ctrl->login($_REQUEST["username"], $_REQUEST["password"]);

if ($ok) {
  echo "LOGIN OK";
} else {
  echo "LOGIN FALLIDO";
}

?>
