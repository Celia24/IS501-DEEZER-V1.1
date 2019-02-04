

function ifra(link){
    if (link==1)
    	$("#ifra").html('<iframe class="contenido" src="configuraciones.php" frameborder="0"  ></iframe>');
    if(link==2)
    	$("#ifra").html("<iframe class='contenido' src='recomendaciones.php' frameborder='0' ></iframe>");
     if(link==3)
    	$("#ifra").html("<iframe class='contenido' src='principal.php' frameborder='0' ></iframe>");
}
  
function ifra2(link){
    if (link==1)
    	$("#ifra2").html('<iframe class="contenido2" src="informacion.php" frameborder="0"></iframe>');
    if(link==2)
    	$("#ifra2").html("<iframe class='contenido2' src='notificaciones.php' frameborder='0'></iframe>");
     if(link==3)
    	$("#ifra2").html("<iframe class='contenido2' src='dispositivosconectados.php' frameborder='0'></iframe>");
} 

 
function ifra3(link){
    if (link==1)
        $("#ifra3").html('<iframe class="contenido3" src="features.php" frameborder="0"  ></iframe>');
    if(link==2)
        $("#ifra3").html("<iframe class='contenido3' src='dispositivos.php'frameborder='0' ></iframe>");
     if(link==3)
        $("#ifra3").html("<iframe class='contenido3' src='ofertas.php' frameborder='0' ></iframe>");
    if(link==4)
        $("#ifra3").html("<iframe class='contenido3' src='company.php' frameborder='0' ></iframe>");
}

 
function cambiar(){
$("#start").removeClass("bordee");
 $("#first").removeClass("margen");
 $("#start2").removeClass("bordee");
 $("#first2").removeClass("margen");
 $("#star4").removeClass("bordee");
 $("#first3").removeClass("margen");
 $("#mod").removeClass("bordee");
 $("#first4").removeClass("margen");
 $("#first").css("color","#C2C2CA");
   $("#first2").css("color","#C2C2CA");
   $("#first3").css("color","#C2C2CA");
   $("#first4").css("color","#C2C2CA");
}


function reload(hijo){
  if ($("#"+hijo).css("visibility")=="visible") {
    if (hijo=="hijo") {
        $("#hijo").css({"visibility":"hidden","opacity":"0"});

        
    }
     if (hijo=="hijo2") {
        $("#hijo2").css({"visibility":"hidden","opacity":"0"});
        
    } 
     if (hijo=="hijo3") {
        $("#hijo3").css({"visibility":"hidden","opacity":"0"});
    }
     if (hijo=="hijo4") {
        $("#hijo4").css({"visibility":"hidden","opacity":"0"});
    }
     if (hijo=="hijo5") {
        $("#hijo5").css({"visibility":"hidden","opacity":"0"});
    }
    if (hijo=="hijo6") {
        $("#hijo6").css({"visibility":"hidden","opacity":"0"});
    }
  }         $("#li6 .si").css("color","#C2C2CA");
            $("#li7 .si").css("color","#C2C2CA");
            $("#li8 .si").css("color","#C2C2CA");
            $("#li9 .si").css("color","#C2C2CA");
            $("#hijo").css({"visibility":"hidden","opacity":"0"});
            $("#hijo2").css({"visibility":"hidden","opacity":"0"});
            $("#hijo3").css({"visibility":"hidden","opacity":"0"});
            $("#hijo4").css({"visibility":"hidden","opacity":"0"});
            $("#hijo5").css({"visibility":"hidden","opacity":"0"});
            $("#hijo6").css({"visibility":"hidden","opacity":"0"});
            $("#drop").css({"visibility":"hidden","opacity":"0"});

        }

    $("#drop").click(function(){
         $("#li6").css("background-color","#23232c");
         $("#li6 .si").css("color","#C2C2CA");
         $("#li7").css("background-color","#23232c");
         $("#li7 .si").css("color","#C2C2CA");
         $("#li8").css("background-color","#23232c");
         $("#li8 .si").css("color","#C2C2CA");
         $("#li9").css("background-color","#23232c");
         $("#li9 .si").css("color","#C2C2CA");
         $("#hijo").css({"visibility":"hidden","opacity":"0"});
         $("#hijo2").css({"visibility":"hidden","opacity":"0"});
         $("#hijo3").css({"visibility":"hidden","opacity":"0"});
         $("#hijo4").css({"visibility":"hidden","opacity":"0"});
         $("#hijo5").css({"visibility":"hidden","opacity":"0"});
         $("#hijo6").css({"visibility":"hidden","opacity":"0"});
         $("#drop").css({"visibility":"hidden","opacity":"0"});
       });



