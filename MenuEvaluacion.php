<?php 
        include("controlador/validarUsuario.php");
        if($_SESSION['tipo']=="usuario"){
                echo '<script>window.location="../redsocial/inicio.php";</script>;';    
        }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="recursos/bootstrap/css/bootstrap.min.css">
                <script type="text/javascript" src="recursos/bootstrap/librerias/jquery-3.3.1.min.js"></script>
                <script type="text/javascript" src="recursos/bootstrap/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="recursos/bootstrap/librerias/popper.min.js"></script>
                <link href="css/Estilos.css" rel="stylesheet" type="text/css"/>
                <title>Evaluaciones</title>
	</head>
	<body>
        	<header>
                        <?php include("vistas/menu.php"); ?>
                </header>
                <div class="div-centrado">
                    <div class="form-centrado">
                        <table>
                            <tbody>
                                <tr>
                                	<td>
                                		<b>TEMA&nbsp;5.&nbsp;ESTRUCTURAS&nbsp;DE&nbsp;CONTROL</b>
                                	</td>
                                	<td>
                                		<a href="Formato5_1.php" target=_blank><input type="button" class="btn btn-primary" value="Iniciar evaluación"></a>
                                	</td>
                                </tr>
                                <tr>
                                        <td colspan="2">
                                                <b>Competencias&nbsp;específicas:</b>
                                        </td>
                                        <td></td> 
                                </tr>
                                <tr>
                                        <td colspan="2">
                                                Conoce&nbsp;y&nbsp;aplica&nbsp;las&nbsp;estructuras&nbsp;de&nbsp;control&nbsp;para&nbsp;construir&nbsp;soluciones&nbsp;a&nbsp;problemas&nbsp;del&nbsp;entorno. 
                                        </td>
                                        <td></td> 
                                </tr>
                                <tr>
                                        <td colspan="2">
                                                <b>Subtemas&nbsp;abarcados:</b>
                                        </td>
                                        <td></td>
                                </tr>
                                <tr>
                                        <td>
                                                3.1&nbsp;Entrada&nbsp;y&nbsp;salida&nbsp;de&nbsp;datos<br>
                                                3.2&nbsp;Selectivas<br>
                                                3.3&nbsp;Repetitivas<br>
                                        </td>
                                        <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </body>
</html>