<?php

namespace aw\dao;

class DAOServicio {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }

  function getServicioByCategory($category) {
      try {
        $sql = "SELECT * FROM Servicio WHERE categoria = :categoria ORDER BY media_puntuacion DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["nombre" => $username]);
        $res = $stmt->fetchAll();
      } catch(PDOException $e) {
    		echo "ERROR EN DAOServicio: " . $e->getMessage();
    	}
  }

}

?>
