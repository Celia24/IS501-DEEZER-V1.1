<?php
session_start();
//$_GET['accion']='2';
//$_SESSION['codigo_usuario']=1; 
 //if(!isset($_SESSION['codigo_usuario']))
 //header('Location:http://localhost/IS501-DEEZER-V1.1/conectarse.php');
include ("../class/class-conexion.php");
$conexion = new Conexion();
$conexion->establecerConexion();
switch ($_GET['accion']){ 
	case '1':

	    $codigoplaylist=$_POST["codigoplaylist"];
        $playlist=$conexion->ejecutarInstruccion("SELECT A.CODIGO_CANCION,A.NOMBRE,A.CANCION,A.COVER,NVL(B.NOMBRE_ARTISTAS,' ') AS NOMBRE_ARTISTAS
                                                  FROM TBL_CANCIONES A 
                                                  LEFT JOIN (SELECT  A.CODIGO_CANCION,LISTAGG(NOMBRE_ARTISTICO, ', ') WITHIN GROUP (ORDER BY A.CODIGO_CANCION) over (partition by A.CODIGO_CANCION) NOMBRE_ARTISTAS
                                                  FROM TBL_CANCIONES_X_ARTISTA A
                                                  LEFT JOIN TBL_ARTISTAS B
                                                  ON(A.CODIGO_ARTISTA=B.CODIGO_ARTISTA)) B
                                                  ON(A.CODIGO_CANCION=B.CODIGO_CANCION)
                                                  RIGHT JOIN (SELECT CODIGO_PLAYLIST,CODIGO_CANCION
                                                  FROM TBL_CANCIONES_X_PLAYLIST
                                                  GROUP BY CODIGO_PLAYLIST,CODIGO_CANCION) C
                                                  ON(A.CODIGO_CANCION=C.CODIGO_CANCION)
                                                  GROUP BY C.CODIGO_PLAYLIST,A.CODIGO_CANCION,A.NOMBRE,A.CANCION,A.COVER,B.NOMBRE_ARTISTAS
                                                  HAVING C.CODIGO_PLAYLIST=".$codigoplaylist."");
        while ($row = $conexion->obtenerRegistro($playlist)) {
              $arr[]=array("title"=>"".$row['NOMBRE']."","artist"=>"".$row['NOMBRE_ARTISTAS']."","mp3"=>"".$row['CANCION']."","poster"=>"".$row['COVER']."");
        }
       
	break;
	case '2':
     $codigoalbum=$_POST["codigoalbum"];
        $album=$conexion->ejecutarInstruccion("SELECT C.CODIGO_ALBUM,A.CODIGO_CANCION,A.NOMBRE,A.CANCION,A.COVER,NVL(B.NOMBRE_ARTISTAS,' ') AS NOMBRE_ARTISTAS
                                               FROM TBL_CANCIONES A
                                               LEFT JOIN (SELECT  A.CODIGO_CANCION,LISTAGG(NOMBRE_ARTISTICO, ', ') WITHIN GROUP (ORDER BY A.CODIGO_CANCION) over (partition by A.CODIGO_CANCION) NOMBRE_ARTISTAS
                                               FROM TBL_CANCIONES_X_ARTISTA A
                                               LEFT JOIN TBL_ARTISTAS B
                                               ON(A.CODIGO_ARTISTA=B.CODIGO_ARTISTA)) B
                                               ON(A.CODIGO_CANCION=B.CODIGO_CANCION)
                                               RIGHT JOIN (SELECT CODIGO_ALBUM,CODIGO_CANCION
                                               FROM TBL_CANCIONES_X_ALBUM
                                               GROUP BY CODIGO_ALBUM,CODIGO_CANCION) C
                                               ON(A.CODIGO_CANCION=C.CODIGO_CANCION)
                                               GROUP BY C.CODIGO_ALBUM,A.CODIGO_CANCION,A.NOMBRE,A.CANCION,A.COVER,B.NOMBRE_ARTISTAS
                                               HAVING C.CODIGO_ALBUM=".$codigoalbum."");
        while ($row = $conexion->obtenerRegistro($album)) {
              $arr[]=array("title"=>"".$row['NOMBRE']."","artist"=>"".$row['NOMBRE_ARTISTAS']."","mp3"=>"".$row['CANCION']."","poster"=>"".$row['COVER']."");
        }
	break;
	case '3':
		 $codigoartista=$_POST["codigoartista"];
        $canartistas=$conexion->ejecutarInstruccion("SELECT B.CODIGO_ARTISTA,C.NOMBRE_ARTISTICO,A.CODIGO_CANCION,A.NOMBRE,A.CANCION,A.COVER
                                               FROM TBL_CANCIONES A
                                               RIGHT JOIN (SELECT *
                                               FROM TBL_CANCIONES_X_ARTISTA
                                               WHERE CODIGO_ARTISTA=".$codigoartista.") B
                                               ON(A.CODIGO_CANCION=B.CODIGO_CANCION)
                                               LEFT JOIN TBL_ARTISTAS C
                                               ON(B.CODIGO_ARTISTA=C.CODIGO_ARTISTA)");
        while ($row = $conexion->obtenerRegistro($canartistas)) {
              $arr[]=array("title"=>"".$row['NOMBRE']."","artist"=>"".$row['NOMBRE_ARTISTICO']."","mp3"=>"".$row['CANCION']."","poster"=>"".$row['COVER']."");
        }
		break;
    case '4':
      $codigo_cancion=$_POST['codigocancion'];
      $cancion=$conexion->ejecutarInstruccion("SELECT A.CODIGO_CANCION,A.NOMBRE,A.CANCION,A.COVER,NVL(B.NOMBRE_ARTISTAS,' ') AS NOMBRE_ARTISTAS
                                              FROM TBL_CANCIONES A 
                                              LEFT JOIN (SELECT  A.CODIGO_CANCION,LISTAGG(NOMBRE_ARTISTICO, ', ') WITHIN GROUP (ORDER BY A.CODIGO_CANCION) over (partition by A.CODIGO_CANCION) NOMBRE_ARTISTAS
                                              FROM TBL_CANCIONES_X_ARTISTA A
                                              LEFT JOIN TBL_ARTISTAS B
                                              ON(A.CODIGO_ARTISTA=B.CODIGO_ARTISTA)) B
                                              ON(A.CODIGO_CANCION=B.CODIGO_CANCION)
                                              GROUP BY A.CODIGO_CANCION,A.NOMBRE,A.CANCION,A.COVER,B.NOMBRE_ARTISTAS
                                              HAVING A.CODIGO_CANCION=".$codigo_cancion."");
      while ($row = $conexion->obtenerRegistro($cancion)) {
              $arr[]=array("title"=>"".$row['NOMBRE']."","artist"=>"".$row['NOMBRE_ARTISTAS']."","mp3"=>"".$row['CANCION']."","poster"=>"".$row['COVER']."");
        }
    break;
	default:
	
	break;

}
echo json_encode($arr);

?>