<?php
	require_once __DIR__ . "/src/App.php";
	$rol = getRole();
	$id = getID();
	$logic = new \aw\logic\Evento();

	if (isset($_REQUEST["evento"]))
		$idEvento = $_REQUEST["evento"];
		$evento = $logic->getEvento($idEvento);
		$foto = UPLOADED_URL . $evento['foto'];
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
			<div id="contenedor-eventos" class"contenido">
			<?php

			if (isAdmin() || $rol==='gestor' || $id === $evento['idUser'] && $evento['id'] !== null) {
			?>
			<div id="algo" class="contenido-bloque">
				<form action="<?= getBasePath() ?>formAdministrar.php" method="post" id="edit-evento" enctype="multipart/form-data">
						<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
						<input type="hidden" name="id" id="input-evento class="estilotextarea" value= "<?= $idEvento ?>">
					<h3 class="contenido-titulo">Título:<h3/>
            <input type="text" name="titulo-evento" id="input-titulo-evento" class="estilotextarea" value= "<?php $evento['titulo'] ?>">
					<h3 class="contenido-titulo">Fecha:<h3/>
						<input type="date" name="fecha-evento" id="input-fecha-evento" class="estilotextarea" value= "<?php  $evento['fecha'] ?>">
					<h3 class="contenido-titulo">Ubicacion:<h3/>
						<input type="text" name="ubicacion-evento" id="input-ubicacion-evento" class="estilotextarea" value= "<?php  $evento['ubicacion'] ?>">
					<h3 class="contenido-titulo">Imagen:<h3/>
						<?php echo '<img class="servicio-imagen" src="' . $foto .'" alt="imagen empresa">'; ?>
						<input type="file" name="input-foto-evento" id="input-foto-evento" class="estilotextarea">
					<h3 class="contenido-titulo">Contenido:<h3/>
            <textarea name="input-contenido-evento" class="estilotextarea" rows="10" cols="80"><?php  $evento['contenido'] ?></textarea>

						<button type="submit" class="myButton" id="verde" name="boton" value="modificar-evento">Guardar</button>
						<button type="submit" class="myButton" id="naranja" name="boton" value="descartar-evento">Descartar Cambios</button>
						<button type="submit" class="myButton" id="rojo" name="boton" value="eliminar-evento">Eliminar Evento</button>

							</form>
						</div>
					
			<?php
              	}
			else {

			?>
				<h3 class="contenido-titulo">Contenido Oculto<h3/>
					</div>

			<?php	
			}	
				require(getIncludePath() . 'sidebar.php');
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
