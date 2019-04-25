<?php
/**
 *
 * @author e-israel from TERACOM.mx
 * Copyrigth 2010
 *
 */
if(version_compare(PHP_VERSION, "5.2", '<'))
{
    die('<p>La versi&oacute;n PHP del servidor es ['.PHP_VERSION.']; para un correcto funcionamiento es necesario actualizar a una versi&oacute 5.2 o posterior.</p>');
}
if(!extension_loaded('mysqli'))
{
    die('<p>La versi&oacute;n PHP del servidor es ['.PHP_VERSION.']; No existe ninguna conexion PHP - MySQL, esta conexi&oacute;n debe existir para un correcto funcionamiento.</p>');
}

class E
{
    # Ejemplo de uso
    # die(E::error_mysql(mysqli_connect_errno(),mysqli_connect_error(),__FILE__,__LINE__,__CLASS__,__FUNCTION__,__METHOD__,$_SERVER['PHP_SELF'],$this->sql));
    # Manejo de error
    static function error_mysql($noError, $error, $archivo, $linea, $clase, $funcion, $metodo, $script, $sql)
    {
        if($noError == 1062)
        {
            exit('El registro que intentas agregar ya se encuentra registrado. Verifica la informaci&oacute;n e intenta nuevamente.');
        }
        
        switch($noError)
        {
            case 1045: #error al conectar con la base de datos
                print('<h3>Error al conectar con la base de datos &quot;'.MYSQL_NAME.'&quot;.</h3>
                <p>Verifica que las siguientes sugerencias se encuentren configuradas correctamente en el archivo <code>config.php</code>.</p>
                <ul>
                    <li>Tu nombre de usuario y contrase&ntilde; est&aacute;n correctamente escritos?</li>
                    <li>El nombre del host est&aacute; correctamente escrito?</li>
                    <li>El servidor de base de datos, est&aacute; correindo y escuchando por su puerto?</li>
                </ul>');
                break;
            case 1049: # error al seleccionar la BD
                print '<h3>No es posible seleccionar la base de datos &quot;'.MYSQL_NAME.'&quot;.</h3>
                        <p>Verifica que las siguientes sugerencias se encuentren configuradas correctamente en el archivo <code>config.php</code>.</p>
                        <ul>
                            <li>El nombre de la base de datos est&aacute; escrito correctamente?</li>
                            <li>Existe la base de datos?</li>
                        </ul>';
                break;
            case 1146://tabla no existe
            case 1064:
                print 'Error de sintaxis</h3><p><code>'.$sql.'</code>';
                break;
            case 0:
            default:
                print $error;
                break;
        }
        exit();
    }
}

?>