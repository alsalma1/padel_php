<h1>Mis reservas</h1>
<table>
    <tr>
        <th>Numero reserva</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Numero pista</th>
        <th>Eliminar</th>
    </tr>

    <?php
    foreach($rows as $row){
        $id = $row['id_reserva'];
        ?>
        <tr>
            <td><?php echo $row['id_reserva']?></td>
            <td><?php echo $row['fecha']?></td>
            <td><?php echo $row['hora']?></td>
            <td><?php echo $row['id_pista']?></td>
            <td><a href="index.php?controller=app&action=eliminarReserva&id=<?php echo $id ?>"><img src="pictures/eliminar.png" alt=""></a></td>
        </tr>
        <?php
    }
    ?>
</table>
<footer>
    <a href="index.php?controller=app&action=menu" class="button-7">Ver menú</a>
    <a href="index.php?controller=app&action=salir" class="button-7">Cerrar sesión</a>
</footer>