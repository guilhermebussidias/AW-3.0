<?php
	require_once __DIR__ . "/src/App.php";
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
				require(getIncludePath() . 'cabecera.php');
				require(getIncludePath() . 'slider.php');
			?>
			<div id="contenido">
				<div id="contenedor-noticias">
					<?php
						$noticiasLogic = new \aw\logic\Noticia();
						//$eventosLogic = new \aw\logic\Evento();
						//$servicios = new \aw\logic\Servicio();
						$noticias = $noticiasLogic->buscarNoticias(1, 1);

						foreach($noticias as $noticia) { // fecha, titulo, contenido, id, nombre_usuario, idUser

							$titulo = $noticia["titulo"];
							$autor = $noticia["nombre_usuario"];
							$fechaBD = $noticia["fecha"];
							$fecha = date("d/m/Y", strtotime($fechaBD));
							$texto = $noticia["contenido"];
							$userID = $noticia["idUser"];
							$noticiaID = $noticia["id"];

							echo '
								<div id="algo" class="contenido-bloque">
									<h3 class="contenido-titulo">' . $titulo . '</h3>
									<div class="contenido-info">Escrito por ' . $autor  . ' el ' . $fecha . '</div>
									<div class="contenido-texto">
										<p class="contenido-parrafo">' . $texto . '</p>
									</div>
							';
							if (isAdmin() || getID() === $userID) {
									echo '
										<a class="contenido-boton-editar" href="editar-noticia.php?noticia=' . $noticiaID . '">Editar</a>
									';
							}
							echo '
								</div>
							';

						}

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
