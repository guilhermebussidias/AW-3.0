<?php
	require_once __DIR__ . "/src/App.php";

	$numNoticias = 2;
	$numEventos = 1;
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
				<div id="contenedor-noticias-idx" class="contenedor">
					<div class="titulo-contenedor"><h1>Noticias</h1></div>
					<?php
						$noticiasLogic = new \aw\logic\Noticia();
						$noticias = $noticiasLogic->buscarNoticias(0, $numNoticias);
						foreach($noticias as $noticia) { // fecha, titulo, contenido, id, nombre_usuario, idUser

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
									<a class="contenido-boton" href="verNoticia.php?noticia=' . $noticiaID . '">Ver noticia completa</a>
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
				</div>

				<div id="contenedor-eventos-idx" class="contenedor">
					<div class="titulo-contenedor"><h1>Eventos</h1></div>
					<?php
						$eventosLogic = new \aw\logic\Evento();
						$eventos = $eventosLogic->buscarEventos(0, $numEventos);
						foreach($eventos as $evento) { // id, titulo, contenido, fecha, ubicacion, foto, usuario

							$eventoID = $evento["id"];
							$titulo = $evento["titulo"];
							$contenido = $evento["contenido"];
							$fechaBD = $evento["fecha"];
							$fecha = date("d/m/Y", strtotime($fechaBD));
							$ubicacion = $evento["ubicacion"];
							$foto = $evento["foto"];
							$userID = $evento["usuario"];

							echo '
								<div id="evento' . $eventoID . '" class="contenido-bloque">
									<h3 class="contenido-titulo">' . $titulo . '</h3>
									<div class="contenido-info">Tendrá lugar el ' . $fecha . '</div>
									<div class="contenido-texto">
										<p class="contenido-parrafo">' . $contenido . '</p>
									</div>
									<a class="contenido-boton" href="verEvento.php?evento=' . $eventoID . '">Ver evento</a>
							';
							if (isAdmin() || getID() === $userID) {
									echo '
										<a class="contenido-boton" href="editarEvento.php?evento=' . $eventoID . '">Editar</a>
									';
							}
							echo '
									<div class="clear"></div>
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
