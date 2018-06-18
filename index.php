<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
  <style type="text/css">
  #myVideo {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%; 
      min-height: 100%;
  }
  .content {
      position: fixed;
      bottom: 0;
      left: 0;

      right: 0;
      background: rgba(0, 0, 0, 0.5);
      color: #f1f1f1;
      width: 100%;
      padding: 20px;
  }
  </style>
</head>

<body>
  <nav class="navbar navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../agenda/index.php">Agenda Online</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse my-2 my-lg-0" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link font-weight-bold" href="../../agenda/app/view/cad_admin.php">Criar conta</a>
            <a class="nav-item nav-link font-weight-bold" href="../../agenda/app/view/login.php">Efetuar Login</a>
          </div>
      </div>
  </nav>
  <div class="py-5 cover">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <video autoplay muted loop id="myVideo">
            <source src="../agenda/public/video/coffe.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
          </video>
          <div class="content container-fluid">
            <h1 class="display-3">Agenda Online</h1>
            <p class="lead">Crie uma conta e salve todos os seus contatos na sua agenda online. </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>