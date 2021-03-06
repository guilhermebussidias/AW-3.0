<?php
	require_once __DIR__ . "/src/App.php";
	$rol = getRole();
	$logic = new \aw\logic\Publicidad();

	if (isset($_REQUEST["publicidad"]))
		$idPublicidad = $_REQUEST["publicidad"];
		$publicidad = $logic->buscarpublicidadById($idPublicidad);
		$foto = UPLOADED_URL . $publicidad['banner'];
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
				<?php
			if (isAdmin() || $rol==='proveedor') {
				?>
			<div id="algo" class="contenido-bloque">
			<form action="<?= getBasePath() ?>formAdministrar.php" method="post" id="edit-publicidad" enctype="multipart/form-data">
					<?php require(getIncludePath() . 'csrf.php'); ?>
					<input type="hidden" name="id" id="input-publicidad" class="estilotextarea" value= "<?= $idPublicidad ?>">
					<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
					<h3 class="contenido-titulo">Foto:<h3/>
						<?php echo '<img class="servicio-imagen" src="' . $foto .'" alt="imagen empresa">'; ?>
					<input type="file" name="input-foto-publicidad"><br>
					<h3 class="contenido-titulo">Anuncio:<h3/>
                    <textarea name="input-contenido-anuncio" class="estilotextarea" rows="10" cols="80"> <?php echo $publicidad['anuncio'] ?> </textarea><br><br>
                    <button type="submit" class="myButton" id="verde" name="boton" value="modificar-publicidad">Guardar</button>
                    <button type="submit" class="myButton" id="naranja" name="boton" value="descartar-publicidad">Descartar Cambios</button>
              		 <button type="submit" class="myButton" id="rojo" name="boton" value="eliminar-publicidad">Eliminar Publicidad</button>
              		<form/>
      		</div>
			<?php
        }
		else {

		?>
			<h3 class="contenido-titulo">Contenido Oculto<h3/>
				</div>

		<?php
		}
			require('includes/pie.php');
			?>
		</div>
	</body>
</html>
