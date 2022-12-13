<!-- fromulario de registro -->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script>
		// función para mostrar la contraseña
		function mostrarPass() {
			var x = document.getElementById("contraseña");
			var y = document.getElementById("contraseña2");
			if (x.type === "password" && y.type === "password") {
				x.type = "text";
				y.type = "text";
				x.focus();
				tts('Contraseña mostrada');
			} else {
				x.type = "password";
				y.type = "password";
				x.focus();
				tts('Contraseña oculta');
			}
		}
		
		function tts(texto) {
			var msg = new SpeechSynthesisUtterance();
			var voices = window.speechSynthesis.getVoices();
			msg.voice = voices[0]; // Note: some voices don't support altering params
			msg.voiceURI = 'native';
			msg.volume = 1; // 0 to 1
			msg.rate = 1; // 0.1 to 10
			msg.text = texto;
			msg.lang = 'es-ES';
			speechSynthesis.speak(msg);
		}
	</script>
</head>
<body>
	<h1>Registro</h1>
	<form action="registro.php" method="POST" role="form">
		<div class="form-group">
		<label for="usuario">Usuario</label>
		<input type="text" name="usuario" id="usuario" class="form-control" placeholder="Tu usuario" autofocus required>
		</div>
		<div class="form-group">
		<label for="contraseña">Contraseña</label>
		<input type="password" name="pass" id="contraseña" class="form-control" placeholder="Tu contraseña" required>
		</div>
		<div class="form-group">
		<label for="contraseña2">Repetir contraseña</label>
		<input type="password" name="pass2" id="contraseña2" class="form-control" placeholder="Repite tu contraseña" required>
		</div>
		<div class="form-check">
		<label for="mostrarContraseña">Mostrar contraseña</label>
		<input type="checkbox" name="mostrarContraseña" id="mostrarContraseña" class="form-check-input" onchange="mostrarPass()">
		</div>
		<div class="form-check">
			<label for="recordar">Aceptar términos y condiciones</label>
			<input type="checkbox" name="recordar" id="recordar" title="Aceptar términos y condiciones" class="form-check-input" required checked>
			</div>
			<p class="text-muted">
				Al registrarte, aceptas que esta página web almacene la información que nos proporcionas para que puedas acceder a ella en cualquier momento, y que el sitio solo es de fines de prueba.
		<div class="alert-danger" role="alert" aria-live="assertive">
			<!-- poner un mensaje de que si se inició o que la cuenta no existe -->
			<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] == 'usuario') {
					echo 'El usuario ya existe';
					echo '<script>tts("Error: El usuario ya existe, intenta con otro.")</script>';
					echo '<script>document.getElementById("usuario").focus()</script>';
				} else if ($_GET['error'] == 'pass') {
					echo 'Las contraseñas no coinciden';
					echo '<script>tts("Error: Las contraseñas no coinciden, intenta ponerlas visibles para compararlas.")</script>';
					echo '<script>document.getElementById("contraseña").focus()</script>';
				}
			}
			?>
		</div>
		<div class="btn-group" role="group" aria-label="Botones de registro">
		<button type="submit" class="btn btn-primary">Regístrese</button>
		<button type="button" class="btn btn-secondary" onclick="location.href='index.php'">Cancelar</button>
		</div>
		<p>¿Ya tienes una cuenta? <a href="loguin-form.php">Inicia sesión</a></p>
	</form>

</body>
</html>