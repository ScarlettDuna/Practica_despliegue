<?php
require_once 'bd.php';
session_start();

/* Inicializa la variable de intentos si no existe */
if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 3;
}

/* Si el usuario intenta hacer login */
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    if (isset($_POST['usuario'])) {
        $usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
        if ($usu === false) {
            $intentos = $_SESSION['intentos'];
//	    error_log("Entro por 1 " . print_r($_SESSION['intentos'], true));           
            $_SESSION['intentos']--; // Resta un intento
            if ($_SESSION['intentos'] <= 0) {
                // Redirige a logout.php tras agotar intentos
                error_log("Entro por 2 " . print_r($_SESSION['intentos'], true)); 
                header("Location: logout.php?usuario=" . $_POST['usuario'] . "&intentos=" . $_SESSION['intentos']);               
                exit;
            }
            $err = true;
            $usuario = $_POST['usuario'];
        } else {
            session_start();
            // Si el login es exitoso, reinicia los intentos y guarda los datos del usuario
            $_SESSION['intentos'] = 3;
            $_SESSION['usuario'] = $usu;
            $_SESSION['carrito'] = [];
            header("Location: categorias.php");
            exit;
        }
    } else {
        insertar_restaurante($_POST['correo'], $_POST['clave'], $_POST['pais'], $_POST['cp'], $_POST['ciudad'], $_POST['direccion'], $_POST['rol']);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de login</title>
        <meta charset="UTF-8">
    </head>
    <body>    
        <?php if (isset($_GET["redirigido"])) {
            echo "<p>Haga login para continuar</p>";
        } ?>
        <?php if (isset($err) && $err == true) {
            echo "<p>Revise usuario y contraseña</p>";
            echo "<p>Intentos restantes: " . $_SESSION['intentos'] . "</p>";
        } ?>
        <a href="registrarRestaurante.php">Registrarse</a>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="usuario">Usuario</label> 
            <input value="<?php if (isset($usuario)) echo $usuario; ?>"
            id="usuario" name="usuario" type="text">        
            <label for="clave">Clave</label> 
            <input id="clave" name="clave" type="password">                    
            <input type="submit">
        </form>
    </body>
</html>