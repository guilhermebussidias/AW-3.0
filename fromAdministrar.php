<?php

	require_once __DIR__ . "/src/App.php";
	$logic = new \aw\logic\Usuario();

	if ($_REQUEST["boton"] === 0){
		if ($_REQUEST["usuario-id"] !== "" && $_REQUEST["usuario-nombre"] !== "" && $_REQUEST["usuario-pass"] !== "")
			$logic->newUser($name, $password, $role)
	}
?>