function seleccion(id){
	$(id).addClass("Seleccionada");
	$($("#seleccion").val()).removeClass("Seleccionada");
	$("#seleccion").val(id);
}

function favorito(id){
	$.ajax({
		url: "../ajax/favorito.php",
		method: "POST",
		data: "id="+id,
		dataType: 'html',
		success: function(datos){
				alert(datos);
		},
		error: function(xhr, textStatus, error){
			console.log(xhr.statusText);
			console.log(textStatus);
			console.log(error);
		}
	});
}


function abrirCarpeta(id){
	window.location = "../my-drive/abrirCarpeta.php?carpeta="+id;	
}

function abrir(id){
	$.ajax({
		url: "../ajax/abrir.php",
		method: "POST",
		data: "id="+id,
		dataType: 'html',
		success: function(datos){
				window.open(datos,"_self");
		},
		error: function(xhr, textStatus, error){
			console.log(xhr.statusText);
			console.log(textStatus);
			console.log(error);
		}
	});
}

function subirArchivo(){
	$("#subir").click();
}

$("#agregarCarpeta").click(function(){
	$("#NuevaCarpeta").modal("show");
});

$("#btn_crearCarpeta").click(function(){
	
	$.ajax({
		data: "nombre="+$("#nombreCarpetaNueva").val(),
		url: "../ajax/capetaNueva.php",
		dataType: "json",
		method: "POST",
		success: function(respuesta){
			if (respuesta.crea) {
				$("#NuevaCarpeta").modal("hide");
				if (respuesta.carpeta == "miUnidad") {
					$('#explorador').attr('src', $('#explorador').attr('src'));
				}else{
					$('#explorador').attr('src', "../my-drive/abrirCarpeta.php?carpeta="+respuesta.carpeta);
				}

			}else{
				alert("Algo ha salido mal.")
			}
		}
	});
});

$("input[name='subir']").on("change", function(){
	var formData = new FormData($("#subirArchivo")[0]);
	var ruta = "../ajax/SubirArchivo.php";
	$.ajax({
		url: ruta,
		method: "POST",
		dataType: 'json',
		data: formData,
		contentType: false,
		processData: false,
		success: function(datos)
		{
			if (datos.carpeta == "miUnidad") {
				$('#explorador').attr('src', $('#explorador').attr('src'));
			}else{
				$('#explorador').attr('src', "../my-drive/abrirCarpeta.php?carpeta="+datos.carpeta);
			}
		},
		error: function(xhr, textStatus, error){
			console.log(xhr.statusText);
			console.log(textStatus);
			console.log(error);
		}
	});

});

function archivo(src){
	$.ajax({
		url: "../ajax/SubirArchivo.php",
		method: "POST",
		data: "src="+src,
		dataType: 'html',
		success: function(datos)
		{
			$("#aside").html(datos);
			if (data.ingreso)
				alert("Se agrego con exito.");
			else
				alert("Ha habido un error.");      
		},
		error: function(xhr, textStatus, error){
			console.log(xhr.statusText);
			console.log(textStatus);
			console.log(error);
		}


	});
}