<!-- este archivo configura la conección para que con se tenga que escribir el código de la conección en cada archivo -->
<?php
	// datos de la base de datos
	$host = "localhost";
	$usuario = "root";
	$contraseña = "";
	$base_de_datos = "contactos";
	// conectar con la base de datos contactos
	$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);
	// comprobar la conexión
	if (!$conexion) {
		die("Error de conexión: " . mysqli_connect_error());
	}
?>