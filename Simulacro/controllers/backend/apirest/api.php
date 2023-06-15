<?php

require_once("/var/www/html/SkylAb-142/Simulacro/fullstack/backend/models/cotizaciones.php");

$cotizaciones = new Cotizacion();



switch ($_GET['cot']){
    case 'all':
    $cotizaciones_data = $cotizaciones->getJson();
    echo json_encode($cotizaciones_data);

}

?>