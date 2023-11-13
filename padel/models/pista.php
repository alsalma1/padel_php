<?php
require_once 'config/database.php';
class Pista extends Database{
    private $id_pista;
    private $estado;

    // Getters and Setters

    public function getId_pista() {
        return $this->id_pista;
    }

    public function setId_pista($id_pista) {
        $this->id_pista = $id_pista;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    //Metodos
    function pistasEnMantenimineto(){
        $sql = "SELECT id_pista FROM pistas WHERE estado = 'Mantenimiento'";
        $result = $this->db->query($sql);
        return $result;
    }
}
?>