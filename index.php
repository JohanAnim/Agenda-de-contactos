<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agenda de contactos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	</head>
<body>
	<!-- Página dinámica -->
	<?php
	// Iniciar sesión
	session_start();
	// Si no hay un inicio de seción mostrar una varra de navegación con el botón de iniciar sesión y de crear cuenta y dar la bienvenida
	// si está iniciada, mostrar la barra de navegación con el botón de cerrar sesión y dar la bienvenida y mostrar la tabla de contactos única del usuario si hay, si no hay mostrar un parrafo que diga que no hay contactos
	if (!isset($_SESSION['usuario'])) {
		// Mostrar la barra de navegación con el botón de iniciar sesión y de crear cuenta y dar la bienvenida
		?>
		<!-- ahora la barra de navegación -->
		<header role="banner" aria-label=" Cabecera">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">Agenda de contactos</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegación">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li	class="nav-item">
							<a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="loguin-form.php">Iniciar sesión</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="registro-form.php">Crear cuenta</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		</header>
		<!-- ahora el contenido -->
		<main class="row">
		<div class="container">
			<h1 class="text-center mt-3">Bienvenido a la agenda de contactos</h1>
			<p class="text-center">Te doy la bienvenida a la agenda de contactos. Para empesar a guardar tus contactos, inicia seción o crea una nueva cuenta desde el botón de navegación que está en la parte superior de la página.</p>
			<p class="text-center">Con esta página podrás:</p>
			<ul	class="text-center">
				<li>Guardar contactos</li>
				<li>Editar contactos</li>
				<li>Eliminar contactos</li>
			</ul>
			<p class="text-center">Puedes buscar contactos por nombre, apellido, teléfono, correo electrónico, etc.</p>
			<p	class="text-center">Créate una cuenta y empieza a usar la agenda de contactos</p>
		</div>
		</main>
		<?php
	} else {
		?>
		<!-- ahora la barra de navegación -->
		<header role="banner" aria-label=" Cabecera">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">Agenda de contactos</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegación">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li	class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
						<li class="nav-item"><a class="nav-link" href="añadir-form.php">Agregar contacto</a></li>
						<!-- item que es una barra de navegación oculta que contiene el formulario de búsqueda -->
						<li class="nav-item">
							<a class="nav-link navbar-toggler" href="#" data-bs-toggle="collapse" data-bs-target="#navbarBuscar" " aria-expanded="false" aria-controls="navbarBuscar">
								Buscar
							</a>
							<div class="collapse navbar-collapse" id="navbarBuscar">
								<h2	class="text-center">Buscar contacto</h2>
								<form action="buscar.php" method="post" id="buscar_form" role="search">
									<div class="form-group">
										<label for="busqueda">Buscar contacto</label>
										<input type="text" name="busqueda" id="busqueda" class="form-control" placeholder="Buscar" required>
									</div>
									<div class="form-group">
										<label for="filtro">Filtrar por</label>
										<select name="filtro" id="filtro" class="form-control" required>
											<option value="nombre">Nombre</option>
											<option value="apellido">Apellido</option>
											<option value="numero">Teléfono</option>
											<option value="email">Correo electrónico</option>
										</select>
									</div>
									<!-- elemento de alerta -->
									<div class="alert alert-danger" role="alert" id="alert_busqueda"></div>
									<div class="form-group">
										<input type="submit" value="Buscar" class="btn btn-primary">
									</div>
								</form>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="cerrar-sesion.php">Cerrar sesión</a></li>
						<!-- darse de baja -->
						<li class="nav-item"><a class="nav-link" href="borrar-cuenta-form.php">Darse de baja</a></li>
					</ul>
				</div>
			</div>
		</nav>
		</header>
		<!-- ahora el contenido -->
		<div class="container">
			<main class="row">
				<section class="col-12">
			<h1 class="text-center mt-3">Bienvenido/a a tu agenda de contactos <?php echo $_SESSION['usuario']; ?></h1>
			<?php
			require 'config.php';
			$consulta = "SELECT * FROM " . $_SESSION['usuario'] . " ORDER BY nombre ASC";
			// Ejecutar la consulta
			$resultado = mysqli_query($conexion, $consulta);	
			// saludos
			$hora = date("H");
			if ($hora >= 6 && $hora <= 12) echo "Buenos días " . $_SESSION['usuario'] . "";
			elseif ($hora >= 12 && $hora <= 19) echo "Buenas tardes " . $_SESSION['usuario'] . "";
			else echo "Buenas noches " . $_SESSION['usuario'] . "";
			
			// Si hay contactos mostrar la tabla con los contactos
			if (mysqli_num_rows($resultado) > 0) {
				?>
				<p class="text-center mt-3">Tienes en total <?php echo mysqli_num_rows($resultado); ?> contactos</p>
				</section>
				<div class="container" id="ajenda" role="region" aria-label="Agenda de contactos">
				<table class="table table-striped table-hover mt-3" id="tabla_contactos">
					<thead>
						<tr>
							<th scope="col">Nombre</th>
							<th scope="col">Apellido</th>
							<th scope="col">Teléfono</th>
							<th scope="col">Correo</th>
							<th scope="col">Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						// Mostrar los contactos en la tabla
						while ($fila = mysqli_fetch_assoc($resultado)) {
							?>
							<tr id='fila_contacto' aria-label=' <?php echo $fila['nombre']; ?> <?php echo $fila['apellido']; ?>'>
								<td tabindex="-1"><?php echo $fila['nombre']; ?></td>
								<td tabindex="-1"><?php echo $fila['apellido']; ?></td>
								<td tabindex="-1"><?php echo $fila['numero']; ?></td>
								<td tabindex="-1"><?php echo $fila['email']; ?></td>
								<td aria-keyshortcuts="Atajo de teclado: Aplicaciones">
									<div class="dropdown" role="group" aria-label="Acciones">
										<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">Acciones</button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" role="menu">
											<li role="presentation">
												<form>
													<button class="dropdown-item" role="menuitem" type="button" id="llamar" onclick="location.href='tel:<?php echo $fila['numero']; ?>'">Llamar al contacto</button>
												</form>
											</li>
											<li role="presentation">
												<form>
													<button class="dropdown-item" role="menuitem" type="button" id="enviar" onclick="location.href='mailto:<?php echo $fila['email']; ?>'">Enviar correo al contacto</button>
												</form>
											</li>

											<li role="presentation">
												<form action="editar-form.php" method="post">
													<input type="hidden" name="editar" value="<?php echo $fila['id']; ?>">
													<button class="dropdown-item" role="menuitem" type="submit" id="editar">Editar contacto</button>
												</form>
											</li>
											<li role="presentation">
												<form action="eliminar.php" method="post">
													<input type="hidden" name="eliminar" value="<?php echo $fila['id']; ?>">
													<button class="dropdown-item" role="menuitem" type="submit" id="eliminar">Eliminar contacto</button>
												</form>
											</li>
											
										</ul>
									</div>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
				</div>
				<?php
			} else {
				?>
				<p class="text-center">No hay contactos</p>
				<p	class="text-center">Agrega un contacto desde la barra de navegación</p>
				<?php
			}
			?>
		</div>
	</main>
		<?php
	}

		?>

	<!-- ahora el pie de página -->
	<footer class="bg-dark text-white text-center p-3">
		&copy; 2022 - Johan G
	</footer>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="js/script.js"></script>

</body>
</html>
