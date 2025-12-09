<?php
	session_start();    // Inicia la sesión
	// Matar la sesión
	$_SESSION = array(); // Vaciar los valores de la sesión
	session_destroy();	// Destruir la sesión
	setcookie(session_name(), '', time() - 3600); // Eliminar la cookie de sesión
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sesión cerrada</title>
	</head>
	<body>
		<?php
			// Mostrar usuario si se pasa como parámetro GET
			if (isset($_GET['usuario'])) {
				$usuario = $_GET['usuario'];
				echo "<p>La sesión de usuario '$usuario' se cerró correctamente.</p>";
			} else {
				echo "<p>No hay información de usuario disponible.</p>";
			}
		?>

		<!-- Formulario con método POST para redirigir a login.php -->
		<form action="login.php" method="POST">
			<!-- Campo oculto con el valor de usuario y clave vacía -->
			<input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
			<input type="hidden" name="clave" value="">  <!-- Clave vacía -->
			<button type="submit">Ir a la página de login</button>
		</form>
	</body>
</html>
