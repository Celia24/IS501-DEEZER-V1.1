<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="vieport" content="width = device-width, initial-scale=1">
	<title>Conectarse</title>
<link href="css/bootstrap.css" rel="stylesheet">

</head>
<body style="background-image:url(img/Conectarse3IMG.jpg); color:#ffffff;background-repeat:no-repeat;background-size:cover;">
	<div class="container-fluid">
	    <div class="row"> 
	    	<br>
	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        	<img src="img/logoDeezer.png" width="180" height="40">
	            <button type="button" onclick="window.open('registro.php','_self')" style="float: right;" class="btn btn-danger">Registrarse</button>
	        </div>
	        <center>
	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="padding-top: 20px">   
			    <font size=60>¿Qué vas a escuchar hoy?</font><br>
			    <font size=5>Escucha las canciones de tu Flow en Deezer <br>
				y descubre las colecciones de música por género.<br>
			    <div>
			    	<br> 
				    <button type="summit" class="btn btn-default btn-primary" style="width: 150px; height: 40px;float: center"><span style="float: left"><img src="img/facebook.svg" width="27" height="27"> Facebook</span> </button>
				    <button type="summit" class="btn btn-default btn-danger" style="width: 150px;height: 40px;float: center;"><span style="float: left"><img src="img/google.svg" width="30" height="20"> Google+<span></button>
				</div>
				<div>
					<br>
					<form>
						<input type="text" id="nombreu" data-trigger="focus" data-html="true"  data-toggle="popover" data-content="<h5 style='color:black'>Correo de la forma: Name@example.xxx</h5>" data-container="body" data-placement="left"  class="form-control" style="width: 300px;height: 40px;margin-bottom: 3px;float: center;" placeholder="Correo Electronico" >
				    	<input type="password" id="contrasena" class="form-control" data-trigger="focus" style="width: 300px;height: 40px;float: center;" placeholder="Contraseña" data-toggle="popover" data-html="true" data-content="<h5 style='color:black'>-Usa [6-15] caracteres</h5>" data-placement="left" data-container="body"  >
					</form>
	   			</div> 
	   			<div id="resultado">
	   			</div>
			    <button id="btn-conectarse" class="btn btn-lg btn-primary" type="submit" style="padding:7px;width: 300px;margin-left: 8px">Conectarse</button>
			    <br>
	    	</div>
	    	</center>
		</div>
	</div> 
	 <script type="text/javascript" src="js/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>
        <script src="js/login.js"></script>
        <script type="text/javascript">
        	$(function () {
    $('[data-toggle="popover"]').popover();
      });
        </script>
</body>
</html>