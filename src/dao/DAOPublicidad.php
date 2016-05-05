<?php

namespace aw\dao;

class DAOPublicidad {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }

  function getPublicidad($publicidad) {
    try {
      $sql = "SELECT anuncio, banner FROM Publicidad WHERE id = :nombre";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["nombre" => $publicidad]);
      $res = $stmt->fetchAll();
    } catch(PDOException $e) {
  		echo "ERROR EN DAOPublicidad: " . $e->getMessage();
  	}
    if (!empty($res)) {
      return $res[0];
    } else {
      return null;
    }
  }

  function getListaPublicidad(){
    try {
      $sql = "SELECT anuncio, banner FROM Publicidad LIMIT 3";
      $stmt = $this->conn->prepare($sql);
      $res = $stmt->fetchAll();
    } catch(PDOException $e) {
      echo "ERROR EN DAOPublicidad: " . $e->getMessage();
    }
    if (!empty($res)) {
      return $res;
    } else {
      return null;
    }
  }

  function getListaAnunciante($anunciante){
    try{
      $sql = "SELECT anuncio, banner FROM Publicidad WHERE usuario = :nombre";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["nombre" => $anunciante]);
      $res = $stmt->fetchAll();
    } catch(PDOException $e) {
      echo "ERROR EN DAOPublicidad: " . $e->getMessage();
    }
    if (!empty($res)) {
      return $res;
    } else {
      return null;
    }
  }

  function savePublicidad($username, $anuncio, $banner) {
    try {
      $sql = "INSERT INTO Publicidad (usuario, anuncio, banner) VALUES (:usuario, :anuncio, :banner)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["usuario" => $username, "anuncio" => $anuncio, "banner" => "banner"]);
      $stmt->execute();
      $id = $this->conn->lastInsertId();
    } catch(PDOException $e) {
      echo "ERROR EN DAOPublicidad: " . $e->getMessage();
      return null;
    }
    return $id;
  }

  function updatePublidad($id, $usuario, $anuncio, $banner){
    try {
        $sql = "UPDATE Publicidad SET anuncio = :anuncio , banner = :banner WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["id" => $id, "usuario" => $usuario, "anuncio" => $anuncio, "banner" => $banner]);
        $stmt->execute();
      } catch(PDOException $e) {
        echo "ERROR EN DAOPublicidad: " . $e->getMessage();
        return false;
      }
    return true;
  }

  function deletePublicidad($id){
        try {
        $sql = "DELETE FROM Publicidad WHERE id = :identificador";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["identificador" => $id]);
        $stmt->execute();
      } catch(PDOException $e) {
        echo "ERROR EN DAOPublicidad: " . $e->getMessage();
        return false;
      }
    return true;
  }

}

?>
