<?php 
  include("controlador/validarUsuario.php");
  include 'modelo/config.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Red Social</title>
  <?php 
    include("vistas/scripts.php");
  ?>
</head>
<body>
  <header>
    <?php
      include("vistas/menu.php");
    ?>
  </header>
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">                                        
        <div class="panel-heading">
          <h4 class="text-center">Archivos Disponibles</h4>
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
</body>
</html>