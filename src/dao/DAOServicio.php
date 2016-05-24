<?php

namespace aw\dao;

use PDOException;

class DAOServicio {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }

  function getServicioByCategory($category, $saltar, $elementos) {
      try {
        $sql = "SELECT
        id, usuario, nombre, contenido, ubicacion, categoria, media_puntuacion, imagen, telefono, url, IFNULL(patrocinado, 0) as patrocinado
        FROM Servicio WHERE categoria = :categoria
        ORDER BY IFNULL(patrocinado, 0) DESC, nombre LIMIT " . $saltar . ", " . $elementos;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["categoria" => $category]);
        $res = $stmt->fetchAll();
      } catch(PDOException $e) {
        echo "ERROR EN DAOServicio: " . $e->getMessage();
      }
      return $res;
  }

  function getListaServiciosBuscador ($nombre, $contenido,$categoria,$ubicacion,$puntuacion) {
    try {
      $sql = "SELECT
              id, usuario, nombre, contenido, ubicacion, categoria, media_puntuacion, imagen, telefono, url, IFNULL(patrocinado, 0) as patrocinado
              FROM Servicio WHERE contenido LIKE :contenido
              AND categoria = :categoria
              AND nombre LIKE :nombre
              AND ubicacion LIKE :ubicacion
              AND media_puntuacion >= :puntuacion
              ORDER BY IFNULL(patrocinado, 0) DESC";
      $stm = $this->conn->prepare($sql);
      $stm->execute(["contenido" => $contenido, "nombre" => $nombre, "categoria" => $categoria, "ubicacion" => $ubicacion, "puntuacion" => $puntuacion]);
      $res = $stm->fetchAll();
    } catch (PDOException $e) {
      echo "ERROR en DAOServicio: " . $e->getMessage();
    }
    return $res;
  }

  function saveServicio ($usuario,$titulo,$telefono,$url,$ubicacion,$contenido){//codigo muerto?
    try {
      $sql = "INSERT INTO Servicio (nombre, telefono, url, ubicacion,contenido, usuario)
              VALUES (:titulo, :telefono, :url, :ubicacion, :contenido, :usuario)";
      $stm = $this->conn->prepare($sql);
      $stm->execute(["titulo" => $titulo, "telefono" => $telefono,
                     "url" => $url, "ubicacion" => $ubicacion,
                     "contenido" => $contenido, "usuario" => $usuario]);
     $id = $this->conn->lastInsertId();
    } catch (PDOException $e) {
      echo "ERROR EN DAOServicio: " . $e->getMessage();
    }
    return $id;
  }

  function saveServicioCompleto($usuario, $nombre, $contenido, $ubicacion,
  $categoria, $media_puntuacion, $imagen, $telefono, $url, $patrocinado) {
    try {
      if (!is_null($imagen))
        $sql = "INSERT INTO Servicio (usuario, nombre, contenido, ubicacion,
          categoria, media_puntuacion, imagen, telefono, url, patrocinado)
          VALUES (:usuario, :nombre, :contenido, :ubicacion, :categoria,
          :media_puntuacion, :imagen, :telefono, :url, :patrocinado)";
      else
        $sql = "INSERT INTO Servicio (usuario, nombre, contenido, ubicacion,
          categoria, media_puntuacion, telefono, url, patrocinado)
          VALUES (:usuario, :nombre, :contenido, :ubicacion, :categoria,
          :media_puntuacion, :telefono, :url, :patrocinado)";

      $stm = $this->conn->prepare($sql);

      $params = ['usuario' => $usuario, 'nombre' => $nombre,
        'contenido' => $contenido, 'ubicacion' => $ubicacion,
        'categoria' => $categoria, 'media_puntuacion' => $media_puntuacion,
        'telefono' => $telefono, 'url' => $url, 'patrocinado' => $patrocinado];

      if (!is_null($imagen))
        $params['imagen'] = $imagen;

      $stm->execute($params);
      $id = $this->conn->lastInsertId();
    } catch (PDOException $e) {
      echo "ERROR EN DAOServicio: " . $e->getMessage();
    }
    return $id;
  }
  function searchServicio($id){
    try {
      $sql = "SELECT s.usuario as usuario, s.nombre as nombre, s.contenido as contenido,
        s.ubicacion as ubicacion, s.imagen as imagen, s.telefono as telefono,
        s.url as url, s.categoria as categoria, s.id as id, IFNULL(s.patrocinado, 0) as patrocinado
        FROM Servicio s
        WHERE s.id=:idServicio
        ORDER BY IFNULL(s.patrocinado, 0) DESC";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["idServicio" => $id]);
      $res = $stmt->fetchAll();
    } catch(PDOException $e) {
      echo "ERROR EN DAOServicio: " . $e->getMessage();
    }
    if (!empty($res)) {
      return $res[0];
    } else {
      return null;
    }

  }

  function deleteServicio($id){
    try {
      $sql = "DELETE FROM Servicio WHERE id = :id ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["id" => $id]);
    } catch (PDOException $e) {
      echo "ERROR EN DAOServicio: " . $e->getMessage();
      return null;
    }
    return true;
  }

  function updateServicio($id, $nombre, $categoria, $url, $ubicacion, $imagen, $contenido, $telefono, $patrocinado){
      try {
        $sql = "UPDATE Servicio SET nombre =:nombre, telefono =:telefono,
                categoria =:categoria, url =:url, ubicacion =:ubicacion,
                contenido =:contenido, imagen=:imagen, patrocinado=:patrocinado
                WHERE id =:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["id" => $id, "nombre" => $nombre,
                        "categoria" => $categoria,
                        "url" => $url,
                        "telefono" => $telefono,
                        "imagen" => $imagen,
                        "contenido" => $contenido,
                        "ubicacion" => $ubicacion,
                        "patrocinado" => $patrocinado]);
      } catch(PDOException $e) {
        echo "ERROR EN DAOServicio: " . $e->getMessage();
        return false;
      }
      return true;
  }

  function updateMediaPuntuacion($servicio, $puntuacionMedia){
      try {
        $sql = "UPDATE Servicio SET media_puntuacion =:puntuacionMedia
                WHERE id =:servicio";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["servicio" => $servicio, "puntuacionMedia" => $puntuacionMedia]);
      } catch(PDOException $e) {
        echo "ERROR EN DAOServicio: " . $e->getMessage();
        return false;
      }
      return true;
  }

}

?>
