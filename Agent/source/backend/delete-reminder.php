<?php
include_once '../../../access/connect.php';
$rid = $_POST['vid'];
$data = "";
$mysqli = mysqli_query($connection, "DELETE FROM bn_reminders WHERE reminder_id = '$rid'");
if ($mysqli) {
    $data = array("status" => "OK", "message" => "Your Scheduled Event Canceled Successfully");
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
