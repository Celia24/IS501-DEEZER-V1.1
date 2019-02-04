$("#login").click(function(){
var p="correo="+$("#inputCorreo").val()+"&"+"contrasena="+$("#inputPassword").val();
$.ajax({
	url:"ajax/procesar-login.php?accion=1",
	data:p,
	method:'POST',
	dataType:'json',
    success:function(respuesta){
     if (respuesta.codigo==1) {
       $("#resultado").html('<div class="bg-success"> '+respuesta.mensaje+"</div>");
       window.location.href="my-drive/index.php";
      }
     if (respuesta.codigo==0) 
        $("#resultado").html('<div class="bg-danger"> '+respuesta.mensaje+"</div>");
    }
});

});

