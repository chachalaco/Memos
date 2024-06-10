<!-- Este es el index, donde iniciara la pagina -->
<?php
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
    <title>Memos</title>
    <link rel="icon" href="img/iconoM.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface|Poppins">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    
    <link rel="stylesheet" href="css/estilo1.css">
    <link rel="stylesheet" href="css/estilo2.css">

    <script src="js/js1.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm shadow p-3 bg-white">
  <div class="container-fluid">
    <a href="#"><img src="img/iconoM.png" alt="Logo Memos(Notizen)" class="logop"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="nav navbar-nav nav-justified">
                <li class="nav-item n1">
                    <a href="#notizen" class="nav-link">¿Qué es Memos(Notizen)?</a>
                </li>
                <li class="nav-item">
                    <a href="#sesion" data-bs-toggle="modal" class="nav-link">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a href="#registro" data-bs-toggle="modal" class="nav-link">Registrarse</a>
                </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="pb-5"></div>
    <div class="container">
      <div class="col-12">
        <div id="carr" class="carousel slide mt-5" data-bs-ride="carousel">   
          <!-- Carousel -->
          <div id="dem" class="carousel slide" data-bs-ride="carousel">
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
              <div class="carousel-item">
                <img src="img/iconoM.png" alt="Icono 3" class="d-block imgcarr">
              </div>
              <div class="carousel-item active">
                <img src="img/Icon v2.png" alt="Icono 1" class="d-block imgcarr">
              </div>
              <div class="carousel-item">
                <img src="img/Icon.png" alt="Icono 2" class="d-block imgcarr">
              </div>
            </div>
            
            <!-- Botones Derecho/Izquierda -->
            <button class="carousel-control-prev" type="button" data-bs-target="#dem" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#dem" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="esp"></div>

    <div class="container">
      <div class="row">
        <div class="col-12" >
          <h3 class="text-center texto" id="notizen">¿Qué es Notizen?</h3>
        </div>
        <hr style="color: #2B2D42">
	<div class="funciones">
	      <div class ="texto row pt-5">
          <div class="card col-5 bg-light">
            <div class="card-header bg-light">
              <img src="img/img6.png" alt="calendario" class="imgs">
              <h3 class="pt-3">Organiza tus tareas</h3>
            </div> 
            <p class="t1">Guarda tus tareas y visualizas en un calendario clasificadas por materias.</p>
          </div>

          <div class="col-2"></div> 

          <div class="card col-5 bg-light">
            <div class="card-header bg-light">
              <img src="img/img5.png" alt="tiempo" class="imgs">
              <h3 class="pt-3">Administra tus tiempos</h3>
            </div>
            <p class="t1">Configura notificaciones para tus tareas y gestiona mejor tu tiempo.</p>
          </div>

          <div class="card col-5 bg-light">
            <div class="card-header bg-light">
              <img src="img/img1.png" alt="habito estudio" class="imgs">
              <h3 class="pt-3">Genera un hábito de estudio</h3>
            </div> 
            <p class="t1">Utiliza la <i>Técnica Pomodoro</i> para mantenerte enfocado al realizar tus tareas.</p>
          </div>

          <div class="col-2"></div>

          <div class="card col-5 bg-light">
            <div class="card-header bg-light">
              <img src="img/img7.png" alt="compartir" class="imgs">
              <h3 class="pt-3">Estudia con un amigo</h3>
            </div>
            <p class="t1">Con la sesión compartida podrás compartir tareas y enlazar tu cuenta con un amigo para estudiar o hacer 
          tareas al mismo tiempo.</p>
          </div>
          <div class="col-3"></div>
          <div class="card col-6 bg-light">
            <div class="card-header bg-light">
              <img src="img/img2.png" alt="notas" class="imgs">
              <h3 class="pt-3">Guarda cosas importantes</h3>
            </div> 
            <p class="t1">Con ayuda de las notas podrás guardar información importante y visualizarla en una lista.</p>
          </div>
	</div>
	</div>
      </div>
    </div>
    <div class="text-end"><a href="#" class="btn btn-outline-primary" id="boton">Inicio</a></div>
    

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">

  <!-- Section: Links  -->
  <section class="d-flex p-2 border-bottom">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Notizen
          </h6>
          <p>
            ¿Qué estás esperando para unirte a Notizen?<br>
            Organiza tus tareas de forma fácil y gratis 
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Enlaces
          </h6>
          <p>
            <a href="#" class="text-reset">Inicio</a>
          </p>
          <p>
            <a href="#notizen" class="text-reset">¿Qué es Notizen?</a>
          </p>
          <p>
            <a href="#registro" data-bs-toggle="modal" class="text-reset">Registro</a>
          </p>
          <p>
            <a href="#sesion" data-bs-toggle="modal"  class="text-reset">Inicio de Sesión</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
          <p><i class="fas fa-phone me-3"></i>enrique.moralesz@alumno.buap.mx</p>
          <p><i class="fas fa-phone me-3"></i>luis.castron@alumnos.buap.mx</p>
          <p><i class="fas fa-phone me-3"></i>sergio.rojasg@alumno.buap.mx</p>
          <p><i class="fas fa-phone me-3"></i>melissa.valladaresh@alumno.buap.mx</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3">Registrate Gratis</span>
          <a href="#registro" data-bs-toggle="modal" class="btn btn-outline-primary btn-rounded" id="boton">
            Registrar!
          </a>
        </p>
      </section>
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->


  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="#">Notizen.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

