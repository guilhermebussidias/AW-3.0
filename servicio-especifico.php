<?php
  require_once __DIR__ . "/src/App.php";

  $categoria = $_GET["tipo"];
  $id = getId();
  $logic = new \aw\logic\servicioEspecifico();
  $logicPuntacion = new \aw\logic\Puntuacion();
  $serviciosPorPagina = 5;

  if (isset($_REQUEST["ultimaPag"]))
    $ultimaPag = $_REQUEST["ultimaPag"];
  else
    $ultimaPag = 0;

  $servicios = $logic->mostrarServicios($categoria, $ultimaPag * $serviciosPorPagina, $serviciosPorPagina);
  $nombreCategoria = $logic->nameCategory($categoria);

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
          <div id="contenedor-servicios">
           <?php
            echo'<h3 class="tituloServicio">'. $nombreCategoria . '</h3>';
              if(!count($servicios) == 0){
                foreach ($servicios as $servicio) {
                $foto = UPLOADED_URL . $servicio['imagen'];
                $votar=$logicPuntacion->haVotado($servicio['id'], $id);
                if ($servicio["patrocinado"] == 1) {
                    echo '
                      <div class="contenido-servicios contenido-servicios-patrocinado">
                        <div class="servicio-patrocinado"><p>Servicio patrocinado</p></div> ';
                } else {
                    echo '
                      <div class="contenido-servicios"> ';
                }
                echo '
                        <div class="imagen-puntuacion">
                          <img class="servicio-imagen" src="' . $foto .'" alt="imagen empresa">
                           <div class="estrellasMedia">';
                            $puntuacion = $servicio['media_puntuacion'];
                            for($i = 0; $i < $puntuacion; $i++){
                              echo '<a  data-value="1" title="Votar con 1 estrellas"></a>';
                            }
                            echo'</div>';
                            if(!is_null(getRole())) {
                              echo'<form action="formPuntuacion.php" method="post">
                                <input type="hidden" name="idServicio" value=' .  $servicio['id'] . '>
                                <input type="hidden" name="idUsuario" value=' .  $id . '>
                                <input type="hidden" name="categoria" value=' .  $servicio['categoria'] . '>  ';
                                if(is_null($votar)){
                                echo '
                                  <select class="puntuacion-usuario" name="puntuacion-servicio">
                                    <option value="1" selected="selected">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                  </select>
                                  <button type="submit" class="myButton" name="boton" value="puntuar-servicio">Puntuar</button>';
                                 }
                             echo '</form>';
                            }

                       echo'</div>
                        <h3 class="servicio-titulo">' .  $servicio['nombre'] . '</h3>
                       <div class="servicio-ubicacion">
                        <p>'. $servicio['ubicacion'] . '</p>
                       </div>
                       <div class="servicio-telefono">
                        <p>'. $servicio['telefono'].'</p>
                       </div>
                       <div class="servicio-url">
                        <a href="'. $servicio['url'] . '" target= "_blank">Página Web
                        </a>
                        </div>
                       <div class="servicio-contenido">
                        <p>'.$servicio['contenido'].'
                        </p>
                        </div>';
                      if($rol=='admin' or $id==$servicio['usuario']){
                        echo'<a class="contenido-boton" href="editar-servicio.php?servicio=' . $servicio['id'] .'">Editar</a>';
                      }
               echo '<div class="clear"></div></div>';
                }
              }
              $prev=$ultimaPag - 1;
              if ($ultimaPag!=0) {
                echo '<a class="contenido-boton" href="servicio-especifico.php?tipo=' . $categoria . '&ultimaPag='.$prev.'">Página anterior</a>';
              }
              $next=$ultimaPag + 1;

              $serviciosPag = $logic->mostrarServicios($categoria, $next * $serviciosPorPagina, $serviciosPorPagina);

              if (!$serviciosPag==null) {
                echo '<a class="contenido-boton" href="servicio-especifico.php?tipo=' . $categoria .'&ultimaPag=' . $next .'">Página siguiente</a>';

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
