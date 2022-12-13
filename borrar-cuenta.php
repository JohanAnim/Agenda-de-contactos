<!-- script que borra la cuenta actual junto con sus contactos	-->
<?php
include "config.php";
	// optener el nombre de la tabla del usuario
	if (isset($_SESSION['usuario'])) {
		$tabla = $_SESSION['usuario'];
	} else {
		$tabla = $_COOKIE['usuario'];
	}
// comprobar si el usuario ha iniciado sesión
if (isset($_SESSION['usuario']) || isset($_COOKIE['usuario'])) {
	// borrar la tabla del usuario
	$sql = "DROP TABLE $tabla";
	// comprobar si se ha borrado la tabla del usuario
	if (mysqli_query($conexion, $sql)) {
		// borrar la cuenta del usuario
		$sql = "DELETE FROM usuarios WHERE user = '$tabla'";
		// comprobar si se ha borrado la cuenta del usuario
		if (mysqli_query($conexion, $sql)) {
			// cerrar la sesión
			session_start();
			session_destroy();
			// borrar la cookie
			setcookie('usuario', '', time() - 3600);
			header("Location: index.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
		}
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}
	// cerrar la conexión
	mysqli_close($conexion);
}
?>