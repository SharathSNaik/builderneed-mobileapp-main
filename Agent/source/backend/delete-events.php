<?php
include_once '../../../access/connect.php';
$vid = $_POST['vid'];
$data = "";
$mysqli = mysqli_query($connection, "UPDATE bn_site_visit_info SET meetingstatus='5' WHERE visit_id = '$vid'");
if ($mysqli) {
    $data = array("status" => "OK", "message" => "Your Scheduled Event Canceled Successfully");
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
