<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="views/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <img src="pictures/raqueta-de-padel.png" alt="">
        <h1>Padel Badalona</h1>
    </header>
    <?php
        session_start();
        require_once "autoload.php";

        //--------------------------------------------------------//
        
        if (isset($_GET['controller'])){
            $nombreController = $_GET['controller']."Controller";
        }
        else{
            $nombreController="appController";
        }
        if (class_exists($nombreController)){
            $controlador = new $nombreController(); 
        if(isset($_GET['action'])){
            $action = $_GET['action'];
        }
        else{
            $action = "mostrarLogin";
        }
            $controlador->$action();   
        }else{
            echo "La pagina no existe";
        } 
    ?>
</body>
</html>