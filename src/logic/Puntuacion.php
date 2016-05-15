<?php
namespace aw\logic;

class Puntuacion{

  private $daoPuntuacion;

  function __construct() {
    $this->daoPuntuacion = new \aw\dao\DAOPuntuacion();
  }

  function guardarPuntuacion($usuario,$servicio,$puntuacion){
    $id = $this->daoPuntuacion->savePuntuacion($usuario,$servicio,$puntuacion);
    return $id;
  }
  function calculaMediaPuntuacion($servicio){
    $media = $this->daoPuntuacion->calculaMedia($servicio);
    return $media;
  }

}
?>
