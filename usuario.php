<?php 
	/*
	*
	*
	*/
	class Usuario{
		private $idusuario;
		private $email;
		private $clave;

		public function getIdusuario(){
			return $this->idusuario;
		}

		public function setIdusuario($idusuario){
			$this->idusuario = $idusuario;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getClave(){
			return $this->clave;
		}

		public function setClave($clave){
			$this->clave = $clave;
		}
	}
?>