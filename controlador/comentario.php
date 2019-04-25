<?php 
	include_once '../modelo/config.php';
	session_start();
	//echo $_SESSION['usuario'];
	//echo $_SESSION['nombre'];
	//echo $_SESSION['ape_pat'];

	$id=$_SESSION['id'];
	//parametros de insert($tabla, $campos, $values)	
	$comentario=$_POST['editor1'];
	$cadena="$id,'$comentario'";
	//echo $cadena;
	$resultado=$query->insert('comentarios','id_usuario,comentario',$cadena);
	
	if ($resultado===true) {	
	echo '<script>alert("usuario registrado correctamente");</script>';
	echo '<script>window.location="../perfil.php";</script>';	
	}

 ?>