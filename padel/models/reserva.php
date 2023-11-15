<?php
if(isset($SESSION['eliminar'])){
    require_once '../../config/database.php';
}
else{
    require_once 'config/database.php';
}

class Reserva extends Database {
    private $id_reserva;
    private $email_usuario;
    private $id_pista;
    private $fecha;
    private $hora;

    // Getters and Setters
    public function getId_reserva() {
        return $this->id_reserva;
    }

    public function setId_reserva($id_reserva) {
        $this->id_reserva = $id_reserva;
    }

    public function getEmail_usuario() {
        return $this->email_usuario;
    }

    public function setEmail_usuario($email_usuario) {
        $this->email_usuario = $email_usuario;
    }

    public function getId_pista() {
        return $this->id_pista;
    }

    public function setId_pista($id_pista) {
        $this->id_pista = $id_pista;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    //Metodos:
    function reservasUsuarioLogeado(){
        $sql = "SELECT * FROM reservas WHERE email_usuario = '".$_SESSION['emailUsuario']."' AND activa = 1";
        $rows = $this->db->query($sql);
        return $rows;
    }

    function existeFecha($fecha){
        $sql = "SELECT COUNT(*) AS count FROM reservas WHERE fecha = '".$fecha."'";
        $row = $this->db->query($sql)->fetch();
        if ($row["count"] > 0 ) {
            $sql2 = "SELECT email_usuario, hora, id_pista FROM reservas WHERE fecha = '".$fecha."' AND activa = 1";
            $rows = $this->db->query($sql2);
        }
        else{
            $rows = [];
        }
        return $rows;
    }

    function reservarPista($user, $fecha, $hora, $pista){
        $sql = "INSERT INTO reservas (email_usuario, id_pista, fecha, hora, activa) VALUES('".$user."', $pista, '".$fecha."', '".$hora."', 1)";
        $this->db->query($sql);
    }

    function comprobarReserva($hora, $fecha, $pista, $user){
        $sql = "SELECT * FROM reservas WHERE email_usuario = '".$user."' AND fecha ='" .$fecha."' AND hora = '".$hora."' AND id_pista != $pista";
        $ejecutar = $this->db->query($sql);
        $filas = $ejecutar->rowCount();
        if ($filas==0){
            $existe = false;
        }
        else{
            $existe= true;
        }
        return $existe;
    }

    function eliminarReserva($id_reserva){
        $sql = "UPDATE reservas SET activa = 0 WHERE id_reserva = ".$id_reserva;
        $ejecutar = $this->db->query($sql);
    }
}

?>