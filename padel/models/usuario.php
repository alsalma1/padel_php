<?php
require_once 'config/database.php';
class Usuario extends Database{
    private $email;
    private $nombre;
    private $apellido;
    private $contrasena;
    private $fecha_nacimiento;
    private $telefono;
    private $dni;
    private $foto;
    private $socio;
    
    //Getters and Setters
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    public function setFecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getSocio() {
        return $this->socio;
    }

    public function setSocio($socio) {
        $this->socio = $socio;
    }
    
    //Metododos
    public function esUsuario($mail, $password){
        $sql = "SELECT * FROM usuarios WHERE email = '".$mail."' AND contraseña = '".$password."'";
        $ejecutar = $this->db->query($sql);
        $filas = $ejecutar->rowCount();

        if ($filas>0){
            $existeAdmin = true;
        }
        else{
            $existeAdmin = false;
        }
        return $existeAdmin;
    }

    public function nombreUsuario(){
        $sql = "SELECT nombre FROM usuarios WHERE email = '".$_SESSION['emailUsuario']."'";
        $ejecutar = $this->db->query($sql);
        $nombre = $ejecutar->fetchColumn();
        return $nombre;
    }

    public function datosUsuario(){
        $sql = "SELECT * FROM usuarios WHERE email = '".$_SESSION['emailUsuario']."'";
        $result = $this->db->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function salir(){
        session_destroy();
    }
}

?>