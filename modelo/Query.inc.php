<?php
include_once 'Error.inc.php';

// Clase que conecta
class Conexion
{
	public $id = null;
    function __construct()
	{
        $this->id = @mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_NAME)
            or die(E::error_mysql(mysqli_connect_errno(),mysqli_connect_error(),__FILE__,__LINE__,__CLASS__,__FUNCTION__,__METHOD__,$_SERVER['PHP_SELF'],"Seleccionar BD"));
        if(RESULTTRACE){ print('<p><code>Conexi&oacute;n exitosa a MySQL.</code></p>');}
        if(RESULTTRACE){ print('<p><code>BD &quot;'.MYSQL_NAME.'&quot; seleccionada.</code></p>');}
    }

	function __destruct()
	{
		if($this->id)
		{
			@mysqli_close($this->id);
            if(RESULTTRACE){ print('<p><code>Conexi&oacute;n a MySQL cerrada.</code></p>');}
		}
	}
}

// Clase que ejecuta
class Query
{
	private $conexion;
	private $idConexion;
	private $idQuery;
	private $arregloObj;
	public $sql;

	function __construct()
	{
		$this->conexion = new Conexion();
		$this->idConexion = $this->conexion->id;
        $this->idQuery = NULL;
        $this->sql = NULL;
        if(RESULTTRACE){ print('<p><code>Objeto instanciado en &quot;Query&quot;.</code></p>'); }
	}

	function __destruct()
	{
        $this->flush();
	    @mysqli_close($this->idConexion);
        if(RESULTTRACE){ print('<p><code>Objeto instanciado en &quot;Query&quot;. Destruido</code></p>');}
	}

    /**
     * @param type $campos
     * @param type $from
     * @param type $where
     * @param type $adicionales
     * @param type $tipo
     * @return arreglo de objetos para múltiples registros, un objeto para un registro
     */
	function select($campos, $from, $where = 1, $adicionales = NULL)
	{
		if(!empty($campos) || !empty($from))
		{
			unset($this->sql,$this->idQuery,$this->arregloObj);
			$this->sql = "SELECT $campos FROM $from WHERE $where $adicionales";
            if(RESULTTRACE){ print('<p><code>SQL: '.$this->sql.'</code></p>');}
           	$this->idQuery = mysqli_query($this->idConexion,$this->sql) or die(E::error_mysql(mysqli_errno($this->idConexion),mysqli_error($this->idConexion),__FILE__,__LINE__,__CLASS__,__FUNCTION__,__METHOD__,$_SERVER['PHP_SELF'],$this->sql));
            // si trae registros
          	if ($this->numRecords() > 0)
            {
                // si es mas de un registro
                if ($this->numRecords() > 1)
                {
                    $this->arregloObj = array();
                    while($row = mysqli_fetch_object($this->idQuery))
                    {
                        $this->arregloObj[] = $row;
                    }
                }
                else
                {
                    $this->arregloObj = mysqli_fetch_object($this->idQuery);
                }
                $this->flush();
                return $this->arregloObj;
            }
            else
            {
                return NULL;
            }
		}
		else
		{
			die('<h3>ERROR: No has especificado un query &quot;SELECT&quot; v&aacute;lido.</h3>');
		}
	}

    /**
     * 
     * @param type $tabla
     * @param type $set
     * @param type $where
     * @return TRUE si el update fue exitoso
     */
	function update($tabla, $set, $where)
	{
		if(!empty($tabla) || !empty($set) || !empty($where))
		{
			unset($this->sql,$this->idQuery);
            $this->sql = mysqli_real_escape_string($this->idConexion, "UPDATE $tabla SET $set WHERE $where");
			if(RESULTTRACE){ print('<p><code>SQL: '.$this->sql.'</code></p>');}
			$this->idQuery = mysqli_query($this->idConexion,$this->sql) or die(E::error_mysql(mysqli_errno($this->idConexion),mysqli_error($this->idConexion),__FILE__,__LINE__,__CLASS__,__FUNCTION__,__METHOD__,$_SERVER['PHP_SELF'],$this->sql));
            return TRUE;
		}
		else
		{
			exit('<p><code>ERROR: No has especificado un query &quot;UPDATE&quot; v&aacute;lido.</code></p>');
		}
	}
    
