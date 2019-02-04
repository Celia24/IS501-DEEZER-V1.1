<?php
session_start();
include ("class/class-conexion.php");
$conexion = new Conexion();
$conexion->establecerConexion();
$artistas=$conexion->ejecutarInstruccion("SELECT A.CODIGO_ARTISTA,A.NOMBRE_ARTISTICO,A.COVER,NVL(C.SEGUIDORES,0) AS SEGUIDORES
                                                    FROM TBL_ARTISTAS A
                                                    INNER JOIN (SELECT CODIGO_ARTISTA
                                                    FROM TBL_SEGUIDORES_ARTISTA
                                                    WHERE CODIGO_USUARIO=".$_SESSION['codigo_usuario'].") B
                                                    ON(A.CODIGO_ARTISTA = B.CODIGO_ARTISTA)
                                                    LEFT JOIN (SELECT CODIGO_ARTISTA,COUNT(1) AS SEGUIDORES
                                                    FROM TBL_SEGUIDORES_ARTISTA
                                                    GROUP BY CODIGO_ARTISTA) C
                                                    ON(B.CODIGO_ARTISTA = C.CODIGO_ARTISTA)");
   function cortar($text){
   	; 
     if ((strlen($text)>25)) {
     	echo substr($text, 0, 25)."..."; 
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
					<h2 class="head col-xs-2"><span class="color-primary arts"></span>Artistas</h2>
					<table  >
						<tr>
							<td style="padding-right: 10px;padding-left: 440px">
								<input type="text" placeholder="Buscar" class="form-control arreg2" style="width: 200px">
							</td>
							<td style="padding-right: 10px;"">
								<select class="form-control arreg2"  style="width: 200px">
									<option>A - Z</option>
									<option>Agregado recientemente</option>
								</select>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 space">


					<?php 
                       while ($row = $conexion->obtenerRegistro($artistas)) {
                       	echo 
                       	'<div class="col-md-3 dash2">
                       		<div class="change2">
                       			<div class="fotos2" >
                       				<img src="'.$row['COVER'].'" class="perf2">

                       			</div>

                       		</div>
                       		<div class="ubicar2">
                       			<div class="col-xs-3 circulo" onclick="playa('.$row['CODIGO_ARTISTA'].');"><span class="glyphicon glyphicon-play app" style="color: #fff" aria-hidden="true"></span>
                            </div>
                       			<div class="col-xs-3 circulo"><span class="glyphicon glyphicon-heart app" style="color: #007feb" aria-hidden="true"></span>
                            </div>
                       			</div>
                       					<div class="informacion2">
                       						<table>
                       							<tr>
                       								<td>
                       									<span class="name-play">'; echo cortar("".$row['NOMBRE_ARTISTICO']."");echo '</span>
                       								</td>
                       								<tr>
                       									<td>
                       										<span class="tipop">'.$row['SEGUIDORES'].' seguidores</span>
                       									</td>
                       								</tr>
                       							</tr>
                       						</table>
                       					</div>
                       				</div>';




                       }
   
          
					?>
					
<input type="text" id="fav" value="<?php echo $favoritos=$conexion->cantidadRegistros($artistas); ?>" style="visibility: hidden;">
				</div>
			</div>
		</div>
	</div>



	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/perfil.js"></script>
	<script type="text/javascript">
        function playa(codigoartista){
var parametros="codigoartista="+codigoartista;
 $.ajax({
        url:"ajax/reproducto-ajax.php?accion=3",
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
    $(".arts").text($("#fav").val()+" ");
    

 $(".ubicar2").hover(function(){

  $(this).css({"visibility":"visible","opacity":"1"});
  $(this).siblings("div.change2").css("opacity","0.8");
},function(){
  $(this).css({"visibility":"visible","opacity":"1"});
   $(this).siblings("div.change2").css("opacity","0.8");
});



$(".perf2").hover(function(){
  $(this).parent().parent().css("opacity","0.8");
  $(this).parent().parent().siblings("div.ubicar2").css({"visibility":"visible","opacity":"1"});
},function(){
  $(this).parent().parent().css("opacity","1");
  $(this).parent().parent().siblings("div.ubicar2").css({"visibility":"hidden","opacity":"0"});
});




     });

	</script>
</body>
</html>