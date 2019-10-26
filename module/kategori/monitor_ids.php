<?php include '../layout/topbar.php' ?>

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
        <h1 class="page-title">DataTables</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
            <li class="breadcrumb-item active">DataTables</li>
        </ol>
        <div class="page-header-actions">
            <a class="btn btn-sm btn-default btn-outline btn-round" href="http://datatables.net"
               target="_blank">
                <i class="icon wb-link" aria-hidden="true"></i>
                <span class="hidden-sm-down">Official Website</span>
            </a>
        </div>
    </div>

    <div class="page-content">
        <!-- Panel Basic -->
        <div class="panel">
          <header class="panel-heading">
            <div class="panel-actions"></div>
            <h3 class="panel-title">Basic</h3>
          </header>
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
                      <tr>
                  <td>84</td>
                  <td>1</td>
                  <td>18</td>
                  <td>udp flood attack detected</td>
                  <td>17</td>
                  <td>3232235877</td>
                  <td>3232235878</td>
                  <td>60928</td>
                  <td>80</td>
                  <td>2019-09-22 16:39:42</td>
                      </tr>
                       <tr>
                  <td>84</td>
                  <td>1</td>
                  <td>18</td>
                  <td>udp flood attack detected</td>
                  <td>17</td>
                  <td>3232235877</td>
                  <td>3232235878</td>
                  <td>60928</td>
                  <td>80</td>
                  <td>2019-09-22 16:39:42</td>
                      </tr>
                       <tr>
                  <td>84</td>
                  <td>1</td>
                  <td>18</td>
                  <td>udp flood attack detected</td>
                  <td>17</td>
                  <td>3232235877</td>
                  <td>3232235878</td>
                  <td>60928</td>
                  <td>80</td>
                  <td>2019-09-22 16:39:42</td>
                      </tr>
                  </tbody>
              </table>
          </div>
        </div>
        <!-- End Panel Basic -->
    </div>
</div>


<?php include '../layout/footer.php' ?>
<script type="text/javascript">
//    console.log('cccp');
    $(document).ready(function(){
       console.log('hahaha');
//       $('#test').click(function(){
//           alert('cccp');
//       })
        $('#tabel').DataTable({
     bFilter:true,
    dom:
    "<'row'<'col-sm-1'l><'col-sm-2'f>>" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row'<'col-sm-4'i><'col-sm-4 text-center'><'col-sm-4'p>>",
    });
        });
</script>

