<?php 

session_start();

if (!isset($_SESSION['emailSession']) && !isset($_SESSION['passSession']))
{
	header("Location: ../../app/view/login.php");
	exit;
}


?>

<!DOCTYPE html>
<html>

<head>

<?php include '../../app/view/head.php'; ?>
<title>Agenda Online - Painel</title>
</head>

<body>
    <div class="container-fluid">
      <div class="row">
        <div class="bg-light col-lg-2">
          <h1 class="text-center p-2">Dashboard</h1>
          <ul class="nav nav-pills flex-column p-2">
          <li class="nav-item">
              <a href="../../app/view/painel.php" class="nav-link active">
                <i class="fa fa-home fa-home"></i>&nbsp;Início</a>
            </li>
            <li class="nav-item">
              <a href="../../app/view/agenda.php" class="nav-link">
                <i class="fa fa-book fa-book"></i>&nbsp;Agenda</a>
            </li>
            <li class="nav-item">
              <a href="../../app/view/configuracoes.php" class="nav-link">
                <i class="fa fa-cog fa-cog"></i>&nbsp;Configurações</a>
            </li>
            <li class="nav-item">
              <a href="../../app/view/logoff.php" class="nav-link">
                <i class="fa fa-sign-out fa-sign-out"></i>&nbsp;Sair</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-10 py-3 px-5">
        	<h1 class="text-justify display-4">Bem Vindo(a)!</h1><br>
        	<h3 class="">Acesse o conteúdo através do menu.</h3>
        </div>
      </div>
    </div>
</body>

</html>