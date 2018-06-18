<?php 

include '../../app/dao/DAOAdmin.php';

class Admin
{
	private $id;
	private $name;
	private $email;
	private $password;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function InsertAdmin(Admin $admin)
	{
		$adminDAO = new AdminDAO();
		$adminDAO->insert($admin);
	}

	public function UpdateAdmin(Admin $admin)
	{
		$adminDAO = new AdminDAO();
		$adminDAO->update($admin);
	}

	public function DeleteAdmin(Admin $admin)
	{
		$adminDAO = new AdminDAO();
		$adminDAO->delete($admin);
	}

	public function ListAdmin()
	{
		$adminDAO = new AdminDAO();
		$result = $adminDAO->list();
		return $result;
	}
}

?>