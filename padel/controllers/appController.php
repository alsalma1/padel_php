<?php
require_once "models/usuario.php";
require_once "models/reserva.php";
require_once "models/pista.php";
require_once 'vendor/autoload.php';
// Cargar la clase de PHPMailer
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
class AppController{
    public function menu(){
        require_once "views/menu.php";
    }
    public function mostrarLogin(){
        require_once "views/login.php";
    }

    public function comprobarLogin(){
        if($_POST['logear']){
            $usuario = new Usuario();
            $user = $_POST['email'];
            $passwd = $_POST['passwd'];
            //Si existe el usuario 
            if($usuario->esUsuario($user,$passwd)==true){
                //Crear variables de sessión 
                $_SESSION['emailUsuario'] = $user;
                $_SESSION['nombreUsuario'] = $usuario->nombreUsuario();
                header("Location: index.php?controller=app&action=menu");
                exit();
            }
            else{
                ?>
                <script>alert("Nombre de usuario o contraseña incorrectos!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=app&action=mostrarLogin">
                <?php
            }
        }
    }

    public function mostrarPerfilUsuario(){
        $usuario = new Usuario();
        $rows = $usuario->datosUsuario();        
        require_once "views/perfilUsuario.php";
    }
    
    public function reservasUsuario(){
        $fechaActual = date('Y-m-d');
        $reserva = new Reserva();
        $rows = $reserva->reservasUsuarioLogeado();
        require_once "views/misReservas.php";
    }

    public function reservarPista(){
        require_once "views/reservarPista.php";
    }

    public function salir(){
        $salir = new Usuario;
        $salir->salir();
        header("Location: index.php");
    }

    public function pistasMantenimiento(){
        $pista = new Pista();
        $rows = $pista->pistasEnMantenimineto();
        if ($rows){
            $pistasEnMantenimiento = [];
            foreach($rows as $row) {
                $pistasEnMantenimiento[] = $row['id_pista'];
            }
        }
        return $pistasEnMantenimiento;
    }
    
    public function buscarFecha(){
        $reserva = new Reserva();
        if(isset($_GET['fecha'])){
            $fechaSeleccionada = $_GET['fecha'];
            $rows = $reserva->existeFecha($fechaSeleccionada);
            $pistaM = $this->pistasMantenimiento();
            $_SESSION['fecha'] = $fechaSeleccionada;
            require_once "views/reservarPista.php";
            unset($_SESSION['fecha']);
        }
    }  
    
    public function reservar(){
        if(isset($_GET)){
            $fechaActual = date("Y-m-d");
            $horaActual = date("H:i");
            $reserva = new Reserva();
            $user = $_SESSION['emailUsuario'];
            $fecha = $_GET['fecha'];
            $hora = $_GET['hora'];
            $pista = $_GET['pista'];
            //Comprobar si el ususario tiene una reserva el mismo dia y hora pero diferentes pista
            $reserva->comprobarReserva($hora, $fecha, $pista, $user);
            if($reserva->comprobarReserva($hora, $fecha, $pista, $user)){
                $mensaje = "No puedes reservar diferentes pistas en la misma hora y fecha!";
            }
            //No le deja reservar en una hora anterior a la actual cuando es el mismo dia
            else if($fecha == $fechaActual && $hora < $horaActual){
                $mensaje = "No puedes reservar en una hora que ya ha pasado!";
            }
            else{
                $reserva->reservarPista($user, $fecha, $hora, $pista);  
                $date = new DateTime($fecha);
                $fechaFormateada = $date->format('d-m-Y'); 
                $mensaje = "Has reservado la pista $pista el día $fechaFormateada a las $hora ";
            }
            echo '<script>';
            echo 'alert("' . $mensaje . '");';
            echo 'window.location.href = "index.php?controller=app&action=buscarFecha&fecha=' . $fecha . '";';
            echo '</script>';
            exit();
        }
    }    

    public function eliminarReserva(){
        $fechaActual = date("Y-m-d");
        $reserva = new Reserva();
        $id_reserva = $_GET['id'];
        $fecha = $_GET['fecha'];
        $reserva = new Reserva();

        $timestamp1 = strtotime($fechaActual);
        $timestamp2 = strtotime($fecha);

        if($timestamp1 == $timestamp2){
            echo "<script>alert('No se puede eliminar la reserva al mismo dia!');window.location.href = 'index.php?controller=app&action=reservasUsuario';</script>";
        }else{
            $reserva->eliminarReserva($id_reserva);
            echo "<script>alert('Tu reserva se eliminó correctamente');window.location.href = 'index.php?controller=app&action=reservasUsuario';</script>";
        }

    }
}
?>