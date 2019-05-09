<?php
	/*//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = '../material'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}*/
	$formatos = array('.mkv','.rar','.JPG','.MPEG-4','.wmv','.sh','.jpg','.png','.doc','.mp3','.pdf','.xls','.mp4','.flv','.avi','.mpg','.docx','.xlsx','.txt','.xlsm','.pptx');                                                
	$carpeta= '../material';                                                        
	$contArchivos = 0;                                                              
	if(isset($_POST['boton'])){                                                     
		$nombreArchivo = $_FILES['archivo']['name'];                                    
		$nombreTmpArchivo = $_FILES['archivo']['tmp_name'];                             
		$ext = substr($nombreArchivo, strrpos($nombreArchivo,'.'));                     
		if (in_array($ext, $formatos)){                                                 
			if(move_uploaded_file($nombreTmpArchivo, "../material/$nombreArchivo")){           				
				echo '<script language="javascript">alert("'.$nombreArchivo.' subido correctamente");</script>';
				echo '<script language="JavaScript">location.href = "../archivos.php"</script>';
				//header('Location: ../archivos.php');
			}                                                                               
			else{                                                                           				 
				echo '<script language="javascript">alert("Ocurrio un error, vuelva a intentarlo");</script>';
			}                                                                               
		}                                                                               
		else{ 
		echo '<script language="javascript">alert("Archivo no permitido");</script>';
		}                                                                               
	}                               
?>