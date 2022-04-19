<?php
include_once '../../../access/connect.php';
session_start();
$phone = $_SESSION['phone'];
$getpid = mysqli_fetch_assoc(mysqli_query($connection, "SELECT lead_id FROM bn_leads WHERE phone='$phone'"));
$lid = $getpid['lead_id'];
$timer =  $_POST['timr'];
$fpid =  $_POST['fpid'];
$data = 0;

$query = mysqli_query($connection, "SELECT * FROM bn_fp_activity WHERE lead_id='$lid' AND fp_id='$fpid'");
$count = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
if ($count > 0) {
    $timerdata = $timer + $row['timer'];
    $update = mysqli_query($connection, "UPDATE bn_fp_activity SET timer = $timerdata  WHERE lead_id ='$lid' AND fp_id = '$fpid'");
    if ($update) {
        $data = array("status" => "OK", "message" => "Data Updated");
    } else {
        $data = array("status" => "error", "message" => "No data Updated".mysqli_error($connection));
    }
} else {
    $insert = mysqli_query($connection, "INSERT INTO bn_fp_activity (timer,lead_id,fp_id)VALUES('$timer','$lid','$fpid')");
    if ($insert) {
        $data = array("status" => "OK", "message" => "Data Inserted");
    } else {
        $data = array("status" => "error", "message" => "No data Inserted".mysqli_error($connection));
    }
}
echo json_encode($data);
