<script src="../Admin Remark/topbar/assets/vendor/jquery/jquery.js"></script>
<?php
include_once '../config/database_snort.php';
include_once '../controller/DashboardController.php';
$database = new DatabaseSnort();
$db = $database->getConnection();

$snort = new Dashboard($db);
$query = $snort->read();
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
            <br/>  </div>
        <!-- End Panel Basic -->
    </div>
</div>

<?php
echo'<pre>';
$k = 3;
$jumlah = $db->query("SELECT sig_name AS sig,"
        . " COUNT( sid ) AS jumlahalert,"
        . " COUNT( DISTINCT ( ip_src) ) AS ip_src,"
        . " ip_src AS ip_source,"
        . " COUNT( DISTINCT (ip_dst) ) AS ip_dst,"
        . " ip_dst AS ip_destination,"
        . " MIN( TIMESTAMP ) AS first ,"
        . " MAX( TIMESTAMP ) AS last "
        . " FROM acid_event "
        . " GROUP BY ip_src,ip_dst,sig_name");
// var_dump($jumlah);

foreach($jumlah as $jum)
{
    var_dump($jum);
}


    $no = 1;
    while ($row = $query['query']->fetch_object()) {

        echo '<br>'.$row->jumlahalert;
        print_r($row);
        $x[$no][1] = $row->jumlahalert;
        
//        $durasi = selisih $row->firt & $row->last
        //          $x[$no][2] = $durasi;

        $no++;
    }




$x[1][2] = 100.22;
$x[2][1] = 507;
$x[2][2] = 100.22;
$x[3][1] = 1287;
$x[3][2] = 100.35;
$x[4][1] = 1626;
$x[4][2] = 100.40;
$x[5][1] = 1039;
$x[5][2] = 100.32;
$x[6][1] = 1199;
$x[6][2] = 90.39;
$x[7][1] = 80;
$x[7][2] = 80.22;
$x[8][1] = 80;
$x[8][2] = 80.41;
$x[9][1] = 401;
$x[9][2] = 60.28;
$x[10][1] = 411;
$x[10][2] = 60.12;

$max[1] = 1626;
$min[1] = 80;
$max[2] = 100.40;
$min[2] = 60.12;

$interval[1] = ($max[1] - $min[1]) / $k;
$interval[2] = ($max[2] - $min[2]) / $k;

$xc[1][1] = $min[1] + (2 * $interval[1]);
$xc[2][1] = $min[2];

$xc[1][2] = $min[1] + (1 * $interval[1]);
$xc[2][2] = $min[2] + (1 * $interval[2]);

$xc[1][3] = $min[1];
$xc[2][3] = $min[2] + (2 * $interval[2]);

