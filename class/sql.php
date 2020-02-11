<?php 

class Sql extends PDO {

	private $conn;

	public function __construct(){

		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");
	}

	private function setParams($statement, $parameters = array()){
		foreach ($parameters as $key => $value) {
			
			$this->setParam($statement, $key, $value);
		}
	}

	public function setParam($statement, $key, $value){
		$statement->bindParam($key, $value);
	}
	public function query($rawQuery, $params = array()){

		$stmt = $this->conn->prepare($rawQuery);
		//foreach ($params as $key => $value) 
			
			//$stmt->bindParam($key, $value);
			$this->setParams($stmt, $params);
			$stmt->execute();
			return $stmt;
		}

	public function select($ramQuery, $params = array()):array
{

	$stmt = $this->query($ramQuery, $params);
	return $stmt->FetchAll(PDO::FETCH_ASSOC);

	}
}

?>