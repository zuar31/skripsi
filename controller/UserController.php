<?php 
class User{
	//database connection and table name
	private $conn;
	private $table_name="users";

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

	function create()
	{
		$database=$this->conn;
		$form=$_POST;
		$nama=$form['nama'];		
		// var_dump($nama);
		$username=$form['username'];
		$alamat=$form['alamat'];
		$password=$form['password'];
		 // var_dump($password);
		$insert=$database->query("INSERT into users (id,nama,username,alamat,password) VALUES ('','$nama','$username','$alamat','$password')");
		// var_dump($insert);
		
		if($insert==true)
		{
			$data['status']=true;
			$data['msg']='Data Berhasil Dimasukkan';
			$data['type']='alert-success';
			return $data;
		}
		else
		{
			$data['status']=false;
			$data['msg']='Data Gagal Dimasukkan';
			$data['type']='alert-danger';
			return $data;
		}
	}

	function read()
	{
		$database=$this->conn;
		$query=$database->query('SELECT * FROM users ORDER BY nama ASC');
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
?>