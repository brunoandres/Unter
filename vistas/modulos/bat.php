<?php
function send($cmd){

	popen($cmd,'r');

}

//FUNCION PARA EJECUTAR SCRIPT .BAT, LUEGO DE START ELEGIR DIRECTORIO DEL ARCHIVO
send('start C:\xampp\htdocs\unter\cmd.bat');
echo ("<script>location.href='grupos'</script>");



?>
