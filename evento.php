<?php
	require_once __DIR__ . "/src/App.php";
	$rol = getRole();
	$id = getId();

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
		<script src="<?= getJSPath() ?>contenido.js"></script>
	</head>
	<body>
		<div id="contenedor">
			<?php
				require('includes/cabecera.php');
				require('includes/slider.php');
			?>
			<div id="contenido">
				<div id="contenedor-evento" class="contenedor">
				<?php

				foreach($eventos as $evento){
					$fechaBD = $evento["fecha"];
					$fecha = date("d/m/Y", strtotime($fechaBD));
					echo '<div id="evento' . $evento['id'] . '" class="contenido-bloque">
							<h3 class="contenido-titulo">' . $evento['titulo'] . '</h3>
							<div class="contenido-info">Tendrá lugar el ' . $fecha . ' en ' . $evento['ubicacion'] .'</div>
							<div class="contenido-texto">
								<p class="contenido-parrafo">' . $evento['contenido'] . '</p>
							</div>
							<div class="contenido-info">Escrito por '. $evento['nombre_usuario'].'</div>
							<a class="contenido-boton" href="verEvento.php?evento=' . $evento['id'] . '">Ver evento</a>
					';
					if (isAdmin() || $id==$evento['idUser']) {
							echo '
								<a class="contenido-boton" href="editar-evento.php?evento=' . $evento['id'] . '">Editar</a>
							';
					}
					echo '
							<div class="clear"></div>
						</div>
					';


    				}
     			?>
				<br>
			<?php

			$prev=$ultimaPag - 1;
			if ($ultimaPag!=0) {
				echo '<a class="contenido-boton" href="evento.php?ultimaPag='.$prev.'">Página anterior</a>';
			}

			?>

			<?php
			$next=$ultimaPag + 1;

			$eventos = $logic->buscarEventos($next * $eventosPorPagina, $eventosPorPagina);

			if (!$eventos==null) {
				echo "<a class='contenido-boton' href='evento.php?ultimaPag=" . $next ."'>Página siguiente</a>";
			}

			?>
			</div>
			</div>

			<?php
			require(getIncludePath() . 'sidebar.php');
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
