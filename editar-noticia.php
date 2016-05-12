<?php
	require_once __DIR__ . "/src/App.php";
	require_once __DIR__ . "/src/App.php";

	$logic = new \aw\logic\Noticia();

	if (isset($_REQUEST["noticia"]))
		$idNoticia = $_REQUEST["noticia"];
		$noticia = $logic->buscarNoticia($idNoticia);
 ?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>
		<link rel="stylesheet"  href="<?=getCSSPath()?>contenido.css" type="text/css"/> 
	    <link rel="stylesheet"  href="<?= getCSSPath() ?>buscar.css" type="text/css" />
	    <link rel="stylesheet"  href="<?= getCSSPath() ?>botones.css" type="text/css" />
	</head>
	<body>
		<div id="contenedor">
			<?php
				require('includes/cabecera.php');
				require('includes/slider.php');
			?>
			<div id="contenedor-noticias">
			<div id="algo" class="contenido-bloque">
					<h3 class="contenido-titulo">Título:<h3/>
                    <input type="text" name="titulo-noticia" id="input-titulo-noticia" class="estilotextarea" value= "<?php echo $noticia['titulo'] ?>">
					<h3 class="contenido-titulo">Contenido:<h3/>	
                    <textarea name="input-contenido-noticia" class="estilotextarea" rows="10" cols="80"><?php echo $noticia['contenido'] ?></textarea>	
              		  		<a name="save" class="myButton" id="verde">Guardar</a>
							<a href="#" class="myButton" id="naranja">Descartar Cambios</a>
              		  		<a href="#" class="myButton" id="rojo">Eliminar Noticia</a>
					</div>
					</div>

			<?php				
				if( isset( $_REQUEST['save'] ))
				{
              		 $logicNoticia->saveNoticia($usuario, $titulo, $contenido);
				}
				
				require('includes/sidebar.php');
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
