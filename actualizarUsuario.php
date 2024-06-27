<?php
include "seguridad.php";
include "conexiondb.php";
include "toast.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $idUsuario = $_POST['idUsuario'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    
    $query = "UPDATE usuario SET nombre = ?, correo = ? WHERE idUsuario = ?";
    $stmt = $conexion->prepare($query);
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }
    $stmt->bind_param("ssi", $nombre, $correo, $idUsuario);

    if ($stmt->execute()) {
        $toastmensaje = toast(TRUE, "Nombre de usuario actualizado correctamente.");
        $_SESSION["toastmesaje"] = $toastmensaje;
        // setcookie('notification', 'Your notification message');

        header('location: index.php');
        exit();
    } else {
        echo "Error al actualizar los datos: " . $stmt->error;
    }
}
?>
