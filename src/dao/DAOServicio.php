<?php

namespace aw\dao;

class DAOServicio {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }

  function getServicioByCategory($category) {
      try {
        $sql = "SELECT nombre, contenido, ubicacion, media_puntuacion, imagen FROM Servicio WHERE categoria = :categoria ";
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
      $sql = "SELECT nombre, contenido, ubicacion, media_puntuacion, imagen FROM Servicio  WHERE nombre LIKE '%:text%' OR contenido LIKE '%:text%' ORDER BY nombre";
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

}

?>
