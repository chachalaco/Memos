<?php
    $servername= "localhost";
    $username = "root";
    $password = "";
    $nombreDB = "memos";

    //Crear la conexión con la DB
    $conexion = new mysqli($servername, $username, $password, $nombreDB);

    //Si ocurre un error muestrame un mensaje.
    if ($conexion->connect_error) {
	    die("Conexión fallida: " . $conexion->connect_error);
	}
?>