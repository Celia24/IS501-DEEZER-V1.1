<?php
session_start();
//$_GET['accion']='1';
//$_SESSION['codigo_usuario']=1; 
 //if(!isset($_SESSION['codigo_usuario']))
 //header('Location:http://localhost/IS501-DEEZER-V1.1/conectarse.php');
include ("../class/class-conexion.php");
$conexion = new Conexion();
$conexion->establecerConexion();

$resultado=array(); 
switch ($_GET['accion']){ 
	
	case '1':
 $nombreu=$_POST['nombreu'];
 $sexo=$_POST['sexo'];
 $dia=$_POST['dia'];
 $mes=$_POST['mes'];
 $ano=$_POST['ano'];
 $apellido=$_POST['apellido'];
 $telefono=$_POST['telefono'];
 $nombre=$_POST['nombre'];
 $codigop=$_POST['codigop'];
 $codigousuario=$_SESSION['codigo_usuario'];
 $codigo;
 $mensaje="";
 $conn = oci_connect('DEEZER','oracle','LOCALHOST/XE') or die;
 $sql = "BEGIN UPDATE_INFO(:codigousuario,:nombreu,:dia,:mes,:ano,:apellido,:sexo,:nombre,:telefono,:codigop,:codigo,:mensaje);END;";
 $stmt = oci_parse($conn,$sql);
 oci_bind_by_name($stmt,':codigousuario',$codigousuario,200);
 oci_bind_by_name($stmt,':nombreu',$nombreu,200);
 oci_bind_by_name($stmt,':dia',$dia,200);
 oci_bind_by_name($stmt,':mes',$mes,200);
 oci_bind_by_name($stmt,':ano',$ano,200);
 oci_bind_by_name($stmt,':apellido',$apellido,200);
 oci_bind_by_name($stmt,':sexo',$sexo,200);
 oci_bind_by_name($stmt,':nombre',$nombre,200);
 oci_bind_by_name($stmt,':telefono',$telefono,200);
 oci_bind_by_name($stmt,':codigop',$codigop,200);
 oci_bind_by_name($stmt,':codigo',$codigo,200);
 oci_bind_by_name($stmt,':mensaje',$mensaje,200);
 oci_execute($stmt);
 oci_close($conn);
 $resultado["codigo"]=$codigo;
 $resultado["mensaje"]=$mensaje;
 break;
 case '2':
 $contrasena=$_POST['contrasena'];
 $nuevacontrasena=$_POST['nuevacontrasena'];
 $confcontrasena=$_POST['confcontrasena'];
 $cont=0;
 $verificar=$conexion->ejecutarInstruccion("SELECT COUNT(1) AS COINCIDENCIAS
  FROM TBL_USUARIOS
  WHERE CODIGO_USUARIO=".$_SESSION['codigo_usuario']." AND CONTRASENA='$contrasena'");


 while ($row = $conexion->obtenerRegistro($verificar)) {
   if ($row["COINCIDENCIAS"]=="0") {
    $resultado['codigo']=0;
    $resultado["mensaje"]="Contrasena incorrecta";
    $cont++;
  }
}

if ($cont==0) {
 $actualizarcontrasena=$conexion->ejecutarInstruccion("UPDATE TBL_USUARIOS
  SET
  CONTRASENA='$nuevacontrasena'
  WHERE CODIGO_USUARIO=".$_SESSION['codigo_usuario']."");

 $resultado["codigo"]=1;
 $resultado["mensaje"]="Actualizacion exitosa";
}

break;
default:

break;

}
echo json_encode($resultado);

?>

