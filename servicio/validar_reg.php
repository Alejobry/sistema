<?php
// Include config file
require_once "Configuracion.php";
 
// Define variables and initialize with empty values
$cedula =
$nombre =
$apellido =
$tel =
$correo =
$edad = $password = $confirm_password="";
$nombre_err = $password_err = $confirm_password_err = 
$cedula_err = $correo_err = $apellido_err = $edad_err = $tel_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $nombre_err = "Por favor ingrese su nombre.";
    } else{
        $nombre = trim($_POST["username"]);
    }
    //validate apellido
    if(empty(trim($_POST["apellido"]))){
        $apellido_err = "Por favor ingrese su apellido.";
    }else{
        $apellido = trim($_POST["apellido"]);
    }

        // Validate correo
    if(empty(trim($_POST["correo"]))){
        $correo_err = "Por favor ingrese un correo.";
        if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
            $correo_err= "Formato del Correo Incorrecto, Intentelo de Nuevo."; 
         }
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM Clientes WHERE Correo = ?";
        
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_correo);
            
            // Set parameters
            $param_correo = trim($_POST["correo"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $correo_err = "Este correo ya existe.";
                } else{
                    $correo = trim($_POST["correo"]);
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    //validate edad

    if(empty(trim($_POST["edad"]))){
        $edad_err = "Por favor ingrese su edad.";
    }else{
        $edad = trim($_POST["edad"]);
    }
    if(!is_numeric($edad)){
        $edad_err = "La Edad solo admite numeros, Intentelo de Nuevo.";
     }

     if($edad<18){
        $edad_err = "Eres Menor de Edad."; 
        
     }

    //validate telefono
    if(!is_numeric($tel)){
        $tel_err = "el telefono solo admite digitos"; 
     }
    if(empty(trim($_POST["telefono"]))){
        $tel_err = "Por favor ingrese su numero.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM clientes WHERE Telefono = ?";
        
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_tel);
            
            // Set parameters
            $param_tel = trim($_POST["telefono"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $tel_err = "Este telefono ya existe.";
                } else{
                    $tel = trim($_POST["telefono"]);
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }







    //validate cedula


    $cedula=$_POST['cedula'];
    $cedulav="$cedula";
    require('libs/verificar.php');//libreria validar cedula
    // Crear nuevo objecto
    $validador = new ValidarIdentificacion();
    $VALIDADO=$validador->validarCedula($cedulav);
    // validar CI
    if (!$VALIDADO) {
       echo "   <script> 
       alert('La Cedula es invalida');
       window.history.go(-1);
       </script>   ";  
    exit; 
    }
    if(!is_numeric($cedula)){
        echo"   <script> 
                alert('La Cedula solo admite numeros, Intentelo de Nuevo.');
                window.history.go(-1);
                </script>   "; 
         exit; 
     }

    if(empty(trim($_POST["cedula"]))){
        $cedula_err = "ingrese su numero de cedula.";     
    } elseif(strlen(trim($_POST["cedula"])) > 10){
        $cedula_err = "Cedula incorrecta debe tener 10 digitos.";
    }elseif(strlen(trim($_POST["cedula"])) < 10){
        $cedula_err;
        if(!is_numeric($cedula)){
     $cedula_err = "La Cedula solo admite numeros, Intentelo de Nuevo."; 
     
}


    }
    else{
        // Prepare a select statement
        $sql = "SELECT id FROM clientes WHERE Cedula = ?";
        
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_cedula);
            
            // Set parameters
            $param_cedula = trim($_POST["cedula"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $cedula_err = "Esta cedula ya existe.";
                } else{
                    $cedula = trim($_POST["cedula"]);
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

      
 



    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingresa una contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma tu contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "No coincide la contraseña.";
        }
    }

    // Check input errors before inserting in database
    if(empty($nombre_err) && empty($password_err) && empty($confirm_password_err) 
    && empty($cedula_err) && empty($correo_err) && empty($apellido_err) && empty($edad_err) && empty($tel_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO clientes (Cedula, Nombres, Apellidos, Telefono, Correo, Edad, Clave, idrol) VALUES (?, ?, ?, ?, ?, ?, ?, 2)";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters debe estar en orden
            mysqli_stmt_bind_param($stmt, "sssssis",$param_cedula, $param_username, $param_apellido, $param_tel, $param_correo, $param_edad, $param_password );
             
            // Set parameters
            $param_username = $nombre;
            $param_correo = $correo;
            $param_cedula = $cedula;
            $param_edad = $edad;
            $param_apellido = $apellido;
            $param_tel = $tel;
            $param_password = password_hash($password, PASSWORD_BCRYPT); // Creates a password hash aqui encriptas xd

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Algo salió mal, por favor inténtalo de nuevo.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($db);
}
?>