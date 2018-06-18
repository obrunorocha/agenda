<?php 

include '../../config/config.php';

session_start();

$email = $_SESSION['emailSession'];

$stmt = $con->prepare("UPDATE tb_admin SET status_adm = '0' WHERE email = :email");
$stmt->bindParam(":email", $email);

$stmt->execute();

unset($_SESSION['emailSession']);
unset($_SESSION['passSession']);

session_destroy();

header("Location: ../../app/view/login.php");

?>