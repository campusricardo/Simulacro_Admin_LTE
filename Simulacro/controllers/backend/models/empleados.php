<?php 
require_once("/var/www/html/SkylAb-142/Simulacro/fullstack/backend/config/connect.php");

class Empleado extends Connect{ 

    private $id_empleado;
    private $nombre_empleado;
    private $telefono_empleado;

    public function __construct($id_empleado = 0, $nombre_empleado = "", $telefono_empleado = 0, $dbCnx= ""){
        $this->id_empleado = $id_empleado;
        $this->nombre_empleado = $nombre_empleado;
        $this->telefono_empleado = $telefono_empleado;

        parent::__construct($dbCnx);
    }


    public function getId(){
        return $this->id_empleado;
    }
    
    public function setId(){
        $this->id_empleado = $id_empleado;
    }
    
    public function getNombreEmpleado(){
        return $this->nombre_empleado;
    }
    
    public function setNombreEmpleado(){
        $this->nombre_empleado = $nombre_empleado;
    }
    
    public function getTelefonoEmpleado(){
        return $this->telefono_empleado;
    }
    
    public function setTelefonoEmpleado(){
        $this->telefono_empleado = $telefono_empleado;
    }
    
    public function AddData() {
       try {
        $stm = this->dbCnx->prepare("INSERT INTO empleados(nombre_empleado, telefono_empleado ) VALUES (?,?)");
        $stm->execute([$this->nombre_empleado, $this->telefono_empleado]);
       } catch (Exception $e) {
        return $e->getMessage();
    }
    }



    public function obtainData(){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT * FROM empleados");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    
    public function selectOne(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM empleados WHERE id_empleado=?");
            $stm-> execute([$this-> id_empleado]);
            return $stm-> fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }
 
    
}

?>