<!-- Inicio Sesión-->
    <div class="modal fade" id="sesion">
        <div class="modal-dialog">
            <div class="modal-content row">
                <form action="sesion.php" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <div class="col-8"><img src="img/Icon v2.png" alt="Logo" class="logoig"></div>
                        <div class="col-4"><input type="submit" value="Iniciar Sesión" name="tipo" class="btn" id="btn1"></div>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body row">
                        <div class="esp"></div>
                        <div class="col-12">
                            <label for="correo" class="fw-bold col-8 form-label">Correo:</label>
                            <input type="text" name="usuario" class="col-4 form-control" maxlength="50" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                            title="example@example.dominio" required>
                        </div>
                        <div class="esp"></div>
                        <div class="col-12">
                            <label for="correo" class="fw-bold col-8 form-label">Contraseña:</label>
                            <input type="password" name="pass" id="pass" class="col-4 form-control" maxlength="10" required>
                            <a onclick="togglePasswordSesion()"><span class="material-symbols-outlined btn" id="PassIcon">visibility_off</span></a>
                        </div>
                </form>
                        <div class="col-12 text-end p-0"><form action="sesion.php" method="post"><button type="submit" class="btn text-decoration-underline" id="btn1">Olvidé mi contraseña</button><input type="hidden" value="1" name="tipo"></form></div>
                    </div>
                
                <!-- Modal footer -->
                <div class="modal-footer justify-content-center">
                    Copyright © Notizen 2023
                </div>
            </div>
        </div>
    </div>

<!-- Registro-->
    <div class="modal fade" id="registro">
      <div class="modal-dialog">
          <div class="modal-content row">
       -      <form action="sesion.php" method="post">
                  <!-- Modal Header -->
                  <div class="modal-header">
                      <div class="col-8"><img src="img/Icon v2.png" alt="Logo" class="logoig"></div>
                      <div class="col-4"><input type="submit" value="Crear Cuenta" name="tipo" class="btn" id="btn1"></div>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body row">
                    <div class="pt-3"></div>
                    <div class="col-12">
                        <label for="nombre" class="fw-bold col-8 form-label">Nombre de usuario:</label>      
                        <input type="text" name="Nombre" class="col-4 form-control" maxlength="50" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$"
                        title="Uno o más caracteres alfabéticos (mayúsculas o minúsculas)" required>
                    </div>
                    <div class="pt-3"></div>
                    <div class="col-12">
                      <label for="correo" class="fw-bold col-8 form-label">Correo:</label>      
                      <input type="text" name="usuario" class="col-4 form-control" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                      title="example@example.dominio" required>
                    </div>
                    <div class="pt-3"></div>
                    <div class="col-12">
                        <label for="contraseña" class="fw-bold col-8 form-label">Contraseña:</label>
                        <input type="password" name="pass" id="passw" class="col-4 form-control" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()-_=+{};:,<.>]).{6,10}$" maxlength="10"
                        title="- Al menos una letra minúscula. - Al menos una letra mayúscula. - Al menos un dígito. - Una longitud de máximo 10 y mínimo 6 caracteres" required>
                        <a onclick="togglePasswordReg1()"><span class="material-symbols-outlined btn" id="PassIcon1">visibility_off</span></a>
                    </div>
                    <div class="pt-3"></div>
                    <div class="col-12">
                        <label for="confirmar" class="fw-bold col-8 form-label">Confirmar Contraseña:</label>      
                        <input type="password" name="confpass" id="confpassw" class="col-4 form-control" maxlength="10" required>
                        <a onclick="togglePasswordReg2()"><span class="material-symbols-outlined btn" id="PassIcon2">visibility_off</span></a>
                    </div>
                    <div class="pt-3"></div> 
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