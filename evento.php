<?php
	require_once __DIR__ . "/src/App.php";

  $logic = new \aw\logic\Evento();

	$eventosPorPagina = 2;

	if (isset($_REQUEST["ultimaPag"]))
		$ultimaPag = $_REQUEST["ultimaPag"];
	else
		$ultimaPag = 0;

	$eventos = $logic->buscarEventos($ultimaPag * $eventosPorPagina + 1, $eventosPorPagina);

 ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>
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
         					echo '<div class="evento">
            					<h3><a href="evento.php" class="enlace-ampliar-evento">' . $evento['titulo'] . '</a></h3>
           						<p>' . $evento['contenido'] . ' </p>
          						</div> ';
    				}
     			?>
				</div>
			<?php
				require('includes/sidebar.php');
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
