<!-- script de php para iniciar sesión junto con la tabla corresopndiente a cada usuario -->
<?php
include "config.php";
// comprobar si el usuario ha iniciado sesión
if (isset($_POST['usuario'])) {
	// comprobar si el usuario existe en la tabla usuarios
	$sql = "SELECT * FROM usuarios WHERE user = '" . $_POST['usuario'] . "'";
	// comprobar si el usuario existe
	if ($resultado = mysqli_query($conexion, $sql)) {
		// comprobar si el usuario existe
		if (mysqli_num_rows($resultado) > 0) {
			// comprobar si la contraseña es correcta
			$fila = mysqli_fetch_assoc($resultado);
			if ($fila['pass'] == $_POST['pass']) {
				// iniciar sesión
				session_start();
				$_SESSION['usuario'] = $_POST['usuario'];
				// comprobar si se ha marcado el checkbox de recordar
				if (isset($_POST['recordar'])) {
					// crear una cookie
					setcookie('usuario', $_POST['usuario'], time() + 60 * 60 * 24 * 365);
				}	
				header("Location: index.php?usuario=" . $_POST['usuario']);
			} else {
				// redirigir a la página de registro con un error
				header("Location: loguin-form.php?error=pass");
			}
		} else {
			// redirigir a la página de registro con un error
			header("Location: loguin-form.php?error=usuario");
		}
	}
	// cerrar la conexión
	mysqli_close($conexion);
}
?>