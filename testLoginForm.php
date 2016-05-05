<?php

require_once __DIR__ . "/src/App.php";

$usr = new \aw\logic\Usuario();

$ok = $usr->login($_REQUEST["username"], $_REQUEST["password"]);

if ($ok) {
  echo "LOGIN OK";
} else {
  echo "LOGIN FALLIDO";
}

?>
