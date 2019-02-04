
<!DOCTYPE html>
<html>
	<head>
		<title>Ejemplo Deezer</title>
		<meta charset="UTF8">
	
	   <link rel="icon" href="img/fav.ico" type="image/x-icon">
	   <link rel="stylesheet" type="text/css" href="css/estilos.css">
	   <link href="css/bootstrap.css" rel="stylesheet">
<style type="text/css">
  body{
    overflow: hidden;
  } 
</style>
	</head><br>
	<body style="background-image:url(img/Musica.png); color:#ffffff;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-6 col-xs-12">
          <button type="button" id="pp" onclick="window.open('conectarse.php','_self')" style="float: right;" class="btn btn-danger">Conectarse</button>
        </div>
        <center><div class="col-lg-12 col-md-12 col-xs-12 " style="padding-top: 40px">
             
     <strong><font size=60>Tu música. Tu flow.</font></strong><br>
     <font size=5>Disfruta de tu música donde quieras y cuando quieras.<br>
     Regístrate gratis<br>
   
   <div style="width: 300px">
   <button type="summit" class="btn btn-default btn-primary" style="width: 140px;  height: 40px; float: left;"><img src="img/facebook.svg" width="27" class="bot" height="27"> Facebook</button>
   <button type="summit" class="btn btn-default btn-danger" style="width: 140px;  height: 40px;float: right;"><img src="img/google.svg" width="22" class="bot" height="22"> Google+</button><br><br>

    <input type="email" id="txt-correo" class="form-control"  style="width: 300px;height: 40px;float: center;" placeholder="Correo electrónico" data-html="true"  data-toggle="popover" data-trigger="focus"  data-content="<h5 style='color:black'>Correo de la forma: Name@example.xxx</h5>" data-container="body" data-placement="left" >
    <input type="password" id="txt-contrasena"  class="form-control" data-toggle="popover"  data-html="true" data-content="<h5 style='color:black'>-Usa [6-15] caracteres</h5>" data-placement="left" data-container="body" data-trigger="focus"  style="width: 300px;height: 40px;float: center;" placeholder="Contraseña (6 caracteres mínimo)"  >
    <input type="text" id="txt-nombreu"  data-toggle="popover" data-html="true" data-trigger="focus"   data-content="<h5 style='color:black'>-Usa [2-12] caracteres <br> -Puedes usar solo letras,numeros ej: a89,tyg87,jkj</h5>" data-container="body" data-placement="left" class="form-control"  style="width: 300px;height: 40px;float: center;" placeholder="Nombre de usuario">

    <select  class="form-control" id="slc-sexo" style="width: 150px; float: left;">
                   <option value="">Sexo</option> 
                   <option value="1">Mujer</option>
                   <option value="2">Hombre</option>
    </select> 
    
    <select  class="form-control" id="slc-edad" style="margin-bottom: 20px; width: 150px; float: right;">
                           <option value="">Edad</option> 
                              <?php
                                  for ($i=1; $i <100 ; $i++) { 
                                    echo "<option value=".$i.">".$i."</option>";
                                  }
                              ?>
    </select>
   
         <button id="btn-registro" class="btn btn-lg btn-primary" type="submit" style="width:300px">Registrarse</button><br>
         <div id="resultado">
           
         </div>

              <h6>Al hacer clic en "Registrase", aceptas las condiciones</h7></br>generales de uso.</h7>

        </div>
         
      </center> 
       
      </div>
    </div><br>
    <select class="form-control" style="margin-top: 20px; width: 100px; float: left;">

                                    <option value="en" >
                English             </option>
                                                <option value="us" >
                English (us)              </option>
                                                <option value="ar" >
                العربیة             </option>
                                                <option value="cs" >
                Čeština             </option>
                                                <option value="da" >
                Dansk             </option>
                                                <option value="de" >
                Deutsch             </option>
                                                <option value="es" selected="selected">
                Español             </option>
                                                <option value="mx" >
                Español (mx)              </option>
                                                <option value="fr" >
                Français              </option>
                                                <option value="id" >
                Indonesia             </option>
                                                <option value="it" >
                Italiano              </option>
                                                <option value="hu" >
                Magyar              </option>
                                                <option value="ms" >
                Melayu              </option>
                                                <option value="nl" >
                Nederlands              </option>
                                                <option value="no" >
                Norsk             </option>
                                                <option value="pl" >
                Polski              </option>
                                                <option value="br" >
                Português (br)              </option>
                                                <option value="pt" >
                Português (pt)              </option>
                                                <option value="ru" >
                Pусский             </option>
                                                <option value="ro" >
                Română              </option>
                                                <option value="rs" >
                Srpski              </option>
                                                <option value="fi" >
                Suomi             </option>
                                                <option value="se" >
                Svenska             </option>
                                                <option value="sq" >
                Shqip             </option>
                                                <option value="sk" >
                Slovenčina              </option>
                                                <option value="sl" >
                Slovenščina             </option>
                                                <option value="tr" >
                Türkçe              </option>
                                                <option value="me" >
                Crnogorski              </option>
                                                <option value="th" >
                ภาษาไทย             </option>
                                                <option value="cn" >
                中文              </option>
                                                <option value="hr" >
                Hrvatski              </option>
                                                <option value="ko" >
                한국어             </option>
                      
        </select></div></center>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/validarRegistro.js"></script>
        <script type="text/javascript">
          $(function () {
    $('[data-toggle="popover"]').popover();
      });
        </script>
	</body>
  <br><center>
  <h6><span style="margin: 5px" >Ofertas</span>
  <span style="margin: 5px">Ventajas</span>
  <span style="margin: 5px ">Móvil</span>
  <span style="margin: 5px">Trabajos</span>
  <span style="margin: 5px">Ayuda y Contactos</span>
  <span style="margin: 5px">Condiciones genrales de Uso</span>
  <span style="margin: 5px">Datos personales y cookies</span>
  <span style="margin: 5px"> © 2017</span></h6>
  </center>
 
</html>