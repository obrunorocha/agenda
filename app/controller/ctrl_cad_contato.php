<?php

include '../../autoload.php';

if(empty($_POST))
{
	header("Location: ../../app/view/cad_contato.php");
}
else
{
	$name    = $_POST['name'];
	$email   = $_POST['email'];
	$gender  = $_POST['gender'];
	$street  = $_POST['street'];
	$neigh   = $_POST['neighborhood'];
	$city    = $_POST['city'];
	$state   = $_POST['state'];
	$country = $_POST['country'];
	$number  = $_POST['number'];
	$type    = $_POST['type'];
		
	$contato = new Contato();

	$contato->setName($name);
	$contato->setEmail($email);
	$contato->setGender($gender);
	$contato->setStreet($street);
	$contato->setNeighborhood($neigh);
	$contato->setCity($city);
	$contato->setState($state);
	$contato->setCountry($country);
	$contato->setNumber($number);
	$contato->setType($type);

	$contato->InsertContato($contato);
}

?>