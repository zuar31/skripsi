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
        <a class="btn btn-primary " href="topbar.php?p=add_user&f=users" id="batal">Add User</a>
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
              <th>Email</th>
              <th>Password</th>
              <th>Roles</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Michael Brynn</td>
              <td>brynn</td>
              <td>m.brynn@gmail.com</td>
              <td>12345678</td>
              <td>superadministrator</td>
              <td>Edit - Delete</td>
            </tr>
            <tr>
              <td>Kaori Saotome</td>
              <td>saotome</td>
              <td>k.saotome@softbank.jp</td>
              <td>12345678</td>
              <td>superadministrator</td>
              <td>Edit - Delete</td>
            </tr>
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

