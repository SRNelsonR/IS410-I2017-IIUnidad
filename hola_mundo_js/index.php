<!DOCTYPE html>
<html>
<head>
	<title>Hola mundo en Javascript</title>
</head>
<body>
	<!--script>
		//Esta linea mostrara error porque se intenta acceder al div-contenido y este no ha sido cargado.
		document.getElementById("div-contenido").innerHTML = "Contenido modificado";
	</script-->
	<div id="div-contenido">Este es el contenido del DIV</div>
	<br><input type="text" id="txt-campo" name="txt-campo">
	<input type="button" value="Mostrar Mensaje" onclick="mostrarMensaje();">
	<input type="button" value="Mostrar otro mensaje" onclick="alert('Otro mensaje');">
	<input type="button" value="Modificar DIV" onclick="modificarDiv();">
	<select id="slc-pais">
		<option value="1">Honduras</option>
		<option value="2">Nicaragua</option>
		<option value="3">Panama</option>
		<option value="4">CostaRica</option>
		<option value="5">Guatemala</option>
	</select>
	<button onclick="mostrarValorInput();">Mostrar valor input</button>
	<?php 
		echo "Hola mundo desde PHP <br>";
	?>

	<script src="js/funcionalidades.js"></script>
</body>
</html>