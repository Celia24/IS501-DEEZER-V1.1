<?php
session_start();
include("class/class-conexion.php");
$conexion = new Conexion();
$conexion->establecerConexion();
$foto=$conexion->ejecutarInstruccion("SELECT *
FROM TBL_USUARIOS 
WHERE CODIGO_USUARIO = ".$_SESSION["codigo_usuario"]."");
while ($row = $conexion->obtenerRegistro($foto)) {
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/perfil.css">
	<style type="text/css">
	a:link{
		text-decoration:none;

	}
	body{
		overflow-x: hidden;
	}


</style>
</head> 
<body> 
	<input type="text" id="help" style="display: none" value="<?php if(isset($_GET['accion'])) echo $_GET['accion'];?>">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12" id="foto">
				<img src="img/bannermigente1.jpg" id="foto">
			</div>
			<div id="profile-photo"><img src="<?php echo $row['FOTO']; ?>" id="photo" width="160" height="160"></div>
			<div id="name-perfil"><span id="name"><?php echo $row['NOMBRE_USUARIO']; }?></span></div>
			<div id="flow">
				<table>
					<tr>
						<td>
							<button class="boton2"  ><div id="line"><span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span> FLOW</div></button>
						</td>
						<td>
							<button class="boton3" onclick="info()"><span class="glyphicon glyphicon-cog conf" aria-hidden="true"><span class="cuenta">  Mi cuenta</span></button>
						</td>
						<td>
							<button class="boton4" id="boton4" data-trigger="focus"  data-toggle="popover"   data-html="true"  
							data-content='<table class="detalles">
								<tr>
									<td onclick="info()">Editar informacion</td>
								</tr>
								<tr>
									<td onclick="moodd();">Cambiar mi avatar</td>
								</tr>
								<tr>
									<td >Eliminar mi foto de perfil</td>
								</tr>
							</table>'><span class="glyphicon glyphicon-option-horizontal"  aria-hidden="true"></span></button>
						</td>
					</tr>
				</table>

			</div>
			<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12" id="menu"> 
				<table  id="ayuda">
					<tr>
						<td>

							<a href="javascript:;"  id="mu" onclick="ifra4(5)" onmouseover="sobre('mu')" onmouseleave="unsobre('mu');" ><span id="um">Mi musica</span></a>
						</td>
						<td>
							<a href="javascript:;" id="fav" onclick="ifra4(1)" onmouseover="sobre('fav')" onmouseleave="unsobre('fav');" ><span id="af">Mis favoritas</span></a>
						</td>
						<td>
							<a href="javascript:;" id="pla" onclick="ifra4(2)" onmouseover="sobre('pla')" onmouseleave="unsobre('pla');"  ><span id="alp">Playlists</span></a>
						</td>
						<td>
							<a href="javascript:;" id="alb" onclick="ifra4(3)" onmouseover="sobre('alb')" onmouseleave="unsobre('alb');" ><span id="bla">Albumes</span></a>
						</td>
						<td>
							<a href="javascript:;" id="art" onclick="ifra4(4)" onmouseover="sobre('art')" onmouseleave="unsobre('art');"  ><span id="tra">Artistas</span></a>
						</td>
						<td >
							<a href="javascript:;" style="padding-bottom: 16px;padding-top: 10px;" id="sma" onmouseover="sobre('sma')" onmouseleave="unsobre('sma');" ><span id="mas">Mas <span  class="glyphicon glyphicon-chevron-down" id="flecha" aria-hidden="true"></span></span>
								<div id="mass"> 
									<table class="maas" >
										<tr>
											<td>Historial</td>
										</tr>
										<tr>
											<td>Mixes</td>
										</tr>
										<tr>
											<td>Mis MP3</td>
										</tr>
										<tr>
											<td>Siguiendo</td>
										</tr>
										<tr>
											<td>Seguidores</td>
										</tr>
									</table>
								</div>
							</a>
							
						</td>

					</tr>
				</table>

			</div>

		</div>

		<div id="linea"></div>

	</div>
	<div  id="ifra4" style="top:370px;position: absolute;"  >

	</div>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/perfil.js"></script>
	
	<script type="text/javascript">
		$('#imagen',window.parent.document).on('hide.bs.modal', function (e) {
			if($("#dropp",window.parent.document).hasClass("modal-backdrop")){
				$(".modal-backdrop",window.parent.document).remove();
			}
		});

		$(function () {
			$('[data-toggle="popover"]').popover();
		});



		$(document).ready(function(){


			function cargar(){
				if($("#help").val()==1){
					borde2(1);
					$("#fav").addClass("borde-a");
					$("#ifra4").html('<iframe class="contenido4" onload="redimensionariframe(this)" src="favoritas.php" frameborder="0"  ></iframe>');
				}
				if($("#help").val()==2){
					borde2(2);
					$("#mu").addClass("borde-a");
					$("#ifra4").html('<iframe class="contenido4" onload="redimensionariframe(this)" src="mimusica.php" frameborder="0"  ></iframe>');
				}
				if($("#help").val()==3){
					borde2(2);
					$("#pla").addClass("borde-a");
					$("#ifra4").html('<iframe class="contenido4" onload="redimensionariframe(this)" src="playlists.php" frameborder="0"  ></iframe>');
				}
				if($("#help").val()==4){
					borde2(2);
					$("#alb").addClass("borde-a");
					$("#ifra4").html('<iframe class="contenido4" onload="redimensionariframe(this)" src="albumes.php" frameborder="0"  ></iframe>');
				}
			}
			cargar();




		});

		function moodd(){
  $('#imagen',window.parent.document).modal('show');
  
  $("body",window.parent.document).append('<div class="modal-backdrop fade in" id="dropp"  ></div>');
  if ($('body').hasClass('modal-open')) {
  $('body').removeClass('modal-open');
  $('.fade').removeClass("modal-backdrop"); 
  
}
   
}

	</script>
</body>
</html>