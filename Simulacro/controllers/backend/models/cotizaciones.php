<?php 
require_once("/var/www/html/SkylAb-142/Simulacro/fullstack/backend/config/connect.php");
ini_set('error_reporting', E_ALL);
error_reporting(E_ALL);

class Cotizacion extends Connect {
    private $id_cotizacion;
    private $id_empleado;
    private $id_constructora;
    private $id_producto;
    private $fecha;
    private $duracion;
    private $cantidad;

public function __construct($id_cotizacion = 0, $id_empleado= '', $id_constructora = '', $id_producto= '',$fecha = '', $duracion = 0, $cantidad = 0, $dbCnx = ""){
    $this->id_cotizacion = $id_cotizacion;
    $this->id_empleado = $id_empleado;
    $this->id_constructora = $id_constructora;
    $this->id_producto = $id_producto;
    $this->fecha = $fecha;
    $this->duracion = $duracion;
    $this->cantidad = $cantidad;

    parent::__construct($dbCnx);
}

public function getId(){
    return $this->id_cotizacion;
}

public function setId($id_cotizacion){
    $this->id_cotizacion = $id_cotizacion;
}

public function getIdEmpleado(){
    return $this->id_empleado;
}

public function setIdEmpleado($id_empleado){
    $this->id_empleado = $id_empleado;
}

public function getIdConstructora(){
    return $this->id_constructora;
}

public function setIdConstructora($id_constructora){
    $this->id_constructora = $id_constructora;
}


public function getIdProducto(){
    return $this->id_producto;
}

public function setIdProducto($id_producto){
    $this->id_producto = $id_producto;
}


public function getFecha() {
    return $this->fecha;
}

public function setFecha($fecha) {
    $this->fecha = $fecha;
}

public function getduracion(){
    return $this->duracion;
}

public function setduracion($duracion){
    $this->duracion = $duracion;
}



public function getcantidad(){
    return $this->cantidad;
}

public function setcantidad($cantidad){
    $this->cantidad = $cantidad;
}



public function insertData() {
    try {
     $stm = $this->dbCnx->prepare("INSERT INTO cotizaciones(id_empleado, id_constructora, id_producto, duracion, cantidad ) VALUES (?,?,?,?,?)");
     $stm->execute([$this->id_empleado, $this->id_constructora, $this->id_producto, $this->duracion, $this->cantidad]);
    } catch (Exception $e) {
     return $e->getMessage();
 }
 }

public function getJson(){
    try {

        $stm=$this->dbCnx->prepare("SELECT * FROM cotizaciones");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exeption $e) {
        return $e->getMessage();
    }
}

 public function obtainData(){
     try {
         $stm = $this -> dbCnx -> prepare("SELECT * FROM cotizaciones");
         $stm -> execute();
         return $stm -> fetchAll();
     } catch (Exception $e) {
         return $e->getMessage();
     }
 }



}
?>