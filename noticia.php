<?php
	require_once __DIR__ . "/src/App.php";

	$logic = new \aw\logic\Noticia();

	$noticias = $logic->buscarNoticias(0, 2);
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
					<div id="contenedor-articulos">
					<?php 
						@foreach($noticias as $noticias_){
         					echo '<div class="noticia">
            					<h3><a href="ampliar-noticia.html" class="enlace-ampliar-noticia">' . $noticias_->titulo . '</a></h3>
           						<p>' . $noticias_->contenido . ' </p>
          						</div> '
          				}
         				@endforeach
         			?>
        			</div>
				</div>
			<?php
				require('includes/sidebar.php');
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
