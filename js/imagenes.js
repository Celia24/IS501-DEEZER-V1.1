 $(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);

            $.ajax({
                url: "ajax/ajax-imagen.php",
                type: "POST",
                dataType:'json',
                data: formData, 
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    if (datos.codigo==1) {
                        $("#respuesta").html(datos.mensaje); 
                      $("#first3").html(datos.actualizar);
                      $('.contenido').contents().find("html").find('#profile-photo').html(datos.actualizar3);
                      $('.contenido').contents().find("html").find('.contenido2').contents().find("html").find('.imagen').html(datos.actualizar2);
                    }else{
                      $("#respuesta").html(datos.mensaje);  
                    }
                    
                     
                    
                }
            });
        });
     });

