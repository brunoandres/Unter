<?php

require_once "controladores/controlador.plantilla.php";
require_once "controladores/controlador.grupos.php";
require_once "controladores/controlador.mails.php";
require_once "controladores/controlador.subgrupos.php";
require_once "modelos/modelo.grupos.php";
require_once "modelos/modelo.subgrupos.php";
require_once "modelos/modelo.mails.php";
require_once "modelos/conexion.php";

$plantilla = new PlantillaControlador();
$plantilla -> ctrPlantilla();

$con = new Conexion();
$con -> ConectarMysql();


if ($con) {
  echo "Conectado";
}

?>
