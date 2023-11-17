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
        $sql = "SELECT id_pista, fecha_inicio, fecha_fin, estado_pista FROM estado_pistas WHERE estado_pista = 'Mantenimiento'";
        $result = $this->db->query($sql);
            
        $query = "UPDATE reservas JOIN estado_pistas ON reservas.id_pista = estado_pistas.id_pista SET activa = 0 WHERE estado_pista = 'Mantenimiento'";
        $this->db->query($query);
        //var_dump($pistasMantenimiento);
        return $result;
    }
    
}
?>