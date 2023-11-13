<h1>Reservar pista</h1>
<div class="fecha">
    <p>Selecciona una fecha: </p>
    <input type="date" name="dateChooser" id="dateChooser" oninput="validateDate()" value="<?php echo isset($_GET['fecha']) ? $_GET['fecha'] : ''; ?>">
</div>
<?php
$usuario = $_SESSION['emailUsuario'];
if (isset($_SESSION['fecha'])) {
    $arrayHoras = [];
    $arrayId_pista = [];
    $arrayUsuario = [];
    foreach ($rows as $row) {
        $arrayUsuario[] = $row['email_usuario'];
        $arrayHoras[] = $row['hora'];
        $arrayId_pista[] = $row['id_pista'];
    }
    ?>
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
            $horaValor = sprintf("%02d:00", $hora); // Formatear la hora
            echo "<td>" . $horaValor . "</td>";
            
            // Verificar las coincidencias y aplicar el color rojo
            for ($pista = 1; $pista <= 5; $pista++) {
                $coincidencias = array_keys($arrayHoras, $horaValor);
                $color = 'sin-color';
                
                foreach ($coincidencias as $indice) {
                    if ($arrayId_pista[$indice] == $pista) {
                        if ($arrayUsuario[$indice] == $usuario) {
                            $color = 'azul';
                        } else {
                            $color = 'rojo';
                        }
                    }
                }
                if (in_array($pista, $pistaM)) {
                    $color = 'amarillo';
                }

                echo '<td class="' . $color . '"></td>';
            }

            echo "</tr>";
        }
        ?>
    </table>
    <?php
}

else{?>
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
<?php
}
?>
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
    // Crear una nueva fecha como copia de la fecha actual
    var minDate = new Date(currentDate);
    // Restar un día a la fecha mínima
    minDate.setDate(currentDate.getDate() - 1);
    // Formatear la fecha mínima como cadena en formato YYYY-MM-DD
    minDate = minDate.toISOString().split('T')[0];
    // Establecer el atributo 'min' del elemento con ID 'dateChooser' con la fecha mínima
    document.getElementById('dateChooser').min = minDate;
    
    var maxDate = new Date(currentDate);
    maxDate.setDate(currentDate.getDate() + 7);
    var maxDateFormatted = maxDate.toISOString().split('T')[0];
    document.getElementById('dateChooser').max = maxDateFormatted;

    function validateDate() {
        var selectedDate = new Date(document.getElementById('dateChooser').value);
        if (selectedDate < currentDate || selectedDate > maxDate) {
            alert('Selecciona una fecha válida dentro del rango permitido.');
            document.getElementById('dateChooser').value = ''; // Limpiar la fecha si es inválida
        }
        else if(selectedDate >= currentDate && selectedDate < maxDate){// 
            var fecha = selectedDate.toISOString().split('T')[0];
            window.location.href='index.php?controller=app&action=buscarFecha&fecha='+fecha;
        }
    }

    //Clicar en la celda para reservar
    var celdaSeleccionada = document.getElementsByClassName("sin-color");
    var fecha = document.getElementById("dateChooser").value;
    for (var i = 0; i < celdaSeleccionada.length; i++) {
        celdaSeleccionada[i].addEventListener("click", function() {
        var pistaS = this.cellIndex;
        var horaS = this.parentNode.firstChild.textContent;
        window.location.href='index.php?controller=app&action=reservar&hora='+horaS+'&pista='+pistaS+'&fecha='+fecha;
    });
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

    .tablaReservar td.sin-color {
        cursor: pointer;
    }

</style>