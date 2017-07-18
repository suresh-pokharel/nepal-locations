<?php 
	/*
      Author  : Suresh Pokharel
      Email   : suresh.wrc@gmail.com
      GitHub  : github.com/suresh021
      URL     : psuresh.com.np
      Date    : 7/18/2017
	*/
?>

<?php
/*Database Connection*/
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'location_nepal';
$dbconfig = mysqli_connect($host,$username,$password,$database) or die("An Error occured while connecting to the database");
$result_zones = mysqli_query($dbconfig,"SELECT * FROM zones");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Locations Nepal</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	crossorigin="anonymous"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 100px">
			<select class="zone col-md-3 center-block" id="zone">
				<?php 
					while ($res = mysqli_fetch_assoc($result_zones)) {
						echo "<option value='".$res['id']."'>".$res['name']."</option>";
					}
				?>
			</select>
			<select class="district col-md-4 center-block" id="district"></select>
			<select class="vdc col-md-4 center-block disabled" id="vdc"></select>
		</div>
		<div class="row" style="margin-top: 200px; float: right">
			<p><a href="https://github.com/suresh021/nepal-locations" target="_blank">Find at Github</a></p>
		</div>
	</div>
	<script src = "script.nepal.location.js"></script>
</body>
</html>