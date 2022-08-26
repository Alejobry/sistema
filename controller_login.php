<?php 
	require_once('usuario.php');
	require_once('crud_usuario.php');
	require_once('conexion.php');

	//inicio de sesion
	session_start();

	$usuario=new Usuario();
	$crud=new CrudUsuario();
	//verifica si la variable registrarse está definida
	//se da que está definicda cuando el usuario se loguea, ya que la envía en la petición
	if (isset($_POST['registrarse'])) {
		$usuario->setEmail($_POST['usuario']);
		$usuario->setClave($_POST['pas']);
		if ($crud->buscarUsuario($_POST['usuario'])) {
			$crud->insertar($usuario);
			header('Location: index.php');
			
		}else{
			
			echo '<script language="javascript">alert("USUARIO O CONTRASEÑA INCORRECTOS");window.location.href="index.php"</script>';

		}		
		
	}elseif (isset($_POST['entrar'])) { //verifica si la variable entrar está definida
		$usuario=$crud->obtenerUsuario($_POST['usuario'],$_POST['pas']);
		// si el id del objeto retornado no es null, quiere decir que encontro un registro en la base
		if ($usuario->getIdusuario()!=NULL) {
			$_SESSION['usuario']=$usuario; //si el usuario se encuentra, crea la sesión de usuario
			header('Location: home.php');
			//va al Dashboard
		}else{
			
			echo '<script language="javascript">alert("USUARIO O CONTRASEÑA INCORRECTOS");window.location.href="index.php"</script>';
		}
	}elseif(isset($_POST['salir'])){ // cuando presiona el botòn salir
		header('Location: index.php');
		unset($_SESSION['usuario']); //destruye la sesión
	}
?>
