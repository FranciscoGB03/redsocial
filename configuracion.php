<?php 
	include("controlador/validarUsuario.php");
	if($_SESSION['tipo']=="usuario"){
		echo '<script>window.location="../redsocial/inicio.php";</script>;';	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Configuración de perfil</title>
	<?php include("vistas/scripts.php"); ?>
</head>
<body>
	<header>
		<?php include("vistas/menu.php"); ?>
	</header>

</body>
</html>