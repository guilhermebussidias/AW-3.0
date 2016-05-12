<?php

	require_once __DIR__ . "/src/App.php";
	$logic = new \aw\logic\Usuario();

	if ($_REQUEST["boton"] === "crear-usuario"){
		if ($_REQUEST["usuario-rol"] !== "" && $_REQUEST["usuario-nombre"] !== "" && $_REQUEST["usuario-pass"] !== ""){
			$logic->newUser($_REQUEST["usuario-nombre"], $_REQUEST["usuario-pass"], $_REQUEST["usuario-rol"]);
		}
	}
	if($_REQUEST["boton"] === "eliminar-usuario"){
		if ($_REQUEST["usuario-nombre"] !== ""){
			$logic->deleteUser($_REQUEST["usuario-nombre"]);
		}
	}

?>