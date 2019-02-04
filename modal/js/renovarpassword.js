 function pop(){
	$('[data-toggle="popover"]').popover('hide');
}


$("#btn-correo").click(function(){

var d=$("#txt-correo").val();

   var dato=new Array();
  dato[0]=d;
   
 

  r=$("#correo");
 

  dato2=new Array();
  dato2[0]=r;
 
  
    for (var z = 0; z < dato.length; z++) {
           if (dato[z]==null || dato[z].length == 0 || /^\s+$/.test(dato[z])) {
            
            if (dato[z]==d ) 
                r.addClass('has-error');

           }else{

            if (dato[z]==d){ 

              if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3})+$/.test(dato[z]))) {
                r.addClass('has-error');
              }else{
                r.removeClass('has-error');
              }
             }
           
        }
    }
        var error=0;
        for (var x = 0; x < dato.length; x++) {
            if (dato2[x].hasClass('has-error')) {
               error++;
            }
        }
        if(error==0){

           var d=$("#txt-correo").val();
           //alert("correo="+d+"&"+"codigop1="+j+"&"+"codigop2="+k+"&"+"respuesta1="+l+"&"+"respuesta2="+m);
    var parametros="correo="+d;
     $.ajax({
        url:"ajax/procesar-newcontrasena.php?accion=1",
        data:parametros,
        method:"POST",
        dataType:'json',
        success:function(respuesta){
          if (respuesta.codigo==1){
              $("#oculto").val(respuesta.codigo_usuario);
              document.getElementById('resultado1').style.display = 'none';
              document.getElementById('btn-correo').style.display = 'none';
              document.getElementById('preguntass').style.display = 'block';
              document.getElementById('respuesta1').style.display = 'block';
              document.getElementById('22').style.display = 'block';
              document.getElementById('respuesta2').style.display = 'block';
              document.getElementById('btn-passsword').style.display = 'block';
              $("#txt-correo").attr('disabled', 'disabled');
              $("#slc-preguntas").html(respuesta.value0);
               $("#slc-preguntas").append(respuesta.value1);
               $("#slc-2").html(respuesta.value0);
               $("#slc-2").append(respuesta.value2);

              //$("#modal-password").modal("show");
          }else{
            $("#resultado1").html('<div class="bg-danger"><center>'+respuesta.mensaje+"</center></div>");
          }
        }

     });
     
     
        }else{
          //alert(error);
        }




  });

$("#btn-passwordConfir").click(function(){
  var e=$("#txt-contrasena").val();
  var f=$("#txt-confirContrasena").val();
  var dato=new Array();
	dato[0]=e;
	dato[1]=f;

    w=$("#contrasena");
    y=$("#confirContrasena");

  var dato2=new Array();
  dato2[0]=w;
  dato2[1]=y;

  for (var z = 0; z < dato.length; z++) {
           if (dato[z]==null || dato[z].length == 0 || /^\s+$/.test(dato[z])) {
           	if (dato[z]==e) 
           	    w.addClass('has-error');
                
           	if (dato[z]==f) 
           	    y.addClass('has-error');

           }else{

           	if (dato[z]==e) {
           	  if(e==f){
           		if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,12}$/.test(dato[z])) {
                     w.addClass('has-error');
                     
           		}else{
           			 w.removeClass('has-error');
           		}
           	  }else{
           	  	w.addClass('has-error');
           	  }
           	} 

           	if (dato[z]==f) {
           		if(f==e){
                  if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,12}$/.test(dato[z])) {
           	         y.addClass('has-error');
                  }else{
                     y.removeClass('has-error');
                     
                  }
           	    }else{
                     y.addClass('has-error');
                     
           	    }
            }
           
        }
    }

    var error=0;
        for (var x = 0; x < dato2.length; x++) {
            if (dato2[x].hasClass('has-error')) {
               error++;
            }
        }
        if(error==0){
         var codigo=$("#oculto").val();
         var e=$("#txt-contrasena").val();
           //alert("contrasena="+de"&"+"confircontra="+f);
    var parametros="codigo="+codigo+"&"+"contrasena="+e;
     $.ajax({
        url:"ajax/procesar-newcontrasena.php?accion=3",
        data:parametros,
        method:"POST",
        dataType:'json',
        success:function(respuesta){
          if (respuesta.codigo==1){
          	  $("#resultado2").html('<div class="bg-success"><center>'+respuesta.mensaje+"</center></div>");
               window.setTimeout('window.location.href="entrarUsuario.php"', 1000);
          }else{
            
          }
        }

     });
     
           
        }else{
          //alert(error);
        }

});

 $("#btn-password").click(function(){


	var j=$("#slc-preguntas").val();
	var k=$("#slc-2").val();
	var l=$("#txt-respuesta1").val();
	var m=$("#txt-respuesta2").val();
	 var dato=new Array();
    dato[0]=j;
    dato[1]=k;
    dato[2]=l;
    dato[3]=m;
 

  u=$("#respuesta1");
  v=$("#respuesta2");
  dd=$("#preguntass");
  bb=$("#22");

  dato2=new Array();
  dato2[0]=u;
  dato2[1]=v;
  dato2[2]=dd;
  dato2[3]=bb;
  
    for (var z = 0; z < dato.length; z++) {
           if (dato[z]==null || dato[z].length == 0 || /^\s+$/.test(dato[z])) {
        
           	if (dato[z]==l) 
           	    u.addClass('has-error');

           	if (dato[z]==m) 
           	    v.addClass('has-error');

           }else{

           	if (dato[z]==l) {
           		if (/^[a-zA-Z\s]{1,12}$/.test(dato[z])) {
           			u.removeClass('has-error');
           		}else{
                    u.addClass('has-error');
           		}  
           	}

           	if (dato[z]==m){

           		if (/^[a-zA-Z\s]{1,12}$/.test(dato[z])) {
           			v.removeClass('has-error');
           		}else{
                    v.addClass('has-error');
           		}  
           	} 

           	if (dato[z]==j) {
           		if(dato[z]==0){
           	      dd.addClass('has-error');
           	    }else{
                  dd.removeClass('has-error');
           	    }
           	}

           	if (dato[z]==k) {
           		if(dato[z]==0){
           	      bb.addClass('has-error');
           	    }else{
                  bb.removeClass('has-error');
           	    }
           	}
           
        }
    }
        var error=0;
        for (var x = 0; x < dato.length; x++) {
            if (dato2[x].hasClass('has-error')) {
               error++;
            }
        }
        if(error==0){
           var cod=$("#oculto").val();
           var j=$("#slc-preguntas").val();
           var k=$("#slc-2").val();
           var l=$("#txt-respuesta1").val();
           var m=$("#txt-respuesta2").val();
          // alert("codigo="+cod+"&"+"codigop1="+j+"&"+"codigop2="+k+"&"+"respuesta1="+l+"&"+"respuesta2="+m);
    var parametros="codigo="+cod+"&"+"codigop1="+j+"&"+"codigop2="+k+"&"+"respuesta1="+l+"&"+"respuesta2="+m;
     $.ajax({
        url:"ajax/procesar-newcontrasena.php?accion=2",
        data:parametros,
        method:"POST",
        dataType:'json',
        success:function(respuesta){
          if (respuesta.codigo==1){
          	  $("#oculto").val(respuesta.codigo_usuario);
          	  $("#resultado2").html('<div class="bg-success"><center>'+respuesta.mensaje+"</center></div>");
              $("#modal-password").modal("show");
          }else{
            $("#resultado2").html('<div class="bg-danger"><center>'+respuesta.mensaje+"</center></div>");
          }
        }

     });
     
        }else{
          //alert(error);
        }

});