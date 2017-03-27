<?php

	class Usuario{

		private $nombre;
		private $apellido;
		private $correo;
		private $contrasena;

		public function __construct($nombre,
					$apellido,
					$correo,
					$contrasena){
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->correo = $correo;
			$this->contrasena = $contrasena;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getApellido(){
			return $this->apellido;
		}
		public function setApellido($apellido){
			$this->apellido = $apellido;
		}
		public function getCorreo(){
			return $this->correo;
		}
		public function setCorreo($correo){
			$this->correo = $correo;
		}
		public function getContrasena(){
			return $this->contrasena;
		}
		public function setContrasena($contrasena){
			$this->contrasena = $contrasena;
		}
		public function __toString(){
			return "Nombre: " . $this->nombre . 
				" Apellido: " . $this->apellido . 
				" Correo: " . $this->correo . 
				" Contrasena: " . $this->contrasena;
		}

		public function guardarRegistro(){
			$archivo = fopen("usuarios.csv","a+");
			fwrite($archivo, $this->nombre ."," .
				$this->apellido ."," .
				$this->correo ."," .
				$this->contrasena."\n");
			fclose($archivo);
		}
	}
?>