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

  function searchServicios($text){
    try{
      $sql = "SELECT * FROM Servicio  WHERE nombre LIKE '%:text%' OR contenido LIKE '%:text%' ORDER BY nombre";
      $stmt = $this->conn->prepare($sql);
      $res = $stmt->fetchAll();
    } catch(PDOException $e){
      echo "ERROR en DAOServicio: " . $e->getMessage();
    }
    if (!empty($res)) {
      return $res;
    } else {
      return null;
    }

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

}

?>
