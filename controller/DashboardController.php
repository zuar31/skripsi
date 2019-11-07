<?php 
class Dashboard{
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
		$query=$database->query("SELECT sig_name as sig, count(sid) as jumlahalert, sum(sid) as jumlah,count(DISTINCT(ip_src)) as ip_src,count(DISTINCT(ip_dst)) as ip_dst,MIN(timestamp) as first,MAX(timestamp) as last FROM `acid_event` group by sig_name");
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