<!DOCTYPE html>
<html>
<head>
	<title>Discografia</title>
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/discografia.css">
	<link rel="stylesheet" type="text/css" href="fantastic/css/font-awesome.min.css">
</head>
<body>
<center>
<div id="contenedor">

<center>

<div id="contenedor2">

    <a id="link1" href="javascript:;">Top canciones ></a>
	<div id="top_canciones">
	    <div id="musica">
	    	<div id="cancion" class="can">
	    	<span id="num">1</span>
	    	<div class="cont" data-toggle="tooltip" data-placement="top" title="Añadir a mis favoritos"><span class="glyphicon glyphicon-heart-empty" id="gl"></span></div>
	    	<div id="btnplay" class="oculto"><i class="fa fa-play"></i></div>
	    	<div class="nobcancion"><a href="javascript:;" id="nomb">Musica mia</a></div>
	    	<div class="ub" data-toggle="tooltip" data-placement="top" title="Ver menu"><span id="per" class="glyphicon glyphicon-option-horizontal"></span></div>
	    	</div>

	    	<div id="cancion" class="can">
	    	<span id="num">2</span>
	    	<div class="cont" data-toggle="tooltip" data-placement="top" title="Añadir a mis favoritos"><span class="glyphicon glyphicon-heart-empty" id="gl"></span></div>
	    	<div id="btnplay" class="oculto"><i class="fa fa-play"></i></div>
	    	<div class="nobcancion"><a href="javascript:;" id="nomb">Musica mia</a></div>
	    	<div class="ub" data-toggle="tooltip" data-placement="top" title="Ver menu"><span id="per" class="glyphicon glyphicon-option-horizontal"></span></div>
	    	</div>

	    	<div id="cancion" class="can">
	    	<span id="num">3</span>
	    	<div class="cont" data-toggle="tooltip" data-placement="top" title="Añadir a mis favoritos"><span class="glyphicon glyphicon-heart-empty" id="gl"></span></div>
	    	<div id="btnplay" class="oculto"><i class="fa fa-play"></i></div>
	    	<div class="nobcancion"><a href="javascript:;" id="nomb">Musica mia</a></div>
	    	<div class="ub" data-toggle="tooltip" data-placement="top" title="Ver menu"><span id="per" class="glyphicon glyphicon-option-horizontal"></span></div>
	    	</div>

	    	<div id="cancion1" class="can">
	    	<span id="num">4</span>
	    	<div class="cont" data-toggle="tooltip" data-placement="top" title="Añadir a mis favoritos"><span class="glyphicon glyphicon-heart-empty" id="gl"></span></div>
	    	<div id="btnplay" class="oculto"><i class="fa fa-play"></i></div>
	    	<div class="nobcancion"><a href="javascript:;" id="nomb">Musica mia</a></div>
	    	<div class="ub" data-toggle="tooltip" data-placement="top" title="Ver menu"><span id="per" class="glyphicon glyphicon-option-horizontal"></span></div>
	    	</div>

	    </div>
	    <div id="btnmas"><a id="mas" href="javascript:;">Ver más canciones ></a></div>
	</div>

	<a id="link2" href="javascript:;">Playlists ></a>
	<div id="playlist">
	  <div class="content1">	
	   <div class="play">	
	   </div>
	   <a id="npl">Verano Gallo 2016</a>
	   <span id="cantidad_canciones">26 canciones-963 fans</span>
	   <div class="opcion1"><span id="per" class="glyphicon glyphicon-option-horizontal"></span></div>
	   <span class="glyphicon glyphicon-heart-empty"></span>
	  </div>
	</div>
     
     <a id="link3" href="javascript:;">Último lanzamiento ></a>
	<div id="lanzamiento">
		<div id="ultimolanzamiento">
			<div class="opciones">
				<div id="reproducir">
					<i class="fa fa-play"> </i>
				</div>
				<div id="favorito">
					<i class="fa fa-heart"></i>
				</div>
				<div id="menudes">
					<i class="fa fa-ellipsis-h"></i>

				</div>
			</div>
		</div>
		<a id="album">Sueños de jade</a>
		<span id="salida">11-02-2016</span>
	<div id="listac">
		<?php 
		for ($i=1; $i < 7; $i++) 
		{ 
		echo'<div id="musicaalbum">
	    	<div id="cancione" class="cann">
	    	<span id="num">'.$i.'</span>
	    	<div id="btnplay1" class="oculto"><i class="fa fa-play"></i></div>
	    	<div class="cont1" data-toggle="tooltip" data-placement="top" title="Añadir a mis favoritos"><span class="glyphicon glyphicon-heart-empty" id="gl1"></span></div>
	    	<a href="javascript:;" id="nomb">Musica mia</a>
	    	<div class="ub1" data-toggle="tooltip" data-placement="top" title="Ver menu"><span id="per" class="glyphicon glyphicon-option-horizontal"></span></div>
	    	</div>
	    </div>';
	    }
	    ?>
	    <div id="musicaalbum">
	    	<div id="cancione1" class="cann">
	    	<span id="num">7</span>
	    	<div id="btnplay1" class="oculto"><i class="fa fa-play"></i></div>
	    	<div class="cont1" data-toggle="tooltip" data-placement="top" title="Añadir a mis favoritos"><span class="glyphicon glyphicon-heart-empty" id="gl1"></span></div>
	    	<a href="javascript:;" id="nomb">Musica mia</a>
	    	<div class="ub1" data-toggle="tooltip" data-placement="top" title="Ver menu"><span id="per" class="glyphicon glyphicon-option-horizontal"></span></div>
	    	</div>
	    </div>
	</div>
	    <div id="btnficha"><a id="mas" href="javascript:;">Acceder a la ficha completa del album ></a></div>
	</div>

	<a id="link4" href="javascript:;">Artistas similares ></a>
	<div id="similares">
    <?php  
     for ($i=1; $i < 7; $i++) 
     { 
	  echo'<div class="contentsimi">	
	  	 <div class="artist">	
	     </div>
	     <a id="nartist">Artista'.$i.'</a>
	     <span id="nfans">66,000 fans</span>
	     <div class="glp">
	     <div class="opcion"><span id="per" class="glyphicon glyphicon-option-horizontal"></span></div>
	     <span class="glyphicon glyphicon-heart-empty"></span>
	     </div>
	  </div>';
	}
	?>
	<div id="btnmas_artist"><a id="mas" href="javascript:;">Ver más artistas ></a></div>
	</div>

	<p id="pa1">Álbumes</p><div id="separador"></div>
    <div id="albumes">
    	 <div id="meu">
  <?php
    for ($i=1; $i <= 4 ; $i++) 
    {
    echo '<div id="artista" class="art">
             <div class="opt">
                <div class="rplay"><i class="fa fa-play"> </i></div>
                <div class="ffav"><i class="fa fa-heart"> </i></div>
                <div class="moptions"><i class="fa fa-ellipsis-h"> </i></div>
             </div>
          </div>'; 
    echo '<tr>
	       <td><a id="nombre_album">Sueños de jade</a></td>
	       <td><span id="nombre_artista">De Alex Nahual</span></td>
	       <td><span id="fecha_publicacion">Publicado el 11-02-2016</span></td>
         </tr>';
    }
  ?>
   </div>
    </div>
<p id="single">Singles</p><div id="separador"></div>
    <div id="albumes">
    	 <div id="meu">
  <?php
    for ($i=1; $i <= 1 ; $i++) 
    {
    echo '<div id="artista" class="art">
<div class="opt">
                <div class="rplay"><i class="fa fa-play"> </i></div>
                <div class="ffav"><i class="fa fa-heart"> </i></div>
                <div class="moptions"><i class="fa fa-ellipsis-h"> </i></div>
             </div>
          </div>'; 
    echo '<tr>
	       <td><a id="nombre_album">Sueños de jade</a></td>
	       <td><span id="nombre_artista">De Alex Nahual</span></td>
	       <td><span id="fecha_publicacion">Publicado el 11-02-2016</span></td>
         </tr>';
    }
  ?>
   </div>
    </div>

</div>

</center>

</div>
</center>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/discografia.js"></script>
</body>
</html>