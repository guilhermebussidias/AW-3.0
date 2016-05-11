<?php
	require_once __DIR__ . "/src/App.php";
	require_once __DIR__ . "/src/App.php";

	$logic = new \aw\logic\Noticia();

	if (isset($_REQUEST["noticia"]))
		$noticia = $_REQUEST["noticia"];

 ?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>
		<link rel="stylesheet"  href="<?=getCSSPath()?>contenido.css" type="text/css" 
	    <link rel="stylesheet"  href="<?= getCSSPath() ?>buscar.css" type="text/css" />

		/>
	</head>
	<body>
		<div id="contenedor">
			<?php
				require('includes/cabecera.php');
				require('includes/slider.php');
			?>
			<div id="contenido">
			<div id="algo" class="contenido-bloque">
						
					<label for="input-titulo-noticia">Título:</label>
                    <input type="text" name="titulo-noticia" id="input-titulo-noticia" class="input-busqueda-noticia">
                    <label for="input-contenido-noticia">Contenido:</label>
                    <input type="text" name="contenido-noticia" id="input-contenido-noticia" class="input-busqueda-noticia">

						<h3 class="contenido-titulo">
						' . $noticias_['titulo'] . '</a></h3>
						<div class="contenido-info">Escrito por '. $noticias_['nombre_usuario'] . ' el ' . $noticias_['fecha'] .'';

					
					</div>
						<div class="contenido-texto">			
						<p> ' . $noticias_['contenido'] . ' </p>
						</div>
						</div>
						
*
			<?php
				require('includes/sidebar.php');
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
