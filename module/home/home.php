<script src="../Admin Remark/topbar/assets/vendor/jquery/jquery.js"></script>
<?php 
include_once '../config/database_snort.php';
include_once '../controller/DashboardController.php';
$database=new DatabaseSnort();
$db=$database->getConnection();

$snort=new Dashboard($db);
$query=$snort->read();
?>

<div class="page">
                <div class="page-header">
                  <h1 class="page-title">Dashboard</h1>
                  <div class="page-header-actions">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
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
             <!--  <div class="col-md-6" style="text-align: right">
                <br/>
                <a class="btn btn-primary " href="topbar.php?p=add_user&f=users&mode=add" id="batal">Add User</a>
              </div> -->
            </div>
          </header>
          <br/>
          <div class="panel-body">
            <table class="table table-hover dataTable table-bordered w-full" id="tabel">
              <thead>
                <tr>
                  <th>Signature Name</th>
                  <th>Jumlah Alert </th>
                  <th>IP Source</th>
                  <th>IP Destination</th>
                  <th>First Time</th>
                  <th>End Time</th>
                  <th>Durasi (s)</th>
                </tr>
              </thead>
              <tbody>
              	<?php $jumlah=$db->query("SELECT count(sid) as jumlah FROM acid_event ")->fetch_assoc()
              	// var_dump($jumlah);
              	 ?>
                <?php if($query['num_rows'] > 0){
                  while ($row=$query['query']->fetch_assoc()){
                    ?>
                    <tr>
                      <td><?php echo $row['sig'] ?></td>
                      <td><?php echo $row['jumlahalert'] ?> &nbsp(<?php echo round(($row['jumlahalert']/$jumlah['jumlah'])*100,2)?> %)</td>
                      <td><?php echo long2ip($row['ip_source']) ?></td>
                      <td><?php echo long2ip($row['ip_destination']) ?></td>
                      <td><?php echo date('d-m-Y H:i:s',strtotime($row['first'])) ?></td>
                      <td><?php echo date('d-m-Y H:i:s',strtotime($row['last'])) ?></td>
                      <td><?php $date=new DateTime($row['first']);
                      $date2=new DateTime($row['last']);
                      $diff=$date2->getTimestamp() - $date->getTimestamp();
                      echo $diff;
                      ?>
                      </td>
                    </tr>
                  <?php }} ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- End Panel Basic -->
        </div>
    </div>

  