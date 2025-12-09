<?php
	/*comprueba que el usuario haya abierto sesión o redirige*/
	require 'correo.php';
	require 'sesiones.php';
	require_once 'bd.php';
	comprobar_sesion();
?>	
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Pedidos</title>		
	</head>
	<body>
	<?php 
	require 'cabecera.php';	
        if ($_SESSION['usuario']['disponible'] - $_SESSION['total'] < 0){
              	echo "importe pedido supera el disponible<br>";
        }else{		
		$resul = insertar_pedido($_SESSION['carrito'], $_SESSION['usuario']['codRes'], $_SESSION['total']);
		if($resul === FALSE){
			echo "No se ha podido realizar el pedido<br>";			
		}else{
			$correo = $_SESSION['usuario']['correo'];
			echo "Pedido realizado con éxito. Se enviará un correo de confirmación a: $correo ";							
			$conf = enviar_correos($_SESSION['carrito'], $resul, $correo);							
			if($conf!==TRUE){
				echo "Error al enviar: $conf <br>";
                        }
			$_SESSION['usuario']['disponible'] = $_SESSION['usuario']['disponible'] - $_SESSION['total'];	
	        }
		//vaciar carrito	
		$_SESSION['carrito'] = [];
                $_SESSION['total'] = 0;
                
        }
               		
	?>		
	</body>
</html>
	