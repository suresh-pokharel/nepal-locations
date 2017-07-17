<?php
/*Database Connection*/
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'location_nepal';
$dbconfig = mysqli_connect($host,$username,$password,$database) or die("An Error occured while connecting to the database");
$result_zones = mysqli_query($dbconfig,"SELECT * FROM zones");
$result_districts = mysqli_query($dbconfig,"SELECT * FROM districts");
$result_vdcs = mysqli_query($dbconfig,"SELECT * FROM vdc");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Locations Nepal</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</head>
<body>
	<script type="text/javascript">
		$(document).ready(function() {
			// $(".vdc").prop("disabled", true);
			$(".zone").select2({
				placeholder: "Select a zone",
				allowClear: true
			});

			$(".district").select2({
				placeholder: "Select a district",
				allowClear: true
			});

			$(".vdc").select2({
				placeholder: "Select a vdc",
				allowClear: true
			});
		});
	</script>
	<div class="container">
		<div class="row" style="margin-top: 100px">
			<select class="district col-md-3 center-block" id="zone">
				<?php 
				while ($res = mysqli_fetch_assoc($result_zones)) {
					echo "<option value='".$res['name']."'>".$res['name']."</option>";
				}
				?>
			</select>
			<select class="district col-md-4 center-block" id="district">
				<?php 
				while ($res = mysqli_fetch_assoc($result_districts)) {
					echo "<option value='".$res['name']."'>".$res['name']."</option>";
				}
				?>
			</select>
			<select class="vdc col-md-4 center-block disabled" id="vdc">
				<?php 
				while ($res = mysqli_fetch_assoc($result_vdcs)) {
					echo "<option value='".$res['name']."'>".$res['name']."</option>";
				}
				?>
			</select>
		</div>
	</div>
	<script>
		$(document.body).on("change","#zone",function(){
			//console.log(this.value);
			$.ajax({
				dataType : 'json',
				async: false,
				url:'process.php?zone_id=' + this.value,
				complete: function (data) {
                    //var result = JSON.stringify(response.responseText);//parsing status from response received from php
                    console.log(data);
                }
               });
		});
	</script>
</body>
</html>