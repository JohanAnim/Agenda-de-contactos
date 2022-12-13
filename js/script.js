
let buscar_form = document.getElementById("buscar_form");
let busqueda = document.getElementById("busqueda");
let filtro = document.getElementById("filtro");
let alert_busqueda = document.getElementById("alert_busqueda");

var ajenda = document.getElementById("ajenda");
var lista_contactos = document.querySelector("#tabla_contactos");
var elementos_contactos = document.querySelectorAll("#fila_contacto");
var celdas_contactos = document.querySelectorAll("td");
var boton_menu = document.querySelectorAll("#dropdownMenuButton1")
var boton_eliminar = document.querySelectorAll("#eliminar")
var boton_editar = document.querySelectorAll("#editar")
// crear variable para el elemento activo
var elemento_activo = 0;
// crear variable para el elemento activo
var celda_activa = 0;

// acer que todas las filas y celdas de la lista de contactos sean enfocables
for (var i = 0; i < elementos_contactos.length; i++) {
	elementos_contactos[i].setAttribute("tabindex", "-1");
}
for (var i = 0; i < celdas_contactos.length; i++) {
	celdas_contactos[i].setAttribute("tabindex", "-1");
}
for (var i = 0; i < boton_menu.length; i++) {
	boton_menu[i].setAttribute("tabindex", "-1");
}

window.onload = function() {

	elementos_contactos[elemento_activo].focus();
}


// función para que cuando se mueva el foco con la flecha abajo se mueva entre las filas
function moverFocoAbajo() {
	// quitar el foco de la fila anterior
	elementos_contactos[elemento_activo].setAttribute("tabindex", "-1");
	// quitar el foco de la celda anterior
	celdas_contactos[celda_activa].setAttribute("tabindex", "-1");
	// si el elemento activo es menor que el número de elementos de la lista de contactos
	if (elemento_activo < elementos_contactos.length - 1) {
		// aumentar el elemento activo
		elemento_activo++;
	} else {
		// si no, no hacer nada
		return;
	}
	// poner el foco en la fila activa
	elementos_contactos[elemento_activo].setAttribute("tabindex", "0");
	// poner el foco en la celda activa
	celdas_contactos[celda_activa].setAttribute("tabindex", "0");
	// poner el foco en la fila activa
	elementos_contactos[elemento_activo].focus();
}
// función para que cuando se mueva el foco con la flecha arriba se mueva entre las filas
function moverFocoArriba() {
	// quitar el foco de la fila anterior
	elementos_contactos[elemento_activo].setAttribute("tabindex", "-1");
	// quitar el foco de la celda anterior
	celdas_contactos[celda_activa].setAttribute("tabindex", "-1");
	// si el elemento activo es mayor que 0
	if (elemento_activo > 0) {
		// disminuir el elemento activo
		elemento_activo--;
	} else {
		// si no, no hacer nada
		return;
	}
	// poner el foco en la fila activa
	elementos_contactos[elemento_activo].setAttribute("tabindex", "0");
	// poner el foco en la celda activa
	celdas_contactos[celda_activa].setAttribute("tabindex", "0");
	// poner el foco en la fila activa
	elementos_contactos[elemento_activo].focus();
}
// función para que cuando se mueva el foco con la flecha derecha se mueva solamente por las celdas de la fila en	la que se encuentre el	foco
function moverFocoDerecha() {
	// quitar el foco de la celda anterior
	celdas_contactos[celda_activa].setAttribute("tabindex", "-1");
	// si la celda activa es menor que el número de celdas de la lista de contactos
	if (celda_activa < celdas_contactos.length - 1) {
		// aumentar la celda activa
		celda_activa++;
	} else {
		// si no, no hacer nada
		return;
	}
	celdas_contactos[celda_activa].setAttribute("tabindex", "0");
	var celdas_fila_activa = document.querySelectorAll("#fila_contacto:nth-child(" + (elemento_activo + 1) + ") td");
	// poner el foco en la celda activa
	celdas_fila_activa[celda_activa].focus();

}
// función para que cuando se mueva el foco con la flecha izquierda se mueva solamente por las celdas de la fila en	la que se encuentre el	foco
function moverFocoIzquierda() {
	// quitar el foco de la celda anterior
	celdas_contactos[celda_activa].setAttribute("tabindex", "-1");
	// si la celda activa es mayor que 0
	if (celda_activa > 0) {
		// disminuir la celda activa
		celda_activa--;
	} else {
		// si no, no hacer nada
		return;
	}
	// poner el foco en la celda activa
	celdas_contactos[celda_activa].setAttribute("tabindex", "0");
	// detectar las celdas de la fila activa
	var celdas_fila_activa = document.querySelectorAll("#fila_contacto:nth-child(" + (elemento_activo + 1) + ") td");
	// poner el foco en la celda activa
	celdas_fila_activa[celda_activa].focus();
}
// desabilitar el menú contextual del ratón
lista_contactos.addEventListener("contextmenu", function(e) {
	e.preventDefault();
	if (elemento_activo != null) {
		boton_menu[elemento_activo].click();
	}
});
// cuando se dé enter en un elemento de la lista de contactos
function enterElemento() {
	// verificar que haya un elemento activo para abrir su botón de menú
	if (elemento_activo != null) {
		// dar click en la opción de editar
		editar[elemento_activo].click();
	}
}
// función cuando se pulse la suprimir
function suprimirElemento() {
	// verificar que haya un elemento activo para elmiminar
	if (elemento_activo != null) {
		let confirmacion = confirm("¿Está seguro de eliminar este contacto?");
		if (confirmacion) {
			eliminar[elemento_activo].click();
		}
		else{
			return;
		}
	}
}

