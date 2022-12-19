<!-- script de php que añade un contacto según la tabla del usuario	-->
<?php
include "config.php";
// acceder a la tabla del usuario que está loguiado
if (isset($_SESSION['usuario'])) {
	$tabla = $_SESSION['usuario'];
} else {
	$tabla = $_COOKIE['usuario'];
}
// comprobar si el usuario ha añadido un contacto
if (isset($_POST['usuario'])) {
	// añadir el contacto a la tabla del usuario
	$sql = "INSERT INTO $tabla (nombre, apellido, numero, email) VALUES ('" . $_POST['nombre'] . "', '" . $_POST['apellido'] . "', '" . $_POST['numero'] . "', '" . $_POST['email'] . "')";
	// comprobar si se ha añadido el contacto a la tabla del usuario
	if (mysqli_query($conexion, $sql)) {
		echo "El contacto se a añadido correctamente.";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}
	// cerrar la conexión
	mysqli_close($conexion);
	header("Location: index.php");
}
?>