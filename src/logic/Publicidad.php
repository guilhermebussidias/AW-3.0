<?php

namespace aw\logic;

class Publicidad {

  private $daoPublicidad;

  function __construct() {
      $this->daoPublicidad = new \aw\dao\DAOPublicidad();
  }

  function buscarPublicidad() {
    $publicidad = $this->daoPublicidad->getListaPublicidad();
    return $publicidad;
  }

  function buscarpublicidadById($idNoticia) {
    $publicidad = $this->daoPublicidad->getPublicidad($idNoticia);
    return $publicidad;
  }

}

?>
