<!-- script de php para editar un contacto de la tabla del usuario -->
<?php
include "config.php";
// optener el nombre de la tabla del usuario
if (isset($_SESSION['usuario'])) {
	$tabla = $_SESSION['usuario'];
} else {
	$tabla = $_COOKIE['usuario'];
}
// comprobar si el usuario ha editado un contacto
if (isset($_POST['editar'])) {
	// editar el contacto de la tabla del usuario
	$sql = "UPDATE $tabla SET nombre = '" . $_POST['nombre'] . "', apellido = '" . $_POST['apellido'] . "', numero = '" . $_POST['numero'] . "', email = '" . $_POST['email'] . "' WHERE id = " . $_POST['editar'];
	// comprobar si se ha editado el contacto de la tabla del usuario
	if (mysqli_query($conexion, $sql)) {
		// mostrar un alerta de que el contacto se ha editado
		echo "El contacto se a editado correctamente. Pulse aseptar para continuar.";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}
	// cerrar la conexión
	mysqli_close($conexion);
	header("Location: index.php");
}
?>