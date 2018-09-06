<!DOCTYPE html>
<html>

<head>
  <?php include '../view/head.php'; ?>
  <title>Agenda Online - Criar Conta</title>

<body>
  
<?php include '../view/navbarAdmin.php'; ?>

<div class="py-5 cover">
  <div class="container">
    <div class="row">
        <div class="col-lg-8 py-5">
          <h1 class="display-3">Agenda Online</h1>
          <p class="lead">Crie uma conta e salve todos os seus contatos na sua agenda online. </p>
        </div>
        <div class="bg-light col-lg-4 p-4 mt-4">
            <h1 class="text-center">Criar Conta</h1>
              <div class="form-group">
                  <label>Nome</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Digite seu nome">
              </div>
              <div class="form-group">
                <label>E-mail</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail">
              </div>
              <div class="form-group">
                  <label>Senha</label>
                  <input type="password" name="password" id="pass" class="form-control" placeholder="Digite sua senha">
              </div>
              <div class="form-group">
                  <label>Confirmar Senha</label>
                  <input type="password" name="confirm" id="confirm" class="form-control" placeholder="Repetir senha">
              </div>
              <button type="submit" name="submit" id="submit" class="btn btn-block btn-primary">Cadastrar</button>
            <p class="py-3" id="admin-message"></p>
            <p class="text-center">Já possui uma conta? <a href="../view/login.php">Efetuar Login!</a></p>
      </div>
    </div>
  </div>
</div>

<?php include '../view/footerScripts.php'; ?>
<script src="../../public/js/cad-admin.js"></script>
</body>
</html>

