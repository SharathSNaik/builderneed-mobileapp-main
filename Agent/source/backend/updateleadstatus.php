<?php
include_once '../../../access/connect.php';
$lid = $_POST['leadid'];
$sid = $_POST['statid'];
$update = mysqli_query($connection, "UPDATE bn_leads SET lead_status='$sid' WHERE lead_id='$lid'");
if ($update) {
    $data = array("status" => "OK", "message" => "Updated Succesfully");
} else {
    $data = array("status" => "error", "message" => "There Was an error while Updated, Try Again!");
}
echo json_encode($data);
