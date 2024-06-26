<?php
    include "conexiondb.php";
    include "toast.php";

    if (isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];
    }
    else {
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
            buscarNota($conexion);
            break;
        case '7':
            pomodoro($conexion); // Función para pomodoros y la api de YouTube
            break;
        default:
            header('location: principal.php');
            break;
    }

    function crearNota($conexion) {
        session_start();
        // Obtener los datos dados por el usuario
        $Descrip = $_POST['descrNota'];
        $fechaAgendada = $_POST['fechaA'];
        $Color = $_POST['Color'];

        $usuario = $_SESSION["idUsuario"];

        $sql = "INSERT INTO nota(Descripcion, fechaCreacion, fechaAgendada, Color, idUsuario) 
                VALUES ('$Descrip', now(), '$fechaAgendada', '$Color', '$usuario')";
        
        // Si ocurre un error
        if(($result = $conexion->query($sql)) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        
        $toastmensaje = toast(TRUE, "Nota Creada Correctamente");
        $_SESSION["toastmesaje"] = $toastmensaje;

        header('location: principal.php');
    }
    
    // Esta fucion muestra todas las notas en un carrusel
    function load($conexion, $esI){
        $usuario = $_SESSION["idUsuario"];
        
        $a = 0;
        
        $sql = "SELECT idNota, Descripcion, Color FROM nota
        WHERE idUsuario = $usuario
        ORDER BY fechaCreacion DESC
        LIMIT 10;";

        // Este if verifica si hay un error al mostrar los datos
        if(($result = $conexion->query($sql)) === FALSE) {
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
                                <input type="hidden" value="'. $a .'" name="esI">
                                <input type="hidden" value="'. $allnotas["idNota"] .'" name="idNota">
                                <button type="submit" class="btn material-symbols-outlined" id="btn">delete_forever</button>
                            </form>    
                        </div>
                        <div class="col-6">
                            <form action="notas.php" method="post" style="margin-bottom: 0px;">
                                <input type="hidden" value="7" name="tipo">
                                <input type="hidden" value="'. $a .'" name="esI">
                                <input type="hidden" value="'. $allnotas["idNota"] .'" name="idNota">
                                <button type="submit" class="btn material-symbols-outlined" id="btn">local_florist</button>
                            </form>    
                        </div>
                        <div class="col-6 text-end">
                            <form action="notas.php" method="post" style="margin-bottom: 0px;">
                                <input type="hidden" value="5" name="tipo">
                                <input type="hidden" value="'. $a .'" name="esI">
                                <input type="hidden" value="'. $allnotas["idNota"] .'" name="idNota">
                                <button type="submit" class="btn material-symbols-outlined" id="btn">edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            <hr>';
        }
    }

    function eliminaNota($conexion) {
        session_start();
        $idNota = $_POST['idNota'];

        $sql = "DELETE FROM nota
        WHERE idNota = '$idNota';";
                
        if(($result = $conexion->query($sql)) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        
        $toastmensaje = toast(TRUE, "Nota Eliminada Correctamente");
        $_SESSION["toastmesaje"] = $toastmensaje;

        header('location: principal.php');
    }

    // Esto carga una pagina para poder modificar nuestras notas 
    function loadNota($conexion) {
        $idNota = $_POST['idNota'];

        $a = 0;

        $sql = "SELECT Descripcion, fechaAgendada, Color FROM nota
        WHERE idNota = '$idNota';";
                
        if(($result = $conexion->query($sql)) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }

        $result = mysqli_query($conexion, $sql);
        $allnotas = mysqli_fetch_assoc($result);

        $des = $allnotas["Descripcion"];
        $fech = $allnotas["fechaAgendada"];
        $col = $allnotas["Color"];

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
        </head>
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
                  <div class="card-body row">
                      <div class="col-md-6 mx-auto">
                      <div class="container">
                          <label for="nuevaDescrNota" class="fw-bold form-label">Descripción Nota:</label>
                          <textarea name="descripcion_nota" class="form-control" style="height:150px;" maxlength="100" pattern="^(?=.*[a-zA-Z0-9])[\sa-zA-ZáéíóúÁÉÍÓÚñÑ0-9!@#$%^&*_+-={}?]{1,100}$"
                          required>'. $des .'</textarea>
                          <div class="pt-4"></div>
  
                          <label for="fechaA" class="fw-bold col-8 form-label">Seleccionar fecha:</label>
                          <input type="date" id="fechaA" name="fechaA" class="col-4 form-control" value="'. $fech .'" required>
                          <div class="pt-4"></div>
  
                          <label for="descrNota" class="fw-bold col-8 form-label">Selecciona un color:</label>
                          <input type="Color" id="Color" name="Color" value="'. $col .'" class="col-4 form-control" style="height:50px;">
                          <div class="pt-4"></div>
  
                            <input type="hidden" value="4" name="tipo">
                            <input type="hidden" value="'. $a .'" name="esI">
                            <input type="hidden" value="'. $idNota .'" name="id_nota">
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

    function modificarNota($conexion) {
        session_start();
        //Obtenemos datos.
        $idNota = $_POST['id_nota'];
        $newDes = $_POST['descripcion_nota'];
        $newFech = $_POST['fechaA'];
        $newCol = $_POST['Color'];

        $sql = "UPDATE nota 
                SET Descripcion = '$newDes', fechaAgendada = '$newFech', Color = '$newCol'
                WHERE idNota = '$idNota';";
                
        if(($result = $conexion->query($sql)) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        
        $toastmensaje = toast(TRUE, "Nota Modificada Correctamente");
        $_SESSION["toastmesaje"] = $toastmensaje;
        
        header('location: principal.php');
    }

    function pomodoro($conexion){
        $idNota = $_POST['idNota'];

        $a = 0;

        $sql = "SELECT Descripcion, fechaAgendada, Color FROM nota
        WHERE idNota = '$idNota';";
        
        // SI ocurre un error
        if(($result = $conexion->query($sql)) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }

        $result = mysqli_query($conexion, $sql);
        $allnotas = mysqli_fetch_assoc($result);

        $des = $allnotas["Descripcion"];
        $fech = $allnotas["fechaAgendada"];
        $col = $allnotas["Color"];

        echo '
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sesión de Estudio</title>
            <link rel="icon" href="img/Icon v2.png">

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface|Poppins">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


            <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
            
            <link rel="stylesheet" href="css/sesion.css">
            <link rel="stylesheet" href="css/youtube.css">
            <script src="js/jsestudio.js" defer></script>
            <script>
                Notification.requestPermission().then(function(permission) {
                    if (permission !== "granted") {
                    // Si el permiso no se ha otorgado, abrir el modal de Bootstrap
                    $("#notificacionN").modal("show");
                    }
                });
            </script>
        </head>

        <body>

        <! -- Aqui aparece el display  --> 
            <div id="inicial" style="display: none;">
                <div class="container d-flex align-items-center justify-content-center" style="height: 90vh;">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="bx bx-spa iconom"><h2>Sesión De Estudio</h2></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="" id="principal" style="display: none;">
    <nav class="navbar p-3">
        <div class="container-fluid">
            <ul class="nav navbar-nav ms-auto">
                <li class="nav-item align-content-end">
                    <a href="principal.php" class="nav-link lt">Salir</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            

            <div id="display" class="h2 col-12 text-center">00:00</div>

            <div class="col-6 text-end">
                <a class="btn bx bx-stop-circle iconom" onclick="stop()"></a>
            </div>
            <div class="col-6 text-start">
                <a id="play-pause" class="btn bx bx-play-circle iconom" onclick="playPause()"></a>
            </div>

            <div id="contenedor" class="col-lg-6 mt-5 mb-2">
                <!-- Nueva sección de instrucciones sobre la técnica Pomodoro -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Hacer pomodoros</h2>
                    </div>
                    <div class="card-body">
                        <p>La técnica Pomodoro es un método de gestión del tiempo para dividir tu trabajo en intervalos, recomendamos 25 minutos de trabajo y 5 minutos de descanso. Aquí los pasos:</p>
                        <ol>
                            <li>Decide la tarea que vas a realizar.</li>
                            <li>Corre el cronometro (un "Pomodoro").</li>
                            <li>Trabaja en la tarea hasta que el cronometro llegue a los 25 minutos.</li>
                            <li>Toma un breve descanso (5 minutos).</li>
                            <li>Después de cuatro "Pomodoros", toma un descanso más largo (15-30 minutos).</li>
                        </ol>
                        <p>Utiliza los controles de reproducción y pausa para gestionar tus Pomodoros y asegúrate de tomar los descansos necesarios para mantenerte productivo :)</p>
                    </div>
                </div>
            </div>
            <!-- Fin de la sección de instrucciones sobre la técnica Pomodoro -->

            </div>
            <div class="col-lg-6 pt-5 mb-2">
                <div class="pt-4">
                    <header>
                        <form class="mb-3" id="Buscador" action="#" method="post">
                            <input class="form-control" type="text" id="q" placeholder="Busca algo en YouTube... c:">
                            <button class="btn" id="btn2" type="submit" name="button">Buscar</button>
                        </form>
                    </header>
                    <main class="row">
                        <div class="YouTube-container">
                            <div class="video-player">
                                <iframe src="https://www.youtube.com/embed/4fezP875xOQ" allowfullscreen="allowfullscreen"></iframe>
                                <h2 id="tite">Música para Estudiar</h2>
                                <div class="desplegar" id="desplegar">
                                    <span id="senal">▽</span>
                                </div>
                                <div class="description" id="description">
                                    <p id="te">Esta es música que te recomendamos para estudiar.<br>Recuerda que también puedes buscar y escuchar tu música favorita.</p>
                                    <div class="video-list mt-3" id="video-list"></div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>


            <div class="modal fade" id="notificacionN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-6"><img src="img/Icon v2.png" alt="Logo" class="logoig"></div>
                            <div class="col-6 text-end"><button class="btn" id="btn1" onclick="Notification.requestPermission();">Activa Notificaciones</button></div>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">Por favor, otorgue permiso para recibir notificaciones</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="buscaA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-6"><img src="img/Icon v2.png" alt="Logo" class="logoig"></div>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">¡Escribe algo para buscar!</div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    // Mostrar el elemento inicial con efecto de fade in
                    $("#inicial").fadeIn(1000);
                    
                    // Ocultar el elemento después de 2 segundos (2000 ms) con efecto de fade out
                    setTimeout(function() {
                        $("#inicial").fadeOut(1000, function() {
                            // Una vez que el elemento se oculta, mostrar la interfaz principal con efecto de fade in
                            $("#principal").fadeIn(1000);
                        });
                    }, 2000);
                });
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>   
            <script src="js/youtube.js" charset="utf-8"></script>
        </body>
        </html>';
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
?>