<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="css/bienvenida.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php 
    include("coneccionBaseDatos.php");
    session_start();
    ob_start();
    $usuario=$_SESSION['usuario_U'];
    $nombre=$_SESSION['Nombre_U'];
    $clave=$_SESSION['clave_U'];

    if($usuario==""&&$nombre==""&&$clave==""){
        ?>
        <div class="ctn-welcome">
        <h1 class="title-welcome">Inicie Sesion
        <a href="loginRegister.php" style="text-decoration: none;" class="close-sesion">Iniciar Sesión</a>
    </div>
        <?php
    }else{
        ?>
    <div class="ctn-welcome">
        <h1 class="title-welcome">Bienvenido
        <b><?php echo $nombre?></b></h1>
        <a onclick="cerrar()" href="loginRegister.php" style="text-decoration: none;" class="close-sesion">Cerrar Sesión</a>
    </div>
        <?php
       
    }
    mysqli_close($mysqli);
?>
    <script>
        function cerrar(){
            $_SESSION['usuario_U']="";
            $_SESSION['Nombre_U']="";
            $_SESSION['clave_U']="";
        }
    </script>
</body>
</html>
