
<!DOCTYPE html>
<html>
<head>
	<title>Info</title>
	<link rel="icon" href="img/fav.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/info.css">
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
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="barrah">
				<div id="imagen"> <a href="index.php"><img src="img/deezerr.png" id="fimage"></a></div>
				<div class="cell">
					<table class="nav">
						<tr>
							<td  class="lineas" id="fun" >
								<a  href="#"  id="q" onclick="borde('fun','dis','ofer','empr');ifra3(1);"
								class="direc">FUNCIONALIDADES</a>
							</td>
							<td id="dis"   class="lineas">
								<a href="#" id="qq" onclick="borde('dis','fun','ofer','empr');ifra3(2);" 
								class="direc">DISPOSITIVOS</a>
							</td>
							<td id="ofer"   class="lineas">
								<a href="#" id="qqq" onclick="borde('ofer','fun','dis','empr');ifra3(3);"
							 	class="direc">OFERTAS</a>
							</td>
							<td id="empr"    class="lineas">
								<a href="#" id="qqqq" onclick="borde('empr','fun','dis','ofer');ifra3(4);"
								class="direc">EMPRESA</a>
								<ul id="lista">
									<a href="javascript:;"><li><span>ACERCA DE</span> </li></a>
									<a href="javascript:;"><li><span>TRABAJOS</span> </li></a>
									<a href="javascript:;"><li><span>PRENSA</span></li></a> 
									<a href="javascript:;"><li><span>SELLOS Y ARTISTAS</span></li></a> 
									<a href="javascript:;"><li><span>AYUDA</span> </li></a>
								</ul>
							</td>
						</tr>

		</table>
	</div>
</div>

<input type="text" id="ventana" style="display: none;" value='<?php if(isset($_GET["accion"])){
	echo $_GET["accion"]; 
} ?>'>
<div class="contenidd" id="ifra3">
	
</div>
</div>
</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>