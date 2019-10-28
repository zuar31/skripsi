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
  <div class="page-content">
    <!-- Panel Basic -->
    <div class="panel">
    	 <div class="panel-body">
 <form class="col-md-5">
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
 	<div class="form-group">
 		<input type="email" class="form-control" name="email" placeholder="Email Address"
 		autocomplete="off" />
 	</div>
 	<div class="form-group">
 		<input type="password" class="form-control" name="password" placeholder="Password"
 		autocomplete="off" />
 	</div>
 	<div class="form-group">
 		<textarea class="form-control" placeholder="Briefly Describe Yourself"></textarea>
 	</div>
 <!-- 	<div class="form-group">
 		<div class="checkbox-custom checkbox-default">
 			<input type="checkbox" id="inputCheckboxAgree" name="inputCheckboxesAgree" checked
 			autocomplete="off" />
 			<label for="inputCheckboxAgree">Agree Policy</label>
 		</div>
 	</div> -->
 	<div class="form-group">
 		<button type="button" class="btn btn-primary">Submit</button>
 		&nbsp
 		<a class="btn btn-danger " href="topbar.php?p=users&f=users" id="batal">Cancel</a>
 	</div>
 </form>
</div>
</div>
</div>
</div>