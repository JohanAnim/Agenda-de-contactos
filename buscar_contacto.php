<!-- script de php para que cuando el usuario esté escribiendo en el input de busqueda se muestren la cantidad de contactos que coincidan con lo que el usuario está escribiendo dependiendo de el filtro que el usuario haya seleccionado para despues llamarlo desde ajax javascript y si no hay ningun contacto que coincida con lo que el usuario está escribiendo se muestre un mensaje de que ese contacto no existe en la base de datos -->
<?php
include "config.php";
// optener el nombre de la tabla del usuario
if (isset($_SESSION['usuario'])) {
	$tabla = $_SESSION['usuario'];
} else {
	$tabla = $_COOKIE['usuario'];
}
// comprobar si el usuario ha escrito algo en el input de busqueda
if (isset($_POST['busqueda'])) {
	// comprobar si el usuario ha seleccionado el filtro de nombre
	if ($_POST['filtro'] == "nombre") {
		$sql = "SELECT * FROM $tabla WHERE nombre LIKE '%" . $_POST['busqueda'] . "%'";
		// comprobar si se ha encontrado el contacto en la tabla usuarios
		if ($resultado = mysqli_query($conexion, $sql)) {
			// comprobar si el usuario ha encontrado un contacto
			if (mysqli_num_rows($resultado) > 0) {
				// mostrar la cantidad de contactos que coinciden con lo que el usuario está escribiendo
				echo "Se han encontrado " . mysqli_num_rows($resultado) . " contactos.";
				echo "<audio autoplay><source src='sonidos/busqueda_exitosa.mp3' type='audio/mpeg'></audio>";
			} else {
				// mostrar un mensaje de que ese contacto no existe en la base de datos
				echo "No se ha encontrado ningún contacto con ese nombre.";
				echo "<audio autoplay><source src='sonidos/busqueda_fallida.wav' type='audio/wav'></audio>";
			}
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
		}
	}
	// comprobar si el usuario ha seleccionado el filtro de apellido
	if ($_POST['filtro'] == "apellido") {
		$sql = "SELECT * FROM $tabla WHERE apellido LIKE '%" . $_POST['busqueda'] . "%'";
		// comprobar si se ha encontrado el contacto en la tabla usuarios
		if ($resultado = mysqli_query($conexion, $sql)) {
			// comprobar si el usuario ha encontrado un contacto
			if (mysqli_num_rows($resultado) > 0) {
				// mostrar la cantidad de contactos que coinciden con lo que el usuario está escribiendo
				echo "Se han encontrado " . mysqli_num_rows($resultado) . " contactos.";
				echo "<audio autoplay><source src='sonidos/busqueda_exitosa.mp3' type='audio/mpeg'></audio>";
			} else {
				// mostrar un mensaje de que ese contacto no existe en la base de datos
				echo "No se ha encontrado ningún contacto con ese apellido.";
				echo "<audio autoplay><source src='sonidos/busqueda_fallida.wav' type='audio/wav'></audio>";
			}
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
		}
	}
	// comprobar si el usuario ha seleccionado el filtro de numero
	if ($_POST['filtro'] == "numero") {
		$sql = "SELECT * FROM $tabla WHERE numero LIKE '%" . $_POST['busqueda'] . "%'";
		// comprobar si se ha encontrado el contacto en la tabla usuarios
		if ($resultado = mysqli_query($conexion, $sql)) {
			// comprobar si el usuario ha encontrado un contacto
			if (mysqli_num_rows($resultado) > 0) {
				// mostrar la cantidad de contactos que coinciden con lo que el usuario está escribiendo
				echo "Se han encontrado " . mysqli_num_rows($resultado) . " contactos.";
				echo "<audio autoplay><source src='sonidos/busqueda_exitosa.mp3' type='audio/mpeg'></audio>";
			} else {
				// mostrar un mensaje de que ese contacto no existe en la base de datos
				echo "No se ha encontrado ningún contacto con ese número.";
				echo "<audio autoplay><source src='sonidos/busqueda_fallida.wav' type='audio/wav'></audio>";
			}
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
		}

	}
	// si se ha seleccionado el filtro de email
	if ($_POST['filtro'] == "email") {
		$sql = "SELECT * FROM $tabla WHERE email LIKE '%" . $_POST['busqueda'] . "%'";
		// comprobar si se ha encontrado el contacto en la tabla usuarios
		if ($resultado = mysqli_query($conexion, $sql)) {
			// comprobar si el usuario ha encontrado un contacto
			if (mysqli_num_rows($resultado) > 0) {
				// mostrar la cantidad de contactos que coinciden con lo que el usuario está escribiendo
				echo "Se han encontrado " . mysqli_num_rows($resultado) . " contactos.";
				echo "<audio autoplay><source src='sonidos/busqueda_exitosa.mp3' type='audio/mpeg'></audio>";
			} else {
				// mostrar un mensaje de que ese contacto no existe en la base de datos
				echo "No se ha encontrado ningún contacto con ese correo.";
				echo "<audio autoplay><source src='sonidos/busqueda_fallida.wav' type='audio/wav'></audio>";
			}
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
		}
	}
}
?>
