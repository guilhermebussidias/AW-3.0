<?php

namespace aw\logic;

class Utils {

  static function uploadPic($fieldName, $compulsory = true) {

    $inputname = $_FILES[$fieldName]['tmp_name'];

    if ($inputname === '' && !$compulsory) {
      return null;
    }

    if (isset($_REQUEST["MAX_FILE_SIZE"])) {
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

      imagepng($image, $outputname);

      return $imagename;

    } else {
      echo 'Hay un error en el formulario de envío';
      die;
    }
  }
}

?>
