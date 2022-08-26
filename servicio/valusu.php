<?php
include '../config.php';
/*include 'index.php';*/

//session_start();

//$correo = $_POST['email'];
$correo = htmlentities($_POST['email'],ENT_QUOTES,'utf-8');
$password = htmlentities($_POST['clave'],ENT_QUOTES,'utf-8');
$count=0;
//$correo = htmlentities($_GET['email'],ENT_QUOTES,'utf-8');
//$password = htmlentities($_GET['clave'],ENT_QUOTES,'utf-8');



    if(empty($correo) || empty($password) ){
       echo"   <script> 
               alert('Campo vacío, vuelva a intentarlo');
               window.history.go(-1);
               </script>   "; 
        exit; 
    }


    if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
        echo"   <script> 
                alert('El formato del correo ingresado es incorrecto');
                window.history.go(-1);
                </script>   "; 
         exit; 
    }
     

     /*
    // $cvco=mysqli_query($|db,"SELECT clave FROM usuario WHERE email={$correo}"); //se obtiene la clave
       
       //$sql="select * from usuario WHERE email={$correo} && clave={$password}";
       $sql="select email from usuario WHERE email={$correo}";
       $cvco=mysqli_query($db,$sql); //se obtiene el correo y clave
     //$cvco=mysqli_query($db,"SELECT email FROM usuario WHERE email={$correo}"); //se obtiene el correo


        if($cvco)
        {
           
            $count=mysqli_num_rows($cvco);

             
            if($count>0)
            {
         
                
                //$q2="SELECT idusuario FROM usuario WHERE email={$correo}";
                $q2="select idusuario from usuario where email={$correo}"; // se obtiene el ID y clave del usuario segun su correo

                $VER= mysqli_query($cvco,$q2);
                 //$VER= mysqli_query($q2);

                
                //GUARDARLO EN UN ARRAY
                $CONTRA=$array2["clave"];  
                $array2=mysqli_fetch_array($VER); 
                //separar el id y clave
                $id=$array2["idusuario"]; 

                
                $verificado=password_verify($password,$CONTRA);
                if ($verificado) {

                    echo"   <script> 
                            alert('Bienvenido');
                            </script>   ";

                                session_start();
                                $_SESSION['sessCustomerID'] = $id;
                                $_SESSION['idusuario'] = $id;
                                if ($_SESSION['idusuario']==1) {
                                    header("location: home.php");
                                }else {
                                    header("location: index.php"); // cambiar luego a login.php
                                }
                }                
            }
            else
                {

                    echo"   <script> 
                           alert('Su usuario no se encuentra autorizado, por favor contacte con el departamento de Sistemas');
                           window.history.go(-1);
                           </script>   ";  
                    exit;
                }
        }
        

        /*
            echo"   <script> 
                    alert('Contraseña Incorrecta');
                   window.history.go(-1);
                   </script>   ";
            exit; 

            */
        


    
?>