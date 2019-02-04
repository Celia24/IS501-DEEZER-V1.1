<?php
session_start();
include ("class/class-conexion.php");
$conexion = new Conexion();
$conexion->establecerConexion();
$paylist=$conexion->ejecutarInstruccion("SELECT ROWNUM,A.CODIGO_PLAYLIST,A.NOMBRE_PLAYLIST,A.NUMERO_SEGUIDORES,A.COVER
FROM TBL_PLAYLIST A
LEFT JOIN (SELECT A.CODIGO_PLAYLIST,A.NOMBRE_PLAYLIST,A.NUMERO_SEGUIDORES,A.COVER
FROM TBL_PLAYLIST A
INNER JOIN(SELECT CODIGO_SEGUIDOR,CODIGO_PLAYLIST
FROM TBL_SEGUIDORES_PLAYLIST
WHERE CODIGO_SEGUIDOR = ".$_SESSION['codigo_usuario'].") B
ON(A.CODIGO_PLAYLIST=B.CODIGO_PLAYLIST)) B
ON(A.CODIGO_PLAYLIST=B.CODIGO_PLAYLIST)
WHERE B.CODIGO_PLAYLIST IS NULL");

$albums=$conexion->ejecutarInstruccion("SELECT ROWNUM,B.*
FROM (SELECT B.CODIGO_ALBUM
FROM (SELECT CODIGO_ALBUM
FROM TBL_SEGUIDORES_ALBUM
WHERE CODIGO_USUARIO=".$_SESSION['codigo_usuario'].") A
FULL OUTER JOIN(SELECT CODIGO_ALBUM
FROM TBL_SEGUIDORES_ALBUM
GROUP BY CODIGO_ALBUM) B
ON(A.CODIGO_ALBUM=B.CODIGO_ALBUM)
WHERE A.CODIGO_ALBUM IS NULL OR B.CODIGO_ALBUM IS NULL) A
LEFT JOIN (SELECT A.CODIGO_ALBUM,A.NOMBRE_ALBUM,NVL(B.NOMBRE_ARTISTAS,' ') AS NOMBRE_ARTISTAS,A.COVER
FROM TBL_ALBUMES A
LEFT JOIN (SELECT A.CODIGO_ALBUM,LISTAGG(NOMBRE_ARTISTICO, ', ') WITHIN GROUP (ORDER BY A.CODIGO_ALBUM) over (partition by A.CODIGO_ALBUM) NOMBRE_ARTISTAS
FROM TBL_ALBUMES_X_ARTISTAS A
LEFT JOIN TBL_ARTISTAS B
ON(A.CODIGO_ARTISTA=B.CODIGO_ARTISTA)) B
ON(A.CODIGO_ALBUM=B.CODIGO_ALBUM)
GROUP BY A.CODIGO_ALBUM,A.NOMBRE_ALBUM,B.NOMBRE_ARTISTAS,A.COVER) B
ON(A.CODIGO_ALBUM=B.CODIGO_ALBUM)");

$artistas=$conexion->ejecutarInstruccion("SELECT ROWNUM,A.*
FROM (SELECT A.CODIGO_ARTISTA,A.NOMBRE_ARTISTICO,A.COVER,NVL(C.SEGUIDORES,0) AS SEGUIDORES
FROM TBL_ARTISTAS A
LEFT JOIN (SELECT CODIGO_ARTISTA,COUNT(1) AS SEGUIDORES
FROM TBL_SEGUIDORES_ARTISTA
GROUP BY CODIGO_ARTISTA) C
ON(A.CODIGO_ARTISTA = C.CODIGO_ARTISTA)) A
LEFT JOIN (SELECT CODIGO_ARTISTA
FROM TBL_SEGUIDORES_ARTISTA
WHERE CODIGO_USUARIO=".$_SESSION['codigo_usuario'].") B
ON(A.CODIGO_ARTISTA=B.CODIGO_ARTISTA)
WHERE B.CODIGO_ARTISTA IS NULL");

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
    <title>Inicio</title>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/principal.css">
    <link rel="stylesheet" type="text/css" href="css/perfil.css">
    <link rel="stylesheet" type="text/css" href="fantastic/css/font-awesome.min.css">
    <style type="text/css">
    
    body{
    height: 100%;
    margin: 0;
    padding: 0;
    overflow-x: hidden; 
  }

  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <div id="flow2" class="carousel-inner">
      <div class="item active">
        <img src="img/bannershakira.jpg" alt="Shakira" style="width:100%;">
        <div class="carousel-caption d-none d-md-block text-left">
                    <div id="playalbum">   </div>
              <h5>FLOW</h5>
              <p>Tu propia banda sonora<p>
            <div id="iconoplay"> <span class="glyphicon glyphicon-play-circle"></span></div>
            </div>
        </div>
     <div class="item">
        <img src="img/bannermaluma1.jpg" alt="Maluma" style="width:100%;">
                    <div class="carousel-caption d-none d-md-block text-left">
                    <div id="playalbum">  </div>
              <h5>FLOW</h5>
              <p>Tu propia banda sonora<p>
            <div id="iconoplay"> <span class="glyphicon glyphicon-play-circle"></span></div>
            </div>
      </div>
    
      <div class="item">
        <img src="img/bannermigente1.jpg" alt="Migente" style="width:100%;">
                    <div class="carousel-caption d-none d-md-block text-left">
                    <div id="playalbum">   </div>
              <h5>FLOW</h5>
              <p>Tu propia banda sonora<p>
            <div id="iconoplay"> <span class="glyphicon glyphicon-play-circle"></span></div>
            </div>
    </div>

  </div>
</div>


    </div>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <div style="margin: 20px 54px 20px;"><h4>Playlists</h4></div>
      <div id="contenedor">
        <?php 
                      while ($row = $conexion->obtenerRegistro($paylist)) {
                        if ($row['ROWNUM']<5) {
                        echo 
                        '<div class="col-md-3 dash2">
                          <div class="change">
                            <div class="fotos" >
                              <img src="'.$row['COVER'].'" class="perf">

                            </div>

                          </div>
                          <div class="ubicar">
                            <div class="col-xs-3 circulo" onclick="play('.$row['CODIGO_PLAYLIST'].');"><span class="glyphicon glyphicon-play app" style="color: #fff" aria-hidden="true"></span></div>
                            <div class="col-xs-3 circulo"><span class="glyphicon glyphicon-heart app" style="color: #b8b8b8" aria-hidden="true"></span></div>
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

  

    </div>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
       <div style="margin: 20px 54px 20px;"><h4>Albumes</h4></div>
      <div id="contenedor">
      <?php 
                    while ($row = $conexion->obtenerRegistro($albums)) {
                      if ($row['ROWNUM']<5) {
                        echo 
                        '<div class="col-md-3 dash2">
                          <div class="change">
                            <div class="fotos" >
                                <img src="'.$row['COVER'].'" class="perf">

                            </div>

                          </div>
                          <div class="ubicar">
                            <div class="col-xs-3 circulo" onclick="playg('.$row['CODIGO_ALBUM'].');"><span class="glyphicon glyphicon-play app" style="color: #fff" aria-hidden="true"></span></div>
                            <div class="col-xs-3 circulo"><span class="glyphicon glyphicon-heart app" style="color: #b8b8b8" aria-hidden="true"></span></div>
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
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
       <div style="margin: 20px 54px 20px;"><h4>Artistas</h4></div>
      <div id="contenedor">

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
                            <div class="col-xs-3 circulo"><span class="glyphicon glyphicon-heart app" style="color: #b8b8b8" aria-hidden="true"></span>
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

                       }
   
          
          ?>
      </div>
    </div>
  </div>
</div>




    



<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/principal.js"></script>
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

$(document).ready(function(){
     
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