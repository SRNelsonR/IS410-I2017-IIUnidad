<?php
	switch ($_GET["accion"]) {
		case '1':
			/*$nombreProducto,
			$descripcion,
			$fechaPublicacion,
			$calificaciónPromedio,
			$comentarios,
			$URLProducto,
			$tamanioArchivo,
			$icono,
			$categoria,
			$estatus,
			$version,
			$fechaActualizacion,
			$desarrollador*/

			echo 	$_POST["txt-aplicacion"].", ".
					$_POST["txt-descripcion"].", ".
					$_POST["txt-fecha-publicacion"].", ".
					$_POST["txt-calificacion"].", ".
					$_POST["txt-url"].", ".
					$_POST["txt-tamanio"].", ".
					$_POST["slc-icono"].", ".
					$_POST["txt-version"].", ".
					$_POST["txt-fecha-actualizacion"].", ".
					$_POST["slc-desarrollador"];
			exit;



			include_once("../class/class_producto.php");
			include_once("../class/class_icono.php");
			include_once("../class/class_usuario.php");
			include_once("../class/class_desarrollador.php");
			include_once("../class/class_aplicacion.php");
			$aplicacion = new Aplicacion(
					$_POST["txt-aplicacion"],
					$_POST["txt-descripcion"],
					$_POST["txt-fecha-publicacion"],
					$_POST["txt-calificacion"],
					null,//Comentarios
					$_POST["txt-url"],
					$_POST["txt-tamanio"],
					new Icono($_POST["slc-icono"],5,5),
					null,//Categorias
					null,//Estatus
					$_POST["txt-version"],
					$_POST["txt-fecha-actualizacion"],
					new Desarrollador($_POST["slc-desarrollador"], null,null)
			);

			$aplicacion->guardarRegistro();
			break;
		case '2':
				include_once("../class/class-conexion.php");
				$conexion = new Conexion();
				$conexion->establecerConexion();
				$resultadoAplicaciones = $conexion->ejecutarInstruccion(
				"SELECT a.codigo_aplicacion,
						    a.nombre,
						    descripcion,
						    fecha_actualizacion,
						    fecha_publicacion,
						    calificacion,
						    url,
						    tamanio_archivo,
						    url_icono,
						    version,
						    a.codigo_desarrollador,
						    a.codigo_pais,
						    a.codigo_empresa,
						    b.nombre nombre_desarrollador,
						    b.apellido,
						    concat(b.nombre,' ', b.apellido) nombre_completo,
						    c.nombre_pais,
						    d.nombre_empresa
						FROM tbl_aplicaciones a
						INNER JOIN tbl_desarrolladores b
						ON (a.codigo_desarrollador = b.codigo_desarrollador)
						INNER JOIN tbl_paises c
						ON (a.codigo_pais = c.codigo_pais)
						INNER JOIN tbl_empresas d
						ON (a.codigo_empresa = d.codigo_empresa)"
			);
			while($fila = $conexion->obtenerRegistro($resultadoAplicaciones)){
				?>

				<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
					<div class="well">
						<img src="<?php echo $fila["url_icono"]; ?>" class="img-responsive">
						<b><?php echo $fila["nombre"]; ?></b><br>
						<span class="label label-primary"><?php echo $fila["calificacion"]; ?></span>
						<?php 
							for ($j=0;$j<$fila["calificacion"];$j++)
								echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
						?>
						<br>
						<?php echo utf8_encode($fila["descripcion"]); ?><br>
						Versión: <b><?php echo $fila["version"]; ?></b><br>
						<a href="<?php echo $fila["url"]; ?>">Descargar</a>
					</div>
				</div>
				<?php
				//echo $linea."<br>";
			}

			break;
		default:
			# code...
			break;
	}
	
?>