<?php
include "conexiondb.php";
include "toast.php";

if (isset($_POST['tipo'])) {
  $tipo = $_POST['tipo'];
} else {
  $tipo = "2"; //Lectura de notas
}

switch ($tipo) {
  case '1':
    crearNota($conexion);
    break;
  case '2':
    //load($conexion, 0); Ya no cargará la vista automaticamente, ahora se llama a la función desde el HTML para que cargue la vista desde principal.php y otra desde notadetalle.php
    break;
  case '3':
    eliminaNota($conexion);
    break;
  case '4':
    modificarNota($conexion);
    break;
  case '5':
    loadNota($conexion);
    break;
  case '6': // Función NO IMPREMENTADA
    //buscarNota($conexion);
    break;
  default:
    header('location: principal.php');
    break;
}



function crearNota($conexion)
{
  session_start();
  // Obtener los datos dados por el usuario
  $Descrip = $_POST['descrNota'];
  $fechaAgendada = $_POST['fechaA'];
  $Color = $_POST['Color'];
  $img = $_POST['imagen'];

  $usuario = $_SESSION["idUsuario"];

  $sql = "INSERT INTO nota(Descripcion, fechaCreacion, fechaAgendada, Color, idUsuario, imagen)
                VALUES ('$Descrip', now(), '$fechaAgendada', '$Color', '$usuario', '$img')";

  // Si ocurre un error
  if (($result = $conexion->query($sql)) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conexion->error;
  }

  $toastmensaje = toast(TRUE, "Nota Creada Correctamente");
  $_SESSION["toastmesaje"] = $toastmensaje;

  header('location: principal.php');
}

function load($conexion, $esI)
{
  $usuario = $_SESSION["idUsuario"];

  $a = 0;

  $sql = "SELECT idNota, Descripcion, Color, imagen FROM nota
        WHERE idUsuario = $usuario
        ORDER BY fechaCreacion DESC
        LIMIT 10;";

  // Este if verifica si hay un error al mostrar los datos
  if (($result = $conexion->query($sql)) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conexion->error;
  }

  $result = mysqli_query($conexion, $sql);

  while ($allnotas = mysqli_fetch_assoc($result)) {
    echo '
                <div class="card-body">
                    <div class="mb-1" >' . $allnotas["Descripcion"] . '</div>
                </div>
                <div class="card-footer bg-light text-muted">
                    <div class="row">
                        <div class="col-6">
                            <form action="notas.php" method="post" style="margin-bottom: 0px;">
                                <input type="hidden" value="3" name="tipo">
                                <input type="hidden" value="' . $a . '" name="esI">
                                <input type="hidden" value="' . $allnotas["idNota"] . '" name="idNota">
                                <button type="submit" class="btn material-symbols-outlined" id="btn">delete_forever</button>
                            </form>
                        </div>
                        <div class="col-6 text-end">
                            <form action="notas.php" method="post" style="margin-bottom: 0px;">
                                <input type="hidden" value="5" name="tipo">
                                <input type="hidden" value="' . $a . '" name="esI">
                                <input type="hidden" value="' . $allnotas["idNota"] . '" name="idNota">
                                <button type="submit" class="btn material-symbols-outlined" id="btn">edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            <hr>';
  }
}

function eliminaNota($conexion)
{
  session_start();
  $idNota = $_POST['idNota'];

  $sql = "DELETE FROM nota
        WHERE idNota = '$idNota';";

  if (($result = $conexion->query($sql)) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conexion->error;
  }

  $toastmensaje = toast(TRUE, "Nota Eliminada Correctamente");
  $_SESSION["toastmesaje"] = $toastmensaje;

  header('location: principal.php');
}

