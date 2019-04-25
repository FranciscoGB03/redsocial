<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
$id_usuario=$_SESSION['id'];
//parametros del metodo consulta select($campos, $from, $where = 1, $adicionales = NULL)
$comentariosql=$query->select('*','comentarios','id_usuario="'.$id_usuario.'" order by id desc limit 1');
$mensaje= $comentariosql->comentario;
$mensaje2=$comentariosql->id;
echo $mensaje;
echo $mensaje2;

?>