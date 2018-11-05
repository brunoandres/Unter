<?php

require_once 'conexion.php';

class ModeloSubGrupos
{
  //FUNCION PARA GUARDAR UNA NUEVO SUBGRUPO
  static public function mdlGuardarSubGrupo($grupo,$nombre,$descripcion,$estado,$individual,$asunto,$cuerpo,$adjunto,$dropbox){

    $link = Conexion::ConectarMysql();
    $query = "INSERT INTO `subgrupos`(`fk_id_grupo`, `nombre`, `descripcion`, `activo`, `individual`, `asunto`, `cuerpo`, `adjunto`, `dropbox`) VALUES
    ('$grupo','$nombre','$descripcion','$estado','$individual','$asunto','$cuerpo','$adjunto','$dropbox')";
    $sql = mysqli_query($link,$query);

    if ($sql) {
      return true;
    }else {
      return false;
    }
    // Cerrar la conexión.
    mysqli_close( $link );
  }

  //FUNCION PARA EDITAR UN GRUPO
  static public function mdlEditarSubGrupo($grupo,$nombre,$descripcion,$estado,$individual,$asunto,$cuerpo,$adjunto,$dropbox,$idSub){

    $link = Conexion::ConectarMysql();
    $query = "UPDATE `subgrupos` SET `fk_id_grupo`='$grupo',`nombre`='$nombre',`descripcion`='$descripcion',`activo`='$estado',`individual`='$individual',`asunto`='$asunto',`cuerpo`='$cuerpo',`adjunto`='$adjunto',`dropbox`='$dropbox' WHERE id = '$idSub'";
    $sql = mysqli_query($link,$query);

    if ($sql) {
      return true;
    }else {
      return false;
    }
    // Cerrar la conexión.
    mysqli_close( $link );
  }

  //FUNCION PARA TRAER SUBGRUPOS
  static public function mdlObtenerSubGrupos(){

    $link = Conexion::ConectarMysql();
    $sql = mysqli_query($link,"select a.*,b.nombre as grupo from subgrupos a,grupos b where b.id=a.fk_id_grupo");

    while ($filas = mysqli_fetch_assoc($sql)) {
      $subgrupos[]=$filas;
    }
    return $subgrupos;
    // Cerrar la conexión.
    mysqli_close( $link );
  }



  //FUNCION PARA ELIMINAR UN SUBGRUPO
  static public function mdlBorrarSubGrupo($id){

    $link = Conexion::ConectarMysql();
    $query = "DELETE FROM subgrupos WHERE id = '$id'";
    $sql = mysqli_query($link,$query);

    if ($sql) {
      return true;
    }else {
      return false;
    }
    // Cerrar la conexión.
    mysqli_close( $link );
  }

  static public function mdlObtenerDatosSubGrupos($id){

   $set = Conexion::ConectarMysql();
   $sql = mysqli_query($set,"select * from subgrupos where id=$id");

   while ($filas = mysqli_fetch_assoc($sql)) {
     $perfil[]=$filas;
   }
   return $perfil;
   // Cerrar la conexión.
   mysqli_close( $set );

 }

 //FUNCION PARA TRAER GRUPOS TOTAL
 static public function mdlObtenerSubGruposCant(){

   $link = Conexion::ConectarMysql();
   $sql = mysqli_query($link,"select * from subgrupos");
   $total = mysqli_num_rows($sql);

   return $total;
   // Cerrar la conexión.
   mysqli_close( $link );
 }

}

?>
