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
         				 <div class="noticia">
            				<h3><a href="ampliar-noticia.html" class="enlace-ampliar-noticia"><?phpvar_dump($noticias)?></a></h3>
           						 <p></p>
          				</div>
          				<div class="noticia">
           					 <h3><a href="ampliar-noticia.html" class="enlace-ampliar-noticia"></a>otro</h3>
           					 <p></p>
         				</div>
        			</div>
				</div>
			<?php
				require('includes/sidebar.php');
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
