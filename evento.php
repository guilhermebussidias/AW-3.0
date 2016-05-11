<?php
	require_once __DIR__ . "/src/App.php";

  $logic = new \aw\logic\Evento();

	$eventosPorPagina = 2;

	if (isset($_REQUEST["ultimaPag"]))
		$ultimaPag = $_REQUEST["ultimaPag"];
	else
		$ultimaPag = 0;

	$eventos = $logic->buscarEventos($ultimaPag * $eventosPorPagina, $eventosPorPagina);

 ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>
		<link rel="stylesheet"  href="<?=getCSSPath()?>contenido.css" type="text/css" />
	</head>
	<body>
		<div id="contenedor">
			<?php
				require('includes/cabecera.php');
				require('includes/slider.php');
			?>
				<div id="contenido">
          <?php
					foreach($eventos as $evento){
							echo '
								<div class="contenido-bloque">
								<h3 class="contenido-titulo">'. $evento['titulo'] .'</h3>
								<div class="contenido-texto">
								<p> ' . $evento['contenido'] . ' </p>
								<div class="contenido-info">Escrito por '. $evento['usuario'] .'</div>
								</div>
								</div>
						';
						}
     			?>
				</div>
				<a href="evento.php?ultimaPag=<?=$ultimaPag + 1?>">Siguiente página</a>
			<?php
				require('includes/sidebar.php');
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
