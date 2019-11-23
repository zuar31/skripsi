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
            date_default_timezone_set('Asia/Jakarta');
		$database=$this->conn;
		$query=$database->query("SELECT sig_name as sig, count(sid) as jumlahalert, sum(sid) as jumlah,ip_src AS ip_source,ip_dst as ip_destination,MIN(timestamp) as first,MAX(timestamp) as last FROM `acid_event` group by sig_name,ip_src,ip_dst");
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