function cambiarborde(id,id2,id3){

   $("#"+id).addClass("borderr");
   $("#"+id2).removeClass("borderr");
   $("#"+id3).removeClass("borderr");
}

function borde(id,id2,id3,id4){

   $("#"+id).addClass("borde");
   $("#"+id2).removeClass("borde");
   $("#"+id3).removeClass("borde");
   $("#"+id4).removeClass("borde");
}

function li(li){
    if (li=="li6") {
         $("#"+li).css("background-color","#191922");
         $("#li7").css("background-color","#23232c");
         $("#li8").css("background-color","#23232c");
         $("#li9").css("background-color","#23232c");
         $("#" + li + " .si").css("color","#fff");
         $("#li7 .si").css("color","#C2C2CA");
         $("#li8 .si").css("color","#C2C2CA");
         $("#li9 .si").css("color","#C2C2CA");
    }
    if (li=="li7") {
         $("#"+li).css("background-color","#191922");
         $("#li6").css("background-color","#23232c");
         $("#li8").css("background-color","#23232c");
         $("#li9").css("background-color","#23232c");
         $("#" + li + " .si").css("color","#fff");
         $("#li8 .si").css("color","#C2C2CA");
         $("#li9 .si").css("color","#C2C2CA");
         $("#li6 .si").css("color","#C2C2CA");
    }
    if (li=="li8") {
         $("#"+li).css("background-color","#191922");
         $("#li7").css("background-color","#23232c");
         $("#li6").css("background-color","#23232c");
         $("#li9").css("background-color","#23232c");
         $("#" + li + " .si").css("color","#fff");
         $("#li6 .si").css("color","#C2C2CA");
         $("#li7 .si").css("color","#C2C2CA");
         $("#li9 .si").css("color","#C2C2CA");
    }
    if (li=="li9") {
         $("#"+li).css("background-color","#191922");
         $("#li7").css("background-color","#23232c");
         $("#li8").css("background-color","#23232c");
         $("#li6").css("background-color","#23232c");
         $("#" + li + " .si").css("color","#fff");
         $("#li6 .si").css("color","#C2C2CA");
         $("#li7 .si").css("color","#C2C2CA");
         $("#li8 .si").css("color","#C2C2CA");
    }
   

}



function arreglo(borde,margen,borde2,margen2,borde3,margen3,borde4,margen4){
 $("#"+borde).addClass("bordee");
 $("#"+margen).addClass("margen");
 $("#"+borde2).removeClass("bordee");
 $("#"+margen2).removeClass("margen");
 $("#"+borde3).removeClass("bordee");
 $("#"+margen3).removeClass("margen");
 $("#"+borde4).removeClass("bordee");
 $("#"+margen4).removeClass("margen");
 $("#li6").css("background-color","#23232c");
 $("#li7").css("background-color","#23232c"); 
 $("#li8").css("background-color","#23232c");
 $("#li9").css("background-color","#23232c");
 if (margen== "first" ) {
   $("#"+margen).css("color","white");
   $("#first2").css("color","#C2C2CA");
   $("#first3").css("color","#C2C2CA");
   $("#first4").css("color","#C2C2CA");
 }else{
  if (margen=="first2") {
    $("#"+margen).css("color","white");
    $("#first").css("color","#C2C2CA");
    $("#first3").css("color","#C2C2CA");
    $("#first4").css("color","#C2C2CA");  
  }else{
   if (margen=="first4") {
    $("#"+margen).css("color","white");
    $("#first").css("color","#C2C2CA");
    $("#first2").css("color","#C2C2CA");
    $("#first3").css("color","#C2C2CA");
  }else{
    if (margen=="first3") {
      $("#"+margen).css("color","white");
      $("#first").css("color","#C2C2CA");
      $("#first2").css("color","#C2C2CA");
      $("#first4").css("color","#C2C2CA");   
    }
  }
}
}

}


