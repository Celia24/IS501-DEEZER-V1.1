
function iconos(id){
	var miUnidad = $(id);
	miUnidad.toggleClass("glyphicon-triangle-right");
	miUnidad.toggleClass("glyphicon-triangle-bottom");
}

function overflow(id){
    iconos(id);
    $("#menu_lateral").toggleClass("overflowSidebar");
}

function contenidos(archivo){
    $("#explorador").attr("src", archivo);
}

function ifra(link){
    if (link==1)
    	$("#ifra").html("<iframe id='contenido2' name='principal' src='../configuraciones/general.php' ></iframe>");
    if(link==2)
    	$("#ifra").html("<iframe id='contenido2' name='principal' src='../configuraciones/notificaciones.php' ></iframe>");
     if(link==3)
    	$("#ifra").html("<iframe id='contenido2' name='principal' src='../configuraciones/admapps.php' ></iframe>");
}
 
function chat(){
    $("#chat").toggleClass("mostrarChat");}

function amigos(){
    $("#amigos").toggleClass("mostrarAmigos");
}