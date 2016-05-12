<?php

	require_once __DIR__ . "/src/App.php";
	$logic = new \aw\logic\Usuario();
	$logicNoticia = new \aw\logic\Noticia();

	if ($_REQUEST["boton"] === "crear-usuario"){
		if ($_REQUEST["usuario-rol"] !== "" && $_REQUEST["usuario-nombre"] !== "" && $_REQUEST["usuario-pass"] !== ""){
			$logic->newUser($_REQUEST["usuario-nombre"], $_REQUEST["usuario-pass"], $_REQUEST["usuario-rol"]);
		}
	}

<<<<<<< HEAD
	if($_REQUEST["boton"] === "eliminar-usuario"){
		if ($_REQUEST["usuario-nombre"] !== ""){
			$logic->deleteUser($_REQUEST["usuario-nombre"]);
		}
	}

	if($_REQUEST["boton"] === "modificar-usuario"){
		if ($_REQUEST["usuario-rol"] !== "" && $_REQUEST["usuario-nombre"] !== "" && $_REQUEST["usuario-pass"] !== ""){
			$logic->updateByName($_REQUEST["usuario-nombre"], $_REQUEST["usuario-pass"], $_REQUEST["usuario-rol"]);
		}
	}

	redirect(getBasePath() . 'administrar.php');
=======
	else if ($_REQUEST["boton"] === "modificar-noticia"){
		$titulo = $_REQUEST["titulo"];
		$contenido = $_REQUEST["contenido"];
		$id = $_REQUEST["id"];
			$logicNoticia->updateNoticia($id, $titulo, $contenido);
			echo "todo ok";
	}
	
	else if ($_REQUEST["boton"] === "guardar-noticia"){
		$titulo = $_REQUEST["titulo"];
		$contenido = $_REQUEST["contenido"];
		$usuario = $_REQUEST["usuario"];
		echo $usuario;
			$logicNoticia->saveNoticia($usuario, $titulo, $contenido);
			echo "todo ok";
	}

	else if ($_REQUEST["boton"] === "eliminar-noticia"){
			$id = $_REQUEST["id"];
			$logicNoticia->deleteNoticia($id);
			echo "todo ok";
	}

>>>>>>> origin/master
?>