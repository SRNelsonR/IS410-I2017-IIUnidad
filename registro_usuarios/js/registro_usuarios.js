$("#btn-registrar").click(function(){
	var parametros=
				"txt-nombre="+$("#txt-nombre").val()+"&"+
				"txt-apellido="+$("#txt-apellido").val()+"&"+
				"txt-correo="+$("#txt-correo").val()+"&"+
				"txt-contrasena="+$("#txt-contrasena").val()+"&"+
				"txt-confirmar-contrasena="+$("#txt-confirmar-contrasena").val();
	alert("parametros a enviar " + parametros);
	$.ajax({
		url:"ajax/procesar-registro-usuarios.php",
		data:parametros,
		method:"POST",
		success:function(respuesta){
			alert(respuesta);
		}
	});
});