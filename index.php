<?php 
	session_start();
	if(isset($_SESSION['active'])){
		echo '<script>window.location="../redsocial/inicio.php";</script>;';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script defer src="recursos/fontawesome/svg-with-js/js/fontawesome-all.js"></script>
	<script type="text/javascript" src="recursos/bootstrap/librerias/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/validacion.js"></script>
	<script type="text/javascript" src="js/actions.js"></script>
	<link rel="stylesheet" type="text/css" href="recursos/bootstrap/css/bootstrap.min.css">		
	<script type="text/javascript" src="recursos/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="recursos/bootstrap/librerias/popper.min.js"></script>	
	<meta name="viewport" content="width=device-width, initial-escale=1.0">


	<title>Red Social</title>
</head>
<body class="cuerpologin">
	<section class="jumbotron boxlogin">
		<div class="user-img">
			<img class="d-block mx-auto imagenlogin" id="loginima" src="img/login3.png">		
		</div>
		<div class="form-input">
			<form name="flogin" id="flogin" action="controlador/validar.php" method="post">				
				<div class="input-group">
				  <span class="input-group-addon"><i class="fas fa-user"></i></span>			  
				  <input type="text" id="user" name="user" placeholder="Usuario" class="form-control text-center" required="required" />
				</div>	
				<div class="input-group">
				   <span class="input-group-addon"><i class="fas fa-key"></i></span>
				   <input type="password" id="clave" name="clave" placeholder="Contraseña" class="form-control text-center" required="required"/>			
				</div>		
				
				<div id="respuesta">					
				</div>

				<div class="input-group">				   
					<input type="submit" id="boton" class="btn btn-success d-block mx-auto" value="Entrar"/>
				</div>
				<div class="text-center">
					<p>¿Aún no te registras? da click <a href="#modal1" data-toggle="modal">aquí</a></p>
				</div>
			</form>					
		</div>
	</section>
	<div id="respuesta" class="container"></div><!--div para mostrar que el registro fue todo un exito-->

	<!--creación de ventana modal para registro a la red social-->
	<div class="modal fade" id="modal1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="d-block mx-auto modal-title">Registro de usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						&times;
					</button>								
				</div>
				<!--action="modelo/registro.php"-->
				<form  action="controlador/registro.php" onsubmit="return comprobacion();" id="formulario" method="post">
					<div class="modal-body">
					
						<label for="matricula">Ingresa tu matricula:</label>
						<input type="text" class="form-control" name="matricula" id="matricula" placeholder="15280473" required="required" />
						<label for="nombre">Ingresa tu nombre:</label>
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required="required" />

						<label for="ape_pat">Ingresa tu apellido paterno:</label>
						<input type="text" class="form-control" name="ape_pat" id="ape_pat" placeholder="Apellido paterno" required="required" />

						<label for="ape_mat">Ingresa tu apellido materno:</label>
						<input type="text" class="form-control" name="ape_mat" id="ape_mat" placeholder="Apellido materno" required="required" />

						<label for="correo">Ingresa tu email:</label>
						<input type="email" class="form-control" name="correo" id="correo" placeholder="ejemplo@ejemplo.com" required="required" />

						<label for="usuario">Ingresa nombre de usuario:</label>
						<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" required="required" />						

						<label for="passwd">Ingresa una contraseña:</label>
						<input type="password" class="form-control" name="passwd" id="passwd" placeholder="Contraseña" required="required" />
						<label for="passwdcon">Confirma tu contraseña:</label>
						<input type="password" class="form-control" name="passwdcon" id="passwdcon" placeholder="Contraseña" required="required" />
											
					</div>

					<div class="modal-footer">
						<button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button id="btn-guardar" class="btn btn-primary">Guardar</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
</body>
</html>