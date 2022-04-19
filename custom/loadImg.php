<?php
include '../access/connect.php';
$pid = $_POST['pid'];
$query = mysqli_query($connection, "SELECT * FROM bn_img WHERE source_id = '$pid'");
$count = mysqli_num_rows($query);
$getimages = array();
if ($count >= 1) {
    $getll = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id = '$pid'"));

    while ($row = mysqli_fetch_assoc($query)) {
        $querydata = array("pname" => $getll['project_name'], "url" => $row['img_url'], "imgid" => $row['id']);
        array_push($getimages, $querydata);
    }
    $data = array("status" => "OK", "data" => $getimages);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
