<?php
	require_once __DIR__ . "/src/App.php";
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
				require(getIncludePath() . 'cabecera.php');
				require(getIncludePath() . 'slider.php');
			?>
			<div id="contenido">
				<div id="contenedor-noticias">
					<?php
						$noticiasLogic = new \aw\logic\Noticia();
						//$eventosLogic = new \aw\logic\Evento();
						//$servicios = new \aw\logic\Servicio();
						$noticias = $noticiasLogic->buscarNoticias(1, 1); //id, usuario, titulo, contenido, fecha
						
					?>
				</div>
			</div>
			<?php
				require(getIncludePath() . 'sidebar.php');
				require(getIncludePath() . 'pie.php');
			?>
		</div>
	</body>
</html>
