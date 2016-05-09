<?php
  require_once 'src/dao/DAOServicio.php'
?>

<h3 class="tituloServicio"><?php /* echo $row['categoria']; */?></h3>
  <table>
    <tbody>
    <?php
    /* llamar a la función del DAO*/
      foreach ($res as $row) {
    ?>
      <tr>
            <td rowspan="4"><img src="<?php echo $row['imagen']; ?>" class="imagenServicio" alt="imagen empresa"></td>
            <td class="empresaServicio"> <?php echo $row['nombre']; ?> </td>
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
            <td class="direccionServicio"><?php echo $row['ubicacion']; ?></td>
          </tr>
          <tr>
            <td class="telefonoServicio"><?php echo $row['telefono']; ?></td>
          </tr>
          <tr>
            <td class="descripcionServicio"><?php echo $row['contenido']; ?></td>
            <td> <a href="<?php echo row['web']; ?>"><?php echo row['web']; ?></a></td>
          </tr>

      </tr>
    <?php } ?>

    </tbody>
  </table>



