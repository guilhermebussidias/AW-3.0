<?php
	require_once __DIR__ . "/src/App.php";

	$noticia = false;
	$evento = false;
	$servicio = false;
	############################EJEMPLO
	if (isset($_REQUEST["titulo-noticia"])){ # compruebo si lo que me han pasado es una noticia
		$tituloN = $_REQUEST["titulo-noticia"]; #meto los parametros en variables
		$contenidoN = $_REQUEST["contenido-noticia"];
		$fechaInicioN = $_REQUEST["fecha-ini-noticia"];
		$fechaFinN = $_REQUEST["fecha-fin-noticia"];
		$noticia = true; #identificador para saber que hay que mostrar noticia
		$logic = new \aw\logic\Noticia();
		$noticias = $logic->buscarNoticiasbuscador($tituloN, $contenidoN, $fechaInicioN, $fechaFinN);
	}
	#################################
	#PARSEAR ELEMENTOS DE EVENTO 
	if (isset($_REQUEST["titulo-evento"])){
		$evento = true;
		##################### Rellenar con tus parametros
		$tituloN = $_REQUEST["titulo-noticia"];
		$contenidoN = $_REQUEST["contenido-noticia"];
		$fechaInicioN = $_REQUEST["fecha-ini-noticia"];
		$fechaFinN = $_REQUEST["fecha-fin-noticia"];
		#####################
	}
	#PARSEAR ELEMENTOS DE SERVICIO
	if (isset($_REQUEST["contenido-servicio"])){
		$servicio = true;
		##################### Rellenar con tus parametros
		$tituloN = $_REQUEST["titulo-noticia"];
		$contenidoN = $_REQUEST["contenido-noticia"];
		$fechaInicioN = $_REQUEST["fecha-ini-noticia"];
		$fechaFinN = $_REQUEST["fecha-fin-noticia"];
		#####################
	}

 ?>
 <!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>

    <link rel="stylesheet"  href="<?= getCSSPath() ?>contenido.css" type="text/css" />
    <script src="<?= getJSPath() ?>buscar.js"></script>

	</head>
	<body>
		<div id="contenedor">
			<?php
				require(getIncludePath() . 'cabecera.php');
				require(getIncludePath() . 'slider.php');
			?>
			<div id="contenido"> 
				<?php
				######################## EJEMPLO PARA LAS NOTICIAS SE RELLENA CON FOREACH
					if ($noticia){
						echo'<div id="contenedor-noticias">';
						foreach($noticias as $noticias_){
         					echo '<div id="algo" class="contenido-bloque">
									<h3 class="contenido-titulo">
								<a href="ampliar-noticia.php?noticia='. $noticias_['id'] .'" class="enlace-ampliar-noticia">' . $noticias_['titulo'] . '</a></h3>
								<div class="contenido-info">Escrito por '. $noticias_['nombre_usuario'] . ' el ' . $noticias_['fecha'] . '</div>
								<div class="contenido-texto">
								<p>' . $noticias_['contenido'] . '</p>
								</div>
							</div>
							';
    					}
    					echo '</div>';
    				}
    			###############################
    				#########EVENTO
    				if ($evento){ #hacer un foreach para devolver los eventos

    				}
    				###################
    				#############SERVICIO
    				if ($servicio){ #hacer un foreach para devolver los servicios

    				}
    				##################################
     			?>
			</div>
			<?php
				require(getIncludePath() . 'sidebar.php');
				require(getIncludePath() . 'pie.php');
			?>
		</div>
	</body>
</html>
