<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio de sesión</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script>
		// función para mostrar la contraseña
		function mostrarContraseña() {
			var x = document.getElementById("contraseña");
			if (x.type === "password") {
				x.type = "text";
				x.focus();
			} else {
				x.type = "password";
				x.focus();
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
	<h1>Inicio de sesión</h1>
	<form action="loguin.php" method="POST" role="form">
		<div class="form-group">
		<label for="usuario">Usuario</label>
		<input type="text" name="usuario" id="usuario" class="form-control" required autofocus placeholder="Tu usuario">
		</div>
		<div class="form-group">
		<label for="contraseña">Contraseña</label>
		<input type="password" name="pass" id="contraseña" class="form-control" required placeholder="Tu contraseña">
		</div>
		<div class="form-check">
			<label for="mostrar">Mostrar contraseña</label>
			<input type="checkbox" name="mostrar" id="mostrar" title="Mostrar contraseña" onchange="mostrarContraseña()">
			</div>
		<div class="form-check">
			<label for="recordar">Aceptar términos y condiciones</label>
			<input type="checkbox" name="recordar" id="recordar" title="Aceptar términos y condiciones" required checked>
			</div>
			<p class="text-muted">
				Al iniciar sesión aceptas que esta página web almacene la información que nos proporcionas para que puedas acceder a ella en cualquier momento, y que el sitio solo es de fines de prueba.
			</p>
			<div class="alert-info" role="alert">
				<!-- poner un mensaje de que si se inició o que la cuenta no existe -->
				<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == 'usuario') {
						echo 'El usuario no existe';
						echo '<script>document.getElementById("usuario").focus();</script>';
						echo '<script>tts("Error: El usuario no existe");</script>';
					} else if ($_GET['error'] == 'pass') {
						echo 'La contraseña es incorrecta';
						echo '<script>document.getElementById("contraseña").focus();</script>';
						echo '<script>tts("Error: La contraseña es incorrecta");</script>';
					}
				}

				?>
			</div>
		<button type="submit">Iniciar sesión</button>
		<button type="button" onclick="history.back()">Cancelar</button>
	</form>
</body>
</html>
