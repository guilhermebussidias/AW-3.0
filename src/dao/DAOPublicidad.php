<?php

namespace aw\dao;

use PDOException;

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
      $sql = "SELECT p.anuncio, p.banner, u.id as idUser, p.id as id
      FROM Publicidad p
      JOIN Usuario u on p.usuario = u.id
      ORDER BY RAND() LIMIT 0, 2";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
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
      $stmt->execute(["usuario" => $username, "anuncio" => $anuncio, "banner" => $banner]);
      $id = $this->conn->lastInsertId();
    } catch(PDOException $e) {
      echo "ERROR EN DAOPublicidad: " . $e->getMessage();
      return null;
    }
    return $id;
  }

  function updatePublicidad($id, $anuncio, $banner){
    try {
        if (!is_null($banner)) {
          $sql = "UPDATE Publicidad SET anuncio = :anuncio , banner = :banner WHERE id = :id";
        } else {
          $sql = "UPDATE Publicidad SET anuncio = :anuncio WHERE id = :id";
        }
        $stmt = $this->conn->prepare($sql);
        $params = ["id" => $id, "anuncio" => $anuncio];
        if (!is_null($banner)) {
          $params["banner"] = $banner;
        }
        $stmt->execute($params);
      } catch(PDOException $e) {
        #echo "ERROR EN DAOPublicidad: " . $e->getMessage();
        return null;
      }
    return true;
  }

  function deletePublicidad($id){
        try {
        $sql = "DELETE FROM Publicidad WHERE id = :identificador";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["identificador" => $id]);
      } catch(PDOException $e) {
        echo "ERROR EN DAOPublicidad: " . $e->getMessage();
        return false;
      }
    return true;
  }

}

?>
