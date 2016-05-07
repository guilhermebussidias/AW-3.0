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
				require('includes/cabecera.php');
				require('includes/slider.php');
			?>
				<div id="contenido">
				</div>
			<?php
				require('includes/sidebar.php');
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
