<?php 
require_once("/var/www/html/SkylAb-142/Simulacro/fullstack/backend/config/connect.php");

class Constructora extends Connect {
    private $id_constructora;
    private $nombre_constructora;
    private $telefono_constructora;

    public function __construct($id_constructora = 0 ,  $nombre_constructora = "", $telefono_constructora = 0, $dbCnx= ""){
        $this->id_constructora = $id_constructora;
        $this->nombre_constructora = $nombre_constructora;
        $this->telefono_constructora = $telefono_constructora;

        parent::__construct($dbCnx);
    }

    public function getId(){
        return $this->id_constructora;
    }

    public function setId($id_constructora){
        $this->id_constructora = $id_constructora;
    }

    public function getNombre(){
        return $this->nombre_constructora;
    }

    public function setNombre($nombre_constructora){
        $this->nombre_constructora = $nombre_constructora;
    }

    public function getTelefono(){
        return $this->telefono_constructora;
    }

    public function setTelefono($telefono_constructora){
        $this->telefono_constructora = $telefono_constructora;
    }


    public function AddData() {
        try {
         $stm = this->dbCnx->prepare("INSERT INTO constructoras(nombre_constructora, telefono_constructora ) VALUES (?,?)");
         $stm->execute([$this->nombre_constructora, $this->telefono_constructora]);
        } catch (Exception $e) {
         return $e->getMessage();
     }
     }
 
 
 
     public function obtainData(){
         try {
             $stm = $this -> dbCnx -> prepare("SELECT * FROM constructoras");
             $stm -> execute();
             return $stm -> fetchAll();
         } catch (Exception $e) {
             return $e->getMessage();
         }
     }
 
     
     public function selectOne(){
         try {
             $stm = $this->dbCnx->prepare("SELECT * FROM constructoras WHERE id_constructora=?");
             $stm-> execute([$this-> id_constructora]);
             return $stm-> fetchAll();
         } catch (Exception $e) {
             return $e-> getMessage();
         }
     }

}
?>