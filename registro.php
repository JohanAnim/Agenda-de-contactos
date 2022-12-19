<!-- script de php para crear una cuenta y al crearla que cree una tabla única para el usuario con los datos nombre, apellido, numero y email -->
<?php
include "config.php";
// comprobar si el usuario ha creado una cuenta
if (isset($_POST['usuario'])) {
	// comprobar si el usuario existe en la tabla usuarios
	$sql = "SELECT * FROM usuarios WHERE user = '" . $_POST['usuario'] . "'";
	// comprobar si el usuario existe
	if ($resultado = mysqli_query($conexion, $sql)) {
		// comprobar si el usuario existe
		if (mysqli_num_rows($resultado) > 0) {
			// redirigir a la página de registro con un error
			header("Location: registro-form.php?error=usuario");
			// comprovar que las contraseñas coinciden
		} else if ($_POST['pass'] != $_POST['pass2']) {
			header("Location: registro-form.php?error=pass");
		} else {
			// crear la cuenta
			$sql = "INSERT INTO usuarios (user, pass) VALUES ('" . $_POST['usuario'] . "', '" . $_POST['pass'] . "')";
			// comprobar si se ha creado la cuenta
			if (mysqli_query($conexion, $sql)) {
				// crear la tabla para el usuario
				$sql = "CREATE TABLE " . $_POST['usuario'] . " (
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					nombre VARCHAR(30) NOT NULL,
					apellido VARCHAR(30) NOT NULL,
					numero VARCHAR(30) NOT NULL,
					email VARCHAR(50),
					reg_date TIMESTAMP
				)";
				// comprobar si se ha creado la tabla
				if (mysqli_query($conexion, $sql)) {
					echo "La tabla se ha creado correctamente.";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
				}
				if (isset($_POST['recordar'])) {
					// crear la cookie
					setcookie("usuario", $_POST['usuario'], time() + 60 * 60 * 24 * 365);
				}
				// iniciar sesión
				session_start();
				$_SESSION['usuario'] = $_POST['usuario'];
				header("Location: index.php");
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
			}
		}
	}
	// cerrar la conexión
	mysqli_close($conexion);
}
?>