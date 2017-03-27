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
		url:"ajax/procesar-registro-usuarios.php?accion=1",
		data:parametros,
		method:"POST",
		dataType:"json",
		success:function(respuesta){
			///alert(respuesta);
			//alert("Codigo: " + respuesta.codigo_resultado);
			//alert("Mensaje: " + respuesta.mensaje);
			if (respuesta.codigo_resultado==0)
				$("#resultado").html('<div class="bg-danger"> '+respuesta.mensaje+"</div>");
			if (respuesta.codigo_resultado==1)
				$("#resultado").html('<div class="bg-success"> '+respuesta.mensaje+"</div>");
			$("#btn-registrar").button("reset");
			
		}
	});
});


$("#btn-mostrar-usuarios").click(function(){
	$("#btn-mostrar-usuarios").button("loading");
	$.ajax({
		url:"ajax/procesar-registro-usuarios.php?accion=2",
		method:"POST",
		dataType:"html",
		success:function(respuesta){
			$("#tabla-usuarios").html(respuesta);
			$("#btn-mostrar-usuarios").button("reset");
			$("#modal-usuarios").modal('show');			
		}
	});
	
});
