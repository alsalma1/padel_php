<?php
require_once "../models/reserva.php";
if (isset($_GET['id'])) {
    $SESSION['eliminar'] = true;
    $id_reserva = $_GET['id'];
    $reserva = new Reserva();
    $reserva->eliminarReserva($id_reserva);
    echo "Reserva eliminada exitosamente";
} else {
    // Manejar la situación si no se proporciona el ID de la reserva
    echo "No se proporcionó un ID de reserva";
}
?>
