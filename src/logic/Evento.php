<?php
namespace aw\logic;

/**
 *
 */
class Evento {
  private $daoEvento;

  function __construct() {
    $this->daoEvento = new \aw\dao\DAOEvento();
  }

  function buscarEventos($sigElem, $elementos){
    $eventos = $this->daoEvento->getListaEventos($sigElem, $elementos);
		if (is_null($eventos)) {
    		return null;
    	}
    return $eventos;
  }

  function buscarEvento($texto){
    $eventos = $this->daoEvento->searchEvento($texto);
    if (is_null($eventos)){
      return null;
    }
    return $eventos;
  }

  function ListaEventosBuscador ($titulo,$contenido,$fechaIni,$fechaFin,$ubicacion){
    $eventos = $this->daoEvento->getListaEventosBuscador($titulo,$contenido,$fechaIni,$fechaFin,$ubicacion);
    return $eventos;
  }
}

 ?>
