 $(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "http://localhost/IS410-Boogle-Drive/ajax/ajax-imagen.php";
            $.ajax({
                url: ruta,
                type: "POST",
                dataType:'json',
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    if (datos.codigo==1) {
                    $("#respuesta").html(datos.mensaje);
                    $("#fotoo").html(datos.actualizar);
                    }else{
                    $("#respuesta").html(datos.mensaje);
                    }
                    
                }
            });
        });
     });

$("#fotoperfil").click(function(){
   $("#imagen").modal("show");
});
 