<?php
include "conexiondb.php";

$id_usuario = $_SESSION["idUsuario"];

$sql = "SELECT Descripcion, fechaAgendada, Color 
        FROM nota
        WHERE idUsuario = '$id_usuario';";

// Comprobamos si no hay errores
if(($result = $conexion->query($sql)) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Realizar la consulta a la base de datos para obtener las notificaciones
$resultado = mysqli_query($conexion, $sql);

// Verificar si se obtuvieron resultados
if ($resultado->num_rows > 0) {
    // Array para almacenar las notificaciones
    $cargar = array();

    // Recorrer los resultados y agregar las notificaciones al array
    while ($fila = $resultado->fetch_assoc()) {
        $eve = array(
            "Descripcion" => $fila["Descripcion"],
            "fechaAgendada" => $fila["fechaAgendada"],
            "Color" => $fila["Color"]
        );
        $cargar[] = $eve;
    }

    // Generar el código JavaScript para los eventos del calendario
    $eventos_js = "";
    foreach ($cargar as $eve) {
        $descrip = $eve["Descripcion"];
        $fecha = $eve["fechaAgendada"];
        $col = $eve["Color"];
        // 'Rellenamos' el arreglo evento para 
        $evento = "{ 
            title: '$descrip', 
            start: '$fecha',
            color: '$col'
        },";
        $eventos_js .= $evento;
    }

    // Imprimir el código JavaScript
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: [$eventos_js]
                });
                calendar.render();
            });
        </script>";
}

?>