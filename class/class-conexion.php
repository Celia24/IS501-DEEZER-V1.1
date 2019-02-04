<?php
/**
* 
*/
class Conexion
{
	private $usuario="DEEZER";
	private $contrasena="oracle";
	private $instancia="LOCALHOST/XE";
	private $enlace;

	public function establecerConexion(){
       $this->enlace = oci_connect($this->usuario, $this->contrasena, $this->instancia);
       if (!$this->enlace) {
			    echo " hay un error";
			    exit;
			}
			//echo "Conexion Satisfactoria";
	}

	public function cerrarConexion(){
			oci_close($this->enlace);
		}

    
    public function ejecutarInstruccion($sql){
			$stid = oci_parse($this->enlace, $sql);
            oci_execute($stid);
            return $stid;
		}
	
	public function obtenerRegistro($resultado){
			return oci_fetch_array($resultado, OCI_ASSOC+OCI_RETURN_NULLS);
		}

    public function cantidadRegistros($resultad){
			return oci_num_rows($resultad);
		}
		
}


?>