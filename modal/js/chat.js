

$(document).ready(function(){
	setInterval("cargarMensajes()",400);
});

function cargarMensajes(){
	$.ajax({
		url: "../ajax/mensajes.php",
		success:function(response){
			$("#conversacion").html(response);
		}
	});
}

function verificar(e){
	if (e.which == 13) {
		enviarMensaje();
	}
}

function enviarMensaje(){
	var texto ="texto=" +$("#mensajeEnviar").val();
	
	$.ajax({
		url : "../ajax/enviar.php",
		data :texto,
		
		method : "post",
		success:function(response){
			cargarMensajes();
			$("#mensajeEnviar").val("");
		}
	});
}
