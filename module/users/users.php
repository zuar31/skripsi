<?php
include_once '../dbase/db.php';
include_once '../controller/UserController.php';
$database=new Database();
// $database=new mysqli("localhost","root","root","test_ilham");
$db=$database->getConnection();
$user=new User($db);
$query=$user->read();
// var_dump($query['num_rows']);
?>
<div class="page">
  <div class="page-header">
    <h1 class="page-title">Users</h1>
    <div class="page-header-actions">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../layout/topbar.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
    </div>
  </div>

  <div class="page-content">
    <!-- Panel Basic -->
    <div class="panel">
      <header class="panel-heading">
        <div class="panel-actions"></div>
        <!-- <h3 class="panel-title">Basic</h3> -->
        <div class="row col-md-12">
          <div class="col-md-6">
          </div>
          <div class="col-md-6" style="text-align: right">
            <br/>
            <a class="btn btn-primary " href="topbar.php?p=add_user&f=users&mode=add" id="batal">Add User</a>
          </div>
        </div>
      </header>
      <br/>
      <div class="panel-body">
        <table class="table table-hover dataTable table-striped w-full" id="tabel">
          <thead>
            <tr>
              <th>Name</th>
              <th>Username </th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if($query['num_rows'] > 0){
              while ($row=$query['query']->fetch_assoc()){
                ?>
                <tr>
                  <td><?php echo $row['nama'] ?></td>
                  <td><?php echo $row['username'] ?></td>
                  <td><?php echo $row['alamat'] ?></td>
                  <td><a class="btn btn-sm btn-primary" href='topbar.php?p=add_user&f=users&mode=edit&id=<?php echo $row['id']?>'><i class="icon glyphicon glyphicon-edit" aria-hidden="true"></i> Edit</a> &nbsp&nbsp <a class="btn btn-sm btn-danger" href=''><i class="icon glyphicon glyphicon-trash" aria-hidden="true"></i> Delete</a></td>
                </tr>
              <?php }} ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
  </div>

  <script src="../Admin Remark/topbar/assets/vendor/jquery/jquery.js"></script>
  <script>
   var $=jQuery;
   $(document).ready(function(){
//  console.log('hahaha');
// //       $('#test').click(function(){
// //           alert('cccp');
// //       })
$('#tabel').DataTable({
 bFilter:true,
 dom:
 "<'row'<'col-sm-1'l><'col-sm-2'f>>" +
 "<'row'<'col-sm-12'tr>>" +
 "<'row'<'col-sm-4'i><'col-sm-4 text-center'><'col-sm-4'p>>",
});
});
</script>