function ver(div,div2,div3,div4,div5,div6){
    if ($("#"+div).css("visibility")=="hidden"){
       $("#"+div2).css("visibility","hidden");
       $("#"+div3).css("visibility","hidden");
       $("#"+div4).css("visibility","hidden");
       $("#"+div5).css("visibility","hidden");
       $("#"+div6).css("visibility","hidden");
    }else{
       $("#"+div2).css("visibility","hidden");
       $("#"+div3).css("visibility","hidden");
       $("#"+div4).css("visibility","hidden");
       $("#"+div5).css("visibility","hidden");
       $("#"+div6).css("visibility","hidden");
    }

      if (div=="hijo") {
        if (($("#"+div2).css("visibility") || $("#"+div3).css("visibility") || $("#"+div4).css("visibility") || $("#"+div5).css("visibility"))=="visible" || "hidden") {
         $("#li7 .si").css("color","#C2C2CA");
         $("#li7").css("background-color","#23232c");
         $("#li6 .si").css("color","#C2C2CA");
         $("#li6").css("background-color","#23232c");
         $("#li8 .si").css("color","#C2C2CA");
         $("#li8").css("background-color","#23232c");
         $("#li9 .si").css("color","#C2C2CA");
         $("#li9").css("background-color","#23232c");
        }
        
      }

    if ($("#"+div).css("visibility")=="hidden") {
      if (div=="hijo2") {
         $("#li6 .si").css("color","#fff");
      }
      if (div=="hijo3") {
         $("#li7 .si").css("color","#fff");
      }
      if (div=="hijo4") {
         $("#li8 .si").css("color","#fff");
      }
      if (div=="hijo5") {
         $("#li9 .si").css("color","#fff");
      }
         
        $("#"+div).css({"visibility":"visible","opacity":"1"});
        $("#drop").css({"visibility":"visible","opacity":"0.5"});
    }else{
      if (div=="hijo2") {
         $("#li6 .si").css("color","#C2C2CA");
         $("#li6").css("background-color","#23232c");
      }
      if (div=="hijo3") {
         $("#li7 .si").css("color","#C2C2CA");
         $("#li7").css("background-color","#23232c");
      }
      if (div=="hijo4") {
         $("#li8 .si").css("color","#C2C2CA");
         $("#li8").css("background-color","#23232c");
      }
      if (div=="hijo5") {
         $("#li9 .si").css("color","#C2C2CA");
         $("#li9").css("background-color","#23232c");
      }
        
       
        $("#"+div).css({"visibility":"hidden","opacity":"0"});
        $("#drop").css({"visibility":"hidden","opacity":"0"});
    } 
}

function abrir(){
    if ($("#ventana").val()==3) {
       $("#fun").addClass("borde");
        $("#ifra3").html('<iframe class="contenido3" src="features.php" frameborder="0"  ></iframe>');
    }
    if ($("#ventana").val()==2) {
       $("#empr").addClass("borde");
       $("#ifra3").html("<iframe class='contenido3' src='company.php' frameborder='0' ></iframe>");
    }
    if ($("#ventana").val()==1) {
       $("#ofer").addClass("borde");
         $("#ifra3").html("<iframe class='contenido3' src='ofertas.php' frameborder='0' ></iframe>");
    }
}









$("#cola").click(function(){
    $("#li6").css("background-color","#23232c");
         $("#li6 .si").css("color","#C2C2CA");
         $("#li7").css("background-color","#23232c");
         $("#li7 .si").css("color","#C2C2CA");
         $("#li8").css("background-color","#23232c");
         $("#li8 .si").css("color","#C2C2CA");
         $("#li9").css("background-color","#23232c");
         $("#li9 .si").css("color","#C2C2CA");
         $("#hijo").css({"visibility":"hidden","opacity":"0"});
            $("#hijo2").css({"visibility":"hidden","opacity":"0"});
            $("#hijo3").css({"visibility":"hidden","opacity":"0"});
            $("#hijo4").css({"visibility":"hidden","opacity":"0"});
            $("#hijo5").css({"visibility":"hidden","opacity":"0"});
            $("#hijo6").css({"visibility":"hidden","opacity":"0"});
    if ($("#hijo6").css("visibility")=="visible") {
         $("#hijo6").css({"visibility":"hidden","opacity":"0"});
         $("#drop").css({"visibility":"hidden","opacity":"0"});
    }else{
         $("#hijo6").css({"visibility":"visible","opacity":"1"});
         $("#drop").css({"visibility":"visible","opacity":"0.5"});
    }
    
});




$(".jp-mute").hover(function () {
    $("#barravol").removeClass("ocultoo");
    $("#volplus").removeClass("ocultoo");
    $("#ran").addClass("ocultoo");
    $("#repetir").addClass("ocultoo");
    $("#cola").addClass("ocultoo");
},function(){
 setTimeout(function(){
 $("#barravol").addClass("ocultoo");
 $("#volplus").addClass("ocultoo");
 $("#ran").removeClass("ocultoo");
 $("#repetir").removeClass("ocultoo");
 $("#cola").removeClass("ocultoo");
 }
 , 5000);
 
});

