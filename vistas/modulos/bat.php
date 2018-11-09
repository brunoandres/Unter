<?php
function send($cmd){
	popen($cmd,'r');
}
//RECIBO ID DEL GRUPO A SETEAR
$id = $_GET['id'];
//RECIBO EL PATH DESDE LA BASE LA URL.
$path = $_GET['path'];
//DIRECTORIO DEL SISTEMA.
$directorio = 'unter';
//FUNCION PARA EJECUTAR SCRIPT .BAT, LUEGO DE START ELEGIR DIRECTORIO DEL ARCHIVO.
send('wscript.exe C:/xampp/htdocs/'.$directorio.'./bat_envios/'.$path.'.vbs');
$grupos = new ControladorGrupos();
$grupos -> ctrSetearEnvio($id);
echo ("<script>location.href='grupos'</script>");
?>
