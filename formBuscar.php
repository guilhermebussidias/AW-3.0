<?php
	require_once __DIR__ . "/src/App.php";

	$noticia = false;
	$evento = false;
	$servicio = false;
	if (isset($_REQUEST["titulo-noticia"])){ 
		$tituloN = $_REQUEST["titulo-noticia"]; 
		$contenidoN = $_REQUEST["contenido-noticia"];
		$fechaInicioN = $_REQUEST["fecha-ini-noticia"];
		if($fechaInicioN ==="")
			$fechaInicioN = '2001-01-01';

		$fechaFinN = $_REQUEST["fecha-fin-noticia"];
		if($fechaFinN ==="")
			$fechaFinN = '2020-01-01';

		$noticia = true; 
		$logic = new \aw\logic\Noticia();
		$noticias = $logic->buscarNoticiasbuscador($tituloN, $contenidoN, $fechaInicioN, $fechaFinN);
	}
	if (isset($_REQUEST["titulo-evento"])){

		$titulo = $_REQUEST["titulo-evento"];
		$contenido = $_REQUEST["contenido-evento"];
		$fechaInicio = $_REQUEST["fecha-ini-evento"];
		$fechaFin = $_REQUEST["fecha-fin-evento"];
		$ubicacion = $_REQUEST["ubicacion-evento"];

		if ($titulo == "") {
			$titulo = '%';
		}else {
			$titulo = "%" . $titulo . "%";
		}
		if ($contenido == "") {
			$contenido = '%';
		}else {
			$contenido = "%" . $contenido . "%";
		}
		if ($ubicacion == "") {
			$ubicacion = '%';
		}else {
			$ubicacion = "%" . $ubicacion . "%";
		}
		if ($fechaInicio == "") {
			$fechaInicio = '2001-01-01';
		}
		if ($fechaFin == "") {
			$fechaFin = '2020-01-01';
		}

		$evento = true;
		$logic = new \aw\logic\Evento();
		$eventos = $logic->ListaEventosBuscador($titulo,$contenido,$fechaInicio,$fechaFin,$ubicacion);
	}

	if (isset($_REQUEST["contenido-servicio"])){
		$id = getId();
		$nombre = $_REQUEST["nombre-servicio"];
		$contenido = $_REQUEST["contenido-servicio"];
		$categoria = $_REQUEST["categoria-servicio"];
		$ubicacion = $_REQUEST["ubicacion-servicio"];
		$puntuacion = $_REQUEST["puntuacion-servicio"];

		if($nombre == ""){
			$nombre = '%';
		}else{
			$nombre = "%" . $nombre . "%";
		}
		if ($contenido == "") {
			$contenido = '%';
		}else {
			$contenido = "%" . $contenido . "%";
		}
		if($ubicacion == ""){
			$ubicacion = '%';
		}else {
			$ubicacion = "%" . $ubicacion . "%";
		}

		$servicio = true;
		$logic = new \aw\logic\servicioEspecifico();
		$servicios = $logic->ListaServiciosBuscador($nombre, $contenido,$categoria,$ubicacion,$puntuacion);
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
    				if ($evento){ 
							foreach($eventos as $evento){
								echo '
									<div class="contenido-bloque">
									<h3 class="contenido-titulo">'. $evento['titulo'] .'</h3>
									<div class="contenido-texto">
									<p> ' . $evento['contenido'] . ' </p>
									<div class="contenido-info">Escrito por '. $evento['nombre_usuario'] .'</div>
									</div>
									</div>
								';
							}
    				}
   				if ($servicio){ 
   					$nombreCategoria = $logic->nameCategory($categoria);
   					$id = getId();
			      echo'<h3 class="tituloServicio">'. $nombreCategoria . '</h3>';
	                foreach ($servicios as $servicio_) {
	                $foto = UPLOADED_URL . $servicio_['imagen'];
	                echo'<div class="contenido-servicios">
	                        <div class="imagen-puntuacion">
	                          <img class="servicio-imagen" src="' . $foto .'" alt="imagen empresa">
	                           <div class="estrellasMedia">';
	                            $puntuacion = $servicio_['media_puntuacion'];
	                            for($i = 0; $i < $puntuacion; $i++){
	                              echo '<a  data-value="1" title="Votar con 1 estrellas"></a>';
	                            }
	                            echo'</div>';
	                            if(!is_null(getRole())) {
	                            echo'<form action="formPuntuacion.php" method="get">
		                                <input type="hidden" name="idServicio" value=' .  $servicio_['id'] . '>
		                                <input type="hidden" name="idUsuario" value=' .  $id . '>
		                                <input type="hidden" name="categoria" value=' .  $servicio_['categoria'] . '>
		                                  <select class="puntuacion-usuario" name="puntuacion-servicio" >
		                                    <option value="1" selected="selected">1</option>
		                                    <option value="2">2</option>
		                                    <option value="3">3</option>
		                                    <option value="4">4</option>
		                                    <option value="5">5</option>
		                                  </select>
		                                <button type="submit" class="myButton" name="boton" value="puntuar-servicio">Puntuar</button>
		                              </form>';
	                            }
	                       echo'</div>
	                        <h3 class="servicio-titulo">' .  $servicio_['nombre'] . '</h3>
	                       <div class="servicio-ubicacion">
	                        <p>'. $servicio_['ubicacion'] . '</p>
	                       </div>
	                       <div class="servicio-telefono">
	                        <p>'. $servicio_['telefono'].'</p>
	                       </div>
	                       <div class="servicio-url">
	                        <a href="'. $servicio_['url'] . '" target= "_blank">'.$servicio_['url'].'
	                        </a>
	                        </div>
	                       <div class="servicio-contenido">
	                        <p>'.$servicio_['contenido'].'
	                        </p>
	                        </div>';
	                      if($rol=='admin' or $id==$servicio_['usuario']){
	                        echo'<a class="contenido-boton" href="editar-servicio.php?servicio=' . $servicio_['id'] .'">Editar</a>';
	                      }
	               echo '</div>';
	                }

    				}
     			?>
			</div>
			<?php
				require(getIncludePath() . 'sidebar.php');
				require(getIncludePath() . 'pie.php');
			?>
		</div>
	</body>
</html>
