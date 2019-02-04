<?php
session_start();
include ("class/class-conexion.php");
$conexion = new Conexion();
$conexion->establecerConexion();
$paylist=$conexion->ejecutarInstruccion("SELECT A.CODIGO_PLAYLIST,A.NOMBRE_PLAYLIST,A.NUMERO_SEGUIDORES,A.COVER
                                          FROM TBL_PLAYLIST A
                                          INNER JOIN(SELECT CODIGO_SEGUIDOR,CODIGO_PLAYLIST
                                          FROM TBL_SEGUIDORES_PLAYLIST
                                          WHERE CODIGO_SEGUIDOR=".$_SESSION['codigo_usuario'].") B
                                          ON(A.CODIGO_PLAYLIST=B.CODIGO_PLAYLIST)");
   function cortar($text){ 
   	
     if ((strlen($text)>30)) {
     	echo substr($text, 0, 30)."..."; 
     }else{
     	echo $text;
     }
  
   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Playlists</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/perfil.css">
	<style type="text/css">
		body{
			background-color: #f8f8f9;
			overflow: hidden;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 x">
				<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 inic2">
					<h2 class="head col-xs-2"><span class="color-primary pay"></span>Playlists</h2>
					<table  >
						<tr>
							<td style="padding-right: 10px;padding-left: 230px">
								<select class="form-control arreg2"  style="width: 200px">
									<option>Todos</option>
									<option>Mis playlists</option>
									<option>Playlists añadidas</option>
									<option>Playlists colaborativas</option>
								</select>
							</td>
							<td style="padding-right: 10px;">
								<input type="text" placeholder="Buscar" class="form-control arreg2" style="width: 200px">
							</td>
							<td style="padding-right: 10px;"">
								<select class="form-control arreg2"  style="width: 200px">
									<option>A - Z</option>
									<option>Actualizado recientemente</option>
									<option>Añadido recientemente</option>
									<option>Tipo</option>
									<option>Mas Escuchados</option>
								</select>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 space">

					<div class="col-md-3 dash" onclick="moddd()">
						<div class="col-xs-12 bot">
							<div >
								<button class="plus">
									<span class="glyphicon glyphicon-plus adic" aria-hidden="true"></span>
								</button>
							</div>
							<span class="newplay">Crear una playlist</span>
						</div>
					</div>

					<?php 
                      while ($row = $conexion->obtenerRegistro($paylist)) {
                       	echo 
                       	'<div class="col-md-3 dash2">
                       		<div class="change">
                       			<div class="fotos" >
                       				<img src="'.$row['COVER'].'" class="perf">

                       			</div>

                       		</div>
                       		<div class="ubicar">
                       			<div class="col-xs-3 circulo" onclick="play('.$row['CODIGO_PLAYLIST'].');"><span class="glyphicon glyphicon-play app" style="color: #fff" aria-hidden="true"></span></div>
                       			<div class="col-xs-3 circulo"><span class="glyphicon glyphicon-heart app" style="color: #007feb" aria-hidden="true"></span></div>
                       			<div class="col-xs-3 circulo tot" data-trigger="manual"  data-placement="auto top"  data-toggle="popover"   data-html="true" data-content="
                       			<table id=\'otros\'>
                       				<tr>
                       					<a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-share gly\'  aria-hidden=\'true\'></span><span class=\'letras\'>Compartir</span></td><a/>
                       					</tr> 
                       					<tr>
                       						<a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-remove gly\'  aria-hidden=\'true\'></span><span class=\'letras\'>Eliminar de Mi Musica</span></td><a/>
                       						</tr> 	
                       						<tr>
                       							<a href=\'javascript:;\'><td><span class=\'letras\'>Perfil de usuario</span><span class=\' glyphicon glyphicon-chevron-right derecha\'></span></td><a/>
                       							</tr> 
                       						</table>
                       						"><span class="glyphicon glyphicon-option-horizontal app" style="color: #fff" aria-hidden="true"></span></div>
                       					</div>
                       					<div class="informacion">
                       						<table>
                       							<tr>
                       								<td>
                       									<span class="name-play">'; echo cortar("".$row['NOMBRE_PLAYLIST']."");echo '</span>
                       								</td>
                       								<tr>
                       									<td>
                       										<span class="tipop">publicas</span>
                       									</td>
                       								</tr>
                       							</tr>
                       						</table>
                       					</div>
                       				</div>';




                       }

					?>
					



<input type="text" id="fav" value="<?php echo $favoritos=$conexion->cantidadRegistros($paylist); ?>" style="visibility: hidden;">
				</div>
			</div>
		</div>
	</div>



	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/perfil.js"></script>
	<script type="text/javascript">
    function play(codigoplaylist){
var parametros="codigoplaylist="+codigoplaylist;
 $.ajax({
        url:"ajax/reproducto-ajax.php?accion=1",
        data:parametros,
        method:"POST",
        dataType:'json',
        success:function(respuesta){
          window.parent.top.myPlaylist.setPlaylist(respuesta);
          window.parent.top.myPlaylist.option('autoPlay', true);
        }
     });

}
		$(function () {
          $('[data-toggle="popover"]').popover();
        });
 
     $(document).ready(function(){
      $(".pay").text($("#fav").val()+" ");
     	$('#newplaylist',window.parent.parent.document).on('hide.bs.modal', function (e) {
     if($("#dropp",window.parent.parent.document).hasClass("modal-backdrop")){
    $(".modal-backdrop",window.parent.parent.document).remove();
}
});



 $(".tot").click(function(){
  $(this).popover('toggle');
});



 $(".ubicar").hover(function(){
  $(this).css({"visibility":"visible","opacity":"1"});
  $(this).siblings("div.change").css("opacity","0.8");
},function(){
  $(this).css({"visibility":"visible","opacity":"1"});
   $(this).siblings("div.change").css("opacity","0.8");
});
 

$(".change").hover(function(){
  $(this).css("opacity","0.8");
  $(this).siblings("div.ubicar").css({"visibility":"visible","opacity":"1"});
},function(){
  if ($(this).siblings("div.ubicar").children("div.tot").popover('hide')) {
       
  }else{
      $(this).siblings("div.ubicar").children("div.tot").popover('hide');
  }
  $(this).css("opacity","1");
  $(this).siblings("div.ubicar").css({"visibility":"hidden","opacity":"0"});
});

$(".change").click(function(){
  if ($(this).siblings("div.ubicar").children("div.tot").popover('hide')) {

  }else{
      $(this).siblings("div.ubicar").children("div.tot").popover('toggle');
  }
  
});


     });
	</script>
</body>
</html>