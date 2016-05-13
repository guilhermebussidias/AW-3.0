<?php

namespace aw\dao;

use DAOException;

class DAOServicio {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }

  function getServicioByCategory($category, $saltar, $elementos) {
      try {
        $sql = "SELECT *
        FROM Servicio WHERE categoria = :categoria
        ORDER BY nombre LIMIT " . $saltar . ", " . $elementos;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["categoria" => $category]);
        $res = $stmt->fetchAll();
      } catch(PDOException $e) {
        echo "ERROR EN DAOServicio: " . $e->getMessage();
      }
      return $res;
  }

  function getListaServiciosBuscador ($contenido,$categoria,$ubicacion,$puntuacion) {
    try {
      $sql = "SELECT * FROM Servicio WHERE contenido LIKE :contenido
              AND categoria = :categoria
              AND ubicacion LIKE :ubicacion
              AND media_puntuacion = :puntuacion";
      $stm = $this->conn->prepare($sql);
      $stm->execute(["contenido" => $contenido, "categoria" => $categoria, "ubicacion" => $ubicacion, "puntuacion" => $puntuacion]);
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
  $categoria, $media_puntuacion, $imagen, $telefono, $url) {
    try {
      $sql = "INSERT INTO Servicio (usuario, nombre, contenido, ubicacion,
        categoria, media_puntuacion, imagen, telefono, url)
        VALUES (:usuario, :nombre, :contenido, :ubicacion, :categoria,
        :media_puntuacion, :imagen, :telefono, :url)";

      $stm = $this->conn->prepare($sql);

      $params = ['usuario' => $usuario, 'nombre' => $nombre,
        'contenido' => $contenido, 'ubicacion' => $ubicacion,
        'categoria' => $categoria, 'media_puntuacion' => $media_puntuacion,
        'imagen' => $imagen, 'telefono' => $telefono, 'url' => $url];

      $stm->execute($params);
      $id = $this->conn->lastInsertId();
    } catch (PDOException $e) {
      echo "ERROR EN DAOServicio: " . $e->getMessage();
    }
    return $id;
  }
  function searchServicio($id){
    try {
      $sql = "SELECT s.nombre as nombre, s.contenido as contenido,
        s.ubicacion as ubicacion, s.imagen as imagen, s.telefono as telefono,
        s.url as url, s.categoria as categoria, s.id as id
        FROM Servicio s
        WHERE s.id=:idServicio";
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

  function updateServicio($id, $nombre, $categoria, $url, $ubicacion, $imagen, $contenido){
      try {
        $sql = "UPDATE Servicio SET nombre =:nombre,
                categoria =:categoria, url =:url, ubicacion =:ubicacion, 
                imagen=:imagen
                WHERE id =:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["id" => $id, "nombre" => $nombre, 
                        "categoria" => $categoria,          
                        "url" => $url,
                        "imagen" => $imagen,
                        "ubicacion" => $ubicacion]);
      } catch(PDOException $e) {
        echo "ERROR EN DAOServicio: " . $e->getMessage();
        return false;
      }
      return true;
  }

}

?>
