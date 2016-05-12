<?php

namespace aw\dao;

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

  function saveServicio ($usuario,$titulo,$telefono,$url,$ubicacion,$contenido){
    try {
      $sql = "INSERT INTO Servicio (titulo, telefono, url, ubicacion,contenido, usuario)
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

}

?>
