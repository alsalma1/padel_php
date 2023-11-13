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
        ?>
        <tr>
            <td><?php echo $row['id_reserva']?></td>
            <td><?php echo $row['fecha']?></td>
            <td><?php echo $row['hora']?></td>
            <td><?php echo $row['id_pista']?></td>
            <td><a href=""><img src="../resources/eliminar.png" alt=""></a></td>
        </tr>
        <?php
    }
    ?>
</table>
<footer>
    <a href="index.php?controller=app&action=menu" class="button-7">Ver menú</a>
    <a href="index.php?controller=app&action=salir" class="button-7">Cerrar sesión</a>
</footer>