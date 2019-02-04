<!DOCTYPE html>
<html>
<head>
	<title>prueba</title>

</head>
<body> 
 

<?php
  include ("class/class-conexion.php");

  $conexion = new Conexion();
  $conexion->establecerConexion();
  $consulta=$conexion->ejecutarInstruccion("select COUNT(*) AS CITY  from hr.locations");
  echo '<table border="1">';
         
while ($row = $conexion->obtenerRegistro($consulta)) {
echo '<tr>
      <td>'.$row["CITY"].'</td>'.
      '</tr>'; 
}
echo '</table>';

  /*
# Inicializar la conexión a Oracle
$conn = oci_connect('SYSTEM', 'hola', 'localhost/xe');
if (!$conn) {
     echo " hay un error";
}
else{
# Preparar la Query
$query = "select * from hr.employees";

//SELECT CODIGO_USUARIO ,CODIGO_CLAVE_POSTAL,CODIGO_LUGAR,CODIGO_RED,NOMBRE_USUARIO,CONTRASENA,FECHA_INSCRIPCION,EDAD,CORREO FROM TBL_Usuarios
 
# Conectar realmente y lanzar la consulta...
$stid = oci_parse($conn, $query);
oci_execute($stid, OCI_DEFAULT);

# Lanzar la consulta
while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
 
# Recuperar las filas de la consulta
foreach ($row as $item) {
  echo $item." ";
}
echo "<br>\n";
}

# Cerrar la conexión con Oracle
}
oci_free_statement($stid);
oci_close($conn);
*/

?>﻿


</body>
</html>