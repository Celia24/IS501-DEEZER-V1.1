<?php
session_start(); 
if(!isset($_SESSION['codigo_usuario']))
  header('Location:http://localhost/IS501-DEEZER-V1.1/conectarse.php');
include("../class/class-conexion.php");
$conexion = new Conexion();
$conexion->establecerConexion();
if (isset($_FILES["file"]))
{
    $resultado=array();
    $file = $_FILES["file"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file['tmp_name'];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "deezer/fotoperfiles/";

    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
    $resultado['codigo']=0;
    $resultado["mensaje"]="<div class='bg-danger'><center>Error, el archivo no es una imagen</center></div>"; 
    echo json_encode($resultado);
    }
    else if ($size > 1024*1024)
    {
      $resultado['codigo']=0;  
      $resultado["mensaje"]="<div class='bg-danger'><center>Error, el tamaño máximo permitido es un 1MB</center></div>";
      echo json_encode($resultado);
    }
    else if ($width > 500 || $height > 500)
    {
       $resultado['codigo']=0; 
        $resultado["mensaje"]="<div class='bg-danger'><center>Error la anchura y la altura maxima permitida es 500px</center></div>";
        echo json_encode($resultado);
    }
    else if($width < 60 || $height < 60)
    {
       $resultado['codigo']=0; 
        $resultado["mensaje"]="<div class='bg-danger'><center>Error la anchura y la altura mínima permitida es 60px</center></div>";
        echo json_encode($resultado);
    }
    else
    {
    $resultado['codigo']=0;
        $src = $carpeta.$nombre;
        $foto=$conexion->ejecutarInstruccion("UPDATE TBL_USUARIOS
                                              SET
                                              FOTO='$src'
                                              WHERE CODIGO_USUARIO=".$_SESSION["codigo_usuario"]."");

    move_uploaded_file($ruta_provisional, "C:/wamp64/www/IS501-DEEZER-V1.1/deezer/fotoperfiles/$nombre");
    $resultado['codigo']=1;
    $resultado["mensaje"]="<div class='bg-success'><center>Exito, Fotografia Actualizada</center></div>";
    $resultado["actualizar2"]='<img src="'.$src.'" width="150" height="150" style="border-radius: 4px">';
    $resultado["actualizar"]='<img src="'.$src.'" width="24" height="24" style="border-radius: 50%;margin-right: 5px"> <span id="aayuda">Mi Musica</span>';    
    $resultado["actualizar3"]='<img src="'.$src.'" id="photo" width="160" height="160">';
    echo json_encode($resultado);
    }
}else{
      $resultado["codigo"]=0;
       $resultado["mensaje"]="No hay archivo";
     echo json_encode($resultado);
}