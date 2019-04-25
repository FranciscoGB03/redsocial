<?php 
	session_start();
	if(!isset($_SESSION['active'])){
		echo '<script>window.location="../redsocial/index.php";</script>;';
	}
	if($_SESSION['tipo']=="usuario"){
		$cadena='hidden="hidden"';				
	}else{
		$cadena=null;
	}
 ?>