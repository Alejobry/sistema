<?php 
    session_start();
    unset($_SESSION['usuario']);
?>


<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE CONTROL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <!-- barra de navegacion -->
    <header>
      <!--  <nav class="navbar navbar-expand-sm navbar bg"> -->
        <nav class="navbar navbar-expand-sm" style="background: #d06aff" > 
            <a class="navbar-brand" href="index.php"></a>            
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    
                  <!--   <li class="nav-item">
                        <a class="nav-link " style="color: white;" href="login.php">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="color: white;" href="registrar.php">Registrarse</a>
                    </li> -->

                </ul>

            </div>
        </nav>

    </header>

    <!-- Formulario para logearse -->   

<body>
<div class="text-align-center">
  <br>
  <h2 style="float:center;"> <center>Sistema de control para donaciones de medicinas</center></h2>
</div>
    <label></label>
    <label></label>
    <label></label>
    <label></label>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="fundacion.png"
                      class="img-fluid">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">                    
                    <form class="container" action="controller_login.php" method="post">

                        <!-- Email input -->
                      <div class="form-outline mb-4">
                       <input type="text" name="usuario" class="form-control form-control-lg"  required />
                       <label class="form-label" for="usuario">Correo Electrónico</label>
                      </div>

                        <!-- Password input -->
                      <div class="form-outline mb-4">  
                       <input type="password" name="pas" class="form-control form-control-lg"  required />
                       <label class="form-label" for="pas">Contraseña</label>
                      </div>
                     

                        <div class="form-group mx-sm-4 pt-2">
                        <input type="hidden" name="entrar" value="entrar"> 
                        <button class="btn btn-primary btn-lg btn-block">Ingresar</button>                       
                      </div>



                    </form>
                </div>
            </div>
        </div>
    </section>




    <!-- ARCHIVOS DE BOOTSTRAP4 JavaScript -->
    <!-- 1jQuery , 2Popper.js , 3Bootstrap JS -->
    <script src="lib/jquery/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
      <!-- JavaScript Libraries -->
      <script src="lib/jquery/jquery.min.js"></script>
      <script src="lib/jquery/jquery-migrate.min.js"></script>
      <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="lib/easing/easing.min.js"></script>
      <script src="lib/superfish/hoverIntent.js"></script>
      <script src="lib/superfish/superfish.min.js"></script>
      <script src="lib/wow/wow.min.js"></script>
      <script src="lib/waypoints/waypoints.min.js"></script>
      <script src="lib/counterup/counterup.min.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
      <script src="lib/isotope/isotope.pkgd.min.js"></script>
      <script src="lib/lightbox/js/lightbox.min.js"></script>
      <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>


</body>

</html>
