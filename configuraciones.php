<!DOCTYPE html>
<html>
<head>
	<title>configuraciones</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/configuraciones.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
	<style type="text/css">
		body{
			height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
		}
	</style>
	
</head>
<body>
	
<div class="container-fluid">
	<div class="row">
		
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 contenedor">
			<ul class="bar" >
				<li><a id="dis" onclick="ifra2(3);cambiarborde('dis','not','dat')" href="#">Mis dispositivos conectados</a></li>
				<li><a id="not" onclick="ifra2(2);cambiarborde('not','dis','dat')" href="#">Notificaciones y compartir</a></li>
				<li><a id="dat" class="borderr" onclick="ifra2(1);cambiarborde('dat','dis','not')" href="#">Mis datos</a></li>
			</ul>
		</div>
		<div id="ifra2">
			<iframe class="contenido2" src="informacion.php" frameborder="0"></iframe>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/index.js"></script>
	
</body>
</html>