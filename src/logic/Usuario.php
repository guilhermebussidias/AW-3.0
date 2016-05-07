<?php

namespace aw\logic;

class Usuario {

  private $daoUsuario;

  function __construct() {
    $this->daoUsuario = new \aw\dao\DAOUsuario();
  }

  function checkLogin($username, $password) {
    $user = $this->daoUsuario->findByName($username);
    if (is_null($user) || strcmp($password, $user["pass"]) !== 0) {
      return null;
    }
    return $user;
  }

  /*
  function findByName($name) {
    return $this->daoUsuario->findByName($name);
  }
  */
}

?>
