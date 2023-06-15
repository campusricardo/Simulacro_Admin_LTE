<?php 

session_start();

if (isset($_POST['log'])) {
    require_once('loginUser.php');

    $credenciales = new LoginUser();

    $credenciales-> setusername($_POST["username"]);
    $credenciales-> setPassword($_POST["password"]);

    $login = $credenciales->login();

    if ($login){
        header('Location: /SkylAb-142/Simulacro/fullstack/frontend/nueva_cotizaciones.php');

    } else {
        echo "<script> alert('Password o email invalidos');  document.location='/SkylAb-142/Simulacro/fullstack/frontend/index.php' </script>";
    }
}

?>