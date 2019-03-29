<?php

class coneccion{
  public $conn;
  public function __construct(){
    $this->conn = new mysqli("localhost","root","123456","vinculacion");
  }
  public function get_connection(){
    return $this->conn;
  }
}


?>
