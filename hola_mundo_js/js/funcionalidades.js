//Comentarios de una linea
/*
	Comentarios de multiples lineas
*/
var nombre = "Juan";
document.write("<h1>Hola "+nombre+" desde Javascript</h1>");
alert("Hola mundo, este es un cuadro de dialogo");
console.log("Hola mundo este es un mensaje en la consola");

function mostrarMensaje(){
	alert("Este es el metodo mostrar mensaje");
}

function modificarDiv(){
	document.getElementById("div-contenido").innerHTML = "POLLO";
}

function mostrarValorInput(){
	alert("Valor del input: " + document.getElementById("txt-campo").value);
	alert("Valor del select: " + document.getElementById("slc-pais").value);
}