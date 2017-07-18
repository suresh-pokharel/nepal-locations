<?php 
  /*
      Author  : Suresh Pokharel
      Email   : suresh.wrc@gmail.com
      GitHub  : github.com/suresh021
      URL     : psuresh.com.np
      Date    : 7/18/2017
  */

  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'location_nepal';
  $dbconfig = mysqli_connect($host,$username,$password,$database) or die("An Error occured while connecting to the database");
?>

<?php 
	if (isset($_GET['zone_id'])) {
    $arr =array();
		$zone_id=$_GET['zone_id'];
    $i=0;
  	$result = mysqli_query($dbconfig,"SELECT * FROM districts WHERE zone_id = '$zone_id'");
    while ($row = mysqli_fetch_assoc($result)) {
      $arr[$i] = $row;
      $i++;
    }
  	header('Content-type: application/json'); //preparing correct format for json_encode
    echo json_encode(array('data' => $arr)); //sending response to ajax
	}
 ?>

 <?php 
  if (isset($_GET['district_id'])) {
    $arr =array();
    $district_id=$_GET['district_id'];
    $i=0;
    $result = mysqli_query($dbconfig,"SELECT * FROM vdc WHERE district_id = '$district_id'");
    while ($row = mysqli_fetch_assoc($result)) {
      $arr[$i] = $row;
      $i++;
    }
    header('Content-type: application/json'); //preparing correct format for json_encode
    echo json_encode(array('data' => $arr)); //sending response to ajax
  }
 ?>