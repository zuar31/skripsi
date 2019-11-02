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
		$password=password_hash($form['password'], PASSWORD_BCRYPT);
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

	function fetch($id)
	{
		$database=$this->conn;
		$query=$database->query("SELECT * FROM users WHERE id='$id'");
		if($query==true)
		{
			$data['query']=$query;
			$data['row']=$query->fetch_assoc();
			return $data;
		}
		else
		{
			return false;
		}
	}

	function update()
	{
		// var_dump('aaa');
		$database=$this->conn;
		$form=$_POST;
		$id=$form['id'];	
		$query=$database->query("SELECT password FROM users WHERE id='$id'");
		$pass_ver=$query->fetch_assoc();
		// var_dump(password_verify($form['password'],$pass_ver['password']));
		if(empty($form['password']))
		{
			$data['status']=false;
			$data['msg']='Silahkan Masukkan Password Terlebih Dahulu';
			$data['type']='alert-danger';
			return $data;
		}
		else
		{
			if(password_verify($form['password'],$pass_ver['password']))
			{
				$nama=$form['nama'];		
				$username=$form['username'];
				$alamat=$form['alamat'];
				$password_baru=password_hash($form['password_baru'], PASSWORD_BCRYPT);
				if(!empty($password_baru))
				{
				// var_dump('aaaa');
					$update=$database->query("UPDATE users set nama='$nama',username='$username',alamat='$alamat',password='$password_baru' WHERE id='$id'");
				}
				else
				{
				// var_dump('bbbb');
					$update=$database->query("UPDATE users set nama='$nama',username='$username',alamat='$alamat' WHERE id='$id'");
				}


				if($update==true)
				{
					$data['status']=true;
					$data['msg']='Data Berhasil Dihapus';
					$data['type']='alert-success';
					return $data;
				}
				else
				{
					$data['status']=false;
					$data['msg']='Data Gagal Dihapus';
					$data['type']='alert-danger';
					return $data;
				}
			}
			else
			{
				$data['status']=false;
				$data['msg']='Password Yang Anda Masukkan Salah';
				$data['type']='alert-danger';
				return $data;
			}
		}
	}

	function delete($id)
	{
		$database=$this->conn;
		// var_dump($id);
		$query=$database->query("DELETE FROM users WHERE id='$id'");
		// var_dump($query);
		if($query==true)
				{
					$data['status']=true;
					$data['msg']='Data Berhasil Dimasukkan';
					$data['type']='alert-success';
					return $data;
				}
	}
}
?>