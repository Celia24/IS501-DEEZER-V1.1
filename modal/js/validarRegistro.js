function pop(){
	$('[data-toggle="popover"]').popover('hide');
}


$("#btn-registrar").click(function(){
	var a=$("#txt-nombre").val();
	var b=$("#txt-apellido").val();
	var c=$("#txt-usuario").val();
	var d=$("#txt-correo").val();
	var e=$("#txt-contrasena").val();
	var f=$("#txt-confirContrasena").val();
	var g=$("#data-fechaNacimiento").val();
	var h=$("#txt-telefono").val();
	var i=$("#slc-ubicacion").val();
	var j=$("#slc-preguntas").val();
	var k=$("#slc-2").val();
	var l=$("#txt-respuesta1").val();
	var m=$("#txt-respuesta2").val();
	var n=$("#slc-genero").val();
	 var dato=new Array();
	dato[0]=a;
	dato[1]=b;
	dato[2]=c;
	dato[3]=d;
	dato[4]=e;
	dato[5]=f;
  dato[6]=g;
  dato[7]=h;
  dato[8]=i;
  dato[9]=j;
  dato[10]=k;
  dato[11]=l;
  dato[12]=m;
  dato[13]=n;

  o=$("#nombre");
  p= $("#apellido");
  q=$("#usuario");
  r=$("#correo");
  s=$("#telefono");
  t=$("#fechaNacimiento");
  u=$("#respuesta1");
  v=$("#respuesta2");
  w=$("#contrasena");
  y=$("#confirContrasena");
  aa=$("#ubicacion");
  dd=$("#preguntass");
  bb=$("#22");
  cc=$("#genero");

  dato2=new Array();
  dato2[0]=o;
  dato2[1]=p;
  dato2[2]=q;
  dato2[3]=r;
  dato2[4]=s;
  dato2[5]=t;
  dato2[6]=u;
  dato2[7]=v;
  dato2[8]=w;
  dato2[9]=y;
  dato2[10]=aa;
  dato2[11]=dd;
  dato2[12]=bb;
  dato2[13]=cc;
  
    for (var z = 0; z < dato.length; z++) {
           if (dato[z]==null || dato[z].length == 0 || /^\s+$/.test(dato[z])) {
           	if (dato[z]==a) 
           		o.addClass('has-error');
           	
           	if (dato[z]==b) 
               p.addClass('has-error');

           	if (dato[z]==c) 
           		q.addClass('has-error');

            if (dato[z]==d ) 
           	    r.addClass('has-error');

           	if (dato[z]==h)
           		s.addClass('has-error');

           	if (dato[z]==g) 
           	    t.addClass('has-error');

           	if (dato[z]==l) 
           	    u.addClass('has-error');

           	if (dato[z]==m) 
           	    v.addClass('has-error');

           	if (dato[z]==e) 
           	    w.addClass('has-error');

           	if (dato[z]==f) 
           	    y.addClass('has-error');

           }else{

           	if (dato[z]==a){ 
           		if (dato[z].match(/^[a-zA-Z]+$/)) {
           			if ((dato[z].length>=2 && dato[z].length<=12)) {
           		      o.removeClass('has-error');
           		   }else{
           		   	    
           		   	  o.addClass('has-error');
           		   }
           	    }else{
           	    	o.addClass('has-error');
           	    }
           	}

           	if (dato[z]==b) {
                if (dato[z].match(/^[a-zA-Z]+$/)) {
           		  if ((dato[z].length>=2 && dato[z].length<=12)) {
           		      p.removeClass('has-error');
           		   }else{
           		   	    
           		   	  p.addClass('has-error');
           		   }
           	    }else{
           	    	p.addClass('has-error');
           	    }
           	}

           	if (dato[z]==c) {
           		if (/^[A-Za-z\d.]{4,15}$/.test(dato[z])) {
           		  q.removeClass('has-error');
           	    }else{
           	      q.addClasss
           	    }
           	}

            if (dato[z]==d){ 

            	if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3})+$/.test(dato[z]))) {
            		r.addClass('has-error');
            	}else{
            		r.removeClass('has-error');
            	}
           	 }

           	if (dato[z]==h){ 
           		if (!/^\+\d{2,3}\s\d{8,9}$/.test(dato[z])) {
           			s.addClass('has-error');
           		}else{
           			s.removeClass('has-error');
           		}
           }

           	if (dato[z]==g){
              if (/^(19|20)\d\d\-(0?[1-9]|1[012])-(0?[1-9]|[12][0-9]|3[01])$/.test(dato[z])) {
                   t.removeClass('has-error');
              }else{
                   t.addClass('has-error');
              }
            } 
           	   
           	

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

            if (dato[z]==i) {
            	if(dato[z]==0){
           	      aa.addClass('has-error');
           	    }else{
                   aa.removeClass('has-error');
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

           	if (dato[z]==n) {
               if (dato[z]==0) {
               	 cc.addClass('has-error');
               }else{
               	 cc.removeClass('has-error');
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
           $("#modal-condiciones").modal("show");
        }else{
          //alert(error);
        }




		//alert(a+" "+b+" "+c+" "+d+" "+e+" "+f+" "+g+" "+h+" "+i+" "+j+" "+k+" "+l+" "+m+" "+n);

});


$("#acepto").click(function(){
  var a=$("#txt-nombre").val();
  var b=$("#txt-apellido").val();
  var c=$("#txt-usuario").val();
  var d=$("#txt-correo").val();
  var e=$("#txt-contrasena").val();
  var f=$("#txt-confirContrasena").val();
  var g=$("#data-fechaNacimiento").val();
  var h=$("#txt-telefono").val();
  var i=$("#slc-ubicacion").val();
  var j=$("#slc-preguntas").val();
  var k=$("#slc-2").val();
  var l=$("#txt-respuesta1").val();
  var m=$("#txt-respuesta2").val();
  var n=$("#slc-genero").val();
    var parametros="nombre="+a+"&"+"apellido="+b+"&"+"usuario="+c+"&"+"correo="+d+"&"+"contrasena="+e+"&"+"fechaNacimiento="+g+"&"+"telefono="+h+"&"+"ubicacion="+i+"&"+"codigop1="+j+"&"+"codigop2="+k+"&"+"respuesta1="+l+"&"+"respuesta2="+m+"&"+"genero="+n;
     $.ajax({
        url:"ajax/procesar-registro.php?accion=1",
        data:parametros,
        method:"POST",
        dataType:'json',
        success:function(respuesta){
          if (respuesta.codigo==1){
              window.location.href="my-drive/bienvenida.php";
          }else{
            alert(respuesta.mensaje);
          }
        }
     });       
});