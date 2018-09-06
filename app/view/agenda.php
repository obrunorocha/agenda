<?php 

include '../../autoload.php';

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
  <title>Agenda</title>
</head>

<body>
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
              <a href="../../app/view/agenda.php" class="nav-link active">
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
        <div class="col-lg-10">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 py-3 px-5">
						<h1 class="text-justify display-4">Agenda</h1>
						<div class="float-right">
							<button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Adicionar Contato</button>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<h4>Contatos:</h4>
						<div class="records_content"></div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Novo Contato</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						
						<div class="modal-body">
							<div class="form-group">
								<label for="name">Nome</label>
								<input type="text" id="name" class="form-control" required="required" />
							</div>

							<div class="form-group">
								<div class="form-row">
									<div class="col-md-8">
										<label for="email">Email</label>
										<input type="text" id="email" class="form-control" required="required" />
									</div>
									<div class="col-md-4">
									<label for="gender">Sexo</label>
									<select id="gender" class="form-control" required="required">
										<option value="M">Masculino</option>
										<option value="F">Feminino</option>
									</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="street">Rua</label>
								<input type="text" id="street" class="form-control" required="required" />
							</div>
							<div class="form-group">
								<label for="neighborhood">Bairro</label>
								<input type="text" id="neighborhood" class="form-control" required="required" />
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-8">
										<label for="city">Cidade</label>
										<input type="text" id="city" class="form-control" required="required" />
									</div>
									<div class="col-md-4">
										<label for="state">Estado</label>
										<select id="state" class="form-control" required="required">
											<option>Selecione</option>
											<option>AC</option>
											<option>AL</option>
											<option>AP</option>
											<option>AM</option>
											<option>BA</option>
											<option>CE</option>
											<option>DF</option>
											<option>ES</option>
											<option>GO</option>
											<option>MA</option>
											<option>MT</option>
											<option>MS</option>
											<option>MG</option>
											<option>PA</option>
											<option>PB</option>
											<option>PR</option>
											<option>PE</option>
											<option>PI</option>
											<option>RJ</option>
											<option>RN</option>
											<option>RS</option>
											<option>RO</option>
											<option>RR</option>
											<option>SC</option>
											<option>SP</option>
											<option>SE</option>
											<option>TO</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="country">País</label>
								<input type="text" id="country" class="form-control" value="Brasil" required="required"/>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-8">
										<label for="number">Telefone</label>
										<input type="text" id="number" class="form-control" required="required" />
									</div>
									<div class="col-md-4">
										<label for="type">Tipo</label>
										<select id="type" class="form-control" required="required">
											<option value="COM">Comercial</option>
											<option value="CEL">Celular</option>
											<option value="RES">Residencial</option>
										</select>
									</div>
								</div>
							</div>
								

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-primary" onclick="addRecord()">Salvar</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Atualizar Contato</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div id="result"></div>
						</div>
					</div>
				</div>
			</div>
        </div>
      </div>
    </div>
</body>

</html>

<?php include '../view/footerScripts.php'; ?>

<!-- Jquery JS file -->
<script type="text/javascript" src="../../public/js/scripts.js"></script>