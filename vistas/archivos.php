<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Subir Archivos</title>			
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<script defer src="../recursos/fontawesome/svg-with-js/js/fontawesome-all.js"></script>
		<script type="text/javascript" src="../recursos/bootstrap/librerias/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="../js/validacion.js"></script>
		<script type="text/javascript" src="../js/actions.js"></script>
		<link rel="stylesheet" type="text/css" href="../recursos/bootstrap/css/bootstrap.min.css">		
		<script type="text/javascript" src="../recursos/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../recursos/bootstrap/librerias/popper
		.min.js"></script>	
		<meta name="viewport" content="width=device-width, initial-escale=1.0">		
	</head>
	
	<body class="archivos">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 class="text-center">Cargar Multiple Archivos</h4>
			</div>
			<div class="panel panel-primary">					
						<form name="form1" id="form1" method="post" action="../controlador/guarda.php" enctype="multipart/form-data">						
							<div class="form-group">
								<label class="col-sm-2 control-label">Seleccionar archivo</label>			
								<div class="col-sm-8">
									<input type="file" class="form-control-file" id="archivo[]" name="archivo[]" multiple="">
								</div>														
							</div>		
							<div class="form-group">
								<input type="submit" name="cargar" value="cargar">
							</div>				
						</form>
			</div>
		</div>
	</body>
</html>