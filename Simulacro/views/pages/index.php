<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("/var/www/html/SkylAb-142/Simulacro/fullstack/backend/models/empleados.php");



$empleado = new Empleado();
$data = $empleado->obtainData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>AlquilaArtemis</title>
</head>
<body>
    <header>
        <nav>
            <ul class="nav-ul">
                <a href=""> Home</a>
                <a href=""> About Us </a>
                <a href=""> Contact </a>
                <a href=""> Credits </a>
            </ul>
        </nav>
    </header>

    <main>
    <div class="colum-container">
    <form action="/SkylAb-142/Simulacro/fullstack/backend/login/log.php" method="post">
    <div class="colum1">
        <label> Loguear Usuario</label>
        <input type="text" name="username" placeholder="username">
        <label for=""> Password</label>
        <input type="password" name="password">
        <input type="submit" value="Loguearse" name="log" class="input">
    </div>
    </form>
    <form action="/SkylAb-142/Simulacro/fullstack/backend/login/registro.php" method="post">
    <div class="colum2">
        <label> Registrar usuario</label>

        <input type="text" name="username"placeholder="username">

        <label>password</label>

        <input type="password" name="password">

        <label for=""> Empleado</label>

        <select name="empleado" id="empleado">

            <?php foreach ($data as $key => $val){ ?>
                <option value="<?= $val["id_empleado"] ?>"><?= $val["nombre_empleado"] ?></option>
                <?php }?>

        </select>
        <input type="submit" value="Registrarse" name="registrarse"class="input"></input>
    </div>
    </form>
    </div>
    </main>

    <footer>

    </footer>
    
</body>
</html>