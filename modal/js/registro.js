$(document).ready(function(){
	

$("#slc-preguntas").click(function(){
	var x = document.getElementById("slc-preguntas");
	var y= document.getElementById("slc-2");
      if (x.selectedIndex!=0) {
		if(x.selectedIndex!=y.selectedIndex){
		      $("select[id='slc-2'] option[value="+x.selectedIndex+"]").hide();
		   for (var i = 0; i <= x.length; i++) {
       		if ( i!=x.selectedIndex) {
               if ($("select[id='slc-2'] option[value="+i+"]").is(':hidden')) {
               	
                  $("select[id='slc-2'] option[value="+i+"]").show();
            	}
       		}
       		
       	}
       }
       
}else{
	if (y.selectedIndex==0) {
		for (var i = 0; i <= x.length; i++) {
			if ($("select[id='slc-2'] option[value="+i+"]").is(':hidden')) {
               	$("select[id='slc-2'] option[value="+i+"]").show();
            	}
            if ($("select[id='slc-preguntas'] option[value="+i+"]").is(':hidden')) {
               	$("select[id='slc-preguntas'] option[value="+i+"]").show();
            	}
        }
	}else{
		for (var i = 0; i <= x.length; i++) {
               if ($("select[id='slc-2'] option[value="+i+"]").is(':hidden')) {
                  $("select[id='slc-2'] option[value="+i+"]").show();
            	}
       		
		}
	}
}
});

$("#slc-2").click(function(){
	var h= document.getElementById("slc-2");
	var z = document.getElementById("slc-preguntas");
        if (h.selectedIndex!=0) {
		if(h.selectedIndex!=z.selectedIndex){
		      $("select[id='slc-preguntas'] option[value="+h.selectedIndex+"]").hide();
		   for (var i = 0; i <= h.length; i++) {
       		if ( i!=h.selectedIndex) {
               if ($("select[id='slc-preguntas'] option[value="+i+"]").is(':hidden')) {
               	
                  $("select[id='slc-preguntas'] option[value="+i+"]").show();
            	}
       		}
       		
       	}
       }
	}else{
	if (z.selectedIndex==0) {
		for (var i = 0; i <= h.length; i++) {
			if ($("select[id='slc-preguntas'] option[value="+i+"]").is(':hidden')) {
               	$("select[id='slc-preguntas'] option[value="+i+"]").show();
            	}
            if ($("select[id='slc-2'] option[value="+i+"]").is(':hidden')) {
               	$("select[id='slc-2'] option[value="+i+"]").show();
            	}
        }
	}else{
		for (var i = 0; i <= h.length; i++) {
               if ($("select[id='slc-preguntas'] option[value="+i+"]").is(':hidden')) {
               	
                  $("select[id='slc-preguntas'] option[value="+i+"]").show();
            	}
		}
	}
}
});


});


    
/*
	var parametros=
				"txt-nombre="+$("#txt-nombre").val()+"&"+
				"txt-apellido="+$("#txt-apellido").val()+"&"+
				"txt-usuario="+$("#txt-usuario").val()+"&"+
				"txt-correo="+$("#txt-correo").val()+"&"+
				"txt-contraseña="+$("#txt-contraseña").val()+"&"+
				"txt-confirContraseña="+$("#txt-confirContraseña").val()+"&"+
				"data-fechaNacimento="+$("#data-fechaNacimento").val()+"&"+
				"txt-telefono="+$("#txt-telefono").val()+"&"+
				"cmb-ubicacion="+$("#cmb-ubicacion").val()+"&"+
				"rbt-genero="+$('input[id=rbt-genero]:checked').attr('value');

	$.ajax({
		url:"ajax/procesar-registro.php",
		data:parametros,
		method:"POST",
		dataType:"json",
		success:function(respuesta){
			if (respuesta.codigo_resultado==1){
			    $("#resultado").html('<div class="bg-success"> '+'<center>'+respuesta.mensaje+'</center>'+"</div>")+
			    $(document).ready(function()
				   {
				      $("#modal-condiciones").modal("show");
				   });
							     
			  }
			if (respuesta.codigo_resultado==0){
			    $("#resultado").html('<div class="bg-danger"> '+'<center>'+respuesta.mensaje+'</center>'+"</div>");
			  }
			  if (respuesta.codigo_resultado==2){
			    $("#resultado").html('<div class="bg-danger"> '+'<center>'+respuesta.mensaje+'</center>'+"</div>");
			  }
			}
	}); 
	*/


