<?php 
require_once("/var/www/html/SkylAb-142/Simulacro/fullstack/backend/config/connect.php");

class Producto extends Connect {
    private $id_producto;
    private $nombre_producto;
    private $precio_dia;

    public function __construct($id_producto = 0 ,  $nombre_producto = "", $precio_dia = 0, $dbCnx= ""){
        $this->id_producto = $id_producto;
        $this->nombre_producto = $nombre_producto;
        $this->precio_dia = $precio_dia;

        parent::__construct($dbCnx);
    }

    public function getId(){
        return $this->id_producto;
    }

    public function setId($id_producto){
        $this->id_producto = $id_producto;
    }

    public function getNombre(){
        return $this->nombre_producto;
    }

    public function setNombre($nombre_producto){
        $this->nombre_producto = $nombre_producto;
    }

    public function getPrecioDia(){
        return $this->precio_dia;
    }

    public function setPrecioDia($precio_dia){
        $this->precio_dia = $precio_dia;
    }


    public function AddData() {
        try {
         $stm = this->dbCnx->prepare("INSERT INTO productos(nombre_producto, precio_dia ) VALUES (?,?)");
         $stm->execute([$this->nombre_producto, $this->precio_dia]);
        } catch (Exception $e) {
         return $e->getMessage();
     }
     }
 
 
 
     public function obtainData(){
         try {
             $stm = $this -> dbCnx -> prepare("SELECT * FROM productos");
             $stm -> execute();
             return $stm -> fetchAll();
         } catch (Exception $e) {
             return $e->getMessage();
         }
     }
 
     
     public function selectOne(){
         try {
             $stm = $this->dbCnx->prepare("SELECT * FROM productos WHERE id_producto=?");
             $stm-> execute([$this-> id_producto]);
             return $stm-> fetchAll();
         } catch (Exception $e) {
             return $e-> getMessage();
         }
     }

}
?>