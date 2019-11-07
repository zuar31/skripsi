<?php
$localhost = "localhost"; 
$username = "root"; 
$password = "1"; 
$dbname = "snort"; 
 
// create connection 
$connect = new mysqli($localhost, $username, $password, $dbname); 
 
// check connection 
if($connect->connect_error) {
    die("connection failed : " . $connect->connect_error);
} else {
    // echo "Successfully Connected";
}
?>

<?php
 $sql = "SELECT MAX(jumlahalert) as max_alert,MIN(jumlahalert) as min_alert FROM (SELECT count(sid) as jumlahalert FROM acid_event GROUP BY sig_name) as results";

 $result = $connect->query($sql);
 $res=$result->fetch_assoc();

 $sql_max = "SELECT TIMESTAMPDIFF(SECOND,min_time,max_time) as selisih FROM (SELECT count(sid) as jumlahalert,MAX(timestamp) as max_time, MIN(timestamp) as min_time FROM acid_event  GROUP BY sig_name) as results WHERE jumlahalert='".$res["max_alert"]."'";

 $result1 = $connect->query($sql_max);

 $res1=$result1->fetch_assoc();

  $sql_min = "SELECT TIMESTAMPDIFF(SECOND,min_time,max_time) as selisih FROM (SELECT count(sid) as jumlahalert,MAX(timestamp) as max_time, MIN(timestamp) as min_time FROM acid_event  GROUP BY sig_name) as results WHERE jumlahalert='".$res["min_alert"]."'";

 $result2 = $connect->query($sql_min);

 $res2=$result2->fetch_assoc();
  // var_dump($res1);
 $k=3;

 //Interval X1
 $intX1=($res['max_alert']-$res['min_alert'])/$k;

 //Interval X2
 $intX2=($res1['selisih']-$res2['selisih'])/$k;

 //Centroid Awal
 //C1
 $x1c1a=$res['min_alert']+(2*$intX1);
 $x1c1b=$res2['selisih']+(0*$intX2);

 //C2
 $x1c2a=$res['min_alert']+(1*$intX1);
 $x1c2b=$res2['selisih']+(1*$intX2);

 //C3
$x1c3a=$res['min_alert']+(0*$intX1);
 $x1c3b=$res2['selisih']+(2*$intX2);
?>

<html>
<table border="1">
	<tr>
		<td>No</td><td>Centroid Jumlah Alert</td> <td>Centroid Durasi</td> <td>Centroid Pada Cluster</td><td>Keterangan</td>
	</tr>
	<tr>
		<td>1</td><td><?php echo $x1c1a?></td><td><?php echo $x1c1b?></td><td>(<?php echo $x1c1a?>,<?php echo $x1c1b ?>)</td><td>Serangan Berbahaya</td>
	</tr>
	<tr>
		<td>1</td><td><?php echo $x1c2a?></td><td><?php echo $x1c2b?></td><td>(<?php echo $x1c2a?>,<?php echo $x1c2b ?>)</td><td>Serangan Agak Berbahaya</td>
	</tr>
	<tr>
		<td>1</td><td><?php echo $x1c3a?></td><td><?php echo $x1c3b?></td><td>(<?php echo $x1c3a?>,<?php echo $x1c3b ?>)</td><td>Serangan Tidak Berbahaya</td>
	</tr>
	</table>
</html>