<?php 

include '../../autoload.php'; 

class ContatoDAO
{
	public function insert(Contato $contato)
	{
		try
		{			
			include '../../config/config.php';

			session_start();

			$name    = $contato->getName();
			$email   = $contato->getEmail();
			$gender  = $contato->getGender();
			$street  = $contato->getStreet();
			$neigh   = $contato->getNeighborhood();
			$city    = $contato->getCity();
			$state   = $contato->getState();
			$country = $contato->getCountry();
			$number  = $contato->getNumber();
			$type    = $contato->getType();

			$e = $_SESSION['emailSession'];

			$c = $con->prepare("INSERT INTO tb_contato(nome, sexo, email, id_admin) 
				 VALUES(:name, :sexo, :email, (SELECT idadmin FROM tb_admin WHERE email = '$e'))");

			$c->bindParam(":name", $name);
			$c->bindParam(":sexo", $gender);
			$c->bindParam(":email", $email);

			$c->execute();

			$end = $con->prepare("INSERT INTO tb_endereco(rua, bairro, cidade, estado, pais, id_contato) 
				   VALUES(:street, :neigh, :city, :state, :country, (SELECT LAST_INSERT_ID()))");

			$end->bindParam(":street", $street);
			$end->bindParam(":neigh", $neigh);
			$end->bindParam(":city", $city);
			$end->bindParam(":state", $state);
			$end->bindParam(":country", $country);

			$end->execute();

			$sql = "INSERT INTO tb_telefone(tipo, numero, id_contato) VALUES('$type', '$number', 
			(SELECT E.ID_CONTATO FROM TB_ADMIN A
			iNNER JOIN TB_CONTATO C
			ON A.IDADMIN = C.ID_ADMIN
			INNER JOIN TB_ENDERECO E
			ON C.IDCONTATO = E.ID_CONTATO
			ORDER BY C.IDCONTATO DESC LIMIT 1))";

			$tel = $con->prepare($sql);

			$tel->execute();

			exit ("Contato cadastrado com sucesso.");
		}
		catch(Exception $e)
		{
			exit ("Falha ao cadastrar contato. " . $e->getMessage());
		}
				
	}

	public function update(Contato $contato)
	{
		try
		{			
			include '../../config/config.php';

			session_start();

			$id      = $contato->getId();
			$name    = $contato->getName();
			$email   = $contato->getEmail();
			$gender  = $contato->getGender();
			$street  = $contato->getStreet();
			$neigh   = $contato->getNeighborhood();
			$city    = $contato->getCity();
			$state   = $contato->getState();
			$country = $contato->getCountry();
			$number  = $contato->getNumber();
			$type    = $contato->getType();

			if(empty($id) && empty($name) && empty($email) && empty($gender) && empty($street) && empty($neigh) && empty($city) && empty($state) && empty($country) && empty($number) && empty($type))
			{
				exit('Variaveis vazias');
			}

			$c = $con->prepare("
				UPDATE tb_contato 
				SET nome = '$name', sexo = '$gender', email = '$email' 
				WHERE idcontato = '$id'
			");

			$c->execute();

			$end = $con->prepare("
				UPDATE tb_endereco 
				SET rua = '$street', bairro = '$neigh', 
				cidade = '$city', estado = '$state', pais = '$country' 
				WHERE id_contato = '$id'
			");

			$end->execute();

			$tel = $con->prepare("
				UPDATE tb_telefone 
				SET tipo = '$type', numero = '$number' 
				WHERE id_contato = '$id'
			");

			$tel->execute();

			exit('Contato atualizado com sucesso.');
		}
		catch(Exception $e)
		{
			exit ("Falha ao cadastrar contato. " . $c . $end . $tel . $e->getMessage());
		}

		//$con = null;
	}

	public function delete(Contato $contato)
	{
		try
		{			
			include '../../config/config.php';

			$id = $contato->getId();

			$tel = $con->query("DELETE FROM tb_telefone WHERE id_contato = '$id'");

			$end = $con->query("DELETE FROM tb_endereco WHERE id_contato = '$id'");

			$c = $con->query("DELETE FROM tb_contato WHERE idcontato = '$id'");

			exit ('Contato excluído com sucesso.');
			echo "<script>window.location='../../app/view/painel.php'</script>";  

		}
		catch (Exception $e)
		{
			exit ("Falha na exclusão. " . $e->getMessage());
		}
	}

	public function listall()
	{
		try {
			include '../../config/config.php';

			$e = $_SESSION['emailSession'];

			$data = '<div class="table-responsive">
			<table class="table table-bordered table-striped">
						<tr>
							<th>Nº</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Sexo</th>
							<th>Rua</th>
							<th>Bairro</th>
							<th>Cidade</th>
							<th>Estado</th>
							<th>Pais</th>
							<th>Telefone</th>
							<th>Número</th>
							<th colspan="2">Alterar</th>
						</tr>';
	
			$stmt = $con->prepare("
				SELECT c.nome, c.email, c.sexo, e.rua, e.bairro, e.cidade, e.estado, e.pais, t.tipo, t.numero, c.idcontato
				FROM tb_admin a 
				INNER JOIN tb_contato c 
				ON a.idadmin = c.id_admin
				INNER JOIN tb_endereco e
				ON c.idcontato = e.id_contato
				INNER JOIN tb_telefone t
				ON c.idcontato = t.id_contato 
				WHERE a.idadmin = (SELECT idadmin FROM tb_admin WHERE email = '$e')
				ORDER BY 
				c.nome ASC
			");

			$stmt->execute();

			$result = $stmt->rowCount();
		    // if query results contains rows then featch those rows 
		    if($result > 0)
		    {
		    	$number = 1;

		    	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		    	foreach($result as $row)
		    	{
		    		$data .= '<tr>
						<td>'.$number.'</td>
						<td>'.$row['nome'].'</td>
						<td>'.$row['email'].'</td>
						<td>'.$row['sexo'].'</td>
						<td>'.$row['rua'].'</td>
						<td>'.$row['bairro'].'</td>
						<td>'.$row['cidade'].'</td>
						<td>'.$row['estado'].'</td>
						<td>'.$row['pais'].'</td>
						<td>'.$row['tipo'].'</td>
						<td>'.$row['numero'].'</td>
						<td>
						<button type="submit" name="id" id=' . $row['idcontato'].' class="list btn btn-warning" data-toggle="modal" data-target="#update_user_modal">Atualizar</button>
						</td>
						<td>
							<button onclick="DeleteUser('.$row['idcontato'].')" class="btn btn-danger">Delete</button>
						</td>
		    		</tr>';

		    		$number++;
		    	}
		    }
		    else
		    {
		    	// records now found 
		    	$data .= '<tr><td colspan="6">Agenda vazia!</td></tr>';
		    }

		    $data .= '</table></div>';

		    echo $data;
		}catch(Exception $e) {
			throw new Exception("Erro ao ler os dados", 1);	
		}
		
	}

	public function list(Contato $contato)
	{
		try {
			
			include '../../config/config.php';

			$id = $contato->getId();

			$e = $_SESSION['emailSession'];

			$stmt = $con->prepare("
				SELECT c.idcontato, c.nome, c.email, c.sexo, e.rua, e.bairro, e.cidade, e.estado, e.pais, t.tipo, t.numero
				FROM tb_admin a 
				INNER JOIN tb_contato c 
				ON a.idadmin = c.id_admin
				INNER JOIN tb_endereco e
				ON c.idcontato = e.id_contato
				INNER JOIN tb_telefone t
				ON c.idcontato = t.id_contato 
				WHERE a.idadmin = (SELECT idadmin FROM tb_admin WHERE email = '$e') 
				AND c.idcontato = :id
			");

			$stmt->bindParam(":id", $id);

			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $result;

		} catch (Exception $e) {
			exit ("Falha na exclusão. " . $e->getMessage());
		}
	}	

}

?>