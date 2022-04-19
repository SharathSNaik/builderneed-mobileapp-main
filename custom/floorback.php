<?php
include_once 'access/connect.php';
$sid =  $_POST['pid'];
$query = mysqli_query($connection, "SELECT * FROM bn_floorplan WHERE pr_id='$sid'");
$getconfig = array();
$i = 0;
$count = mysqli_num_rows($query);
if ($count >= 1) {
    while ($crow = mysqli_fetch_assoc($query)) {
        $querydata = array("title" => $crow['fp_title'], "desc" => $crow['fp_images'], "ulclass" => $i++);
        array_push($getconfig, $querydata);
    }
    $data = array("status" => "OK", "pid" => $sid, "data" => $getconfig);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
