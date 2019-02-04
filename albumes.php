<?php
session_start();
include ("class/class-conexion.php");
$conexion = new Conexion();
$conexion->establecerConexion();
$albums=$conexion->ejecutarInstruccion("SELECT A.CODIGO_ALBUM,A.NOMBRE_ALBUM,NVL(B.NOMBRE_ARTISTAS,' ') AS NOMBRE_ARTISTAS,A.COVER
                                        FROM TBL_ALBUMES A
                                        LEFT JOIN (SELECT A.CODIGO_ALBUM,LISTAGG(NOMBRE_ARTISTICO, ', ') WITHIN GROUP (ORDER BY A.CODIGO_ALBUM) over (partition by A.CODIGO_ALBUM) NOMBRE_ARTISTAS
                                        FROM TBL_ALBUMES_X_ARTISTAS A
                                        LEFT JOIN TBL_ARTISTAS B
                                        ON(A.CODIGO_ARTISTA=B.CODIGO_ARTISTA)) B
                                        ON(A.CODIGO_ALBUM=B.CODIGO_ALBUM)
                                        RIGHT JOIN (SELECT CODIGO_ALBUM
                                        FROM TBL_SEGUIDORES_ALBUM
                                        WHERE CODIGO_USUARIO=".$_SESSION['codigo_usuario'].") C
                                        ON(A.CODIGO_ALBUM=C.CODIGO_ALBUM)
                                        GROUP BY A.CODIGO_ALBUM,A.NOMBRE_ALBUM,B.NOMBRE_ARTISTAS,A.COVER");
   function cortar($text){
   	;
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
	<title>Albumes</title>
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
					<h2 class="head col-xs-2"><span class="color-primary alb"></span>Albumes</h2>
					<table  >
						<tr>
							<td style="padding-right: 10px;padding-left: 440px">
								<input type="text" placeholder="Buscar" class="form-control arreg2" style="width: 200px">
							</td>
							<td style="padding-right: 10px;"">
								<select class="form-control arreg2"  style="width: 200px">
									<option>A - Z (por artista)</option>
									<option>A - Z (por album)</option>
									<option>Agregado recientemente</option>
									<option>Mas Escuchado</option>
								</select>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 space">


					<?php 
                    while ($row = $conexion->obtenerRegistro($albums)) {
                       	echo 
                       	'<div class="col-md-3 dash2">
                       		<div class="change">
                       			<div class="fotos" >
                        				<img src="'.$row['COVER'].'" class="perf">

                       			</div>

                       		</div>
                       		<div class="ubicar">
                       			<div class="col-xs-3 circulo" onclick="playg('.$row['CODIGO_ALBUM'].');"><span class="glyphicon glyphicon-play app" style="color: #fff" aria-hidden="true"></span></div>
                       			<div class="col-xs-3 circulo"><span class="glyphicon glyphicon-heart app" style="color: #007feb" aria-hidden="true"></span></div>
                       			<div class="col-xs-3 circulo tot" data-trigger="focus"  data-placement="auto top"  data-toggle="popover"   data-html="true" data-content="
                       			<table id=\'new2\'>
                              <tr>
                                <a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-option-horizontal\'  aria-hidden=\'true\'><span class=\'inform\'>Escuchar a continuacion</span></td><a/>
                              </tr> 
                              <tr>
                                <a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-list-alt\'  aria-hidden=\'true\'><span class=\'inform\'>Agregar a la cola</span></td><a/>
                              </tr>   
                              <tr>
                                <a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-share\'  aria-hidden=\'true\'><span class=\'inform\'>Compartir</span></td><a/>
                              </tr> 
                              <tr>
                                <a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-remove\'  aria-hidden=\'true\'><span class=\'inform\'>Eliminar de Mi Musica</span></td><a/>
                              </tr> 
                              <tr>
                                <a href=\'javascript:;\'><td><span class=\'inform\'>Reportar un problema</span></td><a/>
                              </tr> 
                            </table>
                       						"><span class="glyphicon glyphicon-option-horizontal app" style="color: #fff" aria-hidden="true"></span></div>
                       					</div>
                       					<div class="informacion">
                       						<table>
                       							<tr>
                       								<td>
                       									<span class="name-play">'; echo cortar("".$row['NOMBRE_ALBUM']."");echo '</span>
                       								</td>
                       								<tr>
                       									<td>
                       										<span class="tipop">de <span class="tipop2">';echo cortar("".$row['NOMBRE_ARTISTAS']."");echo '</span></span>
                       									</td>
                       								</tr>
                       							</tr>
                       						</table>
                       					</div>
                       				</div>';




                       }

					?>
					



<input type="text" id="fav" value="<?php echo $favoritos=$conexion->cantidadRegistros($albums); ?>" style="visibility: hidden;">
				</div>
			</div>
		</div>
	</div>



	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/perfil.js"></script>
	<script type="text/javascript">
      function playg(codigoalbum){
var parametros="codigoalbum="+codigoalbum;
 $.ajax({
        url:"ajax/reproducto-ajax.php?accion=2",
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

$(".alb").text($("#fav").val()+" ");

 $(".tot").click(function(){
  $(this).popover('toggle');
});



 $(".ubicar").hover(function(){

  $(".change").css("opacity","1");
  $(".ubicar").css({"visibility":"hidden","opacity":"0"});
  $(this).css({"visibility":"visible","opacity":"1"});
  $(this).siblings("div.change").css("opacity","0.8");
},function(){
  $(".tot").popover('hide');
  $(this).css({"visibility":"visible","opacity":"1"});
   $(this).siblings("div.change").css("opacity","0.8");
});



$(".change").hover(function(){

  $(".change").css("opacity","1");
  $(".ubicar").css({"visibility":"hidden","opacity":"0"});
  $(this).css("opacity","0.8");
  $(this).siblings("div.ubicar").css({"visibility":"visible","opacity":"1"});
},function(){
  $(".tot").popover('hide');
  $(".change").css("opacity","1");
  $(".ubicar").css({"visibility":"hidden","opacity":"0"});
});




     });
	</script>
</body>
</html>