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
	</head>
	<body>
		<div id="contenedor">
			<?php
				require('includes/cabecera.php');
				require('includes/slider.php');
			?>
				<div id="contenido">
					<div id="contenedor-noticias">
          <?php
					foreach($eventos as $evento){
							echo '
								<div class="contenido-bloque">
								<h3 class="contenido-titulo">'. $evento['titulo'] .'</h3>
								<div class="contenido-info">Escrito por '. $evento['nombre_usuario'] .'</div>';

								if($rol==='admin' or $id===$evento['idUser']){
									echo '
									<div class="contenido_admin">
									<a href="editar-evento.php?evento='. $evento['id'] .'">Editar</a>
									</div>';
								}
								echo '
								<div class="contenido-texto">
								<p> ' . $evento['contenido']. ' </p>
								</div>
								</div>';
						}

				$pag = $ultimaPag - 1;
				if($ultimaPag>0){
					echo '<a href="evento.php?ultimaPag=<?='. $pag .'">Anterior página</a>';
				}
				?>
				<a href="evento.php?ultimaPag=<?=$ultimaPag + 1?>">Siguiente página</a>
			</div>
		</div>
			<?php
				require('includes/sidebar.php');
				require('includes/pie.php');
			?>

	</div>
	</body>
</html>
