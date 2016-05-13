<?php
  require_once __DIR__ . "/src/App.php";

  $categoria = $_GET["tipo"];

  $logic = new \aw\logic\servicioEspecifico();

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
                echo '<table>';
                  foreach ($servicios as $servicio){
                    echo'<tr>
                          <td rowspan="4"><img src="' . $servicio['nombre'] .'" class="imagenServicio" alt="imagen empresa"></td>
                          <td class="empresaServicio">' . $servicio['nombre'] . '</td>
                          <td rowspan="2">
                          <div class="estrellasMedia">';
                            $puntuacion = $servicio['media_puntuacion'];
                            for($i = 0; $i < $puntuacion; $i++){
                              echo '<a  data-value="1" title="Votar con 1 estrellas"></a>';
                            }
                    echo'</td>
                        </tr>
                        <tr>
                          <td class="direccionServicio">' . $servicio['ubicacion'] . '</td>
                        </tr>
                        <tr>
                          <td class="telefonoServicio">' .  $servicio['telefono'] . '</td>
                          <td>';
                            if(!is_null(getRole())) {
                              echo '<label for="input-categoria-servicio">Puntuación:</label>
                                      <select name="categoria-servicio" id="input-categoria-servicio">
                                        <option value="1" selected="selected">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                      </select>';
                            }
                    echo '</td>
                        </tr>
                        <tr>
                          <td class="descripcionServicio">' . $servicio['contenido'] . '</td>
                          <td> <a href="'. $servicio['url'] . '" target= "_blank">'  . $servicio['url'] . '</a></td>
                        </tr>';
                   }
                echo'</table>';
              }
              $prev=$ultimaPag - 1;
              if ($ultimaPag!=0) {
                echo '<a href="servicio-especifico.php?tipo=' . $categoria . '&ultimaPag='.$prev.'">Página anterior</a>';
              }
              $next=$ultimaPag + 1;

              $serviciosPag = $logic->mostrarServicios($categoria, $next * $serviciosPorPagina, $serviciosPorPagina);

              if (!$serviciosPag==null) {
                echo '<a href="servicio-especifico.php?tipo=' . $categoria .'&ultimaPag=' . $next .'">Página siguiente</a>';
                     //   echo'<form method="get" action="servicio-especifico.php?tipo=' . $categoria .'&ultimaPag=' . $next .'"><button type="submit">Página siguiente</button></form>';

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
