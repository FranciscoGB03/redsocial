<html>
	<head>
		<meta charset="UTF-8">
		<link href="../Recursos/Bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../Recursos/Bootstrap/include/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="../Recursos/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../Recursos/Bootstrap/include/popper.min.js" type="text/javascript"></script>
        <link href="../Recursos/css/Estilos.css" rel="stylesheet" type="text/css"/>
        <script src="../Recursos/js/Funciones.js" type="text/javascript"></script>
        <title>Retroalimentación</title>
	</head>
	<body onload="regreso();">
        <header class="sticky-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <a href="#" class="navbar-brand text-white">EVALUACION&nbsp;TEMA&nbsp;5</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#com_navbar" aria-controls="com_navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </header>
		<div class="div-interno-centrado">
				<table border=2>
					<tr>
						<td><b>Pregunta</b></td>
						<td><b>Respuesta&nbsp;correcta</b></td>
						<td><b>Tu&nbsp;respuesta</b></td>
						<td><b>Retroalimentación</b></td>
					</tr>
					<?php
						$conexion = mysqli_connect('localhost','root','frangb','redsocial');
						$respUsuario = array($_POST['f1r1'],$_POST['f1r2'],$_POST['f1r3'],$_POST['f1r4'],$_POST['f1r5'],$_POST['f1r6']);
						$sql = "SELECT des,respuesta,retroalimentacion FROM pregunta WHERE tema like '5%'";
						$res = mysqli_query($conexion,$sql);
						$cont = 0;
						$calif = 0;

						while($mostrar=mysql_fetch_array($)){
					?>
					<tr>
						<td><?php echo $mostrar['des'] ?></td>
						<td><?php echo $mostrar['respuesta'] ?></td>
						<td><?php echo $respUsuario[$cont] ?></td>
					<?php
					
						if($mostrar['respuesta'] == $respUsuario[$cont]){
							$calif++;
					?>
						<td></td>
					<?php
						}else{		
					?>
						<td><?php echo $mostrar['retroalimentacion'] ?></td>
					<?php
						}
					 
					?>
					</tr>
					<?php
							$cont++;
						}
					?>
					<tr>
						<td colspan="2">
							<center>
								Calificación
							</center>
						</td>
						<td>
						</td>
						<td colspan="2">
							<center>
					<?php
						echo $final = ($calif * 100)/6;
					?>
							</center>
						</td>
						<td>
						</td>
					</tr>
				</table>
		</div>
    </body>
</html>