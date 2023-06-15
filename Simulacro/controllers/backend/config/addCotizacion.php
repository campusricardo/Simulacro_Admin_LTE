<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



    if (isset($_POST['guardar'])){

        require_once('../models/cotizaciones.php');
        $config = new Cotizacion();

        $config -> setIdEmpleado($_POST['empleado']);
        $config -> setIdConstructora($_POST['constructora']);
        $config -> setIdProducto($_POST['producto']);
        $config -> setduracion($_POST['duracion']);
        $config -> setcantidad($_POST['cantidad']);
        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='/SkylAb-142/Simulacro/fullstack/frontend/nueva_cotizaciones.php' </script>";
    }

?>