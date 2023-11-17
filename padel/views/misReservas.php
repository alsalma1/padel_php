<h1>Mis reservas</h1>

<?php
foreach($rows as $row){
    $id = $row['id_reserva'];
    $fechaFormateada = date("d-m-Y", strtotime($row['fecha']));
    ?>
    <div class="reserva">
        <p><strong>Número de reserva:</strong> <?php echo $row['id_reserva']?></p>
        <p><strong>Fecha:</strong> <?php echo $fechaFormateada ?></p>
        <p><strong>Hora:</strong> <?php echo $row['hora']?></p>
        <p><strong>Número de pista:</strong> <?php echo $row['id_pista']?></p>
        <button type="button" onclick="window.location.href='index.php?controller=app&action=eliminarReserva&id=<?php echo $id ?>&fecha=<?php echo $row['fecha'] ?>'">Eliminar</button>
    </div>
    <?php
}
?>

<footer>
    <a href="index.php?controller=app&action=menu" class="button-7">Ver menú</a>
    <a href="index.php?controller=app&action=salir" class="button-7">Cerrar sesión</a>
</footer>


<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #333;
}

.reserva {
    background-color: #fff;
    border: 1px solid #ddd;
    margin-bottom: 10px;
    padding: 15px;
    border-radius: 5px;
}

.reserva button {
    padding: 10px;
    font-size: 14px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: #fff;
    background-color: #3498db;
    border: none;
    border-radius: 5px;
    box-shadow: 0 4px #2980b9;
}

.reserva button:hover {
    background-color: #2980b9;
}

footer {
    margin-top: 20px;
    text-align: center;
}

.button-7 {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: #fff;
    background-color: #3498db;
    border: none;
    border-radius: 5px;
    box-shadow: 0 4px #2980b9;
}

.button-7:hover {
    background-color: #2980b9;
}

</style>