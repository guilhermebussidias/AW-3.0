<?php

namespace aw\dao;

class DAONoticia {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }

  function getNoticia($titulo) {
    try {
      $sql = "SELECT * FROM Noticia WHERE titulo = :tituloNoticia";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["tituloNoticia" => $titulo]);
      $res = $stmt->fetchAll();
    } catch(PDOException $e) {
  		echo "ERROR EN DAONoticia: " . $e->getMessage();
  	}
    if (!empty($res)) {
      return $res[0];
    } else {
      return null;
    }
  }

  function getListaNoticias($sigElem, $elementos) {
    try{
      $sql = "SELECT * FROM Noticia WHERE fecha < now() ORDER BY fecha LIMIT :sigElemento , :numElementos";
      $stmt->execute(["sigElemento" => $sigElem]);
      $stmt->execute(["numElementos" => $elementos]);
      $stmt = $this->conn->prepare($sql);
      $res = $stmt->fetchAll();
    }
    catch (PDOException $e){
      echo "ERROR EN DAONoticia: " . $e->getMessage();
    }
    if (!empty($res)) {
      return $res;
    } else {
      return null;
    }
  }

}

?>
