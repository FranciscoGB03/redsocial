<?php 
include_once '../modelo/config.php';
$matricula=$_POST['matricula'];
$nombre=$_POST['nombre'];
$ape_pat=$_POST['ape_pat'];
$ape_mat=$_POST['ape_mat'];
$correo=$_POST['correo'];
$usuario=$_POST['usuario'];
$passwd=$_POST['passwd'];
//parametros de la consulta $campos, $from, $where = 1, $adicionales = NULL)
$consultamatricula=$query->select('matricula','usuario','matricula="'.$matricula.'"');
$consultacorreo=$query->select('email','usuario','email="'.$correo.'"');
$consultausuario=$query->select('usuario','usuario','usuario="'.$usuario.'"');

if(!empty($consultamatricula->matricula)){
	echo'<script>alert("Esa matricula ya ha sido registrada. Favor de verificar sus datos.")</script>';
	echo '<script>window.location="../index.php";</script>';	
}elseif(!empty($consultacorreo->email)){
	echo'<script>alert("Esa dirección de correo electrónico ya ha sido registrado. Favor de verificar sus datos.")</script>';
	echo '<script>window.location="../index.php";</script>';	
}elseif(!empty($consultausuario->usuario)){
	echo'<script>alert("Ese nombre de usuario ya ha sido registrado. Favor de verificar sus datos.")</script>';
	echo '<script>window.location="../index.php";</script>';	
}else{
	$cadena="'$matricula','$nombre','$ape_pat','$ape_mat','$correo','$usuario',MD5('$passwd'),'usuario'";
	//$cadena='"'.$matricula.'","'.$nombre.'","'.$ape_pat.'","'.$ape_mat.'","'.$correo.'","'.$usuario.'",MD5("'.$passwd.')","usuario"';
	$resultado=$query->insert('usuario','matricula,nombre,ape_pat,ape_mat,email,usuario,passwd,tipo',$cadena);
	echo $resultado;
	if ($resultado===true) {	
	echo '<script>alert("usuario registrado correctamente");</script>';
	echo '<script>window.location="../index.php";</script>';	
	}
}






?>