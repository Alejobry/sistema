<?php 
	require_once('conexion.php');
	require_once('usuario.php');
	
	class CrudUsuario{

		public function __construct(){}

		//inserta los datos del usuario
		public function insertar($usuario){
			$db=DB::conectar();
			$insert=$db->prepare('INSERT INTO usuario VALUES(NULL,:email, :clave)');
			$insert->bindValue('email',$usuario->getEmail());
			//encripta la clave
			$pass=password_hash($usuario->getClave(),PASSWORD_DEFAULT);
			$insert->bindValue('clave',$pass);
			$insert->execute();
		}

		//obtiene el usuario para el login
		public function obtenerUsuario($email, $clave){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM usuario WHERE Email=:email');//AND clave=:clave
			$select->bindValue('email',$email);
			$select->execute();
			$registro=$select->fetch();
			$usuario=new Usuario();
			//verifica si la clave es correcta
			if (password_verify($clave, $registro['clave'])) {				
				//si es correcta, asigna los valores que trae desde la base de datos
				$usuario->setIdusuario($registro['idusuario']);
				$usuario->setEmail($registro['email']);
				$usuario->setClave($registro['clave']);
			}			
			return $usuario;
		}

		//busca el nombre del usuario si existe
		public function buscarUsuario($email){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM usuario WHERE Email=:email');
			$select->bindValue('email',$email);
			$select->execute();
			$registro=$select->fetch();
			if($registro['idusuario']!=NULL){
				$usado=False;
			}else{
				$usado=True;
			}	
			return $usado;
		}
	}
?>