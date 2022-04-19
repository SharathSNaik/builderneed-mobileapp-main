<?php
include_once '../access/connect.php';
$pid =  $_POST['pid'];
$lid =  $_POST['lid'];

$query = mysqli_query($connection, "UPDATE bn_leads SET project_id='$pid' WHERE lead_id='$lid'");
if ($query) {
    $data = array("status" => "OK", "message" => "Updated");
} else {
    $data = array("status" => "KO", "message" => "Not updated");
}
echo json_encode($data);
