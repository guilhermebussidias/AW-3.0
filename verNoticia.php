<?php
	require_once __DIR__ . "/src/App.php";
	$rol = getRole();
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
          <?php
            if (!isset($_REQUEST['noticia']))
              die;

            $id = $_REQUEST['noticia'];

            $noticiasLogic = new \aw\logic\Noticia();
            $noticia = $noticiasLogic->buscarNoticia($id);

            $titulo = $noticia["titulo"];
            $autor = $noticia["nombre_usuario"];
            $fechaBD = $noticia["fecha"];
            $fecha = date("d/m/Y", strtotime($fechaBD));
            $contenido = $noticia["contenido"];
            $userID = $noticia["id_usuario"];
            $noticiaID = $noticia["id"];

            echo '
              <div id="noticia' . $noticiaID . '" class="contenido-bloque">
                <h3 class="contenido-titulo">' . $titulo . '</h3>
                <div class="contenido-info">Escrito por ' . $autor  . ' el ' . $fecha . '</div>
                <div class="contenido-texto">
                  <p class="contenido-parrafo">' . $contenido . '</p>
                </div>
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

            $comentarioNoticiaLogic = new \aw\logic\ComentarioNoticia();
						$comentarios = $comentarioNoticiaLogic->listarComentarios($noticiaID);

						echo '<div class="titulo-contenedor"><h1>Comentarios</h1></div>';

						if (empty($comentarios)) {
							echo '<p>De momento no hay comentarios</p>';
						}

						foreach ($comentarios as $comentario) {
							$c_id = $comentario['id'];
							$c_titulo = $comentario['titulo'];
							$c_comentario = $comentario['comentario'];
							$c_fecha = date("d/m/Y", strtotime($comentario['fecha']));
							$c_autor = $comentario['usuario'];
							echo '
								<div id="comentarioNoticia' . $c_id . '" class="contenido-bloque">
									<h6 class="contenido-titulo-menor">' . $c_titulo . '</h6>
									<div class="contenido-info">Escrito por ' . $c_autor  . ' el ' . $c_fecha . '</div>
									<div class="contenido-texto">
										<p class="contenido-parrafo">' . $c_comentario . '</p>
									</div>
	                <div class="clear"></div>
	              </div>
							';
						}
          ?>
				</div>
<?php
			if(!is_null($rol)){
?>
				<div class="contenido-bloque">
					<h3 class="contenido-titulo">Añade tu comentario</h3>
					<form action="<?= getBasePath() ?>formComentarioNoticia.php" method="post" id="form-usuario">
						<input type="hidden" name="id-noticia" value="<?=$noticiaID?>">
						<h6 class="contenido-titulo-input">Título</h6>
						<input type="text" name="titulo-comentario-noticia" id="input-titulo-comentario-noticia" class="input-textarea">
						<h6 class="contenido-titulo-input">Comentario</h6>
						<textarea name="input-contenido-comentario-noticia" class="input-textarea" rows="10"></textarea>
						<button type="submit" class="contenido-boton" name="boton" value="enviar-comentario-noticia">Enviar</button>
					</form>
					<div class="clear"></div>
				</div>

			</div>
			<?php
		}
				require(getIncludePath() . 'sidebar.php');
				require(getIncludePath() . 'pie.php');
			?>
		</div>
	</body>
</html>