    /**
     * 
     * @param type $tabla
     * @param type $campos
     * @param type $values
     * @return TRUE si el insert fue exitoso
     */
	function insert2($tabla, $campos, $values)//original
	{
        if(!empty($tabla) || !empty($campos) || !empty($values))
		{
			unset($this->sql,$this->idQuery);
            $this->sql = mysqli_real_escape_string($this->idConexion, "INSERT INTO $tabla ($campos) VALUES ($values);");
            //$this->sql="INSERT INTO $tabla ($campos) VALUES ($values);");

            if(RESULTTRACE){ print('<p><code>SQL: '.$this->sql.'</code></p>');}
			$this->idQuery = mysqli_query($this->idConexion,$this->sql) or die(E::error_mysql(mysqli_errno($this->idConexion),mysqli_error($this->idConexion),__FILE__,__LINE__,__CLASS__,__FUNCTION__,__METHOD__,$_SERVER['PHP_SELF'],$this->sql));
            return TRUE;
		}
		else
		{
			exit('<p><code>ERROR: No has especificado un query &quot;INSERT&quot; v&aacute;lido.</code></p>');
		}
	}

    function insert($tabla, $campos, $values)
    {
        if(!empty($tabla) || !empty($campos) || !empty($values))
        {
            unset($this->sql,$this->idQuery);
            $this->sql = "INSERT INTO $tabla ($campos) VALUES ($values);";            
            $this->idQuery = mysqli_query($this->idConexion,$this->sql);
            return TRUE;
        }
        else
        {
            exit('<p><code>ERROR: No has especificado un query &quot;INSERT&quot; v&aacute;lido.</code></p>');
        }
    }
    
    /**
     * 
     * @param type $tabla
     * @param type $where
     * @return TRUE si el delete fue exitoso
     */
	function delete($tabla, $where)
	{
		if(!empty($tabla) || !empty($where))
		{
			unset($this->sql,$this->idQuery);
            $this->sql = mysqli_real_escape_string($this->idConexion, "DELETE FROM $tabla WHERE $where");
            if(RESULTTRACE){ print('<p><code>SQL: '.$this->sql.'</code></p>');}
            $this->idQuery = mysqli_query($this->idConexion,$this->sql) or die(E::error_mysql(mysqli_errno($this->idConexion),mysqli_error($this->idConexion),__FILE__,__LINE__,__CLASS__,__FUNCTION__,__METHOD__,$_SERVER['PHP_SELF'],$this->sql));
            $this->optimize($tabla);
            return TRUE;
		}
		else
		{
			exit('<p>ERROR: No has especificado un query &quot;DELETE&quot; v&aacute;lido.</p>');
		}
	}

    /**
     * Cuenta campos
     * @param type $campo
     * @param type $tabla
     * @param type $where
     * @return número entero de registros
     */
	function count($campo = '*', $tabla = NULL, $where = '1')
	{
		if(!empty($tabla) && !empty($tabla))
		{
			unset($this->sql,$this->idQuery,$this->arregloObj,$this->arregloArr);
            $this->sql = mysqli_real_escape_string($this->idConexion, "SELECT COUNT($campo) AS t FROM $tabla WHERE $where");
            if(RESULTTRACE){ print('<p><code>SQL: '.$this->sql.'</code></p>');}
            $this->idQuery = mysqli_query($this->idConexion,$this->sql) or die(E::error_mysql(mysqli_errno($this->idConexion),mysqli_error($this->idConexion),__FILE__,__LINE__,__CLASS__,__FUNCTION__,__METHOD__,$_SERVER['PHP_SELF'],$this->sql));
            $this->arregloArr = mysqli_fetch_array($this->idQuery,MYSQLI_NUM);
			return (int) $this->arregloArr[0];
		}
		else
		{
			exit("<p><code>ERROR. No has especificado una tabla para contar campos.</code></p>");
		}
	}
    
