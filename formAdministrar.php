<?php

	require_once __DIR__ . "/src/App.php";
	$logicUsuario = new \aw\logic\Usuario();
	$logicNoticia = new \aw\logic\Noticia();
	$logicServicio = new \aw\logic\servicioEspecifico();

	if ($_REQUEST["boton"] === "crear-usuario"){
		if ($_REQUEST["usuario-rol"] !== "" && $_REQUEST["usuario-nombre"] !== "" && $_REQUEST["usuario-pass"] !== ""){
			$logicUsuario->newUser($_REQUEST["usuario-nombre"], $_REQUEST["usuario-pass"], $_REQUEST["usuario-rol"]);
		}
	}


	else if($_REQUEST["boton"] === "eliminar-usuario"){
		if ($_REQUEST["usuario-nombre"] !== ""){
			$logicUsuario->deleteUser($_REQUEST["usuario-nombre"]);
		}
	}

	else if($_REQUEST["boton"] === "modificar-usuario"){
		if ($_REQUEST["usuario-rol"] !== "" && $_REQUEST["usuario-nombre"] !== "" && $_REQUEST["usuario-pass"] !== ""){
			$logicUsuario->updateByName($_REQUEST["usuario-nombre"], $_REQUEST["usuario-pass"], $_REQUEST["usuario-rol"]);
		}
	}

	else if ($_REQUEST["boton"] === "modificar-noticia"){
		$titulo = $_REQUEST["titulo"];
		$contenido = $_REQUEST["contenido"];
		$id = $_REQUEST["id"];
			$logicNoticia->updateNoticia($id, $titulo, $contenido);
	}
<<<<<<< HEAD
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

=======
	
	else if ($_REQUEST["boton"] === "guardar-noticia"){
		$titulo = $_REQUEST["titulo-noticia"];
		$contenido = $_REQUEST["input-contenido-noticia"];
		$usuario = $_REQUEST["usuario"];
		if ($titulo !== "" && $contenido !== "")
			$logicNoticia->saveNoticia($usuario, $titulo, $contenido);
	}
>>>>>>> origin/master

	else if ($_REQUEST["boton"] === "eliminar-noticia"){
			$id = $_REQUEST["id"];
			$logicNoticia->deleteNoticia($id);
	}

<<<<<<< HEAD
?>
=======
	redirect(getBasePath() . 'administrar.php');
?>
>>>>>>> origin/master
