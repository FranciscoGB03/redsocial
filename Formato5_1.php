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
        <title>Tema&nbsp;5</title>
	</head>
	<body>
        <header class="sticky-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <a href="#" class="navbar-brand text-white">EVALUACION&nbsp;TEMA&nbsp;5</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#com_navbar" aria-controls="com_navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </header>
		<div class="container">
			<br>
			<form autocomplete="off" class="form-control" method="POST" action="controlador/evaluar5_1.php">
				<table style="width: 100%;">
					<tr>
						<td colspan="2">
							1.&nbsp;Ejecutan&nbsp;un&nbsp;bloque&nbsp;de&nbsp;instrucciones&nbsp;u&nbsp;otro,&nbsp;o&nbsp;saltan&nbsp;a&nbsp;un&nbsp;subprograma&nbsp;o&nbsp;subrutina&nbsp;según&nbsp;se&nbsp;cumpla&nbsp;o&nbsp;no&nbsp;una&nbsp;condición.<br>
							<input class="form-control-sm" type="radio" name="f1r1" id="econtrol" value="Estructuras de control"><label for="econtrol">Estructuras&nbsp;de&nbsp;control</label><br>
							<input class="form-control-sm" type="radio" name="f1r1" id="eselec" value="Estructuras de seleccion"><label for="eselec">Estructuras&nbsp;de&nbsp;selección</label><br>
							<input class="form-control-sm" type="radio" name="f1r1" id="eanid" value="Estructuras anidadas"><label for="eanid">Estructuras&nbsp;anidadas</label><br>
							<input class="form-control-sm" type="radio" name="f1r1" id="dowhile" value="Ciclos Do-While"><label for="dowhile">Ciclos&nbsp;Do-While</label><br>
							<hr>
						</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="2">
							2.&nbsp;Estructuras&nbsp;de&nbsp;control&nbsp;iterativas&nbsp;que&nbsp;ejecutan&nbsp;una&nbsp;serie&nbsp;de&nbsp;sentencias&nbsp;mientras&nbsp;cierta(s)&nbsp;condicion(es)&nbsp;sea(n)&nbsp;verdadera(s),&nbsp;se&nbsp;ejecutan&nbsp;al&nbsp;menos&nbsp;una&nbsp;vez.<br>
							<input class="form-control-sm" type="radio" id="cdowhile" name="f1r2" value="Ciclos Do-While"><label for="cdowhile">Ciclos&nbsp;Do-While</label><br>
							<input class="form-control-sm" type="radio" id="cwhile" name="f1r2" value="Ciclos While"><label for="cwhile">Ciclos&nbsp;While</label><br>
							<input class="form-control-sm" type="radio" id="cfor" name="f1r2" value="Ciclos For"><label for="cfor">Ciclos&nbsp;For</label><br>
							<input class="form-control-sm" type="radio" id="cforeach" name="f1r2" value="Ciclos For-Each"><label for="cforeach">Ciclos&nbsp;For-Each</label><br>
							<hr>
						</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="2">
							3.&nbsp;Escriba&nbsp;la&nbsp;condición&nbsp;necesaria&nbsp;con&nbsp;la&nbsp;variable&nbsp;i&nbsp;(sin&nbsp;espacios)&nbsp;para&nbsp;que&nbsp;el&nbsp;resultado&nbsp;del&nbsp;ciclo&nbsp;corresponda&nbsp;a:&nbsp;&nbsp;1&nbsp;&nbsp;3&nbsp;&nbsp;5&nbsp;&nbsp;7&nbsp;&nbsp;9&nbsp;&nbsp;11<br>
							Integer&nbsp;i&nbsp;=&nbsp;1;<br>
							while(<input class="form-control-sm" type="text" id="f1r3" name="f1r3">){<br>
								System.out.print(i+'\t');<br>
								i=i+2;<br>
							}<br>
							<hr>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							4.&nbsp;Elija&nbsp;la&nbsp;respuesta&nbsp;correspondiente&nbsp;al&nbsp;resultado&nbsp;de&nbsp;ejecutar&nbsp;el&nbsp;código&nbsp;presentado&nbsp;en&nbsp;la&nbsp;imagen.<br>
							<input class="form-control-sm" type="radio" id="a" name="f1r4" value="1  1  2  3  5  8  13"><label for="a">1&nbsp;&nbsp;1&nbsp;&nbsp;2&nbsp;&nbsp;3&nbsp;&nbsp;5&nbsp;&nbsp;8&nbsp;&nbsp;13</label><br>
							<input class="form-control-sm" type="radio" id="b" name="f1r4" value="1  1  2  4  6  10  13"><label for="b">1&nbsp;&nbsp;1&nbsp;&nbsp;2&nbsp;&nbsp;4&nbsp;&nbsp;6&nbsp;&nbsp;10&nbsp;&nbsp;13</label><br>
							<input class="form-control-sm" type="radio" id="c" name="f1r4" value="1  1  2  4  7  9  13"><label for="c">1&nbsp;&nbsp;1&nbsp;&nbsp;2&nbsp;&nbsp;4&nbsp;&nbsp;7&nbsp;&nbsp;9&nbsp;&nbsp;13</label><br>
							<input class="form-control-sm" type="radio" id="d" name="f1r4" value="1  1  2  3  5  7  13"><label for="d">1&nbsp;&nbsp;1&nbsp;&nbsp;2&nbsp;&nbsp;3&nbsp;&nbsp;5&nbsp;&nbsp;7&nbsp;&nbsp;13</label><br>
							<hr>
						</td>
						<td>
							<img src="img/Fibonacci.png" width="330" height="137" alt="Pregunta 4">
							<hr>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							5.&nbsp;Asigne&nbsp;un&nbsp;valor&nbsp;a&nbsp;la&nbsp;variable&nbsp;para&nbsp;que&nbsp;el&nbsp;programa&nbsp;ejecute&nbsp;el&nbsp;ciclo&nbsp;FOR.<br>
							Boolean&nbsp;b&nbsp;=<input class="form-control-sm" type="text" id="f1r5" name="f1r5"><br>
							if(!(!b)){<br>
								for(int&nbsp;i&nbsp;=&nbsp;0&nbsp;;&nbsp;i&nbsp;<&nbsp;2&nbsp;;&nbsp;i++){System.out.println("Hola");}
							}<br>
							<hr>
						</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="2">
							6.&nbsp;Permite&nbsp;ejecutar&nbsp;una&nbsp;de&nbsp;entre&nbsp;varias&nbsp;acciones&nbsp;en&nbsp;función&nbsp;del&nbsp;valor&nbsp;de&nbsp;una&nbsp;expresión.<br>
							<input class="form-control-sm" type="radio" id="eswcase" name="f1r6" value="Estructura Switch-Case"><label for="eswcase">&nbsp;Estructura&nbsp;Switch-case</label><br>
							<input class="form-control-sm" type="radio" id="edowhile" name="f1r6" value="Estructura Do-While"><label for="edowhile">&nbsp;Estructura&nbsp;Do-While</label><br>
							<input class="form-control-sm" type="radio" id="ewhile" name="f1r6" value="Estructura While"><label for="ewhile">&nbsp;Estructura&nbsp;While</label><br>
							<input class="form-control-sm" type="radio" id="eif" name="f1r6" value="Estructura If"><label for="eif">&nbsp;Estructura&nbsp;If</label><br>
							<hr>
						</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="2">
							<center>
								<input type="submit" class="btn btn-primary" value="Finalizar">
							</center>
						</td>
						<td>
					</tr>
				</table>
			</form>
		</div>
    </body>
</html>