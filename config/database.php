<?php 

class Database{

	private $host="localhost";
	private $db_name="test_ilham";
	private $username="root";
	private $password="root";
	public $conn;

	public function getConnection()
	{
		$this->conn=null;
		// try{
		// 	$this->conn=new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password);
		// }catch(PDOException $exception){
		// 	echo "connection error: ".$exception->getMessage();
		// }
		$this->conn = new mysqli($this->host,$this->username,$this->password,$this->db_name);
		if(mysqli_connect_errno())
		{
			echo "Error: Could not connect to database";
		}

		return $this->conn;
	}
}
?>