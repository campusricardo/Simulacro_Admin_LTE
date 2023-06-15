<?php 

require_once("/var/www/html/SkylAb-142/Simulacro/fullstack/backend/models/constructoras.php");
require_once("/var/www/html/SkylAb-142/Simulacro/fullstack/backend/models/empleados.php");
require_once("/var/www/html/SkylAb-142/Simulacro/fullstack/backend/models/productos.php");

$empleados = new Empleado();

$constructoras = new Constructora();

$productos = new Producto();

$empleados_data = $empleados->obtainData();

$constructoras_data = $constructoras->obtainData();

$productos_data = $productos->obtainData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title> Cotizaciones </title>
</head>
<body>
<header>
    <nav>
        <ul class="nav-ul">
            <a href="nueva_cotizaciones.php" rel="noopener noreferrer"> Home</a>
            <a href="show_cotizaciones.php" rel="noopener noreferrer"> Mostrar Cotizaciones</a>
            <a href="index.php" rel="noopener noreferrer"> Log Out</a>
        </ul>
    </nav>
</header>
<main> 
    <form action="/SkylAb-142/Simulacro/fullstack/backend/config/addCotizacion.php" method="post" class="form-container">
    <div class="form-div">
    <h2> Crear Nueva Cotizacion </h2>

    <label> Seleccione al Empleado</label>

    <select name="empleado" id="empleado">
        <?php 
        foreach ($empleados_data as $key => $value) {?>
        <option value="<?= $value['id_empleado'] ?>"><?= $value['nombre_empleado']?></option>
        <?php }?>
    </select>

    <label> Seleccione a la constructora</label>

    <select name="constructora" id="constructora">
    <?php 
        foreach ($constructoras_data as $key => $value) {?>
        <option value="<?= $value['id_constructora'] ?>"><?= $value['nombre_constructora'] ?> </option>
        <?php }?>
    </select>
    
    <label> Seleccione el producto</label>

    <select name="producto" id="producto">
        <?php 
        foreach ($productos_data as $key => $value) {?>
        <option value="<?= $value['id_producto']?>"> <?= $value['nombre_producto']?></option>
        <?php }?>
    </select>

    <label> Dime la duracion</label>
    <input type="number" name="duracion" id="duracion">

    <label> Dime la cantidad</label>
    <input type="number" name="cantidad" id="cantidad">
    <input type="submit" value="VAMOS" name="guardar">
    </div>
    </form>
</main>
</body>
</html>
