<header>
 Usuario: <?php echo $_SESSION['usuario']['correo']?>
 <a href="categorias.php">Home</a>
 <a href="carrito.php">Ver carrito</a> 
 <a href="logout.php">Cerrar sesión</a>
 Limite: <?php echo $_SESSION['usuario']['limite']?>
 Disponible: <?php echo $_SESSION['usuario']['disponible']?>
</header>
<hr>