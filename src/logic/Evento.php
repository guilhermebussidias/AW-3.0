<?php
namespace aw\logic;

/**
 *
 */
class Evento {
  private $daoEvento;

  function __construct(argument) {
    $this->daoEvento = new \aw\dao\DAOEvento();
  }

  function mostrarEventos($sigElem, $elementos){
    $eventos = $this->daoEvento->getListaEventos($sigElem, $elementos);
		if (is_null($eventos)) {
    		return null;
    	}
    return $eventos;
  }

  function buscarEventos($sigElem, $elementos){
    $elementos = $this->daoElementos->getListaEventos($sigElem, $elementos);
		if (is_null($noticias)) {
    		return null;
    	}
    return $noticias;
  }

  function buscarEvento($texto){
    $eventos = $this->daoEvento->searchEvento($texto);
    if (is_null($eventos)){
      return null;
    }
    return $eventos;
  }
}

 ?>
