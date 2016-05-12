<?php

	require_once __DIR__ . "/src/App.php";
	$logicUsuario = new \aw\logic\Usuario();
	$logicNoticia = new \aw\logic\Noticia();

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
	
	else if ($_REQUEST["boton"] === "guardar-noticia"){
		$titulo = $_REQUEST["titulo-noticia"];
		$contenido = $_REQUEST["input-contenido-noticia"];
		$usuario = $_REQUEST["usuario"];
		if ($titulo !== "" && $contenido !== "")
			$logicNoticia->saveNoticia($usuario, $titulo, $contenido);
	}

	else if ($_REQUEST["boton"] === "eliminar-noticia"){
			$id = $_REQUEST["id"];
			$logicNoticia->deleteNoticia($id);
	}

	redirect(getBasePath() . 'administrar.php');
?>