<?php 

include '../../autoload.php';

session_start();

if(empty($_POST))
{
	header("Location: ../../app/view/agenda.php");
}
else
{
	$id = $_POST['id'];

	$contato = new Contato();

	$contato->setId($id);

	$contato->ListarContato($contato);*/

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
			
			$response = array();

			foreach($result as $row)
		    {
		    	$response = $row;
		    }

 			echo json_encode($response);

		} catch (Exception $e) {
			exit ("Falha na exclusão. " . $e->getMessage());
		}
}

?>