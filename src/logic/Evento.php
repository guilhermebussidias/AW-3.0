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

  function getEvento($id){
    $eventos = $this->daoEvento->getEvento($id);
		if (is_null($eventos)) {
    		return null;
    	}
    return $eventos;
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

  function updateEvento($id, $titulo, $contenido, $fecha, $ubicacion, $foto) {
    	return $this->daoEvento->updateEvento($id, $titulo, $contenido, $fecha, $ubicacion, $foto);
	}

  function saveEvento($titulo, $contenido, $fecha, $ubicacion, $foto, $usuario) {
    	return $this->daoEvento->saveEvento($titulo, $contenido, $fecha, $ubicacion, $foto, $usuario);
	}

  function deleteEvento($id) {
    	return $this->daoEvento->deleteEvento($id);
	}
}

 ?>
