<?php
class usuarios_model {

  private $db;
  private $username;
  private $password;

  public function __construct(){
      $this->db=Conectar::conexion();
  }

  /* GETTERS & SETTERS */

  public function getUsername() {
    return $this->username;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  /**
  * Comprobar si el usuario ha hecho bien el login
  * @return [true]  si lo encuentra
  *         [false] si no lo encuentra
  */
  public function validar_usuario() {
    $sql = "SELECT * FROM usuarios WHERE username = '{$this->username}' AND password = '{$this->password}'";
    $resultado = $this->db->query($sql) or trigger_error(mysqli_error($this->db)." ".$sql);
    if ($resultado->num_rows > 0) {
      while($row=$resultado->fetch_assoc()){
        return true;
      }
    } else {
        return false;
      }
  }
}

?>
