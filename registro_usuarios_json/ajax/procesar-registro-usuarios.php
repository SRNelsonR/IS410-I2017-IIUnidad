<?php
	/*echo "Este es el resultado de procesar";
	echo $_POST["txt-nombre"].",";
	echo $_POST["txt-apellido"].",";
	echo $_POST["txt-correo"].",";
	echo $_POST["txt-contrasena"].",";
	echo $_POST["txt-confirmar-contrasena"].",";*/

	include_once("../class/class-usuario.php");
	//sleep(5);
	//<div class="bg-danger">
	switch ($_GET["accion"]) {
		case '1':
			$resultado = array();
			if ( $_POST["txt-contrasena"] != $_POST["txt-confirmar-contrasena"]){
				$resultado["codigo_resultado"]=0;
				$resultado["mensaje"]='Error, las contraseñas no coinciden';
				echo json_encode($resultado);
				exit;
			}

			$usuario = new Usuario(
				$_POST["txt-nombre"],
				$_POST["txt-apellido"],
				$_POST["txt-correo"],
				$_POST["txt-contrasena"]
			);
			$usuario->guardarRegistro();

			$resultado["codigo_resultado"]=1;
			$resultado["mensaje"]='Registro guardado con éxito.';
			echo json_encode($resultado);
			break;
		case '2':
			$archivo = fopen("usuarios.csv","r");
			echo  '<table class="table table-striped table-hover">'.
                  '<tr><th>Nombre</th><th>Apellido</th><th>Correo</th></tr>';
			while(!feof($archivo)){
				$linea = fgets($archivo);
				$partes = explode(",",$linea);
				echo "<tr><td>".$partes[0]."</td><td>".$partes[1]."</td><td>".$partes[2]."</td></tr>";
			}
			echo "</table>";
			fclose($archivo);
			break;
		default:
			# code...
			break;
	}
	
?>
