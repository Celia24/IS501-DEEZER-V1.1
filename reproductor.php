<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<title>Reproductor</title>
	<link rel="stylesheet" type="text/css" href="css/estilosreproductor.css">
</head>
<body>
<div id="player">
    <img src="" class="cover" id="art" />
    <div class="trackinfo">
        <p id="title"></p>
        <p id="artist"></p>
        <div id="progress"></div>
    </div>
    <div id="track">
        
        <div id="handler"></div>
    </div>
    <div class="container">
        <div class="info">
            <div class="cont">
                <button id="prev" class="nav">
                    <img src="img/atras.png" />
                </button>
                <button id="play" class="nav1">
                    <img class="pad" src="img/play.png" />
                </button>
                <button id="next" class="nav2">
                    <img src="img/siguiente.png" />
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/reproductor sonido.js"></script>
</body>
</html>
