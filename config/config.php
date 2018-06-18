<?php 

define('host', 'localhost');
define('dbname', 'agenda');
define('user', 'root');
define('password', '');
define('port', '3306');

try {
	$con = new PDO('mysql:host='. host .';port=' . port . ';dbname=' . dbname, user, password);
}catch(Exception $e){
	echo "Falha na conexão. " . $e->getMessage();
}

?>