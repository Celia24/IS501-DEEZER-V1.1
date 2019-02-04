<!DOCTYPE html>
<html>
<head>
	<title>Top-Canciones</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/topcanciones.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fantastic/css/font-awesome.min.css">
</head>
<body>
<center>
 <div id="contenedor">
	<input type="text" placeholder="Buscar en los resultados" id="search">
	<div id="btnescuchar">
		<div id="pitipu"><span class="glyphicon glyphicon-play app"></span></div>
		<p id="parse">Escuchar</p>
	</div>

	<div id="canciones">
	        <div id="infoparte">
	        	<div id="fa1" class="displa"><span id="info" class="para">#</span></div>
	            <div id="fa2" class="displa"><span id="info" class="para">Canción</span></div>
	            <div id="fa3" class="displa"><span id="info" class="para">Artista</span></div>
	            <div id="fa4" class="displa"><span id="info" class="para">Álbum</span></div>
	            <div id="fa5" class="displa"><span id="info" class="para">Pop.</span></div>
	            <div id="fa6" class="displa"><span id="info" class="para">D.</span></div>
	            <div id="fa7"><input type="checkbox"></div>
	        </div>
	  <?php
           for ($i=1 ; $i < 49 ; $i++) 
           { 
       	    echo '<div id="listcanciones" class="cat">
	                   <div id="cont1"><span>'.$i.'</span>
	                   <div id="btnplay" class="oculto"><i class="fa fa-play"></i></div>
	                   </div>
	                   <div id="cont2" class="aparca" data-toggle="tooltip" data-placement="top" title="Añadir a mis favoritos"><span class="glyphicon glyphicon-heart-empty"></span></div>
	                   <div id="cont3"><a id="nomb" class="songs">Donkey Kong</a></div>
                       <div id="cont4" class="aparece" data-toggle="tooltip" data-placement="top" title="Añadir a una playlist"><span id="plus">+</span></div>
	                   <div id="cont5" class="aparece" data-toggle="tooltip" data-placement="top" title="Ver menu"><span class="glyphicon glyphicon-option-horizontal"></span></div>
	                   <div id="cont6"><a id="artista" class="songs">Rare</a></div>
                       <div id="cont7"><a id="album" class="songs">Donkey returns</a></div>
	                   <div id="cont8" data-toggle="tooltip" data-placement="left" title="Popularidad: 10/10">
	                   <div id="popular"></div>
	                   <div id="popular"></div>
	                   <div id="popular"></div>
	                   <div id="popular"></div>
	                   <div id="popular"></div>
	                   <div id="popular"></div>
	                   <div id="popular"></div>
	                   </div>
	                   <div id="cont9"><span class="duracion">04:53</span></div>
                       <div id="cont10"><input type="checkbox"></div>  
                    </div>';
            }
	    ?>
	    <div id="listcanciones1" class="cat">
	                   <div id="cont1"><span>49</span>
	                   <div id="btnplay" class="oculto"><i class="fa fa-play"></i></div>
	                   </div>
	                   <div id="cont2" class="aparca" data-toggle="tooltip" data-placement="top" title="Añadir a mis favoritos"><span class="glyphicon glyphicon-heart-empty"></span></div>
	                   <div id="cont3"><a id="nomb" class="songs">Donkey Kong</a></div>
                       <div id="cont4" class="aparece" data-toggle="tooltip" data-placement="top" title="Añadir a una playlist"><span id="plus">+</span></div>
	                   <div id="cont5" class="aparece" data-toggle="tooltip" data-placement="top" title="Ver menu"><span class="glyphicon glyphicon-option-horizontal"></span></div>
	                   <div id="cont6"><a id="artista" class="songs">Rare</a></div>
                       <div id="cont7"><a id="album" class="songs">Donkey returns</a></div>
	                   <div id="cont8" data-toggle="tooltip" data-placement="left" title="Popularidad: 10/10">
	                   <div id="popular"></div>
	                   <div id="popular"></div>
	                   <div id="popular"></div>
	                   <div id="popular"></div>
	                   <div id="popular"></div>
	                   <div id="popular"></div>
	                   <div id="popular"></div>
	                   </div>
	                   <div id="cont9"><span class="duracion">04:53</span></div>
                       <div id="cont10"><input type="checkbox"></div>  
                    </div>
	</div>
  </div>
</center> 
<div id="btnplay"><i class="fa fa-play"></i></div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/topcanciones.js"></script>
</body>
</html>
