<?php 
/*comprueba que el usuario haya abierto sesión o redirige*/
require_once 'sesiones.php';
comprobar_sesion()
$cod = $_POST['cod'];
$stock = $_POST['stock'];
$unidades = (int)$_POST['unidades'];
$cat = $_SESSION['codCategoria'];

/*si existe el código sumamos las unidades*/
if ($stock - $unidades >= 0){
    if(isset($_SESSION['carrito'][$cod])) {
           if ( $stock - $_SESSION['carrito'][$cod] - $unidades >= 0 ) {
	        $_SESSION['carrito'][$cod] += $unidades;
           }else{
               $mensaje = "No hay suficiente stock.";
           }
    }else{
	$_SESSION['carrito'][$cod] = $unidades;	
    }	
}else {
   $mensaje = "No hay suficiente stock.";
}
header("Location: productos.php?categoria=". $_SESSION['codCategoria'] . "&mensaje=$mensaje");
