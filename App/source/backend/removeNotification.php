<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$querys = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phone'");
$rows = mysqli_fetch_assoc($querys);
$leadid = $rows['lead_id'];
$update = mysqli_query($connection, "UPDATE bn_notifications SET seen = 1 WHERE lead_id ='$leadid'");
if ($update) {
    $data = array("status" => "OK", "message" => "Data Updated");
} else {
    $data = array("status" => "error", "message" => "No data Updated");
}
echo json_encode($data);
