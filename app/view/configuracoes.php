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
<?php include '../view/head.php'; ?>
  <title>Configurações de Conta</title>
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

<?php include '../view/footerScripts.php'; ?>
<script src="../../public/js/del-admin.js"></script>


<?php 
}

?>