<?php 
class MonitorIDS{
	//database connection and table name
	private $conn;
	private $table_name="acid_event";

	//object properties
	public $id;
	public $nama;
	public $username;
	public $alamat;
	public $password;

	public function __construct($db)
	{
		$this->conn=$db;
	}

	function read()
	{
		$database=$this->conn;
		$query=$database->query("SELECT * FROM `acid_event`");
		// var_dump($query);
		if($query==true)
		{
			$data['query']=$query;
			$data['num_rows']=$query->num_rows;
			return $data;
		}
		else
		{
			return false;
		}
	}
}