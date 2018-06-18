<?php 

include '../../autoload.php';

if(empty($_POST))
{
	header("Location: ../../app/view/cad_contato.php");
}
else
{
	$id = $_POST['id'];

	$contato = new Contato();

	$contato->setId($id);

	$contato->DeleteContato($contato);
}

?>