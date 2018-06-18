<?php 

include '../../config/config.php';

session_start();

if(empty($_POST))
{
	header("Location: ../../app/view/login.php");
}
else
{
	$email = $_POST['email'];
	$pass  = base64_encode($_POST['password']);

	$stmt = $con->prepare("SELECT email FROM tb_admin WHERE email = :email AND senha = :password");

	$stmt->bindParam(":email", $email);
	$stmt->bindParam(":password", $pass);

	$stmt->execute();

	$result = $stmt->rowCount();

	if($result > 0)
	{
		$_SESSION['emailSession'] = $email;
		$_SESSION['passSession']  = $pass;

		$stmt = $con->prepare("UPDATE tb_admin SET status_adm = '1' WHERE email = :email");

		$stmt->bindParam(":email", $email);

		$stmt->execute();

		echo $email;
	}
	else
	{
		exit('Email ou senha inválidos, digite novamente.');
	}
}

?>