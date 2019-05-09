<?php 
	session_start();
	if(!isset($_SESSION['active'])){
		echo '<script>window.location="../redsocial/index.php";</script>;';
	}
	$cadena2=null;
	$cadena=null;
	if($_SESSION['tipo']=="usuario"){
		$cadena='hidden="hidden"';				
	}elseif ($_SESSION['tipo']=="admin") {
		$cadena2='hidden="hidden"';
	}else{
		$cadena=null;
	}
 ?>