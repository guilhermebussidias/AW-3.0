<?php
namespace aw\logic;

class Puntuacion{

  private $daoPuntuacion;

  function __construct() {
    $this->daoPuntuacion = new \aw\dao\DAOPuntuacion();
  }

  function guardarPuntuacion($usuario,$servicio,$puntuacion){
    $id = $this->daoPuntuacion->savePuntuacion($usuario,esc($servicio),esc($puntuacion));
    return $id;
  }
  function calculaMediaPuntuacion($servicio){
    $media = $this->daoPuntuacion->calculaMedia($servicio);
    return $media;
  }

    function haVotado($idServicio, $idUsuario){
      return $this->daoPuntuacion->haVotado($idServicio, $idUsuario);
    } 
}
?>
