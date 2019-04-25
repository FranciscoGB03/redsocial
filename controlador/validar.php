<?php 
	include_once '../modelo/config.php';
	session_start();

	$usuario=$_POST['user'];
	$pw=md5($_POST['clave']); // encriptado de contraseña	
	$consulta=$query->select('*', 'usuario',"usuario='$usuario' and passwd='$pw';");
	//var_dump($consulta);
	$user=$consulta->usuario;
	$contra=$consulta->passwd;
	if(empty($user) || empty($contra)){
		echo '<script>alert("Usuario o contraseña erroneos, favor de verificar sus datos");</script>';
		echo '<script>window.location="../index.php";</script>';		
	}else{		
		 $_SESSION['active']=true;		 
		 $_SESSION['nombre']=$consulta->nombre;
		 $_SESSION['ape_pat']=$consulta->ape_pat;	
		 $_SESSION['ape_mat']=$consulta->ape_mat;	 		
		 $_SESSION['tipo']=$consulta->tipo;
		 $_SESSION['id']=$consulta->id;
		 $_SESSION['usuario']=$user;
		echo '<script>window.location="../inicio.php";</script>';
	}
?>