$d[1][1] = sqrt(pow(($x[1][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[1][2] = sqrt(pow(($x[1][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[1][3] = sqrt(pow(($x[1][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[2][1] = sqrt(pow(($x[2][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[2][2] = sqrt(pow(($x[2][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[2][3] = sqrt(pow(($x[2][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[3][1] = sqrt(pow(($x[3][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[3][2] = sqrt(pow(($x[3][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[3][3] = sqrt(pow(($x[3][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[4][1] = sqrt(pow(($x[4][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[4][2] = sqrt(pow(($x[4][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[4][3] = sqrt(pow(($x[4][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[5][1] = sqrt(pow(($x[5][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[5][2] = sqrt(pow(($x[5][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[5][3] = sqrt(pow(($x[5][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[6][1] = sqrt(pow(($x[6][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[6][2] = sqrt(pow(($x[6][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[6][3] = sqrt(pow(($x[6][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[7][1] = sqrt(pow(($x[7][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[7][2] = sqrt(pow(($x[7][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[7][3] = sqrt(pow(($x[7][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[8][1] = sqrt(pow(($x[8][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[8][2] = sqrt(pow(($x[8][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[8][3] = sqrt(pow(($x[8][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[9][1] = sqrt(pow(($x[9][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[9][2] = sqrt(pow(($x[9][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[9][3] = sqrt(pow(($x[9][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[10][1] = sqrt(pow(($x[10][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[10][2] = sqrt(pow(($x[10][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[10][3] = sqrt(pow(($x[10][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));









echo 'X';

print_r($x);

echo '<br>';
echo '<br>';

echo 'max';
print_r($max);


echo '<br>';
echo '<br>';


echo 'min';
print_r($min);

echo '<br>';
echo '<br>';


echo 'interval';
print_r($interval);

echo '<br>';
echo '<br>';


echo 'xc';
print_r($xc);

echo '<br>';
echo '<br>';


echo 'd';
print_r($d);

asort($d[1]);
asort($d[2]);
asort($d[3]);
asort($d[4]);
asort($d[5]);
asort($d[6]);
asort($d[7]);
asort($d[8]);
asort($d[9]);
asort($d[10]);

$cluster[1][1] = 0;
$cluster[1][2] = 0;
$cluster[1][3] = 0;

$cluster_s[1][1][1] = 0;
$cluster_s[1][2][1] = 0;
$cluster_s[1][3][1] = 0;


$cluster_s[1][1][2] = 0;
$cluster_s[1][2][2] = 0;
$cluster_s[1][3][2] = 0;

foreach ($d as $key => $value) {

    $no = 1;
    foreach ($value as $key2 => $value2) {
        if ($no == 1) {
            $result[$key]['cluster'] = $key2;
            $result[$key]['nilai'] = $value2;

            if ($key2 == 1) {
                $cluster[1][1] += 1;

                $cluster_s[1][1][1] += $x[$key][1];
                $cluster_s[1][1][2] += $x[$key][2];
            } else if ($key2 == 2) {
                $cluster[1][2] += 1;

                $cluster_s[1][2][1] += $x[$key][1];
                $cluster_s[1][2][2] += $x[$key][2];
            } else if ($key2 == 3) {
                $cluster[1][3] += 1;

                $cluster_s[1][3][1] += $x[$key][1];
                $cluster_s[1][3][2] += $x[$key][2];
            }
        }
        $no++;
    }
}


foreach ($cluster[1] as $key => $value) {
    $xc[1][$key] = $cluster_s[1][$key][1] / $value;
    $xc[2][$key] = $cluster_s[1][$key][2] / $value;
}


echo '<br>';
echo '<br>';


echo 'shorting d';
print_r($d);

echo '<br>';
echo '<br>';


echo 'Cluster<br>';
print_r($result);



echo '<br>';
echo '<br>';


echo 'Jumlah Cluster<br>';
print_r($cluster[1]);

echo '<br>';
echo '<br>';


echo 'Centroid perulangan pertama<br>';
print_r($cluster_s[1]);


echo '<br>';
echo '<br>';


echo 'xc';
print_r($xc);


$d[1][1] = sqrt(pow(($x[1][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[1][2] = sqrt(pow(($x[1][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[1][3] = sqrt(pow(($x[1][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[2][1] = sqrt(pow(($x[2][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[2][2] = sqrt(pow(($x[2][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[2][3] = sqrt(pow(($x[2][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[3][1] = sqrt(pow(($x[3][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[3][2] = sqrt(pow(($x[3][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[3][3] = sqrt(pow(($x[3][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[4][1] = sqrt(pow(($x[4][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[4][2] = sqrt(pow(($x[4][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[4][3] = sqrt(pow(($x[4][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[5][1] = sqrt(pow(($x[5][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[5][2] = sqrt(pow(($x[5][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[5][3] = sqrt(pow(($x[5][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[6][1] = sqrt(pow(($x[6][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[6][2] = sqrt(pow(($x[6][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[6][3] = sqrt(pow(($x[6][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[7][1] = sqrt(pow(($x[7][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[7][2] = sqrt(pow(($x[7][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[7][3] = sqrt(pow(($x[7][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[8][1] = sqrt(pow(($x[8][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[8][2] = sqrt(pow(($x[8][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[8][3] = sqrt(pow(($x[8][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[9][1] = sqrt(pow(($x[9][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[9][2] = sqrt(pow(($x[9][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[9][3] = sqrt(pow(($x[9][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));

$d[10][1] = sqrt(pow(($x[10][1] - $xc[1][1]), 2) + pow(($x[1][2] - $xc[2][1]), 2));
$d[10][2] = sqrt(pow(($x[10][1] - $xc[1][2]), 2) + pow(($x[1][2] - $xc[2][2]), 2));
$d[10][3] = sqrt(pow(($x[10][1] - $xc[1][3]), 2) + pow(($x[1][2] - $xc[2][3]), 2));


echo '<br>';
echo '<br>';


echo 'd';
print_r($d);


echo 'd';
print_r($d);

asort($d[1]);
asort($d[2]);
asort($d[3]);
asort($d[4]);
asort($d[5]);
asort($d[6]);
asort($d[7]);
asort($d[8]);
asort($d[9]);
asort($d[10]);

$cluster[2][1] = 0;
$cluster[2][2] = 0;
$cluster[2][3] = 0;

$cluster_s[2][1][1] = 0;
$cluster_s[2][2][1] = 0;
$cluster_s[2][3][1] = 0;


$cluster_s[2][1][2] = 0;
$cluster_s[2][2][2] = 0;
$cluster_s[2][3][2] = 0;

foreach ($d as $key => $value) {

    $no = 1;
    foreach ($value as $key2 => $value2) {
        if ($no == 1) {
            $result[$key]['cluster'] = $key2;
            $result[$key]['nilai'] = $value2;

            if ($key2 == 1) {
                $cluster[2][1] += 1;

                $cluster_s[2][1][1] += $x[$key][1];
                $cluster_s[2][1][2] += $x[$key][2];
            } else if ($key2 == 2) {
                $cluster[2][2] += 1;

                $cluster_s[2][2][1] += $x[$key][1];
                $cluster_s[2][2][2] += $x[$key][2];
            } else if ($key2 == 3) {
                $cluster[2][3] += 1;

                $cluster_s[2][3][1] += $x[$key][1];
                $cluster_s[2][3][2] += $x[$key][2];
            }
        }
        $no++;
    }
}


foreach ($cluster[2] as $key => $value) {
    $xc[1][$key] = $cluster_s[2][$key][1] / $value;
    $xc[2][$key] = $cluster_s[2][$key][2] / $value;
}


echo '<br>';
echo '<br>';


echo 'shorting d';
print_r($d);

echo '<br>';
echo '<br>';


echo 'Cluster<br>';
print_r($result);



echo '<br>';
echo '<br>';

echo 'Jumlah Cluster<br>';
print_r($cluster[1]);

echo '<br>';
echo '<br>';


echo 'Centroid perulangan Dua<br>';
print_r($cluster_s[1]);


$localhost = "localhost";
$username = "root";
$password = "root";
$dbname = "snort";

// create connection 
$connect = new mysqli($localhost, $username, $password, $dbname);

// check connection 
if ($connect->connect_error) {
    die("connection failed : " . $connect->connect_error);
} else {
    // echo "Successfully Connected";
}
$jumlah = $db->query("SELECT count(sid) as jumlah FROM acid_event ")->fetch_assoc() // var_dump($jumlah);
?>
  
