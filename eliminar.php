<!-- script de php para eliminar un contacto de la respectiva tabla del usuario -->
<?php
include "config.php";
// optener el nombre de la tabla del usuario
if (isset($_SESSION['usuario'])) {
	$tabla = $_SESSION['usuario'];
} else {
	$tabla = $_COOKIE['usuario'];
}
// comprobar si el usuario ha eliminado un contacto
if (isset($_POST['eliminar'])) {
	// eliminar el contacto de la tabla del usuario
	$sql = "DELETE FROM $tabla WHERE id = " . $_POST['eliminar'];
	// comprobar si se ha eliminado el contacto de la tabla del usuario
	if (mysqli_query($conexion, $sql)) {
		// mostrar un alerta de que el contacto se ha eliminado
		echo "El contacto se a eliminado correctamente. Pulse aseptar para continuar.";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}
	// cerrar la conexión
	mysqli_close($conexion);
	header("Location: index.php");
}
?>