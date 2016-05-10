<?php
	require_once __DIR__ . "/src/App.php";

	$logic = new \aw\logic\Noticia();

	$noticiasPorPagina = 2;

	if (isset($_REQUEST["ultimaPag"]))
		$ultimaPag = $_REQUEST["ultimaPag"];
	else
		$ultimaPag = 0;

	$noticias = $logic->buscarNoticias($ultimaPag * $noticiasPorPagina, $noticiasPorPagina);

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

			<?php
						foreach($noticias as $noticias_){
         					echo '
				<div id="algo" class="contenido-bloque">
						<h3 class="contenido-titulo">
						<a href="ampliar-noticia.php?noticia='. $noticias_['id'] .'" class="enlace-ampliar-noticia">' . $noticias_['titulo'] . '</a></h3>
						<div class="contenido-info">Escrito por '. $noticias_['nombre_usuario'] . ' el ' . $noticias_['fecha'] . '</div>
						<div class="contenido-texto">
							<p>
								' . $noticias_['contenido'] . '
							</p>
							<p>
								ros.
							</p>
						</div>
					</div>
					';
    				}
     			?>


        			</div>
				</div>
				<a href="noticia.php?ultimaPag=<?=$ultimaPag + 1?>">Siguiente página</a>
			<?php
				require('includes/sidebar.php');
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
