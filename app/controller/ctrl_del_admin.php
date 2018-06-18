<?php 

include '../../autoload.php';

if(empty($_POST))
{
	//header("Location: ../../app/view/cad_contato.php");
}
else
{
	$id = $_POST['id'];

	$admin = new Admin();

	$admin->setId($id);

	$admin->DeleteAdmin($admin);
}

?>