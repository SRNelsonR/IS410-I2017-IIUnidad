$("#btn-registrar").click(function(){
	$("#btn-registrar").button("loading");
	var parametros=
				"txt-nombre="+$("#txt-nombre").val()+"&"+
				"txt-apellido="+$("#txt-apellido").val()+"&"+
				"txt-correo="+$("#txt-correo").val()+"&"+
				"txt-contrasena="+$("#txt-contrasena").val()+"&"+
				"txt-confirmar-contrasena="+$("#txt-confirmar-contrasena").val();
	//alert("parametros a enviar " + parametros);
	$.ajax({
		url:"ajax/procesar-registro-usuarios.php",
		data:parametros,
		method:"POST",
		success:function(respuesta){
			$("#resultado").html(respuesta);
			$("#btn-registrar").button("reset");
			///alert(respuesta);
		}
	});
});