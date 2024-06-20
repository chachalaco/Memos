<?php
include "seguridad.php";
include "conexiondb.php";
include "toast.php";

if (isset($_SESSION["toastmesaje"])) {
    echo $_SESSION["toastmesaje"];
    unset($_SESSION["toastmesaje"]);
}

if (isset($_SESSION["usuario"])) {
    $correo = $_SESSION["usuario"];
    
    // Consulta para obtener los datos del usuario
    $query = "SELECT * FROM usuario WHERE correo = ?";
    $stmt = $conexion->prepare($query);
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $idUsuario = $row['idUsuario'];
        $nombre = $row['nombre'];
        $correo = $row['correo'];
    } else {
        echo "Usuario no encontrado.";
        exit();
    }
} else {
    echo "Usuario no autenticado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="./css/config.css">
    <script>
        function showSection(sectionId) {
            var sections = document.querySelectorAll('.section');
            sections.forEach(function(section) {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';

            var sidebarLinks = document.querySelectorAll('.sidebar a');
            sidebarLinks.forEach(function(link) {
                link.classList.remove('active');
            });
            document.querySelector('.sidebar a[onclick="showSection(\'' + sectionId + '\')"]').classList.add('active');
        }

        document.addEventListener('DOMContentLoaded', function() {
            showSection('general'); // Mostrar la sección Información General por defecto
        });
    </script>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="d-flex align-items-center">
            <a href="principal.php"> 
                <img class="logoig" src="img/iconoM.png">
            </a>   
        </div>
        <form action="sesion.php" method="POST">
            <button class="btn btn-danger" value="Cerrar Sesion" name="tipo">Cerrar sesión</button>
        </form>
    </div>

    <div class="sidebar">
        <a href="javascript:void(0)" onclick="showSection('general')">Información General</a>
        <a href="javascript:void(0)" onclick="showSection('updateUser')">Actualizar Usuario</a>
        <a href="javascript:void(0)" onclick="showSection('updatePassword')">Actualizar Contraseña</a>
        <a href="#eliminar" data-bs-toggle="modal">Eliminar Cuenta</a>
    </div>

    <div class="content">
        <div id="general" class="section">
            <h2>Información General</h2>
            <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
            <p><strong>Correo:</strong> <?php echo $correo; ?></p>
        </div>

        <div id="updateUser" class="section">
            <h2>Actualizar Datos del Usuario</h2>
            <form id="updateForm" action="actualizarUsuario.php" method="post">
                <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $nombre; ?>" required>
                <label for="correo">Correo:</label>
                <input type="email" name="correo" value="<?php echo $correo; ?>" required><br>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>

        <div id="updatePassword" class="section">
            <h2>Actualizar Contraseña</h2>
            <form id="changePasswordForm" action="actualizarContrasena.php" method="post">
                <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                <label for="current_password">Contraseña Actual:</label>
                <input type="password" name="current_password" required>
                <label for="new_password">Nueva Contraseña:</label>
                <input type="password" name="new_password" required>
                <label for="confirm_password">Confirmar Nueva Contraseña:</label>
                <input type="password" name="confirm_password" required>
                <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
            </form>
        </div>
    </div>

    <!-- Eliminar cuenta-->
    <div class="modal fade" id="eliminar">
        <div class="modal-dialog row">
            <div class="modal-content col-ls-12">
                <form id="formI" action="sesion.php" method="post">
                    <div class="modal-header">
                        <div class="col-6"><img src="img/iconoM.png" alt="Logo" class="logoig"></div>
                        <div class="col-6 text-end"><input type="submit" value="Eliminar Cuenta" name="tipo" class="btn btn-danger"></div>
                    </div>
                    <div class="modal-body row">
                        <div class="esp"></div>
                        <div class="col-12">
                            <label for="pass2" class="fw-bold col-8 form-label">Contraseña:</label>
                            <input type="password" name="pass2" id="epass" class="col-4 form-control" maxlength="10" required>
                        </div>
                        <div class="esp"></div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        Copyright © MEMOS 2024
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
