<?php

require_once 'conexion.php';

class ModeloGrupos
{
  //FUNCION PARA GUARDAR UNA NUEVO GRUPO
  static public function mdlGuardarGrupo($nombre,$descripcion,$estado,$asunto,$cuerpo,$adjunto,$dropbox){

    $link = Conexion::ConectarMysql();
    $sql = mysqli_query($link,"INSERT INTO `grupos`(`nombre`, `descripcion`, `activo`, `asunto`, `cuerpo`, `adjunto`, `dropbox`) VALUES ('$nombre','$descripcion','$estado','$asunto','$cuerpo','$adjunto','$dropbox')");

    if ($sql) {
      return true;
    }else {
      return false;
    }
    // Cerrar la conexión.
    mysqli_close( $link );
  }

  //FUNCION PARA TRAER GRUPOS
  static public function mdlObtenerGrupos(){

    $link = Conexion::ConectarMysql();
    $sql = mysqli_query($link,"select * from grupos");

    while ($filas = mysqli_fetch_assoc($sql)) {
      $grupos[]=$filas;
    }
    return $grupos;
    // Cerrar la conexión.
    mysqli_close( $link );
  }

  //FUNCION PARA TRAER GRUPOS TOTAL
  static public function mdlObtenerGruposCant(){

    $link = Conexion::ConectarMysql();
    $sql = mysqli_query($link,"select * from grupos");
    $total = mysqli_num_rows($sql);

    return $total;
    // Cerrar la conexión.
    mysqli_close( $link );
  }

  //FUNCION PARA EDITAR UN GRUPO
  static public function mdlEditarGrupo($nombre, $descripcion, $estado, $asunto, $cuerpo, $adjunto, $dropbox, $idGrupo){

    $link = Conexion::ConectarMysql();
    $query = "UPDATE `grupos` SET `nombre`='$nombre',`descripcion`='$descripcion',`activo`=$estado,`asunto`='$asunto',`cuerpo`='$cuerpo',`adjunto`='$adjunto',`dropbox`='$dropbox' WHERE id = $idGrupo";
    $sql = mysqli_query($link,$query);

    if ($sql) {
      return true;
    }else {
      return false;
    }
    // Cerrar la conexión.
    mysqli_close( $link );
  }

  //FUNCION PARA ELIMINAR UN GRUPO
  static public function mdlBorrarGrupo($id){

    $link = Conexion::ConectarMysql();
    $query = "DELETE FROM grupos WHERE id = '$id'";
    $sql = mysqli_query($link,$query);

    if ($sql) {
      return true;
    }else {
      return false;
    }
    // Cerrar la conexión.
    mysqli_close( $link );
  }

  static public function mdlObtenerDatosGrupos($id){

   $set = Conexion::ConectarMysql();
   $sql = mysqli_query($set,"select * from grupos where id=$id");

   while ($filas = mysqli_fetch_assoc($sql)) {
     $perfil[]=$filas;
   }
   return $perfil;
   // Cerrar la conexión.
   mysqli_close( $set );

 }

}

?>
