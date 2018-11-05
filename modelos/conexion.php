<?php

class Conexion{

  static function ConectarMysql(){

    $conn = mysqli_connect("localhost","root","","unter");

    // Check connection
    if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    return $conn;
  }
}



?>
