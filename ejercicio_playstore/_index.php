<?php
	include_once("class/class-conexion.php");
	$conexion = new Conexion();
	$conexion->establecerConexion();
	$resultado = $conexion->ejecutarInstruccion("SELECT codigo_pais, nombre_pais, longitud, latitud FROM tbl_paises");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	while($fila=$conexion->obtenerRegistro($resultado)){
		echo "Pais: " . $fila["nombre_pais"]."<br>";
	}
?>
</body>
</html>
<?php
	$conexion->cerrarConexion();
?>