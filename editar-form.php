<!-- Un formulario para editar los datos del contacto de  la tabla del usuario actual -->
<!-- El formulario se rellena con los datos del contacto que se va a editar -->
<!-- El formulario envía los datos del contacto editado a editar.php -->
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">

	<?php
	// incluir el archivo config.php
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
		$sql = "SELECT * FROM $tabla WHERE id = " . $_POST['editar'];
		// comprobar si se ha editado el contacto de la tabla del usuario
		if ($resultado = mysqli_query($conexion, $sql)) {
			// mostrar un alerta de que el contacto se ha editado
			// echo "El contacto se a editado correctamente. Pulse aseptar para continuar.";
			// optener los datos del contacto
			$contacto = mysqli_fetch_assoc($resultado);
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
		}
		// cerrar la conexión
		mysqli_close($conexion);
	}
	?>
	
	<title>Editando el contacto de <?php echo $contacto['nombre'] . " " . $contacto['apellido']; ?></title>
	</head>
<body>
	
	<h1>Editando el contacto de <?php echo $contacto['nombre'] . " " . $contacto['apellido']; ?></h1>
	<form action="editar.php" method="post" role="form">
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre" id="nombre" value="<?php echo $contacto['nombre']; ?>" autofocus required><br>
		<label for="apellido">Apellido:</label>
		<input type="text" name="apellido" id="apellido" value="<?php echo $contacto['apellido']; ?>" required><br>
		<label for="numero">Número:</label>
		<input type="text" name="numero" id="numero" value="<?php echo $contacto['numero']; ?>" required><br>
		<label for="email">Email:</label>
		<input type="text" name="email" id="email" value="<?php echo $contacto['email']; ?>" required><br>
		<input type="hidden" name="editar" value="<?php echo $contacto['id']; ?>">
		<input type="submit" value="Editar">
		<button type="button" onclick="location.href='index.php'">Cancelar</button>
	</form>
</body>
</html>