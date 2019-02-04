

$("#btn-registro").click(function(){
    var user=$("#txt-nombreu");
    var email=$("#txt-correo");
    var sex=$("#slc-sexo");
    var age=$("#slc-edad");
    var password=$("#txt-contrasena");
	var nombreu=user.val();
	var correo=email.val(); 
	var sexo=sex.val();
	var edad=age.val();
	var contrasena=password.val();

    //alert(nombreu+' '+correo+' '+sexo+' '+edad+' '+contrasena);
	var dato=new Array();
	dato[0]=nombreu; 
	dato[1]=correo;
	dato[2]=sexo; 
	dato[3]=edad;
	dato[4]=contrasena;

	var dato2=new Array();
	dato2[0]=user;
	dato2[1]=email;
	dato2[2]=sex;
	dato2[3]=age;
	dato2[4]=password;
     
    for (var i = 0; i < dato.length; i++) {
    	if (dato[i]==null || dato[i].length == 0 || /^\s+$/.test(dato[i])) {
    			if (dato[i]==nombreu) 
           		user.addClass('has-error');
           	
           	if (dato[i]==correo) 
               email.addClass('has-error');

           	if (dato[i]==sexo) 
           		sex.addClass('has-error');

            if (dato[i]==edad ) 
           	    age.addClass('has-error');

           	if (dato[i]==contrasena)
           		password.addClass('has-error');

    	}else{

    		if (dato[i]==nombreu) {
    			if (dato[i].match(/^[A-Za-z]+[A-Za-z0-9]*$/)) {
                   if ((dato[i].length>=2 && dato[i].length<=12)) {
                      user.removeClass('has-error');
                   }else{
                       user.addClass('has-error');
                   }
    			}else{
                     user.addClass('has-error');
    			}
    		}
            
            if (dato[i]==correo) {
            	if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3})+$/.test(dato[i]))) {
            		email.addClass('has-error');
            	}else{
            		email.removeClass('has-error');
            	}
            }

            if (dato[i]==contrasena) {
            	if (!/^[A-Za-z\d]{6,15}$/.test(dato[i])) {
                     password.addClass('has-error');
           		  }else{
           			 password.removeClass('has-error');
           		  }
            }

            if (dato[i]==edad) {
            	age.removeClass('has-error');
            }

             if (dato[i]==sexo) {
            	sex.removeClass('has-error');
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
     var parametros="nombreu="+nombreu+"&"+"edad="+edad+"&"+"sexo="+sexo+"&"+"correo="+correo+"&"+"contrasena="+contrasena;
     $.ajax({
        url:"ajax/registro-ajax.php?accion=1",
        data:parametros,
        method:"POST",
        dataType:'json',
        success:function(respuesta){
          if (respuesta.codigo==0){
               $("#resultado").html('<h5 style="border-radius: 4px;color: black;width: 300px;font-size: 18px;" class="bg-success"><center>'+ respuesta.mensaje+'</center></h5>');
               window.location.href="index.php";
          }
          if (respuesta.codigo==1) {
              $("#resultado").html('<h5 style="border-radius: 4px;color: black;width: 300px;font-size: 18px;" class="bg-danger"><center>'+ respuesta.mensaje+'</center></h5>');
          }
          if (respuesta.codigo==2) {
             $("#resultado").html('<h5 style="border-radius: 4px;color: black;width: 300px;font-size: 18px;" class="bg-danger"><center>'+ respuesta.mensaje+'</center></h5>');
          }
          if (respuesta.codigo==3) {
            $("#resultado").html('<h5 style="border-radius: 4px;color: black;width: 300px;font-size: 18px;" class="bg-danger"><center>'+respuesta.mensaje+'</center></h5>');
          }
        }
     });
  }else{
  	//hay campos mal llenados o vacios
  	//alert('errores: '+error);
  }

});

