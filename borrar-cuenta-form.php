
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Borrar cuenta">
	<title>Borrar cuenta</title>
	<!-- incluir el archivo bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<h1>Borrar cuenta</h1>
	<div class="modal fade" id="borrarCuenta" tabindex="-1" aria-labelledby="borrarCuentaLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="borrarCuentaLabel">Borrar cuenta</h5>
				</div>
				<div class="modal-body">
					¿Estás seguro de que quieres borrar tu cuenta?<br>
					Toma en cuenta que no podrás recuperarla, y todos tus datos se perderán.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" accesskey="C" onclick="location.href='index.php'">Cancelar</button>
					<button type="button" class="btn btn-danger" accesskey="B" onclick="location.href='borrar-cuenta.php'">Borrar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- el dialogo se abre solo -->
	<script>
		var myModal = new bootstrap.Modal(document.getElementById('borrarCuenta'), {
			keyboard: false
		})
		myModal.show()
	</script>
</body>
</html>