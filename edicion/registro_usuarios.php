<?php
    $login= $_POST['login'];
    $password= $_POST['password'];

    try{

        $base=new PDO('mysql:host=localhost; dbname=fundacion_dejando_huellas', 'root', "Scarlett2021.");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $cifrado=password_hash($password, PASSWORD_DEFAULT);

        $sql="INSERT INTO usuarios_pass(USUARIOS, PASSWORD) VALUES ('$login' , '$cifrado')";
        $resultado=$base->prepare($sql);

        $resultado->execute(array($login,$cifrado));
        //$registro=$resultado->fetch(PDO::FETCH_ASSOC);                                                          
        if($registro){
            echo '<script language="javascript">alert("USUARIO CREADO EXITOSAMENTE");window.location.href="LOGIN.php"</script>';
          }else{
            echo"<script>alert('no se pudo actualizar los datos');window.history.go(-1);</script>";
      
          }
        //echo '<script language="javascript">alert("USUARIO CREADO EXITOSAMENTE");window.location.href="LOGIN.php"</script>';

    }catch(Exception $e) {
        echo "error: ". $e->getLine();
    }finally{
        $base=null;
    }