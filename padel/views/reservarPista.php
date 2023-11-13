<h1>Reservar pista</h1>
<div class="fecha">
    <p>Selecciona una fecha: </p><input type="date" name="dateChooser" id="dateChooser" oninput="validateDate()">
</div>
<table class="tablaReservar">
    <tr>
        <th></th>
        <th>Pista 1</th>
        <th>Pista 2</th>
        <th>Pista 3</th>
        <th>Pista 4</th>
        <th>Pista 5</th>
    </tr>
    <?php
        for ($hora = 9; $hora <= 21; $hora++) {
            echo "<tr>";
            echo "<td>" . sprintf("%02d:00", $hora) . "</td>";
            echo "</tr>";
        }
    ?>
</table>
<div class="colores">
    <div class="cuadro rojo"></div>
    <p>Ocupada</p>
    <div class="cuadro amarillo"></div>
    <p>Mantenimiento</p>
    <div class="cuadro azul"></div>
    <p>Mis reservas</p>
</div>
<footer>
    <a href="index.php?controller=app&action=menu" class="button-7">Ver menú</a>
    <a href="index.php?controller=app&action=salir" class="button-7">Cerrar sesión</a>
</footer>
<script>
    // Obtener la fecha actual
    var currentDate = new Date();
    // Establecer la fecha mínima (actual)
    var minDate = currentDate.toISOString().split('T')[0];
    document.getElementById('dateChooser').min = minDate;
    var maxDate = new Date(currentDate);
    maxDate.setDate(currentDate.getDate() + 7);

    // Establecer la fecha máxima en el formato YYYY-MM-DD
    var maxDateFormatted = maxDate.toISOString().split('T')[0];
    document.getElementById('dateChooser').max = maxDateFormatted;
    function validateDate() {
        var selectedDate = new Date(document.getElementById('dateChooser').value);
        var currentDate = new Date();
        var maxDate = new Date(currentDate);
        maxDate.setDate(currentDate.getDate() + 7);

        if (selectedDate < currentDate || selectedDate > maxDate ) {
            alert('Selecciona una fecha válida dentro del rango permitido.');
            document.getElementById('dateChooser').value = ''; // Limpiar la fecha si es inválida
        }
        else if(selectedDate > currentDate && selectedDate < maxDate){
            var fecha = selectedDate.toISOString().split('T')[0];
            // Realizar una solicitud POST al controlador
            fetch('appController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ fecha: fecha }),
            })
            .then(response => response.json())
            .then(data => {
                // Manejar la respuesta del servidor si es necesario
                console.log(data);
            })
            .catch(error => {
                console.error('Error al realizar la solicitud:', error);
            });
        }
    }
</script>
<style>
    .tablaReservar {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px; /* Añadido margen superior para separar de otros elementos */
    }

    .tablaReservar th, .tablaReservar td {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 10px 0;
    }

    .tablaReservar th {
        background-color: #3380D2;
        color: white;
    }

    .tablaReservar tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .tablaReservar tr:hover {
        background-color: #ddd;
    }

    /* Estilos para colores */
    .colores {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-top: 20px;
    }

    .cuadro {
        width: 20px;
        height: 20px;
        border-radius: 3px;
        margin-right: 5px;
    }

    .rojo {
        background-color: red;
    }

    .amarillo {
        background-color: yellow;
    }

    .azul {
        background-color: blue;
    }

    .colores p {
        margin: 0;
    }

</style>