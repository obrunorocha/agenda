<?php  

session_start();

if(isset($_SESSION['emailSession']) && !empty($_SESSION['emailSession'])){
	header("Location: ../../app/view/painel.php");
	exit;
}else{

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agenda Online - Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
</head>

<body>
    <nav class="navbar navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../../index.php">Agenda Online</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse my-2 my-lg-0" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link font-weight-bold" href="../../app/view/cad_admin.php">Criar conta</a>
            <a class="nav-item nav-link font-weight-bold" href="../../app/view/login.php">Efetuar Login</a>
          </div>
      </div>
  </nav>
  <div class="py-5 cover">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="display-3">Agenda Online</h1>
          <p class="lead">Crie uma conta e salve todos os seus contatos na sua agenda online. </p>
        </div>
        <div class="bg-light col-sm-4 p-3">
            <div class="form-group">
              <h1 class="text-center">Login</h1>
              <label>E-mail</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail"> </div>
            <div class="form-group">
              <label>Senha</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha"> </div>
            <button type="submit" name="submit" id="submit" class="btn btn-block btn-secondary">Entrar</button>
            <p id="login-message" class="py-2"></p><br>
          <p class="text-center p-2">Não possui cadastro? <a href="../../app/view/cad_admin.php">Criar conta!</a></p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="../../public/js/jquery/jquery.min.js"></script>
	<script src="../../public/js/login.js"></script>
</body>
</html>

<?php } ?>

