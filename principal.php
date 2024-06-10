<?php 
    include "seguridad.php";
    
    if (isset($_SESSION["toastmesaje"])) {
      // Mostrar el mensaje del toast
      echo $_SESSION["toastmesaje"];
      // Eliminar la variable de sesión del mensaje del toast
      unset($_SESSION["toastmesaje"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memos: Notas rapidaz</title>
    <link rel="icon" href="img/iconoM.png">

    <!-- Usando BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fuentes para tener letras chidas, eso creo -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface|Poppins">
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Condensed:wght@600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/principal.css">
    <link rel="stylesheet" href="css/notificaciones.css">

    <!-- Inicializando el calendario -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });
    </script>
</head>
<body>
    <!-- Aqui esta el "encabezado", donde estan los logos y los botones para cerrar sesion-->
    <div class="shadow p-3 bg-white">
        <div class="container-fluid pb-3">
            <div class="row">
                <!-- Los elementos de la derecha -->
                <div class="col-md-6 d-flex align-items-center">
                    <h4 class="offcanvas-title">MEMOS</h4>
                    <img class ="logoig" src="img/iconoM.png">
                    <img class ="logoig" src="img/Icon v2.png">
                </div>
                <!-- Los elementos de la izquierda Cerrar y Eliminar -->
                <div class="col-md-6 d-flex justify-content-end">
                    <form action="sesion.php" method="POST">
                        <button class="btn btn-primary" value="Cerrar Sesion" name="tipo">Cerrar sesión</button>
                    </form>
                    <form >
                    <button class="btn btn-danger" ><a href="#eliminar" data-bs-toggle="modal"  id="btn">Eliminar cuenta</a></button>
                    </form>
                </div>

            </div>
        </div>
    </div>

<!-- Aqui mostramos nuestro calendario y nuestras notas -->
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-9 mb-3">
                <div id='calendar'></div>

                <?php require "cargarEventos.php" ?>
            
            </div>
            <div class="col-lg-3">
                <div class="container card">
                    <div class="row card-header">
                        <div class="col-8">Notas</div>
                    <div class=" col-4 text-end" id="ico"><a href="#creanota" data-bs-toggle="modal" class="btn material-symbols-outlined" id="btn">add</a></div>
                    
                    <?php require "notas.php"; load($conexion, 0);?>

                </div>
            </div>
        </div>
    </div>

 <!-- Crear notas rapidas -->
    <div class="modal fade" id="creanota">
        <div class="modal-dialog row">
            <div class="modal-content col-ls-12">
                <!-- Aqui el formulario para crear notas -->
                <form action="notas.php" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <div class="col-6"><img src="img/IconoM.png" alt="Logo" class="logoig"></div>
                        <div class="col-6 text-end"><input type="submit" value="Crear Nota" class="btn" id="btn"></div>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body row">
                            <div class="col-12">
                                <label for="descrNota" class="fw-bold col-8 form-label">Descripción:</label>
                                <textarea name="descrNota" class="col-4 form-control" style="height:100px;" maxlength="100" pattern="^(?=.*[a-zA-Z0-9])[\sa-zA-ZáéíóúÁÉÍÓÚñÑ0-9!@#$%^&*_+-={}?]{1,100}$"
                                required></textarea>
                            </div>
                            <div class="pt-2"></div>
                            <div class="col-12">
                                <label for="fechaA" class="fw-bold col-8 form-label">Seleccionar fecha:</label>
                                <input type="date" id="fechaA" name="fechaA" class="col-4 form-control" required>
                            </div>
                            <div class="pt-2"></div>
                            <div class="col-12">
                                <label for="descrNota" class="fw-bold col-8 form-label">Selecciona un color:</label>
                                <input type="Color" id="Color" name="Color" value="#3c41bd" class="col-4 form-control" style="height:50px;"> 
                            </div>
                            <input type="hidden" value="1" name="tipo">
                            <div class="pt-3"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!-- Eliminar cuenta-->
    <div class="modal fade" id="eliminar">
        <div class="modal-dialog row">
            <div class="modal-content col-ls-12">
                <form id="formI" action="sesion.php" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <div class="col-6"><img src="img/iconoM.png" alt="Logo" class="logoig"></div>
                        <div class="col-6 text-end"><input type="submit" value="Eliminar Cuenta" name="tipo" class="btn" id="btn1"></div>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body row">
                        <div class="esp"></div>
                            <div class="col-12">
                                <label for="pass2" class="fw-bold col-8 form-label">Contraseña:</label>
                                <input type="password" name="pass2" id ="epass" class="col-4 form-control" maxlength="10" require>
                                <a onclick="togglePasswordReg3()"><span class="material-symbols-outlined btn" id="PassIcon3">visibility_off</span></a>
                            </div>
                            <div class="esp"></div>
                    </div>
                </form>
                <!-- Modal footer -->
                <div class="modal-footer justify-content-center">
                    Copyright © Notizen 2023
                </div>
            </div>
        </div>
    </div>
</body>
</html>