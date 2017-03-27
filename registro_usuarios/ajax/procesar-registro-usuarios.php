<?php
	/*echo "Este es el resultado de procesar";
	echo $_POST["txt-nombre"].",";
	echo $_POST["txt-apellido"].",";
	echo $_POST["txt-correo"].",";
	echo $_POST["txt-contrasena"].",";
	echo $_POST["txt-confirmar-contrasena"].",";*/

	include_once("../class/class-usuario.php");
	sleep(5);
	if ( $_POST["txt-contrasena"] != $_POST["txt-confirmar-contrasena"]){
		echo '<div class="bg-danger">Error, las contraseñas no coinciden</div>';
		exit;
	}

	$usuario = new Usuario(
		$_POST["txt-nombre"],
		$_POST["txt-apellido"],
		$_POST["txt-correo"],
		$_POST["txt-contrasena"]
	);
	$usuario->guardarRegistro();
	echo '<div class="bg-success">Registro guardado con éxito.</div>';
?>
