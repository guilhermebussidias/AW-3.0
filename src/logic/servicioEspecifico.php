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
    $servicios = $this->daoServicio->searchServicio(esc($texto));
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

  function ListaServiciosBuscador($nombre, $contenido,$categoria,$ubicacion,$puntuacion) {
    $servicios =  $this->daoServicio->getListaServiciosBuscador(esc($nombre), esc($contenido),esc($categoria),esc($ubicacion),esc($puntuacion));
    return $servicios;
  }

  function guardarServicioCompleto($usuario, $nombre, $contenido, $ubicacion,
                  $categoria, $imagen, $telefono, $url, $patrocinado) {
    $media_puntuacion = 0;
    $id = $this->daoServicio->saveServicioCompleto(esc($usuario), esc($nombre), esc($contenido), esc($ubicacion),
      esc($categoria), esc($media_puntuacion), $imagen, esc($telefono), escURL($url), esc($patrocinado));
    return $id;
  }

  function updateServicio($id, $nombre, $categoria, $url, $ubicacion, $imagen, $contenido, $telefono, $patrocinado){
    return $this->daoServicio->updateServicio(esc($id), esc($nombre), esc($categoria), escURL($url), esc($ubicacion), $imagen, esc($contenido), esc($telefono), esc($patrocinado));

  }

  function deleteServicio($id){
    return $this->daoServicio->deleteServicio($id);
  }

  function updateMediaPuntuacion($servicio, $mediaPuntuacion){
    return $this->daoServicio->updateMediaPuntuacion($servicio, $mediaPuntuacion);

  }
}

?>
