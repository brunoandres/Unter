<?php

require_once 'conexion.php';

class ModeloMails
{
  //FUNCION PARA GUARDAR UNA NUEVO MAIL
  static public function mdlGuardarMail($nombrePersona,$direccion,$dominio,$estado){

    $link = Conexion::ConectarMysql();
    $sql = mysqli_query($link,"INSERT INTO `mails`(`nombre`, `direccion`, `dominio`, `activo`) VALUES ('$nombrePersona','$direccion','$dominio','$estado')");

    if ($sql) {
      return mysqli_insert_id($link);
    }else {
      return false;
    }
    // Cerrar la conexión.
    mysqli_close( $link );
  }

  //FUNCION PARA GUARDAR UNA NUEVO MAIL ASOCIADO
  static public function mdlGuardarMailSubgrupo($idmail,$idsub){

    $link = Conexion::ConectarMysql();
    $sql = mysqli_query($link,"INSERT INTO `mails_subgrupos`(`id_mail`, `id_subgrupo`) VALUES ('$idmail','$idsub')");

    if ($sql) {
      return true;
    }else {
      return false;
    }
    // Cerrar la conexión.
    mysqli_close( $link );
  }

  //FUNCION PARA EDITAR UN MAIL
  static public function mdlEditarMail($nombrePersona,$direccion,$dominio,$estado,$idMail){

    $link = Conexion::ConectarMysql();
    $query = "UPDATE `mails` SET `nombre`='$nombrePersona',`direccion`='$direccion',`dominio`='$dominio',`activo`='$estado' WHERE id = '$idMail'";
    $sql = mysqli_query($link,$query);

    if ($sql) {
      return true;
    }else {
      return false;
    }
    // Cerrar la conexión.
    mysqli_close( $link );
  }

  //FUNCION PARA TRAER MAILS
  static public function mdlObtenerMails(){

    $link = Conexion::ConectarMysql();
    //$query="SELECT a.*,b.nombre as subgrupo from mails a,subgrupos b, mails_subgrupos c where a.id=c.id_mail and b.id=c.id_subgrupo";
    $query = "SELECT a.id,a.nombre,a.direccion,a.dominio,a.activo,GROUP_CONCAT(b.nombre) as subgrupos FROM mails a, subgrupos b, mails_subgrupos c WHERE a.id=c.id_mail AND b.id=c.id_subgrupo GROUP BY a.direccion";
    $sql = mysqli_query($link,$query);


    while ($filas = mysqli_fetch_assoc($sql)) {
      $mails[]=$filas;
    }
    return $mails;
    // Cerrar la conexión.
    mysqli_close( $link );
  }


  //FUNCION PARA TRAER ULTIMOS MAILS
  static public function ctrMostrarMailsUltimos(){

    $link = Conexion::ConectarMysql();
    $sql = mysqli_query($link,"SELECT a.*,b.nombre as subgrupo from mails a,subgrupos b, mails_subgrupos c where a.id=c.id_mail and b.id=c.id_subgrupo order by id desc LIMIT 10");

    while ($filas = mysqli_fetch_assoc($sql)) {
      $mails[]=$filas;
    }
    return $mails;
    // Cerrar la conexión.
    mysqli_close( $link );
  }

  //FUNCION PARA TRAER TOTAL MAILS
  static public function mdlObtenerMailsCant(){

    $link = Conexion::ConectarMysql();
    $sql = mysqli_query($link,"select * from mails where activo=1");
    $total = mysqli_num_rows($sql);

    return $total;
    // Cerrar la conexión.
    mysqli_close( $link );
  }

  //FUNCION PARA TRAER INFORMACION DEL MAIL
   static public function mdlObtenerMail($id){

    $set = Conexion::ConectarMysql();
    $sql = mysqli_query($set,"select * from mails where id=$id");

    while ($filas = mysqli_fetch_assoc($sql)) {
      $datos[]=$filas;
    }
    return $datos;
    // Cerrar la conexión.
    mysqli_close( $link );

  }

  //FUNCION PARA ELIMINAR UN GRUPO
  static public function mdlBorrarMail($id){

    $link = Conexion::ConectarMysql();
    $query = "DELETE FROM mails WHERE id = '$id'";
    $sql = mysqli_query($link,$query);

    if ($sql) {
      return true;
    }else {
      return false;
    }
    // Cerrar la conexión.
    mysqli_close( $link );
  }

}

?>
