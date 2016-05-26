<?php

	require_once __DIR__ . "/src/App.php";

	checkCSRF();
	
	$logicUsuario = new \aw\logic\Usuario();
	$logicNoticia = new \aw\logic\Noticia();
	$logicServicio = new \aw\logic\servicioEspecifico();
	$logicPublicidad = new \aw\logic\Publicidad();
	$logicEvento = new \aw\logic\Evento();
	$respuesta = " ";
	$direccion = "administrar";
	$direcciones = ["administrar" => getBasePath() . "administrar.php",
		"noticia" => getBasePath() . "noticia.php",
		"evento" => getBasePath() . "evento.php",
		"servicio" => getBasePath() . "servicio.php",
		"index" => getBasePath()];


	if ($_REQUEST["boton"] === "crear-usuario"){
		$rol = $_REQUEST["usuario-rol"];
		$nombre =$_REQUEST["usuario-nombre"];
		$nobre = trim($nombre);
		$pass = $_REQUEST["usuario-pass"];

		if ($rol !== "" && $nombre !== "" && $pass !== ""){
			$ok = $logicUsuario->newUser($nombre, $pass, $rol);
			if (is_null($ok)){
				$respuesta = "El usuario ya existe.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
		}else {
			$respuesta = "Rellena todos los campos.";
		}
	}

	else if($_REQUEST["boton"] === "eliminar-usuario"){
		$usuario = $_REQUEST["usuario-nombre"];
		if ($usuario !== ""){
			$ok =  $logicUsuario->deleteUser($usuario);
			if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
		}else {
			$respuesta = "Rellena todos los campos.";
		}
	}

	else if($_REQUEST["boton"] === "modificar-usuario"){
		$rol= $_REQUEST["usuario-rol"];
		$usuario= $_REQUEST["usuario-nombre"];
		$pass= $_REQUEST["usuario-pass"];

		if ($rol !== "" && $usuario !== "" && $pass !== ""){
			$ok = $logicUsuario->updateByName($usuario, $pass, $rol);
			if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
		}else {
			$respuesta = "Rellena todos los campos.";
		}
	}

	else if ($_REQUEST["boton"] === "modificar-noticia"){
		$titulo = $_REQUEST["titulo"];
		$contenido = $_REQUEST["contenido"];
		$id = $_REQUEST["id"];
		if($titulo!== '' && $contenido !== ''){
			$ok = $logicNoticia->updateNoticia($id, $titulo, $contenido);
			if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
		}else {
			$respuesta = "Rellena todos los campos.";
		}
		$direccion = "noticia";
	}

	else if ($_REQUEST["boton"] === "crear-servicio") {
		$servicio = $_REQUEST["input-titulo-servicio"];
		$telefono = $_REQUEST["input-telefono-servicio"];
		$web = $_REQUEST["input-url-servicio"];
		$ubicacion = $_REQUEST["input-ubicacion-servicio"];
		$contenido= $_REQUEST["contenido-servicio"];
		if (isset($_REQUEST["patrocinado"])) {
			$patrocinado = $_REQUEST["patrocinado"];
		} else {
			$patrocinado = 0;
		}

		if ($servicio !== "" && $telefono !== ""
		&& $web !== "" && $ubicacion !== "" && $contenido !== "") {
			$usuario = getID();
			$nombre = $servicio;
			$categoria = $_REQUEST["categoria-servicio"];
			$imagen = \aw\logic\Utils::uploadPic("input-foto-servicio");
			$url = $web;
			$ok = $logicServicio->guardarServicioCompleto($usuario, $nombre, $contenido, $ubicacion,
		                  $categoria, $imagen, $telefono, $url, $patrocinado);
			if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
		}else {
			$respuesta = "Rellena todos los campos.";
		}
	}
	else if($_REQUEST["boton"] === "modificar-servicio"){
		$nombre = $_REQUEST["nombre"];
		$id = $_REQUEST["id"];
		$contenido = $_REQUEST["contenido"];
		$url = $_REQUEST["url"];
		$ubicacion = $_REQUEST["ubicacion"];
		$telefono = $_REQUEST["telefono"];
		$patrocinado = $_REQUEST['patrocinado'];

		if($nombre!== '' && $contenido !== '' && $url!== '' && $ubicacion!== '' && $telefono !== ''){
			$categoria = $_REQUEST["categoria"];
			$imagen = \aw\logic\Utils::uploadPic("input-foto-servicio");
			$ok = $logicServicio->updateServicio($id, $nombre, $categoria, $url, $ubicacion, $imagen, $contenido, $telefono, $patrocinado);
			if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
		}else {
			$respuesta = "Rellena todos los campos.";
		}
		$direccion = "servicio";
	}
	else if ($_REQUEST["boton"] === "eliminar-servicio"){
		$id = $_REQUEST["id"];
		$ok = $logicServicio->deleteServicio($id);
		if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
		$direccion = "servicio";
	}

	else if ($_REQUEST["boton"] === "guardar-noticia"){
		$titulo = $_REQUEST["titulo-noticia"];
		$contenido = $_REQUEST["input-contenido-noticia"];
		$usuario = $_REQUEST["usuario"];
		if ($titulo !== "" && $contenido !== ""){
			$ok = $logicNoticia->saveNoticia($usuario, $titulo, $contenido);
			if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
		}else {
			$respuesta = "Rellena todos los campos.";
		}
	}

	else if ($_REQUEST["boton"] === "eliminar-noticia"){
			$id = $_REQUEST["id"];
			$ok = $logicNoticia->deleteNoticia($id);
			if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
			$direccion = "noticia";
	}

 	else if ($_REQUEST["boton"] === "eliminar-publicidad"){
     	$id = $_REQUEST["id"];
     	$ok = $logicPublicidad->deletePublicidad($id);
     	if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
     	$direccion = "index";
 	}

	else if ($_REQUEST["boton"] === "modificar-publicidad"){
		$banner = \aw\logic\Utils::uploadPic("input-foto-publicidad");
     	$anuncio = $_REQUEST["input-contenido-anuncio"];
     	$id = $_REQUEST["id"];
    	if($banner!== '' && $anuncio !== ''){
     		$ok = $logicPublicidad->updatePublicidad($id, $anuncio, $banner);
     		if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
    	}else {
			$respuesta = "Rellena todos los campos.";
		}
    	$direccion = "index";
  }

	else if ($_REQUEST["boton"] === "crear-publicidad"){
		$anuncio = $_REQUEST["input-contenido-anuncio"];
		$banner = \aw\logic\Utils::uploadPic("input-foto-publicidad");
		$usuario = $_REQUEST["id"];
		if ($anuncio !== "" && $banner !== ""){
			$ok = $logicPublicidad->savePublicidad($usuario, $anuncio, $banner);
			if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
		}else {
			$respuesta = "Rellena todos los campos.";
		}
	}

	else if ($_REQUEST["boton"] === "modificar-evento"){
		$id = $_REQUEST["id"];
		$titulo = $_REQUEST["titulo-evento"];
		$contenido = $_REQUEST["input-contenido-evento"];
		$fecha = $_REQUEST["fecha-evento"];
		$ubicacion = $_REQUEST["ubicacion-evento"];
		$foto = \aw\logic\Utils::uploadPic("input-foto-evento");
		if($titulo!== '' && $contenido !== ''){
			$ok = $logicEvento->updateEvento($id, $titulo, $contenido, $fecha, $ubicacion, $foto);
			if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
		}else {
			$respuesta = "Rellena todos los campos.";
		}
		$direccion = "evento";
	}

	else if ($_REQUEST["boton"] === "crear-evento"){
		$titulo = $_REQUEST["titulo-evento"];
		$contenido = $_REQUEST["input-contenido-evento"];
		$fecha = $_REQUEST["fecha-evento"];
		$ubicacion = $_REQUEST["ubicacion-evento"];
		$foto = \aw\logic\Utils::uploadPic("input-foto-evento");
		$usuario = $_REQUEST["usuario"];
		if ($titulo !== "" && $contenido !== ""){
			$ok = $logicEvento->saveEvento($titulo, $contenido, $fecha, $ubicacion, $foto, $usuario);
			if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
		}else {
			$respuesta = "Rellena todos los campos.";
		}
	}

	else if ($_REQUEST["boton"] === "eliminar-evento"){
			$id = $_REQUEST["id"];
			$ok = $logicEvento->deleteEvento($id);
			if (is_null($ok)){
				$respuesta = "Ha habido un problema en el proceso.";
			}else {
				$respuesta = "Todo ha ido correcto.";
			}
			$direccion = "evento";
	}

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>
    	<script src="<?= getJSPath() ?>respuesta.js"></script>
	</head>
	<body>
		<div id="mensaje">
			<p><?= $respuesta ?></p>
		</div>
		<span id="redireccion" style="display:none"><?= $direcciones[$direccion]?></span>
	</body>
</html>
