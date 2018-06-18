<?php 

spl_autoload_register(function($nomeClasse){
	if(file_exists("../../app/model/" . DIRECTORY_SEPARATOR . $nomeClasse. ".php") === true){
		require_once("../../app/model/" . DIRECTORY_SEPARATOR .$nomeClasse. ".php");
	}
});

?>