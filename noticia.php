<?php
	require_once __DIR__ . "/src/App.php";
	$rol = getRole();
	//$name = getName();
	$id = getId();
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
			<div id="contenido">
				<div id="contenedor-noticias">
				<?php

				foreach($noticias as $noticias_){
         			echo ' 
         				<div id="algo" class="contenido-bloque">
						<h3 class="contenido-titulo">
						' . $noticias_['titulo'] . '</a></h3>
						<div class="contenido-info">Escrito por '. $noticias_['nombre_usuario'] . ' el ' . $noticias_['fecha'] .'';

					if($rol=='admin' or $id==$noticias_['idUser']){
						echo '<a class="contenido-boton" href="editar-noticia.php?noticia=' . $noticias_['id'] . '">Editar</a>';
				 	}
						echo '</div>
						<div class="contenido-texto">			
						<p> ' . $noticias_['contenido'] . ' </p>
						</div>
						</div>
						';
    				}
     			?>
				<br>
			<?php

			$prev=$ultimaPag - 1;
			if ($ultimaPag!=0) {
				echo '<a href="noticia.php?ultimaPag='.$prev.'">Página anterior</a>';
			}

			?>

			<?php
			$next=$ultimaPag + 1;

			$noticias = $logic->buscarNoticias($next * $noticiasPorPagina, $noticiasPorPagina);

			if (!$noticias==null) {
				echo "<a href='noticia.php?ultimaPag=" . $next ."'>Página siguiente</a>";
			}

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
