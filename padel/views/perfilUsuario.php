<div class="divImg">
    <img class="imgUsuario" src="pictures/imagenes_usua/th.jpeg" alt="">
</div>
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

<footer class="footer">
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

.divImg {
    text-align: center;
    margin-bottom: 20px;
}

.imgUsuario {
    max-width: 200px;
    border-radius: 50%;
}

.datosUsuario {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

.tr:hover {
    background-color: #f5f5f5;
}

.footer {
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