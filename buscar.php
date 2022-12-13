<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Resultados de la búsqueda de <?php echo $_POST['busqueda']; ?></title>

	</head>
	<body>
		<div id="conteiner">
			<h1>Resultados de la búsqueda de <?php echo $_POST['busqueda']; ?></h1>
			<!-- mostrar los resultados de la búsqueda -->
			<ul>
				<?php
				include "config.php";
						// acceder a la tabla del usuario que está loguiado
						if (isset($_SESSION['usuario'])) {
							$tabla = $_SESSION['usuario'];
						} else {
							$tabla = $_COOKIE['usuario'];
						}
				// comprobar si el usuario ha introducido algo en el campo de búsqueda
				if (isset($_POST['busqueda'])) {
					// mostrar los contactos que se buscó dependiendo de que tipo de filtro se seleccionó, y si se encontraron contactos que coincidan con la búsqueda mostrarlo junto con sus opciones, y si no mostrar un mensaje de que no se encontraron contactos con la búsqueda tal
					if ($_POST['filtro'] == "nombre") {
						$sql = "SELECT * FROM $tabla WHERE nombre LIKE '%" . $_POST['busqueda'] . "%'";
						// comprobar si se ha seleccionado los datos del contacto que se va a editar
						if ($resultado = mysqli_query($conexion, $sql)) {
							echo "Resultados de la búsqueda de " . $_POST['busqueda'] . " por nombre:<br>";
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
						}
						mysqli_close($conexion);
						if (mysqli_num_rows($resultado) > 0) {
							while ($contacto = mysqli_fetch_assoc($resultado)) {
								echo "<li>Nombre: " . $contacto['nombre'] . " " . $contacto['apellido'] . " - Número de teléfono: " . $contacto['numero'] . " - correo electrónico: " . $contacto['email'] . " - <form action='editar-form.php' method='post'><input type='hidden' name='editar' value='" . $contacto['id'] . "'><input type='submit' value='Editar'></form> - <form action='eliminar.php' method='post'><input type='hidden' name='eliminar' value='" . $contacto['id'] . "'><input type='submit' value='Eliminar'></form></li>";
								echo "<style>form {display: inline;}</style>";
							}
						} else {
							echo "No se encontraron contactos con el nombre " . $_POST['busqueda'];
						}
					} elseif ($_POST['filtro'] == "apellido") {
						$sql = "SELECT * FROM $tabla WHERE apellido LIKE '%" . $_POST['busqueda'] . "%'";
						// comprobar si se ha seleccionado los datos del contacto que se va a editar
						if ($resultado = mysqli_query($conexion, $sql)) {
							echo "Resultados de la búsqueda de " . $_POST['busqueda'] . " por apellido:<br>";
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
						}
						mysqli_close($conexion);
						if (mysqli_num_rows($resultado) > 0) {
							while ($contacto = mysqli_fetch_assoc($resultado)) {
								echo "<li>Nombre: " . $contacto['nombre'] . " " . $contacto['apellido'] . " - Número de teléfono: " . $contacto['numero'] . " - correo electrónico: " . $contacto['email'] . " - <form action='editar-form.php' method='post'><input type='hidden' name='editar' value='" . $contacto['id'] . "'><input type='submit' value='Editar'></form> - <form action='eliminar.php' method='post'><input type='hidden' name='eliminar' value='" . $contacto['id'] . "'><input type='submit' value='Eliminar'></form></li>";
								echo "<style>form {display: inline;}</style>";
							}
						} else {
							echo "No se encontraron contactos con el apellido " . $_POST['busqueda'];
						}
					} elseif ($_POST['filtro'] == "numero") {
						$sql = "SELECT * FROM $tabla WHERE numero LIKE '%" . $_POST['busqueda'] . "%'";
						// comprobar si se ha seleccionado los datos del contacto que se va a editar
						if ($resultado = mysqli_query($conexion, $sql)) {
							echo "Resultados de la búsqueda de " . $_POST['busqueda'] . " por número de teléfono:<br>";
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
						}
						mysqli_close($conexion);
						if (mysqli_num_rows($resultado) > 0) {
							while ($contacto = mysqli_fetch_assoc($resultado)) {
								echo "<li>Nombre: " . $contacto['nombre'] . " " . $contacto['apellido'] . " - Número de teléfono: " . $contacto['numero'] . " - correo electrónico: " . $contacto['email'] . " - <form action='editar-form.php' method='post'><input type='hidden' name='editar' value='" . $contacto['id'] . "'><input type='submit' value='Editar'></form> - <form action='eliminar.php' method='post'><input type='hidden' name='eliminar' value='" . $contacto['id'] . "'><input type='submit' value='Eliminar'></form></li>";
								echo "<style>form {display: inline;}</style>";
							}
						} else {
							echo "No se encontraron contactos con el número de teléfono " . $_POST['busqueda'];
						}
					} elseif ($_POST['filtro'] == "email") {
						$sql = "SELECT * FROM $tabla WHERE email LIKE '%" . $_POST['busqueda'] . "%'";
						// comprobar si se ha seleccionado los datos del contacto que se va a editar
						if ($resultado = mysqli_query($conexion, $sql)) {
							echo "Resultados de la búsqueda de " . $_POST['busqueda'] . " por correo electrónico:<br>";
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
						}
						mysqli_close($conexion);
						if (mysqli_num_rows($resultado) > 0) {
							while ($contacto = mysqli_fetch_assoc($resultado)) {
								echo "<li>Nombre: " . $contacto['nombre'] . " " . $contacto['apellido'] . " - Número de teléfono: " . $contacto['numero'] . " - correo electrónico: " . $contacto['email'] . " - <form action='editar-form.php' method='post'><input type='hidden' name='editar' value='" . $contacto['id'] . "'><input type='submit' value='Editar'></form> - <form action='eliminar.php' method='post'><input type='hidden' name='eliminar' value='" . $contacto['id'] . "'><input type='submit' value='Eliminar'></form></li>";
								echo "<style>form {display: inline;}</style>";
							}
						} else {
							echo "No se encontraron contactos con el correo electrónico " . $_POST['busqueda'];
						}
					}
				}
			?>
		</ul>
		<button onclick="window.history.back();">Volver</button>
		</div>
	</body>
</html>