<?php
require_once("/var/www/html/SkylAb-142/Simulacro/fullstack/backend/config/connect.php");
class RegistroUser extends Connect{

private $id_user;
private $id_empleado;
private $username;
private $password;

public function __construct($id_user=0,$id_empleado=0,$username="",$password="",$dbCnx=""){
$this->id_user = $id_user;
$this->id_empleado = $id_empleado;
$this->username = $username;
$this->password = $password;
parent:: __construct($dbCnx);
}

public function setId($id_user)
{
$this->id_user = $id_user;
}

public function getId()
{
return $this-> id_user;
}
///
public function setid_empleado($id_empleado)
{
$this->id_empleado = $id_empleado;
}

public function getid_empleado()
{
return $this-> id_empleado;
}
///
///

public function setUsername($username)
{
$this->username = $username;
}

public function getUsername()
{
return $this-> username;
}

///

public function setPassword($password)
{
$this->password = $password;
}

public function getPassword()
{
return $this-> password;
}

public function checkUser($username){

try {
$stm = $this->dbCnx->prepare("SELECT * FROM users WHERE username = '$username' ");
$stm -> execute();
if ($stm->fetchColumn()){
    return true;
} else { 
    return false;
}
} catch (Exception $e){
    return $e->getMessage();
}

}

public function insertData(){
try{
$stm = $this-> dbCnx -> prepare ("INSERT INTO users (id_empleado, username, password) values(?,?,?)");
$stm -> execute([$this->id_empleado, $this->username, md5($this->password)]);

}
catch (Exception $e)
{
    return $e->getMessage();
}
}

}
?>
