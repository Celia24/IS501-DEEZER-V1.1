function ifra(link){
    if (link==1)
    	$("#ifra").html('<iframe class="contenido" src="configuraciones.php" frameborder="0"  ></iframe>');
    if(link==2)
    	$("#ifra").html("<iframe class='contenido' src='notific.php'frameborder='0' ></iframe>");
     if(link==3)
    	$("#ifra").html("<iframe class='contenido' src='disposi.php' frameborder='0' ></iframe>");
}

function ifra2(link){
    if (link==1)
    	$("#ifra2").html('<iframe class="contenido2" src="informacion.php" frameborder="0"></iframe>');
    if(link==2)
    	$("#ifra2").html("<iframe class='contenido2' src='notificaciones.php' frameborder='0'></iframe>");
     if(link==3)
    	$("#ifra2").html("<iframe class='contenido2' src='dispositivos.php' frameborder='0'></iframe>");
}

