<?php    
$contArchivos=0;
$folder="material";                                                                       
	if ($dir = opendir($folder)){                                               
		while($archivo = readdir($dir)){                                                
			if ($archivo != '.' && $archivo != '..'){
				$contArchivos++;
				echo "<tr>
						<td><strong>$archivo </strong></td>
						<td>&nbsp;</td>
						<td><a target='_blank' href='material/".$archivo."'>Ver archivo que se ha subido</a></td>
					</tr>";
			}
		}
	}
?>