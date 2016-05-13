<?php
	require_once __DIR__ . "/src/App.php";

	$logic = new \aw\logic\Publicidad();

	if (isset($_REQUEST["publicidad"]))
		$idPublicidad = $_REQUEST["publicidad"];
		$publicidad = $logic->buscarpublicidadById($idPublicidad);
 ?>
 <!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>
		<link rel="stylesheet"  href="<?=getCSSPath()?>contenido.css" type="text/css"/>
	    <link rel="stylesheet"  href="<?= getCSSPath() ?>buscar.css" type="text/css" />
	    <link rel="stylesheet"  href="<?= getCSSPath() ?>botones.css" type="text/css" />
	</head>
	<body>
		<div id="contenedor">
			<?php
				require('includes/cabecera.php');
			?>
			<div id="contenedor-publicidad">
			<div id="algo" class="contenido-bloque">
			<form action="<?= getBasePath() ?>formAdministrar.php" method="post" id="edit-publicidad" enctype="multipart/form-data">
					<input type="hidden" name="id" id="input-publicidad" class="estilotextarea" value= "<?= $idPublicidad ?>">
					<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
					<h3 class="contenido-titulo">Foto:<h3/>
					<input type="file" name="input-foto-publicidad"><br>
					<h3 class="contenido-titulo">Anuncio:<h3/>
                    <textarea name="input-contenido-anuncio" class="estilotextarea" rows="10" cols="80"> <?php echo $publicidad['anuncio'] ?> </textarea><br><br>
                    <button type="submit" class="myButton" id="verde" name="boton" value="modificar-publicidad">Guardar</button>
                    <button type="submit" class="myButton" id="naranja" name="boton" value="descartar-publicidad">Descartar Cambios</button>
              		 <button type="submit" class="myButton" id="rojo" name="boton" value="eliminar-publicidad">Eliminar Publicidad</button>
              		<form/>
              		</div>
					</div>

			<?php
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