$(document).ready(function(){
    abrir();
  
});
  
$("#start4").click(function(){
$("#ifra").html('<iframe class="contenido" src="perfil.php?accion=1" frameborder="0" id="pru" ></iframe>');

});


$("#li3").click(function(){
$("#ifra").html('<iframe class="contenido" src="perfil.php?accion=2" frameborder="0" id="pru" ></iframe>');

});

function playlists(){
  $("#li6 .si").css("color","#C2C2CA");
  $("#li6").css("background-color","#23232c");
  $("#hijo2").css({"visibility":"hidden","opacity":"0"});
  $("#drop").css({"visibility":"hidden","opacity":"0"});
  $("#ifra").html('<iframe class="contenido" src="perfil.php?accion=3" frameborder="0" id="pru" ></iframe>');
}

function albums(){
  $("#li7 .si").css("color","#C2C2CA");
  $("#li7").css("background-color","#23232c");
  $("#hijo3").css({"visibility":"hidden","opacity":"0"});
  $("#drop").css({"visibility":"hidden","opacity":"0"});
  $("#ifra").html('<iframe class="contenido" src="perfil.php?accion=4" frameborder="0" id="pru" ></iframe>');
}

$("#modal-on").click(function(){
  $("#newplaylist").modal("show");
});

function seleccion(id,id2,id3){
  if (id=="act") {
   $(".subt-descr").text("Actividades"); 
 }else{
  if (id=="not") {
    $(".subt-descr").text("Notificaciones");
  }else{
    if (id="sig") {
      $(".subt-descr").text("Seguidores");
    }
  }
}

  
  

  $("#"+id2).css("background-color","#F8FAFA");
  $("#"+id3).css("background-color","#F8FAFA");
  $("#"+id).css("background-color","white");
  $("#"+id2).children("span").css("color","#92929d");
  $("#"+id3).children("span").css("color","#92929d");
  $("#"+id).children("span").css("color","blue");
}

$("#changepass").click(function(){
var password=$("#txt-password");
var newpassword=$("#txt-newpassword");
var cpassword=$("#txt-confpassword");
var contrasena=password.val();
var nuevacontrasena=newpassword.val();
var confcontrasena=cpassword.val();
var dato=new Array();
dato[0]=contrasena;
dato[1]=nuevacontrasena;
dato[2]=confcontrasena;
var dato2=new Array();
dato2[0]=password;
dato2[1]=newpassword;
dato2[2]=cpassword;

for (var i = 0; i < dato.length; i++) {
      if (dato[i]==null || dato[i].length == 0 || /^\s+$/.test(dato[i])) {
           if (dato[i] == contrasena || nuevacontrasena || confcontrasena)
                      if (dato[i]==contrasena) 
                      password.addClass('has-error');
                     
                      if (dato[i]==nuevacontrasena) 
                        newpassword.addClass('has-error');
                      
                      if (dato[i]==confcontrasena) {
                        cpassword.addClass('has-error');
                      }
                     
        }else{
           if (dato[i] == contrasena || nuevacontrasena || confcontrasena) {
              if (!/^[A-Za-z\d]{6,15}$/.test(dato[i])) {
                     if (dato[i]==contrasena) 
                      password.addClass('has-error');
                     
                      if (dato[i]==nuevacontrasena) 
                        newpassword.addClass('has-error');
                 
                      if (dato[i]==confcontrasena) 
                        cpassword.addClass('has-error');
                  }else{
                    if (dato[i]==contrasena) 
                      password.removeClass('has-error');
                     
                      if (dato[i]==nuevacontrasena) 
                        newpassword.removeClass('has-error');
                 
                      if (dato[i]==confcontrasena) 
                        cpassword.removeClass('has-error');
                  }
            if (nuevacontrasena!=confcontrasena) {
               newpassword.addClass("has-error");
               cpassword.addClass("has-error");
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
     var parametros="contrasena="+contrasena+"&"+"nuevacontrasena="+nuevacontrasena+"&"+"confcontrasena="+confcontrasena;
     //alert(parametros);
     $.ajax({
        url:"ajax/informacion-ajax.php?accion=2",
        data:parametros,
        method:"POST",
        dataType:'json',
        success:function(respuesta){
          if (respuesta.codigo==1){
              $("#result").html('<div class="bg-success"><center>'+respuesta.mensaje+'</center></div>');
          }else{
             $("#result").html('<div class="bg-danger"><center>'+respuesta.mensaje+'</center></div>');
          }
        }
     });
  }else{
    //hay campos mal llenados o vacios
    //alert('errores: '+error);
  }

});




