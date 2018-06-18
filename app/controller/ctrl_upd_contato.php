<?php

include '../../autoload.php';

if(empty($_POST))
{
	//header("Location: ../../app/view/agenda.php");
}
else
{
	$id      = $_POST['idcontato'];
	$name    = $_POST['name'];
	$email   = $_POST['email'];
	$gender  = $_POST['gender'];
	$street  = $_POST['street'];
	$neigh   = $_POST['neighborhood'];
	$city    = $_POST['city'];
	$state   = $_POST['state'];
	$country = $_POST['country'];
	$type    = $_POST['type'];
	$number  = $_POST['number'];

		
	$contato = new Contato();

	$contato->setId($id);
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

	$contato->UpdateContato($contato);
}

?>