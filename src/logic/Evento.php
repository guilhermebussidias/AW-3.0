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
    $eventos = $this->daoEvento->searchEvento(esc($texto));
    if (is_null($eventos)){
      return null;
    }
    return $eventos;
  }

  function ListaEventosBuscador ($titulo,$contenido,$fechaIni,$fechaFin,$ubicacion){
    $eventos = $this->daoEvento->getListaEventosBuscador(esc($titulo),esc($contenido),esc($fechaIni),esc($fechaFin),esc($ubicacion));
    return $eventos;
  }

  function updateEvento($id, $titulo, $contenido, $fecha, $ubicacion, $foto) {
    	return $this->daoEvento->updateEvento($id, esc($titulo), esc($contenido), esc($fecha), esc($ubicacion), $foto);
	}

  function saveEvento($titulo, $contenido, $fecha, $ubicacion, $foto, $usuario) {
    	return $this->daoEvento->saveEvento(esc($titulo), esc($contenido), esc($fecha), esc($ubicacion), $foto, $usuario);
	}

  function deleteEvento($id) {
    	return $this->daoEvento->deleteEvento($id);
	}
}

 ?>
