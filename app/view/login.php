<?php  

session_start();

if(isset($_SESSION['emailSession']) && !empty($_SESSION['emailSession'])){
	header("Location: ../admin/painel.php");
	exit;
}else{

?>

<!DOCTYPE html>
<html>
<head>
  <?php include '../view/head.php'; ?>
  <title>Agenda Online - Login</title>
</head>

<body>

  <?php include '../view/navbarAdmin.php'; ?>

<div class="py-5 cover">
  <div class="container">
    <div class="row">
        <div class="col-lg-8 py-5">
          <h1 class="display-3">Agenda Online</h1>
          <p class="lead">Crie uma conta e salve todos os seus contatos na sua agenda online. </p>
        </div>
        <div class="col-lg-4 py-5">
          <div class="bg-light p-4">
              <div class="form-group">
                <h1 class="text-center">Login</h1>
                <label>E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail"> </div>
              <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha"> </div>
              <button type="submit" name="submit" id="submit" class="btn btn-block btn-primary">Entrar</button>
              <p id="login-message" class="py-3"></p>
            <p class="text-center">Não possui cadastro? <a href="../../app/view/cad_admin.php">Criar conta!</a></p>
          </div>
        </div>
    </div>
  </div>
</div>

<?php include '../view/footerScripts.php'; ?>
	<script src="../../public/js/login.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</body>
</html>

<?php } ?>