// crear eventos de teclado
ajenda.addEventListener("keydown", function(event) {
	// si se pulsa la tecla flecha abajo
	if (event.keyCode == 40) {
		moverFocoAbajo();
	}
	// si se pulsa la tecla flecha arriba
	if (event.keyCode == 38) {
		// mover el foco hacia arriba
		moverFocoArriba();
	}
	// si se pulsa la tecla flecha derecha
	if (event.keyCode == 39) {
		// mover el foco hacia la derecha
		moverFocoDerecha();
	}
	// si se pulsa la tecla flecha izquierda
	if (event.keyCode == 37) {
		// mover el foco hacia la izquierda
		moverFocoIzquierda();
	}
	// si se pulsa la tecla enter
	if (event.keyCode == 13) {
		enterElemento();
	}
	// si se pulsa la tecla suprimir
	if (event.keyCode == 46) {
		suprimirElemento();
	}
	// cuando se pulse la tecla inicio
	if (event.keyCode == 36) {
		// quitar el foco de la celda anterior
		celdas_contactos[celda_activa].setAttribute("tabindex", "-1");
		// quitar el foco del elemento anterior
		elementos_contactos[elemento_activo].setAttribute("tabindex", "-1");
		// poner el foco en el primer elemento
		elementos_contactos[0].setAttribute("tabindex", "0");
		// poner el foco en el primer elemento
		elementos_contactos[0].focus();
		// poner el elemento activo en 0
		elemento_activo = 0;
		// poner la celda activa en 0
		celda_activa = 0;
	}
	// cuando se pulse la tecla fin
	if (event.keyCode == 35) {
		// quitar el foco de la celda anterior
		celdas_contactos[celda_activa].setAttribute("tabindex", "-1");
		// quitar el foco del elemento anterior
		elementos_contactos[elemento_activo].setAttribute("tabindex", "-1");
		// poner el foco en el último elemento
		elementos_contactos[elementos_contactos.length - 1].setAttribute("tabindex", "0");
		// poner el foco en el último elemento
		elementos_contactos[elementos_contactos.length - 1].focus();
		// poner el elemento activo en el último elemento
		elemento_activo = elementos_contactos.length - 1;
		// poner la celda activa en 0
		celda_activa = 0;
	}

});

// crear función para mostrar en la lista de contactos los contactos que coincidan con la búsqueda
function buscarContacto() {
	// obtener el valor del input de búsqueda
	var valor_busqueda = busqueda.value;
	// optener el texto de cada fila de la lista de contactos
	var texto_fila = elementos_contactos.textContent;
	// si el valor de la búsqueda es igual a vacío
	if (valor_busqueda == "") {
		// mostrar todos los contactos
		for (var i = 0; i < elementos_contactos.length; i++) {
			elementos_contactos[i].style.display = "table-row";
		}
		// si no
	} else {
		// ocultar todos los contactos
		for (var i = 0; i < elementos_contactos.length; i++) {
			elementos_contactos[i].style.display = "none";
		}
		// crear un array con los contactos que coincidan con la búsqueda
		var coincidencias = [];
		// recorrer todos los contactos
		for (var i = 0; i < elementos_contactos.length; i++) {
			// si el valor de la búsqueda está en el texto de la fila
			if (elementos_contactos[i].textContent.toLowerCase().indexOf(valor_busqueda.toLowerCase()) > -1) {
				// agregar el contacto a las coincidencias
				coincidencias.push(elementos_contactos[i]);
			}
		}
		// mostrar los contactos que coincidan con la búsqueda
		for (var i = 0; i < coincidencias.length; i++) {
			coincidencias[i].style.display = "table-row";
		}
	}
}

// crear un evento de ajax para buscar de manera dinámica de pendiendo de lo que se escriba en el campo de búsqueda y del filtro que esté seleccionado
busqueda.addEventListener("input", function() {
	// crear un objeto de ajax
	var ajax = new XMLHttpRequest();
	// crear un objeto de formulario
	var formulario = new FormData();
	// agregar el valor del campo de búsqueda al formulario
	formulario.append("busqueda", busqueda.value);
	// agregar el valor del filtro al formulario
	formulario.append("filtro", filtro.value);
	// abrir la conexión
	ajax.open("POST", "buscar_contacto.php");
	// enviar el formulario
	ajax.send(formulario);
	// cuando se reciba la respuesta
	ajax.onreadystatechange = function() {
		// si la respuesta es correcta
		if (ajax.readyState == 4 && ajax.status == 200) {
			// mostrar la respuesta en el alert
			alert_busqueda.innerHTML = ajax.responseText;
			// mostrar los contactos coincidentes
			buscarContacto();
		}
		else{
			alert_busqueda.innerHTML = "Cargando...";
		}
	}

});

function tts(texto) {
	var msg = new SpeechSynthesisUtterance();
	var voices = window.speechSynthesis.getVoices();
	msg.voice = voices[0]; // Note: some voices don't support altering params
	msg.voiceURI = 'native';
	msg.volume = 1; // 0 to 1
	msg.rate = 1; // 0.1 to 10
	msg.text = texto;
	msg.lang = 'es-ES';
	speechSynthesis.speak(msg);
}
