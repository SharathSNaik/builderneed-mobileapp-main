<?php
include 'access/connect.php';
if (isset($_POST['submit'])) {
	$pid = $_POST['pid'];
	$ct = $_POST['ct'];
	$cd = $_POST['cd'];

	$sql = "INSERT INTO bn_amenity (amen_pr_id,amen_title,amen_desc) VALUES ('$pid','$ct','$cd')";

	if (mysqli_query($connection, $sql)) {
		echo '<script>alert("Added")</script>';
	} else {
		echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
	}
	// Close connection
	mysqli_close($conn);
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Builder Need - Amenities</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' href='../assets/style.css'>
</head>

<body>
	<div class="global-container">
		<br>
		<div class="card login-form">
			<div class="card-body">
				<h3 class="card-title text-center">Check Data</h3>
				<div class="card-text">
					<form>
						<div class="form-group">
							<label>Leads</label>
							<select class="form-control" id="leaddata">
								<option selected disabled>SELECT LEAD</option>
								<?php
								$query = mysqli_query($connection, "SELECT * FROM bn_leads");
								while ($row = mysqli_fetch_assoc($query)) { ?>
									<option value="<?php echo $row['lead_id']; ?>"><?php echo "ID " . $row['lead_id'] . "-" . $row['name'] . "-" . $row['phone']; ?></option>
								<?php } ?>
							</select>
						</div>
						<br>
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
						<div class="form-group">
							<div class="amen" id="accordionExample">

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
		var lid = $("#leaddata").val();
		var pid = $(e).val();
		$.ajax({
			type: "POST",
			url: "prset.php",
			data: {
				pid: pid,
				lid: lid,
			},
			success: function(response) {
				var jsonData = JSON.parse(response);
				if (jsonData.status == "OK") {
					alert(jsonData.message);
				} else {
					alert(jsonData.message);
				}
			},
		});
	}
</script>

</html>