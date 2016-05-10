<?php
namespace aw\logic;

class servicioEspecifico{
  
  private $daoServicio;

  function __construct() {
    $this->daoServicio = new \aw\dao\DAOServicio();
  }

  function mostrarServicios($categoria){
    $servicios = $this->daoServicio->getServicioByCategory($categoria);
    return $servicios;
  }

  function buscarServicio($texto){
    $servicios = $this->daoServicios->searchServicio($texto);
    if (is_null($servicios)){
      return null;
    }
    return $servicios;
  }
}


?>