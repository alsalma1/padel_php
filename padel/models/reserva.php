<?php
require_once 'config/database.php';
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
        $sql = "SELECT * FROM reservas WHERE email_usuario = '".$_SESSION['emailUsuario']."'";
        $rows = $this->db->query($sql);
        return $rows;
    }
}

?>