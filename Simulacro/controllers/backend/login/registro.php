<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST["registrarse"])){
    require_once("registroUser.php");

    $registrar = new RegistroUser();

    $registrar-> setid_empleado($_POST["empleado"]);
    $registrar-> setUsername($_POST["username"]);
    $registrar-> setPassword($_POST["password"]);

    $registrar-> insertData();

    echo "<script> alert('El usuario se registro correctamente'); </script>";
}

?>