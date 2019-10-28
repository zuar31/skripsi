<script src="../Admin Remark/topbar/assets/vendor/jquery/jquery.js"></script>
<?php 

include_once '../config/database.php';
include_once '../controller/UserController.php';
$database=new Database();
// $database=new mysqli("localhost","root","root","test_ilham");
$db=$database->getConnection();
// var_dump($db);



if($_POST)
{
	$user=new User($db);
	// var_dump($user->create());
	$user->nama=$_POST['nama'];
	$user->alamat=$_POST['alamat'];
	$user->username=$_POST['username'];
	$user->password=$_POST['password'];
	$data=$user->create();
	// var_dump($user->password);
	if($data['status']==true)
	{
		 // echo '<script>location.replace("topbar.php?p=users&f=users");</script>';
		echo '<script type="text/javascript">
		$(document).ready(function(){
			$(".alert").fadeIn();
			setTimeout(function(){
				location.replace("topbar.php?p=users&f=users");
				},2000);
			});
			</script>';
		// var_dump('aaaaa');
		// var_dump($user->create());
		}
		else
		{
			echo '<script type="text/javascript">
		$(document).ready(function(){
			$(".alert1").fadeIn();
			});
			</script>';
		}
	}
	?>

	<div class="page">

		<div class="page-header">
			<h1 class="page-title">Add Users</h1>
			<div class="page-header-actions">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../layout/topbar.php">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="../layout/topbar.php?p=users&f=users">Users</a></li>
					<li class="breadcrumb-item active">Add Users</li>
				</ol>
			</div>
		</div>
		<div class="alert alert-success alert-dismissible" role="alert" style="display:none">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<span id="message">Data Berhasil Ditambah</span>
		</div>
		<div class="alert1 alert-danger alert-dismissible" role="alert" style="display:none">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<span id="message">Data Berhasil Ditambah</span>
		</div>
		<div class="page-content">
			<!-- Panel Basic -->
			<div class="panel">
				<div class="panel-body">
					<form class="col-md-5" action="" method="POST">
						<div class="row">
							<div class="form-group col-md-12">
								<input type="text" class="form-control" name="nama" placeholder="Name"
								autocomplete="off" />
							</div>

						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<input type="text" class="form-control" name="username" placeholder="Username"
								autocomplete="off" />
							</div>
						</div>
<!--  	<div class="form-group">
 		<div class="radio-custom radio-default radio-inline">
 			<input type="radio" id="inputLabelMale" name="inputRadioGender" />
 			<label for="inputLabelMale">Male</label>
 		</div>
 		<div class="radio-custom radio-default radio-inline">
 			<input type="radio" id="inputLabelFemale" name="inputRadioGender" checked />
 			<label for="inputLabelFemale">Female</label>
 		</div>
 	</div> -->
 <!-- 	<div class="form-group">
 		<input type="email" class="form-control" name="email" placeholder="Email Address"
 		autocomplete="off" />
 	</div> -->
 	<div class="form-group">
 		<input type="password" class="form-control" name="password" placeholder="Password"
 		autocomplete="off" />
 	</div>
 	<div class="form-group">
 		<textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
 	</div>
 <!-- 	<div class="form-group">
 		<div class="checkbox-custom checkbox-default">
 			<input type="checkbox" id="inputCheckboxAgree" name="inputCheckboxesAgree" checked
 			autocomplete="off" />
 			<label for="inputCheckboxAgree">Agree Policy</label>
 		</div>
 	</div> -->
 	<div class="form-group">
 		<button type="submit" class="btn btn-primary">Submit</button>
 		&nbsp
 		<a class="btn btn-danger " href="topbar.php?p=users&f=users" id="batal">Cancel</a>
 	</div>
 </form>
</div>
</div>
</div>
</div>