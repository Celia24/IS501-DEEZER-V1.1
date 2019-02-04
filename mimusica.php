<?php
session_start();
include ("class/class-conexion.php");
$conexion = new Conexion();
$conexion->establecerConexion();
$paylist=$conexion->ejecutarInstruccion("SELECT ROWNUM,A.CODIGO_PLAYLIST,A.NOMBRE_PLAYLIST,A.NUMERO_SEGUIDORES,A.COVER
FROM TBL_PLAYLIST A
INNER JOIN(SELECT CODIGO_SEGUIDOR,CODIGO_PLAYLIST
FROM TBL_SEGUIDORES_PLAYLIST
WHERE CODIGO_SEGUIDOR=".$_SESSION['codigo_usuario'].") B
ON(A.CODIGO_PLAYLIST=B.CODIGO_PLAYLIST)");

$albums=$conexion->ejecutarInstruccion("SELECT ROWNUM,A.* 
FROM 
(SELECT A.CODIGO_ALBUM,A.NOMBRE_ALBUM,NVL(B.NOMBRE_ARTISTAS,' ') AS NOMBRE_ARTISTAS,A.COVER
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
GROUP BY A.CODIGO_ALBUM,A.NOMBRE_ALBUM,B.NOMBRE_ARTISTAS,A.COVER) A");

$artistas=$conexion->ejecutarInstruccion("SELECT ROWNUM,A.*
FROM
(SELECT A.CODIGO_ARTISTA,A.NOMBRE_ARTISTICO,A.COVER,NVL(C.SEGUIDORES,0) AS SEGUIDORES
FROM TBL_ARTISTAS A
INNER JOIN (SELECT CODIGO_ARTISTA
FROM TBL_SEGUIDORES_ARTISTA
WHERE CODIGO_USUARIO=".$_SESSION['codigo_usuario'].") B
ON(A.CODIGO_ARTISTA = B.CODIGO_ARTISTA)
LEFT JOIN (SELECT CODIGO_ARTISTA,COUNT(1) AS SEGUIDORES
FROM TBL_SEGUIDORES_ARTISTA
GROUP BY CODIGO_ARTISTA) C
ON(B.CODIGO_ARTISTA = C.CODIGO_ARTISTA)) A");




   function cortar($text){
   	
     if ((strlen($text)>30)) {
     	echo substr($text, 0, 30)."..."; 
     }else{
     	echo $text;
     }

   }

   function cortar2($text){
    
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
					<h2 class="head col-xs-2">
          <span onclick="subventana(1)" class="link">
          <span class="color-primary pay"></span>
          <span class="azz">
          <span> Playlists</span>
           <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
           </span>
           </span>
           </h2>
					<div style="margin-left:890px ">
          <button onclick="subventana(1)" class="btnn"><span class="es-but"></span>Todas las playlist  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>     
          </div>
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
                        if ($row['ROWNUM']<4) {
                           
                        
                       	echo 
                       	'<div class="col-md-3 dash2">
                       		<div class="change">
                       			<div class="fotos" >
                       				<img src="'.$row['COVER'].'" class="perf">

                       			</div>

                       		</div>
                       		<div class="ubicar">
                       			<div class="col-xs-3 circulo" onclick="play('.$row['CODIGO_PLAYLIST'].')"><span class="glyphicon glyphicon-play app" style="color: #fff" aria-hidden="true"></span></div>
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
                       }

					?>
					




				</div>


        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 inic2">
          <h2 class="head col-xs-2">
            <span onclick="subventana(2)" class="link">
          <span class="color-primary albs"></span>
          <span class="azz"> 
          <span> Albumes</span>
           <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
           </span>
           </span>
          </h2>
          <div style="margin-left:885px ">
          <button onclick="subventana(2)" class="btnn"><span class="es-but"></span>Todos los albumes <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>     
          </div>
        </div>
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 space">


          <?php 
                      while ($row = $conexion->obtenerRegistro($albums)) {
                        if ($row['ROWNUM']<5) {
                        echo 
                        '<div class="col-md-3 dash2">
                          <div class="change3">
                            <div class="fotos" >
                              <img src="'.$row['COVER'].'" class="perf">

                            </div>

                          </div>
                          <div class="ubicar3">
                            <div class="col-xs-3 circulo" onclick="playg('.$row['CODIGO_ALBUM'].');"><span class="glyphicon glyphicon-play app" style="color: #fff" aria-hidden="true"></span></div>
                            <div class="col-xs-3 circulo"><span class="glyphicon glyphicon-heart app" style="color: #007feb" aria-hidden="true"></span></div>
                            <div class="col-xs-3 circulo tot3" data-trigger="focus"  data-placement="auto top"  data-toggle="popover"   data-html="true" data-content="
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

                       }

          ?>
          




        </div>


        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 inic2">
          <h2 class="head col-xs-2">
            <span onclick="subventana(3)" class="link">
          <span class="color-primary arts"></span>
          <span class="azz">
          <span> Artistas fav.</span>
           <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
           </span>
           </span>
          </h2>
          <div style="margin-left:885px ">
          <button onclick="subventana(3)" class="btnn"><span class="es-but"></span>Todos los artistas <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>     
          </div>
        </div>
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 space">


          <?php 
                        while ($row = $conexion->obtenerRegistro($artistas)) { 
                          if ($row['ROWNUM']<5) {
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
                                        <span class="name-play">'; echo cortar2("".$row['NOMBRE_ARTISTICO']."");echo '</span>
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

                       }

          ?>
          




        </div>


			</div>

		</div>
	</div>


<input type="text" id="fav" value="<?php echo $favoritos=$conexion->cantidadRegistros($paylist); ?>" style="visibility: hidden;">
<input type="text" id="fav2" value="<?php echo $favoritos=$conexion->cantidadRegistros($albums); ?>" style="visibility: hidden;">
<input type="text" id="fav3" value="<?php echo $favoritos=$conexion->cantidadRegistros($artistas); ?>" style="visibility: hidden;">
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
      $(".albs").text($("#fav2").val()+" ");
      $(".arts").text($("#fav3").val()+" ");
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






 $(".tot3").click(function(){
  $(this).popover('toggle');
});



 $(".ubicar3").hover(function(){

  $(".change3").css("opacity","1");
  $(".ubicar3").css({"visibility":"hidden","opacity":"0"});
  $(this).css({"visibility":"visible","opacity":"1"});
  $(this).siblings("div.change3").css("opacity","0.8");
},function(){
  $(".tot3").popover('hide');
  $(this).css({"visibility":"visible","opacity":"1"});
   $(this).siblings("div.change3").css("opacity","0.8");
});



$(".change3").hover(function(){

  $(".change3").css("opacity","1");
  $(".ubicar3").css({"visibility":"hidden","opacity":"0"});
  $(this).css("opacity","0.8");
  $(this).siblings("div.ubicar3").css({"visibility":"visible","opacity":"1"});
},function(){
  $(".tot3").popover('hide');
  $(".change3").css("opacity","1");
  $(".ubicar3").css({"visibility":"hidden","opacity":"0"});
});



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