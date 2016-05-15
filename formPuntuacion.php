<?php
	require_once __DIR__ . "/src/App.php";

	$logicPuntuacion = new \aw\logic\Puntuacion();
	$logicServicio = new \aw\logic\servicioEspecifico();

	$idServicio = $_REQUEST["idServicio"];
	$categoria = $_REQUEST["categoria"];
	$puntuacion = $_REQUEST["puntuacion-servicio"];
	$idUsuario = $_REQUEST["idUsuario"];
	$logicPuntuacion->guardarPuntuacion($idUsuario,$idServicio,$puntuacion);
	$mediaPuntuacion = $logicPuntuacion->calculaMediaPuntuacion($idServicio);
	$logicServicio->updateMediaPuntuacion($idServicio, $mediaPuntuacion);
	redirect(getBasePath() .  'servicio-especifico.php?tipo=' . $categoria );
 ?>

