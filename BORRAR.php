          
    <div class="card-body" style=" background-color: '.$allnotas["Color"].';">
        <div class="mb-1">' . $allnotas["Descripcion"] . '</div>
    </div>
    <div class="card-footer bg-light text-muted">
        <div class="row">
            <div class="col-6">
                <form action="notas.php" method="post" style="margin-bottom: 0px;">
                    <input type="hidden" value="3" name="tipo">
                    <input type="hidden" value="'. $a .'" name="esI">
                    <input type="hidden" value="'. $allnotas["idNota"] .'" name="id_nota">
                    <button type="submit" class="btn material-symbols-outlined" id="btn">borrar</button>
                </form>    
            </div>
            <div class="col-6 text-end">
                <form action="notas.php" method="post" style="margin-bottom: 0px;">
                    <input type="hidden" value="5" name="tipo">
                    <input type="hidden" value="'. $a .'" name="esI">
                    <input type="hidden" value="'. $allnotas["idNota"] .'" name="id_nota">
                    <button type="submit" class="btn material-symbols-outlined" id="btn">editar</button>
                </form>
            </div>
        </div>
    </div>
  <hr>

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
                    <div class="col-6"><img src="img/iconoM.png" alt="Logo" class="logoig"></div>
                    <div class="col-6 pt-2 text-end">
                      <input type="submit" value="Modificar Nota" class="btn" id="btn1">
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
                        <input type="date" id="fechaA" name="fechaA" class="col-4 form-control" value=". $fech ." required>
                        <div class="pt-4"></div>

                        <label for="descrNota" class="fw-bold col-8 form-label">Selecciona un color:</label>
                        <input type="Color" id="Color" name="Color" value=". $col ." class="col-4 form-control" style="height:50px;">
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
</html>


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
                                <input type="Color" id="Color" name="Color" value="#e81ee5" class="col-4 form-control" style="height:50px;"> 
                            </div>