<?php
require_once "models/usuario.php";
require_once "models/reserva.php";
class AppController{
    public function menu(){
        require_once "views/menu.php";
    }
    public function mostrarLogin(){
        require_once "views/login.php";
    }

    public function comprobarLogin(){
        if($_POST){
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $fecha = $data['fecha'];
        
            // Haz lo que necesites con la fecha en el servidor
            // ...
        
            // Envía una respuesta si es necesario
            echo json_encode(['success' => true]);
        } else {
            // Manejar otros métodos de solicitud si es necesario
        }
    }
}
?>