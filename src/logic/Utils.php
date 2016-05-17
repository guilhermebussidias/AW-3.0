<?php

namespace aw\logic;

class Utils {

  /*

  uploadPic recibe el nombre del campo del formulario de tipo "file" que
  contiene la foto, la reescala y la convierte a formato PNG, y finalmente la
  sube al directorio predeterminado del servidor.

  Devuelve un string con el nombre generado para la foto, no la ruta completa.

  El formulario debe tener un campo oculto llamado "MAX_FILE_SIZE":

  <form enctype="multipart/form-data" action="upload.php" method="POST">
      <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
      <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
      <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
      Enviar este fichero: <input name="fichero_usuario" type="file" />
      <input type="submit" value="Enviar fichero" />
  </form>

  */

  static function uploadPic($fieldName) {

    if (isset($_REQUEST["MAX_FILE_SIZE"])) {
      $inputname = $_FILES[$fieldName]['tmp_name'];
      if (!isset($inputname)) {
        echo "Nombre de campo equivocado";
        die;
      }
      if ($inputname === '') {
        echo "No se adjuntó archivo o éste es demasiado grande";
        die;
      }

      $imagename = uniqid('', true) . '.png';
      $outputname = UPLOAD_PATH . $imagename;

      switch(exif_imagetype($inputname)) {
        case IMAGETYPE_JPEG:
           $image = imagecreatefromjpeg($inputname);
           break;
        case IMAGETYPE_GIF:
           $image = imagecreatefromgif($inputname);
           break;
        case IMAGETYPE_PNG:
           $image = imagecreatefrompng($inputname);
           break;
      }

      if (!isset($image) || !$image) {
        echo "Error en el formato de la imagen enviada";
        die;
      }

      $scaled = imagescale($image, UPLOADED_IMG_WIDTH);
      imagepng($scaled, $outputname);

      return $imagename;

    } else {
      echo 'Hay un error en el formulario de envío'; // Falta el campo "MAX_FILE_SIZE"
      die;
    }
  }
}

?>
