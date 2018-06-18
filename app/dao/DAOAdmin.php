<?php 

include '../../autoload.php';

class AdminDAO
{
	public function insert(Admin $admin)
	{
		try {
			
		include '../../config/config.php';

		$name  = $admin->getName();
		$email = $admin->getEmail();
		$pass  = base64_encode($admin->getPassword());

		$stmt = $con->prepare("SELECT email FROM tb_admin WHERE email = :email");

		$stmt->bindParam(":email", $email);

		$stmt->execute();

		$result = $stmt->rowCount();

		if($result > 0)
		{
			exit('Já existe um usuário cadastrado com este email.');
		}
		else
		{
			$stmt = $con->prepare("INSERT INTO tb_admin (nome, email, senha, status_adm) VALUES(:name, :email, :password, '0')");
			$stmt->bindParam(":name", $name);
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":password", $pass);

			$stmt->execute();

			exit('Usuário cadastrado com sucesso!');
		}

		} catch (Exception $e) {
			exit ("Falha no cadastro. " . $e->getMessage());
		}		
	}

	public function delete(Admin $admin)
	{
		try
		{			
			include '../../config/config.php';

			session_start();

			$id = $admin->getId();

			$a = $con->query("DELETE FROM tb_admin WHERE idadmin = '$id'");

			$c = $con->query("DELETE FROM tb_contato WHERE id_admin NOT IN (SELECT idadmin FROM tb_admin)");

			$end = $con->query("DELETE FROM tb_endereco WHERE id_contato NOT IN (SELECT idcontato FROM tb_contato)");

			$tel = $con->query("DELETE FROM tb_telefone WHERE id_contato NOT IN (SELECT idcontato FROM tb_contato)");

			unset($_SESSION['emailSession']);
			unset($_SESSION['passSession']);

			session_destroy();	

			exit ('Contato excluído com sucesso.');
			echo "<script>window.location='../../agenda/index.php'</script>";  

		}
		catch (Exception $e)
		{
			exit ("Falha na exclusão. " . $e->getMessage());
		}
	}

	public function list()
	{
		include '../../config/config.php';

		$e = $_SESSION['emailSession'];

		$stmt = $con->prepare("SELECT idadmin, nome, email, senha FROM tb_admin WHERE email = :email");

		$stmt->bindParam(":email", $e);

		$stmt->execute();

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}
}

?>