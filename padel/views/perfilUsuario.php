<div class="divImg"><img class="imgUsuario" src="pictures/imagenes_usua/th.jpeg" alt=""></div>
<table class="datosUsuario">
    <tr class="">
        <th>Nombre</th>
        <td><?php echo $rows['nombre'] ?></td>
    </tr>
    <tr class="tr">
        <th>Apellido</th>
        <td><?php echo $rows['apellido'] ?></td>
    </tr>
    <tr class="tr">
        <th>DNI</th>
        <td><?php echo $rows['dni'] ?></td>
    </tr>
    <tr class="tr">
        <th>Email</th>
        <td><?php echo $rows['email'] ?></td>
    </tr>
    <tr class="tr">
        <th>Fecha nacimiento</th>
        <td><?php echo $rows['fecha_nacimiento'] ?></td>
    </tr>
    <tr>   
        <th>Telefono</th>
        <td><?php echo $rows['telefono'] ?></td>
    </tr>
</table>
<footer>
    <a href="index.php?controller=app&action=menu" class="button-7">Ver menú</a>
    <a href="index.php?controller=app&action=salir" class="button-7">Cerrar sesión</a>
</footer>