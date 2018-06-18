<?php

include '../../autoload.php';

if(empty($_POST))
{
	header("Location: ../../app/view/cad_admin.php");
}
else
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$admin = new Admin();

	$admin->setName($name);
	$admin->setEmail($email);
	$admin->setPassword($password);

	$admin->InsertAdmin($admin);
}

?>