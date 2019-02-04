


$("#btn-save").click(function(){

    var user=$("#txt-nombreu");
    var day=$("#dia");
    var month=$("#mes"); 
    var phone=$("#txt-phone");
    var year=$("#year");
    var codep=$("#slc-pais");
    var name=$("#txt-nombre");
    var lname=$("#txt-apellido");
    var sex=$("#slc-sexo");
  
	var nombreu=user.val();
	var telefono=phone.val(); 
	var ano=year.val();
	var codigop=codep.val();
	var nombre=name.val(); 
	var apellido=lname.val();
	var dia=day.val();
	var mes=month.val();
	var sexo=sex.val();
	var dato=new Array();
	dato[0]=nombreu; 
	dato[1]=dia;
	dato[2]=mes;
	dato[3]=apellido;
	dato[4]=codigop;
	dato[5]=nombre; 
	dato[6]=ano;
	dato[7]=telefono;
  dato[8]=sexo;


	var dato2=new Array();
	dato2[0]=user;
	dato2[1]=day;
	dato2[2]=month;
	dato2[3]=lname;
	dato2[4]=codep;
	dato2[5]=name; 
	dato2[6]=year;
	dato2[7]=phone;
  dato2[8]=sex;

	for (var i = 0; i < dato.length; i++) {
    	if (dato[i]==null || dato[i].length == 0 || /^\s+$/.test(dato[i])) {
    		if (dato[i]==nombreu) 
           		user.addClass('has-error');
      
           	if (dato[i]==apellido) 
           		lname.addClass('has-error');
           	
           	if (dato[i]==codigop) 
               codep.addClass('has-error');

            if (dato[i]==telefono) 
           	    phone.addClass('has-error');

           	if (dato[i]==nombre)
           		name.addClass('has-error');
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

            if (dato[i]==dia) {
            	if (dato[i]=="N/A") {
                    day.addClass("has-error");
            	}else{
                    day.removeClass("has-error");
            	}
            }

            if (dato[i]==ano) {
            	if (dato[i]=="N/A") {
                    year.addClass("has-error");
            	}else{
                    year.removeClass("has-error");
            	}
            }

            if (dato[i]==mes) {
            	if (dato[i]=="N/A") {
                    month.addClass("has-error");
            	}else{
                    month.removeClass("has-error");
            	}
            }

            if (dato[i]==codigop) {
            	if (dato[i]=="N/A") {
                    codep.addClass("has-error");
            	}else{
                    codep.removeClass("has-error");
            	}
            }

            if (dato[i]==nombre) {
            	if (!/^[A-Za-z]*$/.test(dato[i])) {
                    name.addClass("has-error");
            	}else{
                    name.removeClass("has-error");
            	}
            }

            if (dato[i]==telefono) {
            	if (!/^[0-9]{3}(\s){1}[0-9]{8}$/.test(dato[i])) {
                    phone.addClass("has-error");
            	}else{
                    phone.removeClass("has-error");
            	}
            }

             if (dato[i]==apellido) {
            	if (!/^[A-Za-z]*$/.test(dato[i])) {
                    lname.addClass("has-error");
            	}else{
                    lname.removeClass("has-error");
            	}
            }

            if (dato[i]==sexo) {
               if (dato[i]=="N/A") {
                   sex.addClass("has-error");
               }else{
                   sex.removeClass("has-error");
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
     var parametros="nombreu="+nombreu+"&"+"telefono="+telefono+"&"+"sexo="+sexo+"&"+"ano="+ano+"&"+"codigop="+codigop+"&"+"nombre="+nombre+"&"+"dia="+dia+"&"+"mes="+mes+"&"+"apellido="+apellido;
     //alert(parametros);
     $.ajax({
        url:"ajax/informacion-ajax.php?accion=1",
        data:parametros,
        method:"POST",
        dataType:'json',
        success:function(respuesta){
          if (respuesta.codigo==0){
              $("#resultado").html('<div class="bg-success"><center>'+respuesta.mensaje+'</center></div>');
             
          }else{
              $("#resultado").html('<div class="bg-danger"><center>'+respuesta.mensaje+'</center></div>');
          }
        }
     });
  }else{
    //hay campos mal llenados o vacios
    //alert('errores: '+error);
  }
});




function modddd(){
  $('#modal-password',window.parent.parent.document).modal('show');
  
  $("body",window.parent.parent.document).append('<div class="modal-backdrop fade in" id="dropp"  ></div>');
  $('body').css("padding-right","0px");
  if ($('body').hasClass('modal-open')) {
  $('body').removeClass('modal-open');
  $('.fade').removeClass("modal-backdrop"); 
  
}
   
}


function moodd(){
  $('#imagen',window.parent.parent.document).modal('show');
  
  $("body",window.parent.parent.document).append('<div class="modal-backdrop fade in" id="dropp"  ></div>');
  $('body').css("padding-right","0px");
  if ($('body').hasClass('modal-open')) {
  $('body').removeClass('modal-open');
  $('.fade').removeClass("modal-backdrop"); 
  
}
   
}