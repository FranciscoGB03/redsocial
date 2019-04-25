<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
error_reporting(E_ALL);
define('MYSQL_HOST','localhost');
define('MYSQL_USER','root');
define('MYSQL_PASS','frangb');
define('MYSQL_NAME','redsocial');
define('RESULTTRACE',FALSE);
require_once 'Query.inc.php' ;
?>