<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	$link = mysqli_connect("127.0.0.1","root","","playstore_db",3306);
	if (!$link) {
	    echo "Error: No se pudo conectar a MySQL.<br>";
	    echo "Codigo Error: " . mysqli_connect_errno() . "<br>";
	    echo "Mensaje Error: " . mysqli_connect_error() . "<br>";
	    exit;
	}

	echo "Conexion exitosa<br>";

	$sql = "SELECT codigo_pais, nombre_pais, longitud, latitud FROM tbl_paises";
	$resultado = $link->query($sql);

	echo "<select>";
	while($fila = mysqli_fetch_array($resultado))
		echo '<option value="'.$fila["codigo_pais"].'">'  . $fila["nombre_pais"]."(".$fila["longitud"].",".$fila["latitud"].")</option>";

	echo "</select>";


	$sql = "SELECT a.codigo_aplicacion,
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
			ON (a.codigo_empresa = d.codigo_empresa)";
	$resultado = $link->query($sql);

	echo "<table><tr><th>Aplicacion</th><th>Version</th><th>Desarrollador</th><th>Empresa</th></tr>";
	while($fila = mysqli_fetch_array($resultado)){
		echo 	"<tr><td> " . $fila["nombre"]."</td>".
					 "<td>".$fila["version"]."</td>".
					 "<td>".$fila["nombre_completo"]."</td>".
					 "<td>".$fila["nombre_empresa"]."</td></tr>";
	}
	echo "</table>";

	

	mysqli_close($link);
?>
</body>
</html>