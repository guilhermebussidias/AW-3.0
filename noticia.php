<?php
	require_once __DIR__ . "/src/App.php";
	$rol = getRole();
	//$name = getName();
	$id = getId();

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
		<script src="<?= getJSPath() ?>contenido.js"></script>
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

				foreach($noticias as $noticia) {

					$titulo = $noticia["titulo"];
					$autor = $noticia["nombre_usuario"];
					$fechaBD = $noticia["fecha"];
					$fecha = date("d/m/Y", strtotime($fechaBD));
					$contenido = $noticia["contenido"];
					$userID = $noticia["idUser"];
					$noticiaID = $noticia["id"];

					echo '
						<div id="noticia' . $noticiaID . '" class="contenido-bloque">
							<h3 class="contenido-titulo">' . $titulo . '</h3>
							<div class="contenido-info">Escrito por ' . $autor  . ' el ' . $fecha . '</div>
							<div class="contenido-texto">
								<p class="contenido-parrafo">' . $contenido . '</p>
							</div>
							<a class="contenido-boton" href="verNoticia.php?noticia=' . $noticiaID . '">Ver y comentar</a>
					';
					if (isAdmin() || getID() === $userID) {
							echo '
								<a class="contenido-boton" href="editar-noticia.php?noticia=' . $noticiaID . '">Editar</a>
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
				require(getIncludePath() . 'sidebar.php');
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
