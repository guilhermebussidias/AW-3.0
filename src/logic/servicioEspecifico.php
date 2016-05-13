<?php
namespace aw\logic;

class servicioEspecifico{

  private $daoServicio;

  function __construct() {
    $this->daoServicio = new \aw\dao\DAOServicio();
  }

  function mostrarServicios($categoria, $saltar, $elementos){
    $servicios = $this->daoServicio->getServicioByCategory($categoria, $saltar, $elementos);
    return $servicios;
  }

  function buscarServicio($texto){
    $servicios = $this->daoServicios->searchServicio($texto);
    if (is_null($servicios)){
      return null;
    }
    return $servicios;
  }
  function nameCategory($categoria){
    $nombreCategoria;
    switch ($categoria) {
      case 'peluqueria':
        $nombreCategoria = "Peluquerías";
        break;
      case 'veterinario':
        $nombreCategoria = "Veterinarios";
        break;
      case 'adiestrador':
        $nombreCategoria = "Adiestradores";
        break;
      case 'adopcion':
        $nombreCategoria = "Adopción";
        break;
      case 'residencia':
        $nombreCategoria = "Residencias";
        break;
      case 'paseador':
        $nombreCategoria = "Paseadores";
        break;
    }

  return $nombreCategoria;
  }

  function ListaServiciosBuscador($contenido,$categoria,$ubicacion,$puntuacion) {
    $servicios =  $this->daoServicio->getListaServiciosBuscador($contenido,$categoria,$ubicacion,$puntuacion);
    return $servicios;
  }

  function guardarServicio($usuario,$titulo,$telefono,$url,$ubicacion,$contenido){//codigo muerto?
    $id = $this->daoServicio->saveServicio($usuario,$titulo,$telefono,$url,$ubicacion,$contenido);
    return $id;
  }

  function guardarServicioCompleto($usuario, $nombre, $contenido, $ubicacion,
                  $categoria, $imagen, $telefono, $url) {
    $media_puntuacion = 0;
    $id = $this->daoServicio->saveServicioCompleto($usuario, $nombre, $contenido, $ubicacion,
      $categoria, $media_puntuacion, $imagen, $telefono, $url);
    return $id;
  }
}


?>
