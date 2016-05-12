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
		if($fechaInicioN=="")
			$fechaInicioN = '2001-01-01';

		$fechaFinN = $_REQUEST["fecha-fin-noticia"];
		if($fechaFinN=="")
			$fechaFinN = '2020-01-01';

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

		##################### Rellenar con tus parametros
		$contenido = $_REQUEST["contenido-servicio"];
		$categoria = $_REQUEST["categoria-servicio"];
		$ubicacion = $_REQUEST["ubicacion-servicio"];
		$puntuacion = $_REQUEST["puntuacion-servicio"];
		#####################

		//Adaptación para el LIKE de la consulta
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
		$servicios = $logic->ListaServiciosBuscador($contenido,$categoria,$ubicacion,$puntuacion);
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
<<<<<<< HEAD
   				if ($servicio){ #hacer un foreach para devolver los 
    					$nombreCategoria = $logic->nameCategory($categoria);
						echo '<h3 class="tituloServicio">' . $nombreCategoria . '</h3>';

						if(!(count($servicios) == 0)){
			            echo '<table>';
			                foreach ($servicios as $servicio_){
			                  	echo '<tr> 
		                          <td rowspan="4"><img src="' . $servicio_['nombre'] .'" class="imagenServicio" alt="imagen empresa"></td>
		                          <td class="empresaServicio">' . $servicio_['nombre'] . '</td>
		                          <td rowspan="2">
		                              <div class="estrellasMedia">';
		                              $puntuacion = $servicio_['media_puntuacion'];
		                              for($i = 0; $i < $puntuacion; $i++){
		                                echo '<a  data-value="1" title="Votar con 1 estrellas"></a>';
		                              }                       
			                    echo '</td> 
			                        </tr>
			                        <tr>
			                          <td class="direccionServicio">' . $servicio_['ubicacion'] . '</td>
			                        </tr>
			                        <tr>
			                          <td class="telefonoServicio">' .  $servicio_['telefono'] . '</td>
			                          <td>'; 
			                            if(!is_null(getRole())) {
			                              echo '<label for="input-categoria-servicio">Puntuación:</label>
			                                      <select name="categoria-servicio" id="input-categoria-servicio">
			                                        <option value="1" selected="selected">1</option>
			                                        <option value="2">2</option>
			                                        <option value="3">3</option>
			                                        <option value="4">4</option>
			                                        <option value="5">5</option>
			                                        <option value="6">6</option>
			                                        <option value="7">7</option>
			                                        <option value="8">8</option>
			                                        <option value="9">9</option>
			                                        <option value="10">10</option>
			                                      </select>';
			                            } 
			                     echo '</td>
			                        </tr>
			                        <tr>
			                          <td class="descripcionServicio">' . $servicio_['contenido'] . '</td>
			                          <td> <a href="'. $servicio_['url'] . '" target= "_blank">'  . $servicio_['url'] . '</a></td>
			                        </tr>';
			                 }           
			          echo' </table>';
			      	}
=======
    				if ($servicio){ #hacer un foreach para devolver los servicios
							echo '<h3 class="tituloServicio"><?php echo' . $categoria . '?></h3>';
							echo '<table>';
							foreach ($servicios as $servicio_) {
								echo'<tr>
								<td rowspan="4"><img src="' . $servicio_['nombre'] .'" class="imagenServicio" alt="imagen empresa"></td>
								<td class="empresaServicio">' . $servicio_['nombre'] . '</td>
								<td rowspan="2">
									<div class="estrellasMedia">';
									$puntuacion = $servicio_['media_puntuacion'];
										for($i = 0; $i < $puntuacion; $i++){
											echo '<a  data-value="1" title="Votar con 1 estrellas"></a>';
										};
							 echo'</td>
									</tr>
									<tr>
										<td class="direccionServicio">' . $servicio_['ubicacion'] . '</td>
									</tr>
									<tr>
										<td class="telefonoServicio">' .  $servicio_['telefono'] . '</td>
										<td>';
							 echo '</td>
								</tr>
								<tr>
									<td class="descripcionServicio">' . $servicio_['contenido'] . '</td>
									<td> <a href="'. $servicio_['url'] . '" target= "_blank">'  . $servicio_['url'] . '</a></td>
								</tr>';
							}
							echo '</table>';
>>>>>>> origin/master
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
