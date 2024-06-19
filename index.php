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
<html lang="es">
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
    
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/js1.js"></script>
</head>
<body>
<header>
        <img src="./img/iconoM.png" alt="Logo" class="logo">
        <nav>          
          <button data-bs-toggle="modal" data-bs-target="#sesion" class="loginButton">Iniciar Sesión</button>
         
          <button data-bs-toggle="modal" data-bs-target="#registro" class="registerButton">Registrarse</button>
        </nav>
    </header>
    <main>
        <section class="banner">
            <div class="text">
                <div class="notizenLogoContainer">
                    <img src="./img/Icon2.png" alt="Notizen Logo" class="notizenLogo">
                    <span class="notizenLogoText">NOTIZEN</span>
                </div>
                <p class="p-as-h1">Crea tu agenda online y mejora tu productividad.</p>
                <p>Descubre Notizen: Una plataforma diseñada para organizar tus tareas y mejorar tu productividad de manera eficiente. </p>
            </div>
            <img src="./img/Calendario.png" alt="Calendario" class="calendarImage">
        </section>

<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 align="center" class="textCenter texto" id="notizen">¿Qué es Notizen?</h3>
            </div>
        </div>
        <hr style="color: #2B2D42">
        <div class="funciones">
            <div class="texto row pt-5">
                <div class="card col-md-5 bg-light mx-auto mb-4">
                    <div class="cardHeader bg-light">
                        <img src="img/img6.png" alt="calendario" class="imgs">
                        <h3 class="pt-3">Organiza tus tareas</h3>
                    </div>
                    <p class="t1">Guarda tus tareas y visualízalas en un calendario clasificadas por materias.</p>
                </div>
                <div class="card col-md-5 bg-light mx-auto mb-4">
                    <div class="cardHeader bg-light">
                        <img src="img/img5.png" alt="tiempo" class="imgs">
                        <h3 class="pt-3">Administra tus tiempos</h3>
                    </div>
                    <p class="t1">Configura notificaciones para tus tareas y gestiona mejor tu tiempo.</p>
                </div>
                <div class="card col-md-5 bg-light mx-auto mb-4">
                    <div class="cardHeader bg-light">
                        <img src="img/img1.png" alt="habito estudio" class="imgs">
                        <h3 class="pt-3">Genera un hábito de estudio</h3>
                    </div>
                    <p class="t1">Utiliza la <i>Técnica Pomodoro</i> para mantenerte enfocado al realizar tus tareas.</p>
                </div>
                <div class="card col-md-5 bg-light mx-auto mb-4">
                    <div class="cardHeader bg-light">
                        <img src="img/img2.png" alt="notas" class="imgs">
                        <h3 class="pt-3">Guarda cosas importantes</h3>
                    </div>
                    <p class="t1">Con ayuda de las notas podrás guardar información importante y visualizarla en una lista.</p>
                </div>
            </div>
        </div>
    </div>
</section>




    </main>

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">

  <!-- Section: Links  -->
  <section class="d-flex p-2 border-bottom">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <h6 align="center" class="text-uppercase fw-bold mb-4">Contacto</h6>
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
         
          <p>
          <p><i class="fas fa-phone me-3"></i>arturo.nava@alumno.buap.mx</p>
          <p><i class="fas fa-phone me-3"></i>diana.floresso@alumno.buap.mx</p>
          <p><i class="fas fa-phone me-3"></i>sergio.rojasg@alumno.buap.mx</p>
          <p><i class="fas fa-phone me-3"></i>eduardo.francisco@alumno.buap.mx</p> 
          </p>
        </div>
        <!-- Grid column -->

      

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <p><i class="fas fa-phone me-3"></i></p>
          <p><i class="fas fa-phone me-3"></i>jack.garcia@alumno.buap.mx</p>
          <p><i class="fas fa-phone me-3"></i>jose.garciazen@alumno.buap.mx</p>
          <p><i class="fas fa-phone me-3"></i>uriel.valero@alumno.buap.mx</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>

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
            <div class="modal-content">
                <form action="sesion.php" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <img src="img/Icon v2.png" alt="Logo" class="logoig">
                        <input type="submit" value="Iniciar Sesión" name="tipo" class="btn" id="btn1">
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body row">
                        <div class="esp"></div>
                        <div class="col-12">
                            <label for="correo" class="fw-bold col-8 form-label">Correo:</label>
                            <input type="text" name="usuario" class="form-control" maxlength="50" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                            title="example@example.dominio" required>
                        </div>
                        <div class="esp"></div>
                        <div class="col-12">
                            <label for="correo" class="fw-bold col-8 form-label">Contraseña:</label>
                            <input type="password" name="pass" id="pass" class="form-control" maxlength="10" required>
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
            <div class="modal-content">
                <form action="sesion.php" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <img src="img/Icon v2.png" alt="Logo" class="logoig">
                        <input type="submit" value="Crear Cuenta" name="tipo" class="btn" id="btn1">
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre" class="fw-bold form-label">Nombre de usuario:</label>      
                            <input type="text" name="Nombre" class="form-control" maxlength="50" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$"
                            title="Uno o más caracteres alfabéticos (mayúsculas o minúsculas)" required>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="fw-bold form-label">Correo:</label>      
                            <input type="text" name="usuario" class="form-control" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                            title="example@example.dominio" required>
                        </div>
                        <div class="mb-3">
                            <label for="contraseña" class="fw-bold form-label">Contraseña:</label>
                            <input type="password" name="pass" id="passw" class="form-control" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()-_=+{};:,<.>]).{6,10}$" maxlength="10"
                            title="- Al menos una letra minúscula. - Al menos una letra mayúscula. - Al menos un dígito. - Una longitud de máximo 10 y mínimo 6 caracteres" required>
                            <a onclick="togglePasswordReg1()"><span class="material-symbols-outlined btn" id="PassIcon1">visibility_off</span></a>
                        </div>
                        <div class="mb-3">
                            <label for="confirmar" class="fw-bold form-label">Confirmar Contraseña:</label>      
                            <input type="password" name="confpass" id="confpassw" class="form-control" maxlength="10" required>
                            <a onclick="togglePasswordReg2()"><span class="material-symbols-outlined btn" id="PassIcon2">visibility_off</span></a>
                        </div>
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

