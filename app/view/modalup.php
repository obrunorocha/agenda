<?php 

include '../../autoload.php';

session_start();

if (!isset($_SESSION['emailSession']) && !isset($_SESSION['passSession']))
{
	header("Location: ../../app/view/login.php");
	exit;
}

$id = $_POST['id'];

$contato = new Contato();

$contato->setId($id);

$result = $contato->ListarContato($contato);
 			
foreach ($result as $row) {
?>

<div class="form-group">
	<label for="update_name">Nome</label>
	<input type="text" id="update_name" class="form-control" value="<?php echo $row['nome'];?>" />
</div>
<div class="form-group">
	<div class="form-row">
		<div class="col-md-8">
			<label for="update_email">Email</label>
			<input type="text" id="update_email" class="form-control" value="<?php echo $row['email'];?>" />
		</div>
		<div class="col-md-4">
			<label for="update_gender">Sexo</label>
			<select id="update_gender" class="form-control">
				<?php 
					if($row['sexo'] == 'M'){
						echo "<option value=". $row['sexo'] .">Masculino</option>";
						echo "<option value='F'>Feminino</option>";
					}else if($row['sexo'] == 'F')
					{
						echo "<option value=". $row['sexo'] .">Feminino</option>";
						echo "<option value='M'>Masculino</option>";
					}
				?>
			</select>
		</div>
	</div>
</div>
	
<div class="form-group">
	<label for="update_street">Rua</label>
	<input type="text" id="update_street" class="form-control" value="<?php echo $row['rua'];?>" />
</div>
<div class="form-group">
	<label for="update_neighborhood">Bairro</label>
	<input type="text" id="update_neighborhood" class="form-control" value="<?php echo $row['bairro'];?>" />
</div>
<div class="form-group">
	<div class="form-row">
		<div class="col-md-8">
			<label for="update_city">Cidade</label>
			<input type="text" id="update_city" class="form-control" value="<?php echo $row['cidade'];?>" />
		</div>
		<div class="col-md-4">
			<label for="update_state">Estado</label>
			<select id="update_state" class="form-control">
				<?php 
					$estados = array('AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB',
					'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR','SP', 'SC', 'SE', 'TO');

					echo "<option value=". $row['estado'] .">". $row['estado']."</option>";

					for($a=0; $a<=26; $a++){
						if($row['estado'] == $estados[$a]){
							unset($estados[$a]);
						}
						if($estados[$a] != '')
						echo "<option value=". $estados[$a] .">".$estados[$a]."</option>";
					}
				?>
			</select>		
		</div>
	</div>
</div>
<div class="form-group">
	<label for="update_country">País</label>
	<input type="text" id="update_country" class="form-control" value="<?php echo $row['pais'];?>"/>
</div>
<div class="form-group">
	<div class="form-row">
		<div class="col-md-8">
			<label for="update_number">Telefone</label>
			<input type="text" id="update_number" class="form-control" value="<?php echo $row['numero'];?>" />
		</div>
		<div class="col-md-4">
			<label for="update_type">Tipo</label>
			<select id="update_type" class="form-control">
				<?php 
					if($row['tipo'] == 'COM'){
						echo "<option value=". $row['tipo'] .">Comercial</option>";
						echo "<option value='CEL'>Celular</option>";
						echo "<option value='RES'>Residencial</option>";
					}else if($row['tipo'] == 'CEL')
					{
						echo "<option value=". $row['tipo'] .">Celular</option>";
						echo "<option value='COM'>Comercial</option>";
						echo "<option value='RES'>Residencial</option>";
					}else if($row['tipo'] == 'RES')
					{
						echo "<option value=". $row['tipo'] .">Residencial</option>";
						echo "<option value='COM'>Comercial</option>";
						echo "<option value='CEL'>Celular</option>";
					}
				?>
			</select>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	<button type="button" class="btn btn-primary" onclick="UpdateUserDetails()">Salvar</button>
	<input type="hidden" id="hidden_user_id" value="<?php echo $row['idcontato'];?>">
</div>

<?php } ?>

<script src="../../public/js/scripts.js"></script>