// Esto carga una pagina para moder modificar nuestras notas
function loadNota($conexion)
{
  $idNota = $_POST['idNota'];

  $a = 0;

  $sql = "SELECT Descripcion, fechaAgendada, Color, imagen FROM nota
        WHERE idNota = '$idNota';";

  if (($result = $conexion->query($sql)) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conexion->error;
  }

  $result = mysqli_query($conexion, $sql);
  $allnotas = mysqli_fetch_assoc($result);

  $des = $allnotas["Descripcion"];
  $fech = $allnotas["fechaAgendada"];
  $col = $allnotas["Color"];
  $img = $allnotas["imagen"];

  echo '
        <html>
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mi Panel</title>
        <link rel="icon" href="img/Icon v2.png">
        <link rel="stylesheet" href="css/principal.css">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface|Poppins">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

        </head>
<script>
window.addEventListener("DOMContentLoaded", (event) => {

        var images = document.querySelectorAll("#iconRow img");
        var description = document.getElementById("description");
        var selectedImage = document.getElementById("selectedImage");

        images.forEach(function(image) {
        image.addEventListener("click", function() {
            description.value = this.getAttribute("data-desc");
            selectedImage.value = this.src;
        });
    });
  });
</script>

        <body>



  <div class="container-fluid mt-5">
        <div class="row">
          <div class="card col-md-8 mx-auto">
              <form action="notas.php" method="post">
                  <div class="card-header row">
                      <h5 class="offcanvas-title">Modificar nota</h5>
                      <div class="col-6"><img src="img/iconoM.png" alt="Logo" class="logoig"></div>
                      <div class="col-6 pt-2 text-end">
                        <input type="submit" value="Guardar y Cerrar" class="btn" id="btn1">
                      </div>
                  </div>



      <label  style="padding: 30px;" for="fechaA" class="fw-bold col-8 form-label">Seleccionar fecha:</label>
      <input style="width: 200px; margin: 0 30px 0 30px;" type="date" id="fechaA" name="fechaA" class="col-4 form-control" value="' . $fech . '" required>



              <div class="col-12" style="padding: 30px;">
                <label for="iconRow" class="fw-bold col-8 form-label">Selecciona un nuevo evento:</label>
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


               <label  style="padding: 30px;" for="descrNota" class="fw-bold col-8 form-label">Habla tu nueva Descripcion:</label>
              <button style="border: none; outline: none;" id="voiceButton" data-bs-toggle="tooltip" title="También puedes hablar para la descripción de la nota">
                <img style="width: 100%; display: block; width: 50px; height: 50px;" src="img/microfono.png" alt="">
              </button>

                  <div class="card-body row">
                      <div class="col-md-12 mx-auto">
                      <div class="container">
                          <label for="nuevaDescrNota" class="fw-bold form-label">Escribir nueva Descripción:</label>
                          <textarea id="description" name="descripcion_nota" class="form-control" style="height:150px;" maxlength="100" pattern="^(?=.*[a-zA-Z0-9])[\sa-zA-ZáéíóúÁÉÍÓÚñÑ0-9!@#$%^&*_+-={}?]{1,100}$"
                          required></textarea>
                          <div class="pt-4"></div>

                          <input type="hidden" id="selectedImage" name="imagen">



                          <label for="descrNota" class="fw-bold col-8 form-label">Selecciona un nuevo color:</label>
                          <input type="Color" id="Color" name="Color" value="' . $col . '" class="col-4 form-control" style="height:30px; width: 200px;">
                          <div class="pt-4"></div>

                            <input type="hidden" value="4" name="tipo">
                            <input type="hidden" value="' . $a . '" name="esI">
                            <input type="hidden" value="' . $idNota . '" name="id_nota">
                          <div class="pt-3"></div>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
        </div>
      </div>
        </body>
        </html>';
}

function modificarNota($conexion)
{
  session_start();
  //Obtenemos datos.
  $idNota = $_POST['id_nota'];
  $newDes = $_POST['descripcion_nota'];
  $newFech = $_POST['fechaA'];
  $newCol = $_POST['Color'];
  $img = $_POST['selectedImage'];

  $sql = "UPDATE nota
                SET Descripcion = '$newDes', fechaAgendada = '$newFech', Color = '$newCol', imagen = '$img'
                WHERE idNota = '$idNota';";

  if (($result = $conexion->query($sql)) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conexion->error;
  }

  $toastmensaje = toast(TRUE, "Nota Modificada Correctamente");
  $_SESSION["toastmesaje"] = $toastmensaje;

  header('location: principal.php');
}

/*function buscarNota($conexion) {
        session_start();
        $usuario = $_SESSION["id_usuario"];

        // Obtener la fecha enviada por la solicitud AJAX
        $fecha = $_POST['fecha'];

        if($fecha > 12) {
            load($conexion, 1);
            exit();
        }
            // Hacer una consulta SQL para buscar los registros que coincidan con la fecha especificada
            $sql = "SELECT id_nota, nombre_nota, descripcion_nota, DATE_FORMAT(fecha_nota, '%d-%m-%Y') FROM nota
            WHERE MONTH(fecha_nota) = $fecha AND id_usuario = $usuario
            ORDER BY fecha_nota DESC";
            $resultado = mysqli_query($conexion, $sql);

        // Mostrar los resultados de la búsqueda
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo '
            <div class="card-body row mx-auto">
                <div class="col-6 text-center">
                    ' . $fila["nombre_nota"] . '
                </div>
                <div class="col-6 text-center">
                    Fecha: ' . $fila["DATE_FORMAT(fecha_nota, '%d-%m-%Y')"] . '
                </div>
                <div class="col-12 mt-3 text-center">
                    ' . $fila["descripcion_nota"] . '
                </div>
            </div>
                <div class="card-footer bg-light text-muted">
                    <div class="row">
                            <div class="col-6">
                                <form action="notas.php" method="post" style="margin-bottom: 0px;">
                                    <input type="hidden" value="3" name="tipo">
                                    <input type="hidden" value="1" name="esI">
                                    <input type="hidden" value="'. $fila["id_nota"] .'" name="id_nota">
                                    <button type="submit" class="btn material-symbols-outlined" id="btn">delete_forever</button>
                                </form>
                            </div>
                            <div class="col-6 text-end">
                                <form action="notas.php" method="post" style="margin-bottom: 0px;">
                                    <input type="hidden" value="5" name="tipo">
                                    <input type="hidden" value="1" name="esI">
                                    <input type="hidden" value="'. $fila["id_nota"] .'" name="id_nota">
                                    <button type="submit" class="btn material-symbols-outlined" id="btn">edit</button>
                                </form>
                            </div>
                    </div>
                </div><hr>';
        }
    }*/
