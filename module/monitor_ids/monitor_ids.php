<script src="../Admin Remark/topbar/assets/vendor/jquery/jquery.js"></script>
<?php 
include_once '../config/database_snort.php';
include_once '../controller/MonitorIDSController.php';
// $database=new DatabaseSnort();
// $db=$database->getConnection();

// $snort=new MonitorIDS($db);
// $query=$snort->read();
?>

<style>
  #tabel.dataTables_filter {
    float: right;
    text-align: right;
  }
  .searchStyle
  {
    padding: 5px 12px;
    margin-top: -28px;
  }
</style>

<div class="page">

  <div class="page-header">
    <h1 class="page-title">Monitor IDS</h1>
    <div class="page-header-actions">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../layout/topbar.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Monitor IDS</li>
      </ol>
    </div>
  </div>

  <div class="page-content">
    <!-- Panel Basic -->
    <div class="panel">
      <header class="panel-heading">
        <div class="panel-actions"></div>
        <!-- <h3 class="panel-title">Basic</h3> -->
        <br>
     <!--    <table style="margin-left:3em" width="100%">
          <tr>
            <td width="10%">Tanggal</td>
            <td>:</td>
            <td>  -->
              <!-- <div class="col-sm-4">
                <div class="input-daterange" data-plugin="datepicker">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="icon wb-calendar" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="form-control" name="start" />
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">to</span>
                    <input type="text" class="form-control" name="end" />
                  </div>
                </div>
              </div> -->
        <!--     </td>
          </tr>
        </table> -->
      </header>
      <br/>
      <div class="panel-body">
        <table class="table table-hover dataTable table-striped w-full" id="tabel">
          <thead>
            <tr>
              <th>SID</th>
              <th>CID</th>
              <th>Signature</th>
              <th>SIG Name</th>
              <th>IP Proto</th>
              <th>IP SRC</th>
              <th>IP DST</th>
              <th>Port Src</th>
              <th>Port Dst</th>
              <th>Timestamp</th>
            </tr>
          </thead>
          <tbody>

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
 bProcessing: true,
 bServerSide: true,
 sAjaxSource: "../datatables_serverside/monitor_ids_datatables.php",
 dom:
 "<'row'<'col-sm-1'l><'col-sm-2'f>>" +
 "<'row'<'col-sm-12'tr>>" +
 "<'row'<'col-sm-4'i><'col-sm-4 text-center'><'col-sm-4'p>>",
});
});
</script>

