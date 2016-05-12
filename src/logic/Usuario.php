<?php

namespace aw\logic;

class Usuario {

  private $daoUsuario;

  function __construct() {
    $this->daoUsuario = new \aw\dao\DAOUsuario();
  }

  function checkLogin($username, $password) {
    $user = $this->daoUsuario->findByName($username);
    if (is_null($user) || !password_verify($password, $user["pass"])) {
      return null;
    }
    return $user;
  }

  function deleteUser($name){
    return $this->daoUsuario->delete($name);
  } 

  function updateByName($username, $password, $role){
    $hpassword = password_hash($password, PASSWORD_BCRYPT);
    return $this->daoUsuario->updateByName($username, $hpassword, $role);
  }

  function newUser($name, $password, $role) {
    $hpassword = password_hash($password, PASSWORD_BCRYPT);
    return $this->daoUsuario->persist($name, $hpassword, $role);
  }
}

?>
