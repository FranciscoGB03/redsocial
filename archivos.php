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
	 <!--Contenedor principal de la pagina-->
    <div class="container-fluid izquierda">
        <!--HAciendo una fila para dividir el contenedor en columnas-->
        <div class="row">
            <!--Columna de la izquierda-->
            <div class="col-xs-3 col-md-3">            
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="container">
                        
                    </div>
                    <hr/>
                    <table class="tabla">
                            <tr>
	                            <td>
	                                    <a href="archivos.php">Subir Material</a>
	                            </td>
                        	</tr>
                            <tr>
	                            <td>
	                                    <a href="MenuEvaluacion.php">Evaluación</a>
	                            </td>
                        	</tr>
                            <tr>
	                            <td>
	                                    <a href="#">Crear Grupo</a>
	                            </td>
                        	</tr>                                        
                    </table>
                  </div>
                </div>            
            </div>
            <!--Columna Central-->
            <div class="col-xs-6 col-md-6 table-responsive central">                                	
                <div class="panel panel-default">
                  <div class="panel-body">                                      	
                  		<div class="panel-heading">
							<h4 class="text-center">Cargar Multiple Archivos</h4>
						</div>
						<div class="panel panel-primary">					
							<form name="form1" id="form1" method="post" action="controlador/guarda.php" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label">Seleccionar archivo</label>			
									<div class="col-sm-8">
										<input type="file" class="form-control-file" id="archivo" name="archivo"/>
									</div>
								</div>		
								<div class="form-group">
									<input type="submit" id="boton" name="boton" value="Subir Material">
								</div>				
							</form>
						</div>
						<div class="panel panel-primary">					
							<h1>Archivos existentes en el directorio</h1><br/>                              
								<table>                                                                         
									<?php include("controlador/archivosmaterial.php"); ?>
								</table>
						</div>
                  </div>
              	</div>
            </div>
            <!--columna de la derecha-->
            <div class="col-xs-3 col-md-3 table-responsive">

            </div>
        </div>
    </div>
</body>
</html>
