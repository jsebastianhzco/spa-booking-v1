<?php 
class ApptivaDB{    
    private $host   ="localhost";
    
      
    private $usuario="acupuncture_wp1";
    private $clave  ="N^pD5e3LBZ#@(vUs#h)84&*1";
    private $db     ="acupuncture_reservations";
  
 


/*  
    private $usuario="root";
    private $clave  ="";
    private $db     ="sistema_reservas_acupuncture";
*/
 





    public $conexion;
    public function __construct(){
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave,$this->db)
        or die(mysql_error());
        $this->conexion->set_charset("utf8");
    }
    //INSERTAR
    public function insertar($tabla, $datos){
        $resultado =    $this->conexion->query("INSERT INTO $tabla VALUES (null,$datos)") or die($this->conexion->error);
        if($resultado)
            return true;
        return false;
    } 
    //BORRAR
    public function borrar($tabla, $condicion){    
        $resultado  =   $this->conexion->query("DELETE FROM $tabla WHERE $condicion") or die($this->conexion->error);
        if($resultado)
            return true;
        return false;
    }
    //ACTUALIZAR
    public function actualizar($tabla, $campos, $condicion){    
        $resultado  =   $this->conexion->query("UPDATE $tabla SET $campos WHERE $condicion") or die($this->conexion->error);
        if($resultado)
            return true;
        return false;        
    } 
    //BUSCAR
    public function buscar($tabla, $condicion){
        $resultado = $this->conexion->query("SELECT * FROM $tabla WHERE $condicion") or die($this->conexion->error);
        if($resultado)
            return $resultado->fetch_all(MYSQLI_ASSOC);
        return false;
    } 
}
?>