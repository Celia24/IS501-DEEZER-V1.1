<!DOCTYPE html>
<html lang="es">
<head>
	<title>Artista</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fantastic/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/artistav1.css">
</head>
<body>
<center>
    <div class="contenedor">
	   <div id="primeraimg"></div>

	   <div id="artista">
	   	   <div id="img_artista"></div>
	   	     <div id="info_artista">
	   	       <h2 id="nombre_artista">Alux Nahual</h2>
	   	       <label id="c_fans">21,411 fans</label>
	   	     </div>
	   	     <div id="funciones">
	   	     	<button id="mixx" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span> Mix</button>
	   	     	<button id="mixx1" type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 
	   	     	Añadir</button>
	   	     	<button id="mixx2" type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></button>
	   	     </div>
	   	     <div id="social">
	   	        <i class="fa fa-facebook fa-1x" data-toggle="tooltip" data-placement="top" title="Cuenta De Facebook"><div id="separador"></div></i>
	   	        <i class="fa fa-twitter fa-1x" data-toggle="tooltip" data-placement="top" title="Pagina De Twitter"></i>	
	   	     </div>
	   </div>
  
	   <div id="navbar"> 
          <table id="nav">
	      	<tr>
	      		<td><a id="link1" class="selected">Discografía</a></td>
	      		<td><a id="link2" class="selected">Top canciones</a></td>
	      		<td><a id="link3" class="selected">Artistas similares</a></td>
	      		<td><a id="link4" class="selected">Playlists</a></td>
	      		<td><a id="link5" class="selected">Comentarios</a></td>
	      		<td><a id="link6" class="selected">Biografía</a></td>
	      	</tr>
	      </table>
	   </div>

	   <iframe id="miIframe" frameborder="0" src="discografia.php" onload="autofitIframe(this)";></iframe>
</center>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/art.js"></script>
</body>
</html>   
