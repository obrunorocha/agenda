<?php 

include '../../app/dao/DAOContato.php';

class Contato{

	private $id;
	private $name;
	private $email;
	private $gender;
	private $street;
	private $neigh;
	private $city;
	private $state;
	private $country;
	private $number;
	private $type;

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

	public function setGender($gender)
	{
		$this->gender = $gender;
	}

	public function setStreet($street)
	{
		$this->street = $street;
	}

	public function setNeighborhood($neigh)
	{
		$this->neigh = $neigh;
	}

	public function setCity($city)
	{
		$this->city = $city;
	}

	public function setState($state)
	{
		$this->state = $state;
	}

	public function setCountry($country)
	{
		$this->country = $country;
	}

	public function setNumber($number)
	{
		$this->number = $number;
	}

	public function setType($type)
	{
		$this->type = $type;
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

	public function getGender()
	{
		return $this->gender;
	}

	public function getStreet()
	{
		return $this->street;
	}

	public function getNeighborhood()
	{
		return $this->neigh;
	}

	public function getCity()
	{
		return $this->city;
	}

	public function getState()
	{
		return $this->state;
	}

	public function getCountry()
	{
		return $this->country;
	}

	public function getNumber()
	{
		return $this->number;
	}

	public function getType()
	{
		return $this->type;
	}

	public function InsertContato(Contato $contato)
	{
		$contatoDAO = new ContatoDAO();
		$contatoDAO->insert($contato);
	}

	public function UpdateContato(Contato $contato)
	{
		$contatoDAO = new ContatoDAO();
		$contatoDAO->update($contato);
	}

	public function DeleteContato(Contato $contato)
	{
		$contatoDAO = new ContatoDAO();
		$contatoDAO->delete($contato);
	}
	//////////////////////////////////////////////////////////////////////
	public function ListarContato(Contato $contato)
	{
		$contatoDAO = new ContatoDAO();
		$result = $contatoDAO->list($contato);
		return $result;
	}

	//////////////////////////////////////////////////////////////////////

	public function ListarAll()
	{
		$contatoDAO = new ContatoDAO();
		$result = $contatoDAO->listall();
		return $result;
	}
}

?>