    /**
     * 
     * @param type $tabla
     * @return TRUE si la optimización fue correcta
     */
    function optimize($tabla)
	{
		if(!empty($tabla))
		{
			unset($this->sql,$this->idQuery);
            $this->sql = mysqli_real_escape_string($this->idConexion, "OPTIMIZE TABLE $tabla");
            if(RESULTTRACE){ print('<p><code>SQL: '.$this->sql.'</code></p>');}
            $this->idQuery = mysqli_query($this->idConexion,$this->sql) or die(E::error_mysql(mysqli_errno($this->idConexion),mysqli_error($this->idConexion),__FILE__,__LINE__,__CLASS__,__FUNCTION__,__METHOD__,$_SERVER['PHP_SELF'],$this->sql));
            return TRUE;
		}
		else
		{
			exit('<p>ERROR: No has especificado una tabla para optimizar.</p>');
		}
	}
    
    /**
     * Query general
     * @param type $sql
     * @return boolean
     */
    function query($sql = NULL)
	{
		if(!empty($sql) && $this->idConexion)
		{
            unset($this->sql,$this->idQuery);
            $this->sql = mysqli_real_escape_string($this->idConexion, $sql);
            if(RESULTTRACE){ print('<p><code>SQL: '.$this->sql.'</code></p>');}
            $this->idQuery = mysqli_multi_query($this->idConexion,$this->sql) or die(E::error_mysql(mysqli_errno($this->idConexion),mysqli_error($this->idConexion),__FILE__,__LINE__,__CLASS__,__FUNCTION__,__METHOD__,$_SERVER['PHP_SELF'],$this->sql));
            // en caso de que traiga registros
            do 
            {
                if ($this->idQuery = mysqli_use_result($this->idConexion))
                {
                    while ($row = mysqli_fetch_object($this->idQuery))
                    {
                        $this->arregloObj[] = $row;
                    }
                }
            } while (mysqli_next_result($this->idConexion));
            return $this->arregloObj;
		}
		else
		{
			exit('<p><code>ERROR. No has especificado una consulta QUERY</code></p>');
		}
	}
    
    /**
     * Libera el resultado y la memoria
     * @return type
     */
	function flush()
	{
	   if($this->idQuery)
	   {
	       @mysqli_free_result($this->idQuery);
	       return;
	   }
	}

    /**
     * 
     * @return type
     */
	function affected()
	{
		return ($this->idQuery)?mysqli_affected_rows($this->idConexion):0;
	}

    /**
     * 
     * @return type
     */
	function numRecords()
	{
		return ($this->idQuery)?mysqli_num_rows($this->idQuery):0;
	}

    /**
     * Se manda a llmar solo si se utilizó query()
     * @return type
     */
    function numRows()
    {
        return ($this->idQuery)?mysqli_field_count($this->idConexion):0;
    }
    
    /**
     * Último ID insertado
     * @return type
     */
	function last()
	{
		return ($this->idQuery)?mysqli_insert_id($this->idConexion):0;
	}

    /**
     * 
     * @return type
     */
	function info()
	{
		echo '<p><b>Ver MySQL:</b> <code>'.mysqli_get_client_info().'</code></p>';
		echo '<p><b>Version MySQL:</b> <code>'.mysqli_get_client_version().'</code></p>';
		echo '<p><b>Host / Protocol:</b> <code>'.mysqli_get_host_info($this->idConexion).'</code></p>';
		echo '<p><b>Proto:</b> <code>'.mysqli_get_proto_info($this->idConexion).'</code></p>';
		echo '<p><b>Server Info:</b> <code>'.mysqli_get_server_info($this->idConexion).'</code></p>';
		echo '<p><b>Version Server:</b> <code>'. mysqli_get_server_version($this->idConexion).'</code></p>';
		echo '<p><b>General:</b> <code> '.mysqli_stat($this->idConexion).'</code></p>';
        return;
	}
}

// Instancia nuevo objeto
$query = new Query();
?>
