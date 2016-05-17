<?php
$extension = " ";
	require_once __DIR__ . "/src/App.php";
	$logicUsuario = new \aw\logic\Usuario();
	$logicNoticia = new \aw\logic\Noticia();
	$logicServicio = new \aw\logic\servicioEspecifico();
	$logicPublicidad = new \aw\logic\Publicidad();
	$logicEvento = new \aw\logic\Evento();

	if ($_REQUEST["boton"] === "crear-usuario"){
		$rol = $_REQUEST["usuario-rol"];
		$nombre =$_REQUEST["usuario-nombre"];
		$pass = $_REQUEST["usuario-pass"];

		if ($rol !== "" && $nombre !== "" && $pass !== ""){
			$logicUsuario->newUser($nombre, $pass, $rol);
		}
	}

	else if($_REQUEST["boton"] === "eliminar-usuario"){
		$usuario = $_REQUEST["usuario-nombre"];
		if ($usuario !== ""){
			$logicUsuario->deleteUser($usuario);
		}
	}

	else if($_REQUEST["boton"] === "modificar-usuario"){
		$rol= $_REQUEST["usuario-rol"];
		$usuario= $_REQUEST["usuario-nombre"];
		$pass= $_REQUEST["usuario-pass"];

		if ($rol !== "" && $usuario !== "" && $pass !== ""){
			$logicUsuario->updateByName($usuario, $pass, $rol);
		}
	}

	else if ($_REQUEST["boton"] === "modificar-noticia"){
		$titulo = $_REQUEST["titulo"];
		$contenido = $_REQUEST["contenido"];
		$id = $_REQUEST["id"];
		if($titulo!== '' && $contenido !== ''){
			$logicNoticia->updateNoticia($id, $titulo, $contenido);
		}
		$extension="#admin-noticia";
	}

	else if ($_REQUEST["boton"] === "crear-servicio") {
		$servicio = $_REQUEST["input-titulo-servicio"];
		$telefono = $_REQUEST["input-telefono-servicio"];
		$web = $_REQUEST["input-url-servicio"];
		$ubicacion = $_REQUEST["input-ubicacion-servicio"];
		$contenido= $_REQUEST["contenido-servicio"];

		if ($servicio !== "" && $telefono !== ""
		&& $web !== "" && $ubicacion !== "" && $contenido !== "") {

			/*$logicServicio->guardarServicio( getID(), $servicio,
				$telefono,$web, $ubicacion,$contenido);*/

			$usuario = getID();
			$nombre = $servicio;
			$categoria = $_REQUEST["categoria-servicio"];
			$imagen = \aw\logic\Utils::uploadPic("input-foto-servicio");
			$url = $web;
			$logicServicio->guardarServicioCompleto($usuario, $nombre, $contenido, $ubicacion,
		                  $categoria, $imagen, $telefono, $url);
		}
		$extension="#admin-servicio";
	}
	else if($_REQUEST["boton"] === "modificar-servicio"){
		$nombre = $_REQUEST["nombre"];
		$id = $_REQUEST["id"];
		$contenido = $_REQUEST["contenido"];
		$url = $_REQUEST["url"];
		$ubicacion = $_REQUEST["ubicacion"];
		$telefono = $_REQUEST["telefono"];

		if($nombre!== '' && $contenido !== '' && $url!== '' && $ubicacion!== '' && $telefono !== ''){
			$categoria = $_REQUEST["categoria"];
			$imagen = \aw\logic\Utils::uploadPic("input-foto-servicio");
			$logicServicio->updateServicio($id, $nombre, $categoria, $url, $ubicacion, $imagen, $contenido, $telefono);
		}
		$extension="#admin-servicio";
	}
	else if ($_REQUEST["boton"] === "eliminar-servicio"){
		$id = $_REQUEST["id"];
		$logicServicio->deleteServicio($id);
	}
	###############################################################################################
	else if ($_REQUEST["boton"] === "guardar-noticia"){
		$titulo = $_REQUEST["titulo-noticia"];
		$contenido = $_REQUEST["input-contenido-noticia"];
		$usuario = $_REQUEST["usuario"];
		if ($titulo !== "" && $contenido !== ""){
			$logicNoticia->saveNoticia($usuario, $titulo, $contenido);
		}
		$extension="#admin-noticia";
	}

	else if ($_REQUEST["boton"] === "eliminar-noticia"){
			$id = $_REQUEST["id"];
			$logicNoticia->deleteNoticia($id);
	}
	###############################################################################################
 	else if ($_REQUEST["boton"] === "eliminar-publicidad"){
     	$id = $_REQUEST["id"];
     	$logicPublicidad->deletePublicidad($id);
 	}

	else if ($_REQUEST["boton"] === "modificar-publicidad"){
     	//$banner = $_REQUEST["input-foto-publicidad"];
			$banner = \aw\logic\Utils::uploadPic("input-foto-publicidad");
     	$anuncio = $_REQUEST["input-contenido-anuncio"];
     	$id = $_REQUEST["id"];
    	if($banner!== '' && $anuncio !== ''){
     		$logicPublicidad->updatePublicidad($id, $anuncio, $banner);
    	}
  }

	else if ($_REQUEST["boton"] === "crear-publicidad"){
		$anuncio = $_REQUEST["input-contenido-anuncio"];
		//$banner = $_REQUEST["input-foto-publicidad"];
		$banner = \aw\logic\Utils::uploadPic("input-foto-publicidad");
		$usuario = $_REQUEST["id"];
		if ($anuncio !== "" && $banner !== ""){
			$logicPublicidad->savePublicidad($usuario, $anuncio, $banner);
		}
	}

	######################################### EVENTOS ######################################################

	else if ($_REQUEST["boton"] === "modificar-evento"){
		$id = $_REQUEST["id"];
		$titulo = $_REQUEST["titulo-evento"];
		$contenido = $_REQUEST["input-contenido-evento"];
		$fecha = $_REQUEST["fecha-evento"];
		$ubicacion = $_REQUEST["ubicacion-evento"];
		//$foto = $_REQUEST["input-foto-evento"];
		$foto = \aw\logic\Utils::uploadPic("input-foto-evento");
		if($titulo!== '' && $contenido !== ''){
			$logicEvento->updateEvento($id, $titulo, $contenido, $fecha, $ubicacion, $foto);
		}
		$extension="#admin-evento";
	}

	else if ($_REQUEST["boton"] === "crear-evento"){
		$titulo = $_REQUEST["titulo-evento"];
		$contenido = $_REQUEST["input-contenido-evento"];
		$fecha = $_REQUEST["fecha-evento"];
		$ubicacion = $_REQUEST["ubicacion-evento"];
		//$foto = $_REQUEST["input-foto-evento"];
		$foto = \aw\logic\Utils::uploadPic("input-foto-evento");
		$usuario = $_REQUEST["usuario"];
		if ($titulo !== "" && $contenido !== ""){
			$logicEvento->saveEvento($titulo, $contenido, $fecha, $ubicacion, $foto, $usuario);
		}
		$extension="#admin-evento";
	}

	else if ($_REQUEST["boton"] === "eliminar-evento"){
			$id = $_REQUEST["id"];
			$logicEvento->deleteEvento($id);
	}

	########################################################################################################

	if(getRole() === "admin"){
		redirect(getBasePath() . 'administrar.php'. $extension);
	}
	else if (getRole() === "normal"){
		redirect(getBasePath() . 'noticia.php');
	}
?>
