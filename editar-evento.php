<?php
	require_once __DIR__ . "/src/App.php";

	$logic = new \aw\logic\Evento();

	if (isset($_REQUEST["evento"]))
		$idEvento = $_REQUEST["evento"];
		$evento = $logic->buscarEvento($idEvento);
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
				require('includes/slider.php');
			?>
			<div id="contenedor-eventos" class"contenido">
			<div id="algo" class="contenido-bloque">
					<h3 class="contenido-titulo">Título:<h3/>
            <input type="text" name="titulo-evento" id="input-titulo-evento" class="estilotextarea" value= "<?php echo $evento['titulo'] ?>">
					<h3 class="contenido-titulo">Fecha:<h3/>
						<input type="text" name="fecha-evento" id="input-fecha-evento" class="estilotextarea" value= "<?php echo $evento['fecha'] ?>">
					<h3 class="contenido-titulo">Ubicacion:<h3/>
						<input type="text" name="ubicacion-evento" id="input-ubicacion-evento" class="estilotextarea" value= "<?php echo $evento['ubicacion'] ?>">
					<h3 class="contenido-titulo">Imagen:<h3/>
						<input type="file" name="imagen-evento" id="input-imagen-evento" class="estilotextarea">
					<h3 class="contenido-titulo">Contenido:<h3/>
                    <textarea name="input-contenido-evento" class="estilotextarea" rows="10" cols="80"><?php echo $evento['contenido'] ?></textarea>
              		  		<a name="save" class="myButton" id="verde">Guardar</a>
							<a href="#" class="myButton" id="naranja">Descartar Cambios</a>
              		  		<a href="#" class="myButton" id="rojo">Eliminar Evento</a>
					</div>
					</div>

			<?php
				require(getIncludePath() . 'sidebar.php');
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
