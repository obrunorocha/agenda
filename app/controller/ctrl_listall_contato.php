<?php

include '../../autoload.php';

session_start();

$contato = new Contato();
$result = $contato->ListarAll();

?>