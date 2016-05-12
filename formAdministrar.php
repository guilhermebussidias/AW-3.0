<?php

	require_once __DIR__ . "/src/App.php";
	$logic = new \aw\logic\Usuario();
	$logicNoticia = new \aw\logic\Noticia();
	$logicServicio = new \aw\logic\servicioEspecifico();

	if ($_REQUEST["boton"] === "crear-usuario"){
		if ($_REQUEST["usuario-rol"] !== "" && $_REQUEST["usuario-nombre"] !== "" && $_REQUEST["usuario-pass"] !== ""){
			$logic->newUser($_REQUEST["usuario-nombre"], $_REQUEST["usuario-pass"], $_REQUEST["usuario-rol"]);
		}
	}

	else if ($_REQUEST["boton"] === "modificar-noticia"){
		$titulo = $_REQUEST["titulo"];
		$contenido = $_REQUEST["contenido"];
		$id = $_REQUEST["id"];
			$logicNoticia->updateNoticia($id, $titulo, $contenido);
			echo "todo ok";
	}
	elseif ($_REQUEST["boton"] === "crear-servicio") {
		if ($_REQUEST["input-titulo-servicio"] !== "" && $_REQUEST["input-telefono-servicio"] !== ""
		&& $_REQUEST["input-url-servicio"] !== "" && $_REQUEST["input-ubicacion-servicio"] !== "" && $_REQUEST["contenido-servicio"]) {

			$logicServicio->guardarServicio( getID(), $_REQUEST["input-titulo-servicio"],
																			$_REQUEST["input-telefono-servicio"],
																			$_REQUEST["input-url-servicio"],
																			$_REQUEST["input-ubicacion-servicio"],
																			$_REQUEST["contenido-servicio"] );
		}
	}



?>
