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
          <h3 class="tituloServicio"><?php echo $categoria?></h3>
            <table>
              <?php
                  foreach ($servicios as $servicio){
                  echo'<tr> 
                          <td rowspan="4"><img src="' . $servicio['nombre'] .'" class="imagenServicio" alt="imagen empresa"></td>
                          <td class="empresaServicio">' . $servicio['nombre'] . '</td>
                          <td rowspan="3">  
                            <div class="estrellas">
                              <a href="#" data-value="1" title="Votar con 1 estrellas"></a>
                              <a href="#" data-value="2" title="Votar con 2 estrellas"></a>
                              <a href="#" data-value="3" title="Votar con 3 estrellas"></a>
                              <a href="#" data-value="4" title="Votar con 4 estrellas"></a>
                              <a href="#" data-value="5" title="Votar con 5 estrellas"></a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="direccionServicio">' . $servicio['ubicacion'] . '</td>
                        </tr>
                        <tr>
                          <td class="telefonoServicio">' .  $servicio['telefono'] . '</td>
                        </tr>
                        <tr>
                          <td class="descripcionServicio">' . $servicio['contenido'] . '</td>
                          <td> <a href="'. $servicio['url'] . '" target= "_blank">'  . $servicio['url'] . '</a></td>
                        </tr>';
                 } 
                 ?>               
           </table>
           <a href="servicio-especifico.php?tipo=<?=$categoria?>&ultimaPag=<?=$ultimaPag + 1?>">Siguiente página</a>
        </div>
      <?php
        require('includes/sidebar.php');
        require('includes/pie.php');
      ?>
    </div>
  </body>
</html>
