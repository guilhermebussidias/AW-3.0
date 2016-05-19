<?php

namespace aw\logic;

class Publicidad {

  private $daoPublicidad;

  function __construct() {
      $this->daoPublicidad = new \aw\dao\DAOPublicidad();
  }

  function buscarPublicidad() {
    return $this->daoPublicidad->getListaPublicidad();
  }

  function buscarpublicidadById($idPublicidad) {
    return $this->daoPublicidad->getPublicidad($idPublicidad);
  }

  function deletePublicidad($idPublicidad) {
    return $this->daoPublicidad->deletePublicidad($idPublicidad);
  }

  function updatePublicidad($id, $anuncio, $banner) {
    return $this->daoPublicidad->updatePublicidad($id, esc($anuncio), esc($banner));
  }

  function savePublicidad($usuario, $anuncio, $banner){
    return $this->daoPublicidad->savePublicidad($usuario, esc($anuncio), esc($banner));
  }
}

?>



 