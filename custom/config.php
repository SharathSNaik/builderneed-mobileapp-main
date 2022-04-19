<?php
include '../access/connect.php';
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
	$pid = $_POST['pid'];
	$ct = $_POST['ct'];
	$cd = $_POST['cd'];

	$sql = "INSERT INTO bn_config(config_pr_id,config_title,config_desc) VALUES ('$pid','$ct','$cd')";

	if (mysqli_query($connection, $sql)) {
		echo '<script>alert("Added")</script>';
	} else {
		echo '<script>alert(""ERROR: Hush! Sorry $sql' . mysqli_error($connection) . '")</script>';
	}
	// Close connection
	mysqli_close($connection);
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Builder Need - Configuration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' href='../assets/style.css'>

</head>

<body>
	<div class="global-container">
		<div class="card login-form">
			<div class="card-body">
				<h3 class="card-title text-center">Add Configuration</h3>
				<div class="card-text">
					<form method="post">
						<div class="form-group">
							<label>Project ID</label>
							<input type="number" name="pid" class="form-control form-control-sm" placeholder="Enter Project ID">
						</div>
						<div class="form-group">
							<label>Enter title</label>
							<input type="text" name="ct" class="form-control form-control" placeholder="Enter title of Configuration">
						</div>
						<div class="form-group">
							<label>Enter Description</label>
							<textarea type="text" name="cd" class="form-control form-control-lg" placeholder="Enter desc of Configuration with $ seperated value ex :one.$two.$Three."></textarea>
						</div>
						<input type="submit" name="submit" class="btn btn-primary btn-block" value="Add">
					</form>
				</div>
			</div>
		</div>
		<br>
		<div class="card login-form">
			<div class="card-body">
				<h3 class="card-title text-center">Check Data</h3>
				<div class="card-text">
					<form>
						<div class="form-group">
							<label>Project ID</label>
							<select class="form-control" onchange="getval(this);">
							<option selected disabled>SELECT ID</option>
								<?php
								$query = mysqli_query($connection, "SELECT * FROM bn_project");
								while ($row = mysqli_fetch_assoc($query)) { ?>
									<option value="<?php echo $row['project_id']; ?>"><?php echo $row['project_id']; ?></option>
								<?php } ?>
							</select>
						</div>
						<br>
						<div class="form-group">
							<div class="accordion amen" id="accordionExample">

							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script>
	function getval(e) {
		$('.amen').empty();
		var pid = $(e).val();
		$.ajax({
			type: "POST",
			url: "conback.php",
			data: {
				pid: pid,
			},
			success: function(response) {
				var jsonData = JSON.parse(response);
				if (jsonData.status == "OK") {
					var icons = "";
					var style = "";
					for (var i = 0; i < jsonData.data.length; i++) {
						var arrayofdesc = jsonData.data[i].desc;
						1;
						var liarray = arrayofdesc.split("$");
						for (var e = 0; e < liarray.length; e++) {
							if (liarray[e] == "") {
								icons = "";
								style = "style='pointer-events:none;'";
							} else {
								style = "";
								icons = "fa-chevron-down";
							}
						}
						$(".amen").append(
							'<div class="card ' + style + '"><div class="card-header" id="aheading' +
							i +
							'" data-toggle="collapse" data-target="#collapse' +
							i +
							'" aria-expanded="true" aria-controls="collapse' +
							i +
							'"><button class="btn text-dark drpdownfea" style="font-size:12px;" type="button">' +
							jsonData.data[i].title.toUpperCase() +
							'</button><span style="float: right; color:black; padding-top: 5px;"><i class="faicon fa ' +
							icons +
							'"></i></span></div><div id="collapse' +
							i +
							'" class="collapse" aria-labelledby="heading' +
							i +
							'" data-parent="#accordionExample"><div class="card-body font-weight-bold"><div class="row no-gutters staircase"><div class="col"><div class="card-block px-2"><ul class="entry-content ul' +
							jsonData.data[i].ulclass +
							'" style="list-style-type: circle; color:black;"></ul></div></div></div></div></div></div>'
						);
						for (var e = 0; e < liarray.length; e++) {
							$(".ul" + jsonData.data[i].ulclass).append(
								"<li>" + liarray[e] + "</li>"
							);
						}
					}
				} else {
					$('.amen').empty();
					alert("No data found");
				}
			},
		});
	}
</script>

</html>