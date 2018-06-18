<?php

include '../../autoload.php';

session_start();

if (!isset($_SESSION['emailSession']) && !isset($_SESSION['passSession']))
{
	header("Location: ../../app/view/login.php");
	exit;
}

$admin = new Admin();
$result = $admin->ListAdmin();

foreach($result as $row)
{

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Configurações de Conta</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> 
  <style type="text/css">
  	.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
  		color: #fff;
    	background-color: #4f70ce;
  	}

	.nav-pills .nav-link{
		color: #4f70ce;
	}

  </style>
</head>

<body>
  <div class="">
    <div class="container-fluid">
      <div class="row">
        <div class="bg-light col-lg-2">
          <h1 class="text-center p-2">Dashboard</h1>
          <ul class="nav nav-pills flex-column p-2">
          	<li class="nav-item">
              <a href="../../app/view/painel.php" class="nav-link">
                <i class="fa fa-home fa-home"></i>&nbsp;Início</a>
            </li>
            <li class="nav-item">
              <a href="../../app/view/agenda.php" class="nav-link">
                <i class="fa fa-book fa-book"></i>&nbsp;Agenda</a>
            </li>
            <li class="nav-item">
              <a href="../../app/view/configuracoes.php" class="nav-link active">
                <i class="fa fa-cog fa-cog"></i>&nbsp;Configurações</a>
            </li>
            <li class="nav-item">
              <a href="../../app/view/logoff.php" class="nav-link">
                <i class="fa fa-sign-out fa-sign-out"></i>&nbsp;Sair</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-10 py-3 px-5">
        	<h1 class="text-justify display-4">Configurações</h1><br>
	        <div class="col-sm-4">
	        	<h3>Dados da Conta</h3>
	        	<div class="form-group">
	              	<label>Nome</label>
	              	<input type="text" name="name" id="name" value="<?php echo $row['nome']?>" class="form-control">
	          	</div>
	        	<div class="form-group">
	              	<label>E-mail</label>
	              	<input type="email" name="email" id="email" value="<?php echo $row['email']?>" class="form-control">
	          	</div>
	            <div class="form-group">
	              	<label>Senha</label>
	              	<input type="password" name="pass" id="pass" value="<?php echo $row['senha']?>" class="form-control">
	          	</div>
	            <button type="submit" name='id' id=" <?php echo $row['idadmin']?>" class="delete btn btn-danger">Excluir Conta</button>
        	</div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<script src="../../public/js/jquery/jquery.min.js"></script>
<script src="../../public/js/upd-admin.js"></script>
<script src="../../public/js/del-admin.js"></script>

<?php 
}

?>