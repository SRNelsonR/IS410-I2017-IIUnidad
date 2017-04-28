<?php

	class Aplicacion extends Producto{

		private $categoria;
		private $estatus;
		private $version;
		private $fechaActualizacion;
		private $desarrollador;

		public function __construct($nombreProducto,
					$descripcion,
					$fechaPublicacion,
					$calificacionPromedio,
					$comentarios,
					$URLProducto,
					$tamanioArchivo,
					$icono,
					$categoria,
					$estatus,
					$version,
					$fechaActualizacion,
					$desarrollador){
			parent::__construct($nombreProducto,
					$descripcion,
					$fechaPublicacion,
					$calificacionPromedio,
					$comentarios,
					$URLProducto,
					$tamanioArchivo,
					$icono);
			$this->categoria = $categoria;
			$this->estatus = $estatus;
			$this->version = $version;
			$this->fechaActualizacion = $fechaActualizacion;
			$this->desarrollador = $desarrollador;
		}
		public function getCategoria(){
			return $this->categoria;
		}
		public function setCategoria($categoria){
			$this->categoria = $categoria;
		}
		public function getEstatus(){
			return $this->estatus;
		}
		public function setEstatus($estatus){
			$this->estatus = $estatus;
		}
		public function getVersion(){
			return $this->version;
		}
		public function setVersion($version){
			$this->version = $version;
		}
		public function getFechaActualizacion(){
			return $this->fechaActualizacion;
		}
		public function setFechaActualizacion($fechaActualizacion){
			$this->fechaActualizacion = $fechaActualizacion;
		}
		public function getDesarrollador(){
			return $this->desarrollador;
		}
		public function setDesarrollador($desarrollador){
			$this->desarrollador = $desarrollador;
		}
		public function toString(){
			return parent::toString() . " Categoria: " . $this->categoria . 
				" Estatus: " . $this->estatus . 
				" Version: " . $this->version . 
				" FechaActualizacion: " . $this->fechaActualizacion . 
				" Desarrollador: " . $this->desarrollador->toString();
		}

		public function guardarRegistro($conexion){
			$sql = sprintf(
					"INSERT INTO tbl_aplicaciones(
						nombre, 
						descripcion,
						fecha_actualizacion, 
						fecha_publicacion, 
						calificacion, 
						url, 
						tamanio_archivo, 
						url_icono, 
						version, 
						codigo_desarrollador
					) VALUES (
						'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'
					)",
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->nombreProducto)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->descripcion)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->fechaActualizacion)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->fechaPublicacion)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->calificacionPromedio)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->URLProducto)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->tamanioArchivo)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->icono->getURLImagen())),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->version)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->desarrollador))
			);
			$resultadoInsert = $conexion->ejecutarInstruccion($sql);
			$resultado=array();
			if ($resultadoInsert === TRUE) {
				$resultado["codigo"]=1;
				$resultado["mensaje"]="Exito, el  registro fue almacenado";
			} else {
				$resultado["codigo"]=0;
				$resultado["mensaje"]="Error: " . $sql . "<br>" . $conexion->getEnlace()->error;
			}
			echo json_encode($resultado);
		}

		public function actualizarRegistro($conexion, $codigoAplicacion){
			$sql = sprintf(
					"UPDATE tbl_aplicaciones 
					SET nombre='%s',
						descripcion='%s',
						fecha_actualizacion='%s',
						fecha_publicacion='%s',
						calificacion='%s',
						url='%s',
						tamanio_archivo='%s',
						url_icono='%s',
						version='%s',
						codigo_desarrollador='%s'
					WHERE codigo_aplicacion='%s'",
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->nombreProducto)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->descripcion)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->fechaActualizacion)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->fechaPublicacion)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->calificacionPromedio)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->URLProducto)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->tamanioArchivo)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->icono->getURLImagen())),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->version)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $this->desarrollador)),
					$conexion->getEnlace()->real_escape_string(stripslashes( $codigoAplicacion))
			);
			
			$resultadoUpdate = $conexion->ejecutarInstruccion($sql);
			$resultado=array();
			if ($resultadoUpdate === TRUE) {
				$resultado["codigo"]=1;
				$resultado["mensaje"]="Exito, el  registro fue actualizado";
			} else {
				$resultado["codigo"]=0;
				$resultado["mensaje"]="Error: " . $sql . "<br>" . $conexion->getEnlace()->error;
			}
			echo json_encode($resultado);
		}

		public static function eliminarRegistro($conexion, $codigoAplicacion){
			//Eliminar informacion de las categorias relacionadas a una aplicacion
			$sql = sprintf(
					"DELETE FROM tbl_categorias_x_aplicacion WHERE codigo_aplicacion = %s",
						$conexion->getEnlace()->real_escape_string(stripslashes($codigoAplicacion))
					);
			//echo $sql;
			$resultadoDelete = $conexion->ejecutarInstruccion($sql);
			//Eliminar informacion de la aplicacion
			$sql = sprintf(
					"DELETE FROM tbl_aplicaciones WHERE codigo_aplicacion = %s",
						$conexion->getEnlace()->real_escape_string(stripslashes($codigoAplicacion))
					);
			//echo $sql;
			$resultadoDelete = $conexion->ejecutarInstruccion($sql);
			$resultado=array();
			if ($resultadoDelete === TRUE) {
				$resultado["codigo"]=1;
				$resultado["mensaje"]="Exito, el  registro fue eliminado";
			} else {
				$resultado["codigo"]=0;
				$resultado["mensaje"]="Error: " . $sql . "<br>" . $conexion->getEnlace()->error;
			}
			echo json_encode($resultado);
		}
	}

	
?>