<?php
include '../access/connect.php';
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $add = $_POST['add'];
    $area = $_POST['area'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $log = $_POST['log'];
    $vlat = $_POST['vlat'];
    $vlon = $_POST['vlon'];
    $vurl = $_POST['vurl'];
    $pername = $_POST['pername'];
    $pnum = $_POST['pnum'];
    $count = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id=$pid"));
    if ($count >= 1) {
        echo '<script>alert(ID Exists, Please Try Again)</script>';
    } else {
        $sql = "INSERT INTO bn_project(builder_id,project_name,address,area,city,email,image_source,latitude,longitude,site_video,contact_person_mob_num,Contact_person_name) VALUES ('$pid','$pname','$add','$area','$city','$email','$log','$vlat','$vlon','$vurl','$pnum','$pername')";

        if (mysqli_query($connection, $sql)) {
            echo '<script>alert(Project Added)</script>';
        } else {
            echo '<script>alert(""ERROR: Hush! Sorry $sql' . mysqli_error($connection) . '")</script>';
        }
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
                <h3 class="card-title text-center">Add Project</h3>
                <div class="card-text">
                    <form method="post">
                        <div class="form-group">
                            <label>Project ID</label>
                            <input type="number" name="pid" class="form-control form-control-sm" placeholder="Enter Project ID">
                        </div>
                        <div class="form-group">
                            <label>Enter Project Name</label>
                            <input type="text" name="pname" class="form-control form-control" placeholder="Enter Project Name">
                        </div>
                        <div class="form-group">
                            <label>Enter Address</label>
                            <textarea type="text" name="add" class="form-control form-control-lg" placeholder="Enter Address"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Enter Project Area</label>
                            <input type="text" name="area" class="form-control form-control" placeholder="Enter Project Area">
                        </div>
                        <div class="form-group">
                            <label>Enter Project Contact Person Name</label>
                            <input type="text" name="pername" class="form-control form-control" placeholder="Enter Project Contact Person Name">
                        </div>
                        <div class="form-group">
                            <label>Enter Project Contact Person Number</label>
                            <input type="text" name="pnum" class="form-control form-control" placeholder="Enter Project Contact Person Number">
                        </div>
                        <div class="form-group">
                            <label>Enter Project City</label>
                            <input type="text" name="city" class="form-control form-control" placeholder="Enter Project City">
                        </div>
                        <div class="form-group">
                            <label>Enter Project Email</label>
                            <input type="email" name="email" class="form-control form-control" placeholder="Enter Project Email">
                        </div>
                        <div class="form-group">
                            <label>Enter Project LOGO url</label>
                            <input type="text" name="log" class="form-control form-control" placeholder="Enter Project LOGO url">
                        </div>
                        <div class="form-group">
                            <label>Enter Project Location Latitude</label>
                            <input type="text" name="vlat" class="form-control form-control" placeholder="Enter Project Location Latitude">
                        </div>
                        <div class="form-group">
                            <label>Enter Project Location Longitude</label>
                            <input type="text" name="vlon" class="form-control form-control" placeholder="Enter Project Location Longitude">
                        </div>
                        <div class="form-group">
                            <label>Enter Project Video URL</label>
                            <input type="text" name="vurl" class="form-control form-control" placeholder="Enter Project Video URL">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Add">
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="card login-form">
            <div class="card-body">
                <h3 class="card-title text-center">Check Listed Project IDS</h3>
                <div class="card-text">
                    <form>
                        <div class="form-group">
                            <label>Project ID</label>
                            <select class="form-control" onchange="getval(this);">
                                <option selected disabled>SELECT ID</option>
                                <?php
                                $query = mysqli_query($connection, "SELECT * FROM bn_project");
                                while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <option value="<?php echo $row['builder_id']; ?>"><?php echo $row['builder_id']; ?></option>
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

</html>
