<?php
session_start();
 //$_SESSION['codigo_usuario']=1; 
if(!isset($_SESSION['codigo_usuario']))
	header('Location:http://localhost/IS501-DEEZER-V1.1/conectarse.php');

include("class/class-conexion.php");
$conexion = new Conexion();
$conexion->establecerConexion();
$foto=$conexion->ejecutarInstruccion("SELECT *
	FROM TBL_USUARIOS 
	WHERE CODIGO_USUARIO = ".$_SESSION["codigo_usuario"]."");

$albums=$conexion->ejecutarInstruccion("SELECT A.CODIGO_ALBUM,A.NOMBRE_ALBUM,NVL(B.NOMBRE_ARTISTAS,' ') AS NOMBRE_ARTISTAS,A.COVER
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
	GROUP BY A.CODIGO_ALBUM,A.NOMBRE_ALBUM,B.NOMBRE_ARTISTAS,A.COVER");

$paylist=$conexion->ejecutarInstruccion("SELECT A.CODIGO_PLAYLIST,C.NOMBRE_USUARIO,A.NOMBRE_PLAYLIST,A.NUMERO_SEGUIDORES,A.COVER
	FROM TBL_PLAYLIST A
	INNER JOIN(SELECT CODIGO_SEGUIDOR,CODIGO_PLAYLIST
	FROM TBL_SEGUIDORES_PLAYLIST
	WHERE CODIGO_SEGUIDOR=".$_SESSION['codigo_usuario'].") B
	ON(A.CODIGO_PLAYLIST=B.CODIGO_PLAYLIST)
	LEFT JOIN (SELECT A.CODIGO_PLAYLIST,B.NOMBRE_USUARIO
		FROM TBL_PLAYLIST_X_USUARIO A
		LEFT JOIN TBL_USUARIOS B
		ON(A.CODIGO_USUARIO=B.CODIGO_USUARIO)) C
		ON(A.CODIGO_PLAYLIST=C.CODIGO_PLAYLIST)");

function cortar($text){

	if ((strlen($text)>25)) {
		echo substr($text, 0, 25)."..."; 
	}else{
		echo $text;
	}

} 

function cortar2($text){

	if ((strlen($text)>28)) {
		echo substr($text, 0, 28)."..."; 
	}else{
		echo $text;
	}

}
function cortar3($text){

	if ((strlen($text)>20)) {
		echo substr($text, 0, 20)."..."; 
	}else{
		echo $text;
	} 

}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Deezer</title>
	<link rel="icon" href="img/fav.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/personalizado.css">
	<link href="css/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
	<style type="text/css">
	body{
		height: 100%;
		margin: 0;
		padding: 0;
		overflow: hidden; 
	}
	ul{ 
		list-style:none;
	}
	a:link{
		text-decoration:none;

	}
	li{ 
		color: red;
	}

</style>

</head> 
<body>
	
	<div  class="col-lgj-2" id="barrra">
		<img src="img/deezerr.png" id="fimage">
		<input type="text" class="form-control" value="1" placeholder="Buscar" id="buscador">
		
		<ul class="nav" id="nav">

			<li  id="start" onclick="reload('hijoo');ifra(3);arreglo('start','first','mod','first3','start2','first2','start4','first4');" ><a href="#"  class="si"> <p id="first" >INICIO</p></a>


			</li>
			<li onclick="ifra(2);" ><a id="start2" href="#" class="si" onclick="reload('hijoo');arreglo('start2','first2','start','first','mod','first3','start4','first4');"><p id="first2">RECOMENDACIONES</p></a>
			</li>
			<hr>
			<li onclick="reload('hijoo')"  id="li3">
				<a id="mod" href="#" class="si" onclick="arreglo('mod','first3','start','first','start2','first2','start4','first4');"">
					<?php 
					while ($row = $conexion->obtenerRegistro($foto)) { ?>
					<span id="first3"><img src="<?php echo $row['FOTO']; }?>" width="24" height="24" style="border-radius: 50%;margin-right: 5px"> <span id="aayuda">Mi Musica</span> </span>
				</a>



			</li>
			<div class="hijo" id="hijo"  >
				<ul class="oculto" >
					<p class="titulo1">Cuenta<p>
						<hr>
						<li onclick="cambiar();reload('hijo');ifra(1);"><a href="#">
							<span class="glyphicon glyphicon-user icon "></span>
							<span class="titulo">Ajustes de la cuenta</span>
							<span class=" glyphicon glyphicon-chevron-right flecha"></span>
						</a></li>
						<li onclick="cambiar();reload('hijo');" ><a href="#">
							<span class="glyphicon glyphicon-question-sign icon" style="background-color: #76d016"></span>
							<span class="titulo">Ayuda</span>
							<span class=" glyphicon glyphicon-chevron-right flecha"></span>
						</a>
					</li>
					<li  onclick="cambiar();reload('hijo');"><a href="#">
						<span class="glyphicon glyphicon-barcode icon" style="background-color: #8d05ad"></span>
						<span class="titulo">Activar un código</span>
						<span class=" glyphicon glyphicon-chevron-right flecha"></span>
					</a></li>
					<p class="titulo1">Audio<p>
						<hr>
						<li ><a href="#"><input type="checkbox" name="chk1" id="chk1"><label for="chk1"><span>Reproductor HTML5</span> </label></a></li>
						<li><a href="#"><input type="checkbox" name="chk2" id="chk2"><label for="chk2"><span>Alta Calidad</span>
						</a></li>
						<li><a href="#">Fader</a></li>
						<p class="titulo1">¿Qué es Deezer?</p>
						<hr>
						<li onclick="reload('hijo');window.open('deezerinfo.php?accion=1','_blank');"><a href="#">Planes de Suscripción<span class=" glyphicon glyphicon-chevron-right flecha"></span></a></li>
						<li onclick="reload('hijo');window.open('deezerinfo.php?accion=2','_blank');"><a href="#">Quiénes somos<span class=" glyphicon glyphicon-chevron-right flecha"></span></a></li>
						<li onclick="reload('hijo');window.open('deezerinfo.php?accion=3','_blank');"><a href="#">Ventajas<span class=" glyphicon glyphicon-chevron-right flecha"></span></a></li>
						<li><a href="#">Trabajos<span class=" glyphicon glyphicon-chevron-right flecha"></span></a></li>
						<hr>

						<button class="cerrarsesion" onclick="window.open('cerrarSesion.php','_self');" type="button"><span class="label">Desconectarse</span></button>

					</ul>

				</div>
				<div id="icon2"><svg class="svg-icon icon2 svg-icon-settings settings" onclick="ver('hijo','hijo2','hijo3','hijo4','hijo5','hijo6');"  viewBox="0 0 12 12" role="img" aria-labelledby="ariaIconLabel1" height="15" width="15"><g><path d="M12,6.66665365 L12,5.33334049 L10.5489016,4.97053954 C10.4304016,4.44503537 10.2228507,3.9544824 9.94365134,3.51272632 L10.7141009,2.22871398 L9.77119813,1.28595766 L8.48725024,2.0563135 C8.04550002,1.77706141 7.55490017,1.56951053 7.02940187,1.45101047 L6.66664779,0 L5.33334635,0 L4.97059813,1.4509636 C4.44504709,1.56941678 3.95444724,1.77701454 3.51265015,2.05626663 L2.22880187,1.28596352 L1.28589907,2.22871984 L2.05624905,3.51263257 C1.77699696,3.95443552 1.56944608,4.44504123 1.45099876,4.97059227 L0,5.33334049 L0,6.66665365 L1.45099876,7.02940773 C1.56944608,7.55491189 1.7770497,8.04556448 2.05624905,8.48736743 L1.28589907,9.77122743 L2.22880187,10.7140365 L3.51265015,9.94373337 C3.9544531,10.2229855 4.44505295,10.4305363 4.97059813,10.5489895 L5.33334635,12 L6.66664779,12 L7.02939601,10.5489368 C7.55484744,10.4304367 8.04549416,10.2228859 8.48724438,9.94368064 L9.77119227,10.7140365 L10.7140951,9.77122743 L9.94364548,8.48726782 C10.2228976,8.04546487 10.4303957,7.55491189 10.5488958,7.02940773 L12,6.66665365 L12,6.66665365 Z M3.5,6 C3.5,4.61928525 4.61930254,3.5 5.99995331,3.5 C7.38069746,3.5 8.5,4.61928525 8.5,6 C8.5,7.38071475 7.38069746,8.5 5.99995331,8.5 C4.61930254,8.5 3.5,7.38071475 3.5,6 L3.5,6 Z"></path></g></svg></div>

				<li>
					<center><button class="boton">+ SUSCRIBIRSE</button></center>
				</li>
				<li id="start4" onclick="reload('hijoo');arreglo('start4','first4','start','first','mod','first3','start2','first2');" >
					<a href="#" class="si" >
						<span id="first4">
							<svg class="svg-icon icon3 svg-icon-love" viewBox="0 0 12 12" aria-hidden="true" height="16" width="16"><g><path d="M6.00011325,2.5 C6.00011325,2.5 5.00009438,1 3.25,1 C1.66669813,1 1.65327318e-16,2.25 0,4.5 C1.65327318e-16,7.5 6,11.5 6,11.5 C6,11.5 11.9999997,7.5 12,4.5 C12.0000002,2.25 10.3335284,1 8.75,1 C7.00013213,1 6.00011325,2.5 6.00011325,2.5 Z"></path></g></svg> <span style="margin-left: -4px;" >Canciones favoritas</span></span >  
						</a>

					</li>



					<li  id="li6" onclick="li('li6');ver('hijo2','hijo','hijo3','hijo4','hijo5','hijo6')">
						<a href="#" class="si">
							<span>
								<svg class="svg-icon icon3 svg-icon-playlist" viewBox="0 0 12 12" aria-hidden="true" height="16" width="16"><g><path d="M8,9.99224439 C8,11.1010972 6.88071187,12 5.5,12 C4.11928813,12 3,11.1010972 3,9.99224439 C3,8.88339158 4.11928813,7.98448877 5.5,7.98448877 C6.06280296,7.98448877 6.58216973,8.13384364 7,8.38589285 L7,2.36277306 L7,0.75552108 C7,0.201673187 7.42629719,-0.118924155 7.95813424,0.0412456698 L12,1.25850747 L12,3.26731057 C12,3.82115846 11.5737028,4.1417558 11.0418658,3.98158598 L8,3 L8,9.99224439 Z M0,0 L6,0 L6,1 L0,1 L0,0 L0,0 Z M0,2 L6,2 L6,3 L0,3 L0,2 L0,2 Z M0,4 L6,4 L6,5 L0,5 L0,4 L0,4 Z"></path></g></svg></span>Playlists
							</a>



						</li>
						<div class="hijo2" id="hijo2">
							<div class="margen2">
								<span onclick="playlists()" class="link">
									<span class="color-primary pay"></span>
									<span class="azz"> 
										<span> Playlists</span>
										<span class="glyphicon glyphicon-chevron-right tamano" aria-hidden="true"></span>
									</span>
								</span>
								<div class="fil">
									<input type="text" placeholder="Filtrar" class="filtrar form-control">
								</div>
								<div class="like">
									<span class="likeselect">
										<span class="glyphicon glyphicon-align-justify"></span>
										<span class="glyphicon glyphicon-triangle-bottom color-primary tamano2"></span>
									</span>
									<table class="listad">
										<tr><td>A - Z </td></tr>
										<tr><td>Actualizado recientemente</td></tr>
										<tr><td>Agregado recientemente</td></tr>
										<tr><td>Tipo</td></tr>
										<tr><td>Mas escuchado</td></tr>
									</table>
								</div>
							</div>
							<div class="lineahr"></div>
							<div class="plista">
								<table class="playl">
									<tr id="modal-on">
										<td><div class="addplay"><span class="glyphicon glyphicon-plus add"></div></td>
											<td class="espacio"><span class="principal">Crear una playlist</span></td>
										</tr>

										<?php
										 while ($row = $conexion->obtenerRegistro($paylist)) {
											echo 
											'<tr class="separacion"></tr>
											<tr>
											<td><img src="'.$row['COVER'].'" class=\'repo\' width="56" height="56" onclick="play('.$row['CODIGO_PLAYLIST'].');"></td>
											<td class="espacio">
											<span class="col-xs-12 principal2 playname"><span class="userr" onclick="play('.$row['CODIGO_PLAYLIST'].');">';echo cortar("".$row['NOMBRE_PLAYLIST'].""); echo '</span></span>
											<span class="col-xs-12 playuser">de <span class="playuser2">';echo cortar2("".$row['NOMBRE_USUARIO'].""); echo '</span></span>
											<span class="glyphicon glyphicon-option-horizontal xxx" data-trigger="manual"  data-placement="auto right"  data-toggle="popover"   data-html="true" data-content="
											<table class=\'help\'>
											<tr>
											<td><img src=\''.$row['COVER'].'\' width=\'56\' height=\'56\' onclick=\'play('.$row['CODIGO_PLAYLIST'].');\'></td>
											<td><span class=\'col-xs-12 principal3 playname2\'><span class=\'userr\' onclick=\'play('.$row['CODIGO_PLAYLIST'].');\'>';echo cortar3("".$row['NOMBRE_PLAYLIST'].""); echo '</span></span>
											<span class=\'col-xs-12 playuser3\'>de <span class=\'playuser2\'>';echo cortar3("".$row['NOMBRE_USUARIO'].""); echo '</span></span></td>
											</tr>
											</table>
											<div class=\'lineahr2\'></div>
											<table id=\'otros\'>
											<tr>
											<a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-option-horizontal\'  aria-hidden=\'true\'><span class=\'inform2\'>Escuchar justo despues</span></td><a/>
											</tr> 
											<tr>
											<a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-list-alt\'  aria-hidden=\'true\'><span class=\'inform2\'>Aadir a la lista de espera</span></td><a/>
											</tr>  
											<tr>
											<a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-share gly\'  aria-hidden=\'true\'></span><span class=\'inform\'>Compartir</span></td><a/>
											</tr> 
											<tr>
											<a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-remove gly\'  aria-hidden=\'true\'></span><span class=\'inform\'>Eliminar de Mi Musica</span></td><a/>
											</tr> 	
											<tr>
											<a href=\'javascript:;\'><td><span class=\'inform\'>Perfil de usuario</span><span class=\' glyphicon glyphicon-chevron-right derecha\'></span></td><a/>
											</tr> 
											</table>

											"></span>
											</td>
											</tr>';
										}
										?>


									</table>
								</div>
							</div>


							<li id="li7" onclick="li('li7');ver('hijo3','hijo2','hijo','hijo4','hijo5','hijo6');">
								<a href="#" class="si">
									<span>
										<svg class="svg-icon icon3 svg-icon-album" viewBox="0 0 12 12" aria-hidden="true" height="16" width="16"><g><path d="M6,12 C2.68630007,12 0,9.31370447 0,6.00000293 C0,2.68627795 2.68630007,0 6,0 C9.31369993,0 12,2.68627795 12,6.00000293 C11.9999941,9.31370447 9.31369993,12 6,12 L6,12 L6,12 Z M6,2.99999854 C4.34315297,2.99999854 3.00000293,4.34313751 3.00000293,5.99999707 C3.00000293,7.65684491 4.34315297,8.99999561 6,8.99999561 C7.65684703,8.99999561 8.99999707,7.65684491 8.99999707,5.99999707 C8.99999707,4.34314337 7.65684703,2.99999854 6,2.99999854 L6,2.99999854 L6,2.99999854 Z M4,6 C4,4.89544508 4.89545094,4 6,4 C7.10454906,4 8,4.89544508 8,6 C8,7.10454906 7.10454906,8 6,8 C4.89545094,8 4,7.10454906 4,6 L4,6 Z M5,6 C5,6.55229635 5.44770365,7 6,7 C6.55229635,7 7,6.55229635 7,6 C6.99998828,5.44769193 6.55229635,5 6,5 C5.44770365,5 5,5.44769193 5,6 L5,6 Z"></path></g></svg></span>Albumes
									</a>

								</li>
								<div class="hijo3" id="hijo3">

									<div class="margen3">
										<span onclick="albums()" class="link">
											<span class="color-primary albx"></span>
											<span class="azz"> 
												<span> Albumes</span>
												<span class="glyphicon glyphicon-chevron-right tamano" aria-hidden="true"></span>
											</span>
										</span>
										<div class="fil">
											<input type="text" placeholder="Filtrar" class="filtrar form-control">
										</div>
										<div class="like">
											<span class="likeselect">
												<span class="glyphicon glyphicon-align-justify"></span>
												<span class="glyphicon glyphicon-triangle-bottom color-primary tamano2"></span>
											</span>
											<table class="listad">
												<tr><td>A - Z (por artista)</td></tr>
												<tr><td>A - Z (por album)</td></tr>
												<tr><td>Añadido recientemente</td></tr>
												<tr><td>Mas escuchados</td></tr>
											</table>
										</div>
									</div>
									<div class="lineahr"></div>
									<div class="plista">
										<table class="playl">
											<tr onclick="albums()">
												<td><div class="addplay"><span class="glyphicon glyphicon-record add2"></div></td>
													<td class="espacio"><span class="principal">Ver todos los albums</span></td>
												</tr>

												<?php
												while ($row = $conexion->obtenerRegistro($albums)) {
													echo 
													'<tr class="separacion"></tr>
													<tr>
													<td><img src="'.$row['COVER'].'" width="56" height="56" onclick="playg('.$row['CODIGO_ALBUM'].');"></td>
													<td class="espacio">
													<span class="col-xs-12 principal2 playname"><span class="userr" onclick="playg('.$row['CODIGO_ALBUM'].');">';echo cortar("".$row['NOMBRE_ALBUM'].""); echo '</span></span>
													<span class="col-xs-12 playuser">de <span class="playuser2">';echo cortar2("".$row['NOMBRE_ARTISTAS'].""); echo '</span></span>
													<span class="glyphicon glyphicon-option-horizontal xxx" data-trigger="manual"  data-placement="auto right"  data-toggle="popover"   data-html="true" data-content="
													<table class=\'help\'>
													<tr>
													<td><img src=\''.$row['COVER'].'\' width=\'56\' height=\'56\' onclick=\'playg('.$row['CODIGO_ALBUM'].');\'></td>
													<td><span class=\'col-xs-12 principal3 playname2\'><span class=\'userr\' onclick=\'playg('.$row['CODIGO_ALBUM'].');\'>';echo cortar3("".$row['NOMBRE_ALBUM'].""); echo '</span></span>
													<span class=\'col-xs-12 playuser3\'>de <span class=\'playuser2\'>';echo cortar3("".$row['NOMBRE_ARTISTAS'].""); echo '</span></span></td>
													</tr>
													</table>
													<div class=\'lineahr2\'></div>
													<table id=\'otros\'>
													<tr>
													<a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-option-horizontal\'  aria-hidden=\'true\'><span class=\'inform2\'>Escuchar justo despues</span></td><a/>
													</tr> 
													<tr>
													<a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-list-alt\'  aria-hidden=\'true\'><span class=\'inform2\'>Aadir a la lista de espera</span></td><a/>
													</tr>  
													<tr>
													<a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-share gly\'  aria-hidden=\'true\'></span><span class=\'inform\'>Compartir</span></td><a/>
													</tr> 
													<tr>
													<a href=\'javascript:;\'><td><span class=\'glyphicon glyphicon-remove gly\'  aria-hidden=\'true\'></span><span class=\'inform\'>Eliminar de Mi Musica</span></td><a/>
													</tr> 	
													<tr>
													<a href=\'javascript:;\'><td><span class=\'inform\'>Reportar un problema</span></td><a/>
													</tr> 
													</table>

													"></span>
													</td>
													</tr>';
												}
												?>


											</table>
										</div>

									</div>


									<li  id="li8" onclick="li('li8');ver('hijo4','hijo2','hijo3','hijo','hijo5','hijo6');">
										<a href="#"  class="si">
											<span>
												<svg class="svg-icon icon3 svg-icon-time" viewBox="0 0 12 12" aria-hidden="true" height="16" width="16"><g><path d="M11,6 C11,3.23857625 8.76142375,1 6,1 C3.23857625,1 1,3.23857625 1,6 C1,8.76142375 3.23857625,11 6,11 C8.76142375,11 11,8.76142375 11,6 Z M7,6.50952148 L7,3.49047852 C7,3.21505737 6.77614237,3 6.5,3 C6.23193359,3 6,3.21959471 6,3.49047852 L6,6 L4.49538898,6 C4.2157526,6 4,6.22385763 4,6.5 C4,6.76806641 4.2217932,7 4.49538898,7 L6.50461102,7 C6.64282453,7 6.76543159,6.94531282 6.85409473,6.85665508 C6.94267961,6.76617647 7,6.64418681 7,6.50952148 Z" fill-rule="evenodd"></path></g></svg></span>Actividades
											</a>

										</li>
										<div class="hijo4" id="hijo4">
											<table id="three" border="1">
												<tr>
													<td  id="act" style="background-color: #fff" onclick="seleccion('act','not','sig');">
														<span class="glyphicon glyphicon-time same" style="color: blue" data-toggle="tooltip" data-placement="bottom" title="Actividad"></span>
													</td>
													<td id="not" onclick="seleccion('not','act','sig');">
														<span class="glyphicon glyphicon-music same" data-toggle="tooltip" data-placement="bottom" title="Notificaciones"></span>
													</td>
													<td id="sig" onclick="seleccion('sig','not','act');">
														<span class="glyphicon glyphicon-user same" data-toggle="tooltip" data-placement="bottom" title="Siguiendo"></span>
													</td>

												</table>
												<div class="titulo-descr">
													<span class="subt-descr">Actividad</span>

												</div>
												<div class="lineahr3"></div>
												<div class="contenido">
													<img src="img/friends.png" class="fried" width="56" height="56">
													<div>
														<span class="alone">No estes solo.</span>
														<span class="conec">Conéctate a tus redes sociales para encontrar<br> a tus amigos.</span>
													</div>
													<div>
														<table class="botones">
															<tr>
																<td>
																	<button class="btn-social facebook">
																		<img src="img/facebook.svg" width="20" height="20" >
																		<span class="letters face">Facebook</span>
																	</button>
																</td>
															</tr>
															<tr class="separacion2"></tr>
															<tr>
																<td>
																	<button class="btn-social twitter">
																		<img src="img/twitter.svg" width="18" height="18">
																		<span class="letters twi">Twitter</span>
																	</button>
																</td>
															</tr>
															<tr class="separacion2"></tr>
															<tr>
																<td>
																	<button class="btn-social google">
																		<img src="img/google.svg" width="20" height="20">
																		<span class="letters goo">Google+</span>
																	</button>
																</td>
															</tr>
														</table>
													</div>

												</div>
											</div>


											<li  id="li9" onclick="li('li9');ver('hijo5','hijo2','hijo3','hijo4','hijo','hijo6')">
												<a href="#" class="si">
													<span>
														<svg class="svg-icon icon3 svg-icon-app" viewBox="0 0 12 12" aria-hidden="true" height="16" width="16"><g><path d="M0.375518305,6.90836424 C-0.126157409,6.40668852 -0.124187159,5.59134123 0.375518305,5.09163576 L5.09163576,0.375518305 C5.59331148,-0.126157409 6.40865877,-0.124187159 6.90836424,0.375518305 L11.6244817,5.09163576 C12.1261574,5.59331148 12.1241872,6.40865877 11.6244817,6.90836424 L6.90836424,11.6244817 C6.40668852,12.1261574 5.59134123,12.1241872 5.09163576,11.6244817 L0.375518305,6.90836424 L0.375518305,6.90836424 Z M8.56634425,6.00000601 L4.9734623,3.9469246 L4.9734623,8.0530754 L8.56634425,6.00000601 L8.56634425,6.00000601 Z"></path></g></svg></span>Aplicaciones
													</a> 

												</li>
												<div class="hijo5" id="hijo5">
													<span class="azul">0 <span class="apps">Aplicaciones</span></span>
													<div class="alrededor">
														<div class="paddd">
															<span class="reco">Deezer recomienda:</span>
															<div>
																<img src="img/disney.jpg" class="disney" width="320" height="120">
															</div>
															<div class="content">
																<table class="dis" >
																	<tr>
																		<td >
																			<div style="padding-top:6px; "><span class="fath">Disney</span></div>
																			<div style="padding-bottom:8px; "> <span class="son">Disney Magic !</span></div>
																		</td>
																		<td>
																			<span class="glyphicon glyphicon-heart cor"></span>
																		</td>
																	</tr>
																</table>

															</div>

														</div>	
													</div>
													<div class="mar">
														<table >
															<tr>
																<td>
																	<button class="plus"><span class="glyphicon glyphicon-plus"></button>
																	</td>
																	<td id="can">
																		<span class="col-xs-12 fath2">Descubre nuestras apps</span>
																		<span class="col-xs-12 son2">¡Juegos y musica!</span>
																	</td>
																</tr>
															</table>
														</div>
													</div>
												</ul>
												<div id="jp_container_1"  class="jp-video jp-video-270p" role="application" aria-label="media player">
													<div class="jp-type-playlist" >
														<span style="position: absolute;" id="detalles">
															<p class="nombresong"><a href="#" id="nombresong"></a></p>
															<p class="nombreartista" style="margin-top: -5px">de<a href="#" id="nombreartista"></a></p>
														</span>	
														<div id="jquery_jplayer_1" class="jp-jplayer">

														</div>
														<div class="jp-gui">

															<div class="jp-interface">
																<div class="jp-progress">
																	<div class="jp-seek-bar">
																		<div class="jp-play-bar"></div>
																	</div>
																</div>
																<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
																<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
																<div class="jp-controls-holder">
																	<div class="jp-controls">

																		<a href="#" title="Anterior"><span class="jp-previous glyphicon glyphicon-step-backward" aria-hidden="true"></span></a>
																		<a href="" title="Pausa" id="pausee"><span class="jp-pause glyphicon glyphicon-pause"></span></a>
																		<a href="" id="playy"  title="Reproducir"><span class="jp-play glyphicon glyphicon-play"></span></a>
																		<a href="#" title="Siguiente"><span class="jp-next glyphicon glyphicon-step-forward" aria-hidden="true"></span></a>

																	</div>
																	<div class="jp-volume-controls">			
																		<a href="#" title="Silencio"><span class="jp-mute glyphicon glyphicon-volume-off" id="iconos" aria-hidden="true"></span></a>
																		<div class="ocultoo" id="barravol">
																			<div class="jp-volume-bar ">
																				<div class="jp-volume-bar-value"></div>
																			</div></div>

																			<a href="#" class="ocultoo" id="volplus"><span class="jp-volume-max glyphicon glyphicon-volume-up " id="iconos" aria-hidden="true"></span></a>

																		</div>
																		<div class="jp-toggles">
																			<a href="#" id="repetir" title="Repetir todas las canciones de la lista"><span class=" jp-repeat glyphicon glyphicon-refresh"  aria-hidden="true"></span></a>

																			<a href="#" id="ran" title="Activar modo aleatorio"><span class=" jp-shuffle glyphicon glyphicon-random" aria-hidden="true"></span></a>
																			<a href="#" id="cola" title="Lista de espera"><span class="glyphicon glyphicon-list-alt" id="iconos" >
																			</span></a>
																			<div class="hijo6 " id="hijo6" >

																				<div class="jp-playlist" >
																					<div id="listaa">
																						<div id="sublistaa">
																							<div>
																								<h2 class="espera elip estilo">Lista de espera</h2>
																								<h3 class="total elip estilo">15 canciones 4:34:43</h3>
																								<div id="chek">
																									<input type="checkbox" name="chk3" id="chk3"><label for="chk3"><p >Recomendaciones automaticas</p> </label>
																								</div>
																							</div>

																						</div>
																					</div>
																					<div id="ul">
																						<ul id="listplay">
																							<!-- The method Playlist.displayPlaylist() uses this unordered list -->
																							<li>&nbsp;</li>
																						</ul>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="jp-details">
																		<div class="jp-title" aria-label="title">&nbsp;</div>
																	</div>
																</div>
															</div>

															<div class="jp-no-solution">
																<span>Update Required</span>
																To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
															</div>
														</div>
													</div>

									<!--
									<div id="cover">

										
									</div>
									
									

									<div style="color: white;position: relative;padding-top: 74px">
										<div style="text-align: center;">
											<a href="#"><span class="glyphicon glyphicon-step-backward" id="iconos"  aria-hidden="true" style="font-size: 24px;"></span></a>
											<a href="#" ><span class="glyphicon glyphicon-play cambia" id="iconos"  aria-hidden="true" style="font-size: 34px;padding-left: 10px;padding-right: 10px"></span></a>
											<a href="#"><span class="glyphicon glyphicon-step-forward" id="iconos" aria-hidden="true" style="font-size: 24px"></span></a>

										</div>
										<div style="padding-top: 7px">
											<a href="#"><span class="glyphicon glyphicon-volume-up" id="iconos" aria-hidden="true" style="font-size: 17px;padding-left: 20px"></span></a>
											<a href="#"><span class="glyphicon glyphicon-refresh" id="iconos"  aria-hidden="true" style="font-size: 17px;padding-left: 33px"></span></a>
											<a href="#"><span class="glyphicon glyphicon-random" id="iconos" aria-hidden="true" style="font-size: 17px;padding-left: 33px"></span></a>
											<a href="#"><span class="glyphicon glyphicon-list-alt" id="iconos" aria-hidden="true" style="font-size: 17px;padding-left:33px "></span></a>
										</div>
										
									</div>
								-->
							</div>

							<div id="drop">
							</div>
							<div id="cover">

							</div>
							<div class="col-lgj-10 " id="ifra"  >
								<iframe class="contenido" src="principal.php" frameborder="0"  ></iframe>
							</div>
							<!-- Modal -->
							<div class="modal fade" id="newplaylist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div id="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<center><h4 class="modal-title" id="myModalLabel">Crear una playlist</h4></center>
										</div>
										<div class="modal-body">
											<center>
												<table  id="camara">
													<tr>
														<td id="col1"><img src="img/perfil.jpg" id="fotop"></td>
														<td>
															<span id="pon">Para ponerle nombre,aqui:</span>
															<input type="text" id="name-play" placeholder="Nombre de la playlist" class="form-control" >
															<input type="checkbox" name="chk6" id="chk6"><label for="chk6"><span class="aparte">Privada<h6 class="apart">(solo tu puedes ver este playlist)</h6> </span></label>
															<br>
															<input type="checkbox" name="chk7" id="chk7"><label for="chk7"><span class="aparte">Colaborativa</span> </label>

														</td>
													</tr>
												</table>

											</center>
											<span class="dinos">Dinos algo de tu playlist...</span>
											<input type="text" class="form-control" id="descrip" placeholder="Introduce una descripcion (opcional)">
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary"  style="float: right;">Crear</button>
											<button type="button" class="btn btn-default" data-dismiss="modal" style="float: left;">Cancelar</button>

										</div>
									</div>
								</div>
							</div>


							<div class="modal fade" tabindex="-1" role="dialog" id="modal-password" aria-hidden="true">

								<div class="modal-dialogg" role="document" style="width:900px" >
									<div class="modal-content">
										<div class="modal-header">

											<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 coll">
												<center><h3>RENOVAR TU CONTRASEÑA DE DEEZER</h3></center>
												<table class="pass">
													<tr>
														<td style="text-align: right;padding-bottom: 15px">
															<label class="extras">Ingesar Contraseña:</label>
														</td>
														<td style="padding-left: 15px;padding-bottom: 15px">
															<input type="password" id="txt-password" placeholder="Contraseña" data-trigger="focus" class="form-control" data-toggle="popover" data-html="true" data-content="<h5 style='color:black'>-Usa [6-15] caracteres</h5>" data-placement="right" data-container="body">
														</td>
													</tr>
													<tr>
														<td style="text-align: right;padding-bottom: 15px">
															<label class="extras">Ingesar Nueva Contraseña:</label>
														</td>
														<td style="padding-left: 15px;padding-bottom: 15px">
															<input type="password" id="txt-newpassword" placeholder="Nueva Contraseña" data-trigger="focus" class="form-control" data-toggle="popover" data-html="true" data-content="<h5 style='color:black'>-Usa [6-15] caracteres<br>-Asegurate de que las contraseñas coincidan</h5>" data-placement="right" data-container="body">
														</td>
													</tr>
													<tr>
														<td style="text-align: right;padding-bottom: 15px">
															<label class="extras">Confirmar Contraseña:</label>
														</td>
														<td style="padding-left: 15px;padding-bottom: 10px">
															<input type="password" id="txt-confpassword" placeholder="Confirmar Contraseña" data-trigger="focus" class="form-control" data-toggle="popover" data-html="true" data-content="<h5 style='color:black'>-Usa [6-15] caracteres<br>-Asegurate de que las contraseñas coincidan</h5>" data-placement="right" data-container="body">
														</td>
													</tr>
													<tr>
														<td colspan="2" style="padding-bottom: 10px""><div id="result"></div></td>
													</tr>
													<tr>
														<td colspan="2">
															<button class="btn btn-success" id="changepass"  style="margin-left: 171px"><span class="laber">Continuar</span></button>
															<button class="btn btn-danger" data-dismiss="modal" style="margin-left: 30px" ><span class="laber">Cancelar</span></button>
														</td>
													</tr>
												</table>
											</div>


										</div>

									</div><!-- /.modal-content -->

								</div><!-- /.modal-dialog --> 
							</div><!-- /.modal --> 

							<div class="modal fade" tabindex="-1" role="dialog" id="imagen">
								<div class="modal-dialog" role="document"  style="width:900px" style="height: 800px">
									<div class="modal-content">

										<div class="modal-body">

											<form method="post" id="formulario" enctype="multipart/form-data">
												<div class="well">
													<center>
														<table>
															<tr>
																<td><h3>Cambiar foto de Perfil</h3></td>
															</tr>
															<tr>
																<td>
																	<label>Subir imagen:</label>
																	<input type="file" name="file"> 
																</td>
															</tr>
														</table>
													</center>
												</div>
											</form>
											<div id="respuesta"></div>         

										</div>

									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->


							</div><!-- /.modal -->
							<input type="text" id="fav" value="<?php echo $favoritos=$conexion->cantidadRegistros($albums); ?>" style="visibility: hidden;">
							<input type="text" id="fav2" value="<?php echo $favoritos=$conexion->cantidadRegistros($paylist); ?>" style="visibility: hidden;">
							<script type="text/javascript" src="js/jquery.min.js"></script>
							<script src="js/bootstrap.min.js"></script>
							<script src="js/index.js"></script>
							<script type="text/javascript" src="js/jquery.jplayer.js"></script>
							<script type="text/javascript" src="js/jplayer.playlist.js"></script>
							<script type="text/javascript" src="js/imagenes.js"></script>
							<script id="repro" type="text/javascript">

								$(function () {
									$('[data-toggle="popover"]').popover();
								});
								
								$(document).ready(function(){
									$(".albx").text($("#fav").val()+" ");

                                     $(".pay").text($("#fav2").val()+" ");
									$(function () {
										$('[data-toggle="tooltip"]').tooltip();
									});

									$(".xxx").click(function(event){

										event.stopPropagation();
										$(".xxx").popover("hide");
										$(this).popover("toggle");
									});

									$("body").click(function(){
										if ($(".xxx").popover("show")) {
											$(".xxx").popover("hide");
										}
									});


									



								});

								var myPlaylist = new jPlayerPlaylist({
									jPlayer: "#jquery_jplayer_1",
									cssSelectorAncestor: "#jp_container_1"
								},  [

								{
									title:"voices",
									artist:"rev theory",
									mp3:"http://localhost/IS501-DEEZER-V1.1/musica/randi.mp3",
									poster: "http://localhost/IS501-DEEZER-V1.1/musica/covers/orton.jpg"
								}
								], {
									swfPath: "../../dist/jplayer",
									supplied: "webmv, ogv, m4v, oga, mp3",
									useStateClassSkin: true,
									autoBlur: false,
									smoothPlayBar: true,
									keyEnabled: true,
									audioFullScreen: true
								});
								function playg(codigoalbum){
									var parametros="codigoalbum="+codigoalbum;
									$.ajax({
										url:"ajax/reproducto-ajax.php?accion=2",
										data:parametros,
										method:"POST",
										dataType:'json',
										success:function(respuesta){
											myPlaylist.setPlaylist(respuesta);
											myPlaylist.option('autoPlay', true);
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
											myPlaylist.setPlaylist(respuesta);
											myPlaylist.option('autoPlay', true);
										}
									});

								}




							</script>




						</body>
						</html>