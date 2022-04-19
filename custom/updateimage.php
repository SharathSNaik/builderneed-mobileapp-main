<?php
include '../access/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Builder Need - ASSIGN SITE IMAGE</title>
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
                        <div class="form-group">
                            <label>Enter Image url</label>
                            <input type="link" placeholder="Enter image url" class="ytLink form-control" />
                        </div>
                        <br>
                        <input type="button" name="submit" class="btn btn-primary btn-block" value="Assign Form ID" onclick="successApi();">
                    </form>
                </div>
            </div>
        </div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class='text-center'>Project</th>
                    <th scope="col" class='text-center'>Image</th>
                    <th scope="col" class='text-center'>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</body>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script>
    var pid = 0;
    $('table').hide();

    function getPid(e) {
        pid = $(e).val();
        loadImg(pid);
    }

    function successApi() {
        var link = $('.ytLink').val();
        if (pid == 0) {
            alert("Please select the id's")
        } else {
            $.ajax({
                type: "POST",
                url: "assignimg.php",
                data: {
                    pid: pid,
                    link: link,
                },
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.status == "OK") {
                        alert("Assigned Successfully");
                        loadImg(pid);
                    } else {
                        alert("Assignment Failed");
                    }
                },
            });
        }
    }

    function loadImg(pid) {
        $('table').show();
        $.ajax({
            type: "POST",
            url: "loadImg.php",
            data: {
                pid: pid,
            },
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.status == "OK") {
                    $('tbody').empty();
                    for (var i = 0; i < jsonData.data.length; i++) {
                        $('tbody').append("<tr><th class='text-center'>" + jsonData.data[i].pname + "</th><td class='text-center'><img src=" + jsonData.data[i].url + " height='50' width='50'/></td><td class='text-center'><button type='button' onclick=deleteImg(" + jsonData.data[i].imgid + "); class='btn btn-danger text-center')>Delete</button></td></tr>");
                    }
                } else {
                    $('tbody').empty();
                    $('tbody').append("<tr><td colspan='3' class='text-center'>NO DATA FOUND</td></tr>");
                }
            },
        });
    }

    function deleteImg(imid) {
        $.ajax({
            type: "POST",
            url: "delImg.php",
            data: {
                pid: imid,
            },
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.status == "OK") {
                    alert("Deleted Successfully");
                    loadImg(pid);
                } else {
                    alert("Deletion Failed");

                }
            },
        });
    }
</script>

</html>