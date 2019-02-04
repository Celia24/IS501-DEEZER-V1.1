
$('#btn-conectarse').click(function(){
	var email=$("#nombreu");
	var password=$("#contrasena");
	var correo=email.val();
	var contrasena=password.val();
	var dato=new Array();
	dato[0]=correo; 
	dato[1]=contrasena;

	var dato2=new Array();
	dato2[0]=email;
	dato2[1]=password; 

	for (var i = 0; i < dato.length; i++) {
		if (dato[i]==null || dato[i].length == 0 || /^\s+$/.test(dato[i])) {
    		if (dato[i]==correo) 
           	email.addClass('has-error');
           	 

           	if (dato[i]==contrasena)
           		password.addClass('has-error');

    	}else{
    		if (dato[i]==correo) {
    			if (dato[i].match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3})+$/)) {
                      email.removeClass('has-error');
    			}else{
                     email.addClass('has-error');
    			}
    		}

    		if (dato[i]==contrasena) {
            	if (!/^[A-Za-z\d]{6,15}$/.test(dato[i])) {
                     password.addClass('has-error');
           		  }else{
           			 password.removeClass('has-error');
           		  }
            }
    	}
	}

	 var error=0;
 for (var i = 0; i < dato2.length; i++) {
 	if (dato2[i].hasClass('has-error')) {
               error++;
        }
 }

  if (error==0) {
     var parametros="correo="+correo+"&"+"contrasena="+contrasena;
     $.ajax({
        url:"ajax/registro-ajax.php?accion=2",
        data:parametros,
        method:"POST",
        dataType:'json',
        success:function(respuesta){
          if (respuesta.codigo==1){
            $("#resultado").html('<h5 style="border-radius: 4px;color: black;width: 300px;font-size: 18px;margin-top: 3px;margin-bottom: 3px;" class="bg-success"><center>'+respuesta.mensaje+'</center></h5>');
              window.location.href="index.php";
          }else{
            $("#resultado").html('<h5 style="border-radius: 4px;color: black;width: 300px;font-size: 18px;margin-top: 3px;margin-bottom: 3px;" class="bg-danger"><center>'+respuesta.mensaje+'</center></h5>');
          }
        }
     });
  }else{
  	//hay campos mal llenados o vacios
  	//alert('errores: '+error);
  }
});