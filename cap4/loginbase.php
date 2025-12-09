<?php
require_once 'bd.php';
/*formulario de login habitual
si va bien abre sesión, guarda el nombre de usuario y redirige a principal.php 
si va mal, mensaje de error */

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
	if (isset($_POST['usuario'])) {
               	error_log("Entro por 1 " . print_r($_POST['usuario'], true));
		$usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
		if($usu===false){
			$err = true;
                      	$usuario = $_POST['usuario'];
                      		}
			else{
			session_start();
			// $usu tiene campos correo y codRes, correo 
			$_SESSION['usuario'] = $usu;
			$_SESSION['carrito'] = [];
			header("Location: categorias.php");
			return;
		}	
	} else {
		insertar_restaurante($_POST['correo'],$_POST['clave'],$_POST['pais'],$_POST['cp'],$_POST['ciudad'],$_POST['direccion'],$_POST['rol']);
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de login</title>
		<meta charset = "UTF-8">
	</head>
	<body>	
		<?php if(isset($_GET["redirigido"])){
			echo "<p>Haga login para continuar</p>";
		}?>
		<?php if(isset($err) and $err == true){
			echo "<p> Revise usuario y contraseña</p>";
		}?>
		<a href="registrarRestaurante.php">Registrarse</a>
		<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
			<label for = "usuario">Usuario</label> 
			<input value = "<?php if(isset($usuario))echo $usuario;?>"
			id = "usuario" name = "usuario" type = "text">		
			<label for = "clave">Clave</label> 
			<input id = "clave" name = "clave" type = "password">					
			<input type = "submit">
		</form>
	</body>
</html>