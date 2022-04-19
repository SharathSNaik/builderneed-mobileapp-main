<?php
include '../access/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Builder Need - ASSIGN FORM ID</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>
    <div class="global-container">
        <br>
        <div class="card login-form">
            <div class="card-body">
                <h3 class="card-title text-center">Assign Form ID</h3>
                <div class="card-text">
                    <form>
                        <div class="form-group">
                            <label>FORM ID</label>
                            <select class="form-control" onchange="getFid(this);">
                                <option selected disabled>SELECT ID</option>
                                <?php
                                $query = mysqli_query($connection, "SELECT * FROM bn_fb_lead WHERE fb_lead_form_id IS NOT NULL GROUP BY fb_lead_form_id");
                                while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <option value="<?php echo $row['fb_lead_form_id']; ?>"><?php echo $row['fb_lead_form_id']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Project ID</label>
                            <select class="form-control" onchange="getPid(this);">
                                <option selected disabled>SELECT ID</option>
                                <?php
                                $query = mysqli_query($connection, "SELECT * FROM bn_project");
                                while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <option value="<?php echo $row['project_id']; ?>"><?php echo $row['project_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <input type="button" name="submit" class="btn btn-primary btn-block" value="Assign Form ID" onclick="successApi();">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script>
    var fid = 0;
    var pid = 0;

    function getFid(e) {
        fid = $(e).val();
    }

    function getPid(e) {
        pid = $(e).val();
    }

    function successApi() {
        if (fid == 0 || pid == 0) {
            alert("Please select the id's")
        } else {
            $.ajax({
                type: "POST",
                url: "assignid.php",
                data: {
                    pid: pid,
                    fid: fid,
                },
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.status == "OK") {
                        alert("Assigned Successfully");
                    } else {
                        alert("Assignment Failed");
                    }
                },
            });
        }
    }
</script>

</html>