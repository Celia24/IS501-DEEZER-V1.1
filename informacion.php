<?php
session_start();
 if(!isset($_SESSION['codigo_usuario']))
 header('Location:http://localhost/IS501-DEEZER-V1.1/conectarse.php');
include("class/class-conexion.php");
$conexion = new Conexion();
$conexion->establecerConexion();
$informacion=$conexion->ejecutarInstruccion("SELECT A.FOTO,NVL(A.CODIGO_LUGAR,0) AS CODIGO_LUGAR,A.NOMBRE_USUARIO,A.CORREO,B.APELLIDO AS APELLIDO,B.CODIGO_SEXO,B.NOMBRE AS NOMBRE,B.TELEFONO AS TELEFONO,NVL(TO_CHAR(B.FECHA_NACIMIENTO,'DD'),0) AS DIA,NVL(TO_CHAR(B.FECHA_NACIMIENTO,'MM'),0) AS MES,NVL(TO_CHAR(B.FECHA_NACIMIENTO,'YYYY'),0) AS ANO
FROM TBL_USUARIOS A
INNER JOIN TBL_PERSONAS B
ON(A.CODIGO_USUARIO=B.CODIGO_PERSONA)
WHERE A.CODIGO_USUARIO=".$_SESSION["codigo_usuario"]."");
 while ($row = $conexion->obtenerRegistro($informacion)) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>informacion</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/personalizado.css">
	<style type="text/css">
		body{
			width: 100%; 
		}

	</style>

	
</head> 
<body style="background-color: #f1f1f1">
	<div class="loader" style="display: block;"></div>
<div class="container-fluid"> 
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 afuera">
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 dentro ">
			 <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 imagen ">
				<img src="<?php echo $row['FOTO']; ?>" width="150" height="150" style="border-radius: 4px">

			</div>
			<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10 texto ">

				<p class="titulo">Mi oferta</p>
				<hr>
				<div class="alinear" >
				 <div class="letrass"> Estás disfrutando de la versión gratuita de Deezer.<button  class="suscripcion" onclick="moodd();"><a style="text-decoration:none;color:black;" href="javascript:;">Cambiar Foto Perfil</a> </button></div>
			<p class="titulo">Inicia Sesion</p>
			<hr>
			<div >
			<table>
				<tr>
				    <td style="text-align: right;padding-right: 10px;"><label class="extras">Tu correo electrónico:</label></td>
					<td width="300"><input type="text" id="txt-correo" disabled="disabled" value="<?php echo $row['CORREO']; ?>" class="form-control " > </td>

				</tr>
				<tr>
					<td><div style="height: 10px"></div></td>
				</tr>
				<tr >
                    <td style="text-align: right;padding-right: 10px;"><label class="extras">Tu contraseña:</label></td>
					<td><button onclick="modddd();" class="mod">Modificar</button></td>
				</tr>
			</table>
				<div class="datoss">
					Datos visibles para otros usuarios
					<hr>
				</div>
				<table >
					<tr>
						<td style="text-align: right;padding-left: 10px;padding-bottom: 17px">
							<label class="extras">Sexo</label>
							<td style="padding-left: 15px;padding-bottom: 17px">
							<select class="form-control"  id="slc-sexo">
								<option value="N/A">Sexo</option>
								<?php 
                                 if ($row['CODIGO_SEXO']==1) {
                                 	echo '<option value="1" selected>Femenino</option>'.
                                         '<option value="2">Masculino</option>';
                                 }else{
                                    echo '<option value="1">Femenino</option>'.
                                         '<option value="2" selected>Masculino</option>';
                                 }

								?>
								
							</select>
							</td>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;padding-left: 10px">
							<label class="extras">Nombre de Usuario</label>
						</td>
						<td width="313" style="padding-left: 15px">
							<input type="text" class="form-control" data-trigger="focus" value="<?php echo $row['NOMBRE_USUARIO']; ?>" id="txt-nombreu" data-toggle="popover" data-html="true"  data-content="-Usa [2-12] caracteres <br> -Puedes usar solo letras,numeros ej: a89,tyg87,jkj" data-container="body" data-placement="right">
						</td>
					</tr>
				</table>
				<div class="personales">
					Datos Privados
					<hr>
				</div>
				<table style="margin-left: -45px">
					<tr>
						<td style="text-align: right;padding-bottom: 15px">
							<label class="extras">Apellido</label>
						</td>
						<td width="300" style="padding-left: 15px;padding-bottom: 15px">
							<input type="text" id="txt-apellido" data-trigger="focus" value="<?php
                               if($row['APELLIDO']==null){
                                   echo ""; 
                               }else{
                               	   echo $row['APELLIDO'];
                               }
                               ?>" class="form-control" data-toggle="popover" data-content="-Solo usa letras" data-container="body" data-placement="right" >
                               
						</td>
					</tr>
					<tr>
						<td style="text-align: right;padding-bottom: 15px">
							<label class="extras">Nombre</label>
						</td>
						<td style="padding-left: 15px;padding-bottom: 15px">
							<input type="text" data-trigger="focus" id="txt-nombre" value="<?php 
                               if($row['NOMBRE']==null){
                                   echo ""; 
                               }else{
                               	   echo $row['NOMBRE'];
                               }

							?>" class="form-control" data-toggle="popover" data-content="-Solo usa letras" data-container="body" data-placement="right" >
						</td>
					</tr>
					<tr>
						<td style="text-align: right;padding-bottom: 15px">
							<label class="extras">Fecha de nacimiento</label>
						</td>
						<td >
							<div class="col-xs-4">
								<select  class="form-control" id="dia" style="margin-bottom: 15px;width: 80px">
									<option value="N/A">N/A</option>
								<?php
                                  for ($i=1; $i <32 ; $i++) { 
                                  	if ($row['DIA']==$i) {
                                  		echo "<option value=".$i." selected>".$i."</option>";
                                  	}else{
                                        echo "<option value=".$i." >".$i."</option>";
                                  	}
                                  }
								?>
							</select>
							</div>
							<div class="col-xs-4">
								<select  class="form-control" id="mes" style="margin-left:6px;margin-bottom: 15px;width: 80px;">
									<option value="N/A">N/A</option>
								<?php
                                  for ($i=1; $i <13 ; $i++) { 
                                  	if ($row['MES']==$i) {
                                  		echo "<option value=".$i." selected>".$i."</option>";
                                  	}else{
                                        echo "<option value=".$i." >".$i."</option>";
                                  	}
                                  }
								?>
							</select>
							</div>
							<div class="col-xs-4">
								<select  class="form-control" id="year" style="margin-left:10px;margin-bottom: 15px;width: 80px;">
									<option value="N/A">N/A</option>
								<?php
                                  for ($i=1900; $i <2017 ; $i++) { 
                                  	if ($row['ANO']==$i) {
                                  		echo "<option value=".$i." selected>".$i."</option>";
                                  	}else{
                                        echo "<option value=".$i." >".$i."</option>";
                                  	}
                                  }
								?>
							</select>
							</div>
						</td>
					</tr>
					
					<tr>
						<td style="text-align: right;padding-bottom: 15px">
							<label class="extras">Pais</label>
						</td>
						<td style="padding-left: 15px;padding-bottom: 15px">
							<select id="slc-pais"  class="form-control">
								<option value="">N/A</option>

								<?php
								$conexion = new Conexion();
								$conexion->establecerConexion();
                                $lugares=$conexion->ejecutarInstruccion("select CODIGO_LUGAR,NOMBRE_LUGAR from TBL_LUGARES"); 
								while ($row2 = $conexion->obtenerRegistro($lugares)) {
									if ($row2["CODIGO_LUGAR"]==$row['CODIGO_LUGAR']) {
                                  		echo "<option value=".$row2["CODIGO_LUGAR"]." selected>".$row2["NOMBRE_LUGAR"]."</option>";	
                                  	}else{
                                        echo "<option value=".$row2["CODIGO_LUGAR"].">".$row2["NOMBRE_LUGAR"]."</option>";
                                  	}
									
								}
								
								?>
							</select>
							
						</td>
					</tr>
					
					<tr>
						<td style="text-align: right;padding-bottom: 15px">
							<label class="extras" class="form-control">Movil</label>
						</td>
						<td style="padding-left: 15px;padding-bottom: 15px">
							<input type="text" id="txt-phone" data-trigger="focus" value="<?php 
                              if($row['TELEFONO']==null){
                                   echo ""; 
                               }else{
                               	   echo $row['TELEFONO'];
                               }
							 ?>" class="form-control" data-toggle="popover"  data-content="Escribe tu numero de telefono de la forma: xxx xxxxxxxx" data-placement="right" data-container="body" >
						</td>
					</tr>
					<?php }
                     $conexion->cerrarConexion();
					?>
					<tr>
						<td colspan="2">
							<div id="resultado" style="padding-bottom: 15px;"></div>
						</td>
					</tr>
					<tr>

						<td colspan="2">
							<button class="btn btn-primary" id="btn-save" type="button" style="margin-left: 180px"><span class="label">Guardar</span></button>
						</td>
					</tr>
				</table>
				
			</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-lg-12 col-md-12" style="padding-top: 20px;">
				<div class="final">
					<a href="" style="text-decoration:none;color: #72727d; ">Eliminar mi Cuenta</a>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>


    <script type="text/javascript" src="js/jquery.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
	<script src="js/index.js"></script>
	<script src="js/informacion.js"></script>
	
	<script type="text/javascript">
      $(function () {
    $('[data-toggle="popover"]').popover();
      });
       $(".loader").css("display","none");




    
     	$('#modal-password',window.parent.parent.document).on('hide.bs.modal', function (e) {
           if($("#dropp",window.parent.parent.document).hasClass("modal-backdrop")){
           $(".modal-backdrop",window.parent.parent.document).remove();
           }
         });
 

      
     	$('#imagen',window.parent.parent.document).on('hide.bs.modal', function (e) {
           if($("#dropp",window.parent.parent.document).hasClass("modal-backdrop")){
           $(".modal-backdrop",window.parent.parent.document).remove();
           }
         });
 
   

</script>
</body>
</html>