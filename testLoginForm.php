<?php

require_once __DIR__ . "/src/App.php";

$usr = new \aw\logic\Usuario();

$ok = $usr->login($_REQUEST["username"], $_REQUEST["password"]);

if ($ok) {
  echo "<b>LOGIN OK</b>";
  echo "<b>Rol: " . getRole() . "</b>";
} else {
  echo "<b>LOGIN FALLIDO</b>";
}

?>
