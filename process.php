<?php 
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