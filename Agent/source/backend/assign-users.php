<?php
include_once '../../../access/connect.php';
$lid = $_POST['lid'];
$sid = $_POST['sid'];
$query = mysqli_query($connection, "SELECT * FROM bn_leads WHERE lead_id = '$lid'");
$count = mysqli_num_rows($query);
if ($count > 0) {
    $query = mysqli_query($connection, "UPDATE bn_leads SET source_id = '$sid' WHERE lead_id = '$lid'");
    $data = array("status" => "OK", "message" => "Data Updated Successfully");
} else {
    $data = array("status" => "error", "message" => "There was an error");
}
echo json_encode($data);
