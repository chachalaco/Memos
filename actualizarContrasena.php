<?php
include "seguridad.php";
include "conexiondb.php";
include "toast.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_POST['idUsuario'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Consulta para obtener la contraseña actual del usuario
    $query = "SELECT contrasena FROM usuario WHERE idUsuario = ?";
    $stmt = $conexion->prepare($query);
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['contrasena'];

        // Verificar la contraseña actual
        if (password_verify($current_password, $hashed_password)) {
            if ($new_password === $confirm_password) {
                $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Actualizar la contraseña del usuario
                $query = "UPDATE usuario SET contrasena = ? WHERE idUsuario = ?";
                $stmt = $conexion->prepare($query);
                if ($stmt === false) {
                    die("Error en la preparación de la consulta: " . $conexion->error);
                }
                $stmt->bind_param("si", $new_hashed_password, $idUsuario);

                if ($stmt->execute()) {
                    $toastmensaje = toast(TRUE, "Contraseña actualizada correctamente");
                    $_SESSION["toastmesaje"] = $toastmensaje;
                    header('location: principal.php');
                    exit();
                } else {
                    echo "Error al actualizar la contraseña: " . $stmt->error;
                }
            } else {
                $toastmensaje = toast(FALSE, "Las nuevas contraseñas no coinciden.");
                $_SESSION["toastmesaje"] = $toastmensaje;
                header('location: principal.php');
            }
        } else {
            $toastmensaje = toast(FALSE, "La contraseña actual es incorrecta.");
            $_SESSION["toastmesaje"] = $toastmensaje;
            header('location: principal.php');
        }
    } else {
        $toastmensaje = toast(FALSE, "Usuario no encontrado.");
        $_SESSION["toastmesaje"] = $toastmensaje;
        header('location: principal.php');
    }
}
?>
