<?php
require_once("models/usuarios_model.php");

class usuarios_controller {
  public function login(){
    $usuarios = new usuarios_model();
    $usuarios->setUsername($_POST['username']);
    $usuarios->setPassword($_POST['password']);
    $encontrado = $usuarios->validar_usuario();
    if ($encontrado) {
      header('Location: index.php?controller=personas&action=view');
    } else {
      header('Location: index.php?controller=usuarios&action=mostrar_login');
    }
  }

  function logout(){
      session_start();
      session_unset($_SESSION['username']);
      header('Location: index.php?controller=usuarios&action=mostrar_login');
      exit();
    }

  function mostrar_login(){
    require_once("views/login.phtml");
  }
}
?>
