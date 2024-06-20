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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface|Poppins">
  <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Condensed:wght@600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/principal.css">
  <link rel="stylesheet" href="css/notificaciones.css">

  <!-- Inicializando el calendario -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

  <!-- Aqui el calendario IMPLEMENTAR: Vistas -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
      });

      calendar.render();

      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })

      var images = document.querySelectorAll('#iconRow img');
      var images2 = document.querySelectorAll('#eventImageContainer img');
      var description = document.getElementById('description');
      var selectedImage = document.getElementById('selectedImage');

      images.forEach(function(image) {
        image.addEventListener('click', function() {
          description.value = this.getAttribute('data-desc');
          selectedImage.value = this.src;
        });
      });


      // Obtén el botón que iniciará el reconocimiento de voz
      var voiceButton = document.getElementById('voiceButton');

      // Crea un nuevo objeto de reconocimiento de voz
      var recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();

      recognition.lang = 'es-ES'; // Configura el idioma a español
      recognition.interimResults = false; // Configura para que solo se devuelvan resultados finales
      recognition.maxAlternatives = 1; // Configura para que solo se devuelva la mejor coincidencia

      // Cuando el reconocimiento de voz produce un resultado, añade el texto a la descripción
      recognition.onresult = function(event) {
        description.value = event.results[0][0].transcript;
      };

      // Cuando se hace clic en el botón, inicia el reconocimiento de voz
      voiceButton.addEventListener('click', function() {
        recognition.start();
      });

    });
  </script>
  <style>
    .modal-body>div {
      margin-bottom: 20px;
      /* Ajusta este valor según el espaciado que desees */
    }
  </style>
</head>

<body>
  <!-- Aqui esta el "encabezado", donde estan los logos y los botones para cerrar sesion-->
  <div class="shadow p-3 bg-white headerContainer">
    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <img class="logoig" src="img/iconoM.png">
            </div>
            <div class="col-md-6 d-flex justify-content-end buttonContainer">
                <form action="config.php" method="POST">
                    <button class="btn btnAccount" value="Cuenta" name="tipo">Cuenta</button>
                </form>
                <form action="sesion.php" method="POST">
                    <button class="btn btnLogout" value="Cerrar Sesion" name="tipo">Cerrar Sesión</button>
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

            <?php require "notas.php";
            load($conexion, 0); ?>

          </div>

        </div>
        <div class="container card mt-3">
          <div class="row card-header">
            <div class="col-12">Elige un evento</div>
          </div>
          <div class="row card-body overflow-auto" style="max-height: 200px;" id="eventImageContainer">
            <!-- Aquí se cargarán las imágenes de los eventos -->
            <img data-bs-toggle="tooltip" title="Reunion familiar" style="width: 60px; height: 50px;" src="img/familia.png" class="img-thumbnail" alt="Reunion familiar">
            <img data-bs-toggle="tooltip" title="Graduacion" style="width: 60px; height: 50px;" src="img/graduacion.png" class="img-thumbnail" alt="Graduacion">
            <img data-bs-toggle="tooltip" title="Pagos o deudas" style="width: 60px; height: 50px;" src="img/metodo-de-pago.png" class="img-thumbnail" alt="Pagos o deudas">
            <img data-bs-toggle="tooltip" title="Viaje" style="width: 60px; height: 50px;" src="img/viaje.png" class="img-thumbnail" alt="Viaje">
            <img data-bs-toggle="tooltip" title="Boda" style="width: 60px; height: 50px;" src="img/pareja-de-boda.png" class="img-thumbnail" alt="Boda">
            <img data-bs-toggle="tooltip" title="Cumpleaños"  style="width: 60px; height: 50px;" src="img/papel-picado.png" class="img-thumbnail" alt="Cumpleaños">
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
                <label for="fechaA" class="fw-bold col-8 form-label">Seleccionar fecha:</label>
                <input type="date" id="fechaA" name="fechaA" class="col-4 form-control" required>
              </div>


              <div class="col-12">
                <label for="iconRow" class="fw-bold col-8 form-label">Selecciona un evento:</label>
                <div id="iconRow" class="row">
                  <div class="col">
                    <img data-bs-toggle="tooltip" title="Reunion familiar" class="img-fluid" src="img/familia.png" alt="Reunion Familiar" data-desc="Reunion Familiar">
                  </div>
                  <div class="col">
                    <img data-bs-toggle="tooltip" title="Graduacion" class="img-fluid" src="img/graduacion.png" alt="Graduacion" data-desc="Graduacion">
                  </div>
                  <div class="col">
                    <img data-bs-toggle="tooltip" title="Pagos o deudas" class="img-fluid" src="img/metodo-de-pago.png" alt="Pagos o deudas" data-desc="Pagos o deudas">
                  </div>
                  <div class="col">
                    <img data-bs-toggle="tooltip" title="Viaje" class="img-fluid" src="img/viaje.png" alt="Viaje" data-desc="Viaje">
                  </div>
                  <div class="col">
                    <img data-bs-toggle="tooltip" title="Boda" class="img-fluid" src="img/pareja-de-boda.png" alt="Boda" data-desc="Boda">
                  </div>
                  <div class="col">
                    <img data-bs-toggle="tooltip" title="Cumpleaños" class="img-fluid" src="img/papel-picado.png" alt="Cumpleaños" data-desc="Cumpleaños">
                  </div>
                </div>
              </div>

              <label for="descrNota" class="fw-bold col-8 form-label">Habla tu Descripcion:</label>
              <button style="border: none; outline: none;" id="voiceButton" data-bs-toggle="tooltip" title="También puedes hablar para la descripción de la nota">
                <img style="width: 50px; height: 50px;" src="img/microfono.png" alt="microfono">
              </button>


              <div class="col-12">
                <label for="descrNota" class="fw-bold col-8 form-label">Escribe tu Descripción:</label>
                <textarea id="description" name="descrNota" class="col-4 form-control" style="height:100px;" maxlength="100" pattern="^(?=.*[a-zA-Z0-9])[\sa-zA-ZáéíóúÁÉÍÓÚñÑ0-9!@#$%^&*_+-={}?]{1,100}$" required></textarea>
              </div>


              <input type="hidden" id="selectedImage" name="imagen">


              <div class="pt-2"></div>
              <div class="pt-2"></div>
              <div class="col-12">
                <label for="descrNota" class="fw-bold col-8 form-label">Selecciona un color:</label>
                <input type="Color" id="Color" name="Color" value="#3c41bd" class="col-4 form-control" style="height:30px; width: 200px;">
              </div>


              <input type="hidden" value="1" name="tipo">
              <div class="pt-3"></div>
            </div>

          </form>
        </div>
      </div>
    </div>
</body>

</html>
