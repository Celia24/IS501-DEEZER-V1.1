$(document).ready(function(){
$("#preciobtn1").click(function(){
  $("#oculto").val(1);
  $("#planees").modal('show');
  
});

$("#preciobtn2").click(function(){
$("#oculto").val(2);
  $("#planees").modal('show');
});

$("#preciobtn3").click(function(){
$("#oculto").val(3);
  $("#planees").modal('show');
});

$("#preciobtn4").click(function(){
$("#oculto").val(4);
  $("#planees").modal('show');
});

$("#preciobtn5").click(function(){
$("#oculto").val(5);
  $("#planees").modal('show');
});

$("#preciobtn6").click(function(){
$("#oculto").val(6);
  $("#planees").modal('show');
});

$("#preciobtn7").click(function(){
  $("#oculto").val(7);
  $("#planees").modal('show');
});

$("#btn-aceptar").click(function(){
  var p="codigo="+$("#oculto").val();

  $.ajax({

        url:"../ajax/planes.php?accion=1",
    data:p,
    method:"POST",
        dataType:'json',
        success:function(respuesta){
          if (respuesta.codigo==1) {
            $("#respuesta2").html("<div class='bg-success'><center>"+respuesta.mensaje+"</center></div>");
            $("#middle").html(respuesta.datos);
          }

        }

    
  });
});
});
