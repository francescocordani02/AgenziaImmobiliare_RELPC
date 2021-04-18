<?php

class appartamento
{
	private $id;
	private $NomeApp;
	private $Indirizzo;
	private $Superficie;
	private $Zona;
	private $lat;
	private $lng;
	private $conn;
	private $tableName = "appartamenti";

	function setId($id)
	{
		$this->id = $id;
	}
	function getId()
	{
		return $this->id;
	}
	function setNomeApp($NomeApp)
	{
		$this->NomeApp = $NomeApp;
	}
	function getNomeApp()
	{
		return $this->NomeApp;
	}
	function setIndirizzo($Indirizzo)
	{
		$this->Indirizzo = $Indirizzo;
	}
	function getIndirizzo()
	{
		return $this->Indirizzo;
	}
	function setSuperficie($Superficie)
	{
		$this->Superficie = $Superficie;
	}
	function getSuperficie()
	{
		return $this->Superficie;
	}
	function setZona($Zona)
	{
		$this->Zona = $Zona;
	}
	function getZona()
	{
		return $this->Zona;
	}
	function setLat($lat)
	{
		$this->lat = $lat;
	}
	function getLat()
	{
		return $this->lat;
	}
	function setLng($lng)
	{
		$this->lng = $lng;
	}
	function getLng()
	{
		return $this->lng;
	}

	public function __construct()
	{
		require_once('connection.php');
		$conn = new connection;
		$this->conn = $conn->connect();
	}

	public function getApartmentsBlankLatLng()
	{
		$sql = "SELECT * FROM $this->tableName INNER JOIN immagini ON FK_IdAppartamento=IdAppartamento WHERE Latitudine IS NULL AND Longitudine IS NULL";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getApartments()
	{
		$sql = "SELECT * FROM $this->tableName INNER JOIN immagini ON FK_IdAppartamento=IdAppartamento INNER JOIN quartieri ON FK_IdQuartiere=IdQuartiere WHERE IdAppartamento='" . $_GET['IdAppartamento'] . "' LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function updateApartmentsWithLatLng()
	{
		$sql = "UPDATE $this->tableName SET Latitudine = :lat, Longitudine = :lng WHERE IdAppartamento = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':lat', $this->lat);
		$stmt->bindParam(':lng', $this->lng);
		$stmt->bindParam(':id', $this->id);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
