$(document).ready(function(){	
	cargarTarjetas = function(){
		$.ajax({
			url:"ajax/acciones.php?accion=2",
			method: "POST",
			success:function(resultado){
				$("#div-lista-aplicaciones").html(resultado);
			},
			error:function(){

			}
		});
	}
	cargarTarjetas();
	$("#btn-limpiar").click(function(){
		$("#txt-aplicacion").val("");
		$("#txt-descripcion").val("");
		$("#txt-fecha-publicacion").val("");
		$("#txt-fecha-actualizacion").val("");
		$("#txt-calificacion").val("");
		$("#txt-url").val("");
		$("#txt-tamanio").val("");
		$("#txt-version").val("");
		$("#slc-desarrollador").val("");
		$("#slc-icono").val("");

		$("#btn-guardar").show();
		$("#btn-actualizar").hide();
	});

	$("#btn-guardar").click(function(){
		var parametros = "txt-aplicacion=" + $("#txt-aplicacion").val() + "&" + 
			"txt-descripcion="+$("#txt-descripcion").val()+ "&" +
			"txt-fecha-publicacion="+$("#txt-fecha-publicacion").val() + "&" +
			"txt-calificacion="+$("#txt-calificacion").val() + "&" +
			"txt-url="+$("#txt-url").val() + "&" +
			"txt-tamanio="+$("#txt-tamanio").val() + "&" +
			"slc-icono="+$("#slc-icono").val() + "&" +
			"txt-version="+$("#txt-version").val() + "&" +
			"txt-fecha-actualizacion="+$("#txt-fecha-actualizacion").val() + "&" +
			"slc-desarrollador="+$("#slc-desarrollador").val();
		$.ajax({
			url:"ajax/acciones.php?accion=1",
			method: "POST",
			data:parametros,
			dataType:"json",
			success:function(resultado){
				if (resultado.codigo == 1){
					$("#div-resultado-guardar").html('<div style="color:#00ff00;">'+resultado.mensaje+'</div>');		
					cargarTarjetas();
				}
					//document.href = "http://google.com"
				//$("#div-resultado-guardar").html(resultado);
			},
			error:function(){

			}
		});
	});

	$("#btn-actualizar").click(function(){
		var parametros = "txt-aplicacion=" + $("#txt-aplicacion").val() + "&" + 
			"txt-descripcion="+$("#txt-descripcion").val()+ "&" +
			"txt-fecha-publicacion="+$("#txt-fecha-publicacion").val() + "&" +
			"txt-calificacion="+$("#txt-calificacion").val() + "&" +
			"txt-url="+$("#txt-url").val() + "&" +
			"txt-tamanio="+$("#txt-tamanio").val() + "&" +
			"slc-icono="+$("#slc-icono").val() + "&" +
			"txt-version="+$("#txt-version").val() + "&" +
			"txt-fecha-actualizacion="+$("#txt-fecha-actualizacion").val() + "&" +
			"slc-desarrollador="+$("#slc-desarrollador").val() + "&" + 
			"txth-codigo-aplicacion="+$("#txth-codigo-aplicacion").val();
		$.ajax({
			url:"ajax/acciones.php?accion=5",
			method: "POST",
			data:parametros,
			dataType:"json",
			success:function(resultado){
				if (resultado.codigo == 1){
					$("#div-resultado-guardar").html('<div style="color:#00ff00;">'+resultado.mensaje+'</div>');		
					cargarTarjetas();
				}
			},
			error:function(){

			}
		});
	});
});


function eliminarAplicacion(codigoAplicacion){
	alert("Se eliminara la aplicacion con codigo: "+codigoAplicacion);
	var parametros = "codigo_aplicacion="+codigoAplicacion;
	$.ajax({
		url:"ajax/acciones.php?accion=3",
		method: "POST",
		data:parametros,
		dataType:"json",
		success:function(resultado){
			if(resultado.codigo == 1)
				$("#div-app-"+codigoAplicacion).fadeOut(500);
		},
		error:function(){

		}
	});
}
function editarAplicacion(codigoAplicacion){
	var parametros = "codigo_aplicacion="+codigoAplicacion;
	$.ajax({
		url:"ajax/acciones.php?accion=4",
		method: "POST",
		data:parametros,
		dataType:"json",
		success:function(resultado){
/*			 a.codigo_aplicacion,
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
*/
			
			$("#txth-codigo-aplicacion").val(resultado.codigo_aplicacion);
			$("#txt-aplicacion").val(resultado.nombre);
			$("#txt-descripcion").val(resultado.descripcion);
			$("#txt-fecha-publicacion").val(resultado.fecha_publicacion);
			$("#txt-fecha-actualizacion").val(resultado.fecha_actualizacion);
			$("#txt-calificacion").val(resultado.calificacion);
			$("#txt-url").val(resultado.url);
			$("#txt-tamanio").val(resultado.tamanio_archivo);
			$("#txt-version").val(resultado.version);
			$("#slc-desarrollador").val(resultado.codigo_desarrollador);
			$("#slc-icono").val(resultado.url_icono);

			$("#btn-guardar").hide();
			$("#btn-actualizar").show();
		},
		error:function(){
			alert("Hay un errorrrr 0_0");
		}
	});
}