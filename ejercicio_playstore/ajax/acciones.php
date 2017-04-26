<?php
	switch ($_GET["accion"]) {
		case '1':

			/*echo 	$_POST["txt-aplicacion"].", ".
					$_POST["txt-descripcion"].", ".
					$_POST["txt-fecha-publicacion"].", ".
					$_POST["txt-calificacion"].", ".
					$_POST["txt-url"].", ".
					$_POST["txt-tamanio"].", ".
					$_POST["slc-icono"].", ".
					$_POST["txt-version"].", ".
					$_POST["txt-fecha-actualizacion"].", ".
					$_POST["slc-desarrollador"];
			exit;*/



			include_once("../class/class_producto.php");
			include_once("../class/class_icono.php");
			include_once("../class/class_usuario.php");
			include_once("../class/class_desarrollador.php");
			include_once("../class/class_aplicacion.php");
			include_once("../class/class-conexion.php");
			$conexion = new Conexion();
			$conexion->establecerConexion();
			

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
					$_POST["slc-desarrollador"]
			);

			$aplicacion->guardarRegistro($conexion);
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
						LEFT JOIN tbl_desarrolladores b
						ON (a.codigo_desarrollador = b.codigo_desarrollador)
						LEFT JOIN tbl_paises c
						ON (a.codigo_pais = c.codigo_pais)
						LEFT JOIN tbl_empresas d
						ON (a.codigo_empresa = d.codigo_empresa)"
			);
			while($fila = $conexion->obtenerRegistro($resultadoAplicaciones)){
				?>

				<div id="div-app-<?php echo $fila["codigo_aplicacion"]; ?>" class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
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
						<a href="<?php echo $fila["url"]; ?>">Descargar</a><br>
						<button type="button" class="btn btn-danger" aria-label="Left Align"  onclick="eliminarAplicacion(<?php echo $fila["codigo_aplicacion"];?>)">
						  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default" aria-label="Left Align" onclick="editarAplicacion(<?php echo $fila["codigo_aplicacion"];?>)">
						  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</button>
					</div>
				</div>
				<?php
				//echo $linea."<br>";
			}

			break;
		case 3:
			//echo "Aplicacion a eliminar" . $_POST["codigo_aplicacion"];
			include_once("../class/class-conexion.php");
			include_once("../class/class_producto.php");
			include_once("../class/class_aplicacion.php");
			$conexion = new Conexion();
			$conexion->establecerConexion();
			Aplicacion::eliminarRegistro($conexion, $_POST["codigo_aplicacion"]);
			$conexion->cerrarConexion();
			break;
		case '4':
				include_once("../class/class-conexion.php");
				$conexion = new Conexion();
				$conexion->establecerConexion();
				$sql = sprintf(
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
						LEFT JOIN tbl_desarrolladores b
						ON (a.codigo_desarrollador = b.codigo_desarrollador)
						LEFT JOIN tbl_paises c
						ON (a.codigo_pais = c.codigo_pais)
						LEFT JOIN tbl_empresas d
						ON (a.codigo_empresa = d.codigo_empresa)
				WHERE a.codigo_aplicacion = %s",
				$conexion->getEnlace()->real_escape_string(stripslashes($_POST["codigo_aplicacion"]))
			);
			$resultadoAplicacion = $conexion->ejecutarInstruccion($sql);
			$fila = $conexion->obtenerRegistro($resultadoAplicacion);
			
			echo json_encode($fila);
			break;
		default:
			# code...
			break;
	}
	
?>