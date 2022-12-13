<!DOCTYPE html>
<html lang="es">
<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Añadir contacto</title>
</head>
<body>
			<h1>Añadir contacto</h1>
			<form action="añadir-contacto.php" method="POST">
				<!-- poner el name como el usuario actual -->
				<input	type="hidden" name="usuario" value="<?php echo $_SESSION['usuario']; ?>">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" id="nombre" autofocus required>
						<label for="apellido">Apellido</label>
						<input type="text" name="apellido" id="apellido" required>
						<label for="numero">Teléfono</label>
						<input type="tel" name="numero" id="numero" required>
						<label for="email">Email (opcional)</label>
						<input type="email" name="email" id="email" placeholder="@ejemplo.com">
						<button type="submit">Añadir</button>
						<button type="button" onclick="history.back()">Cancelar</button>
			</form>
</body>
</html>