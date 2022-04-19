<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$pid =  $_POST['pid'];
$QueryVerifyOTP = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone='$phone'");
$row = mysqli_fetch_assoc($QueryVerifyOTP);
$leadid = $row['lead_id'];
$sid = $row['project_id'];
$update = mysqli_query($connection, "UPDATE bn_leads SET builder_id='$pid' WHERE phone='$phone'");
if ($update) {
    $Useractivity = mysqli_query($connection, "SELECT * FROM bn_user_activity WHERE lead_id='$leadid' AND pr_id='$sid'");
    $uscount = mysqli_num_rows($Useractivity);
    if ($uscount > 0) {
    } else {
        $inserUseractivity = mysqli_query($connection, "INSERT INTO bn_user_activity (lead_id,first_login,pr_id)VALUES('$leadid','1','$sid')");
    }
    $data = array("status" => "OK", "message" => 'data updated');
} else {
    $data = array("status" => "OK", "data" => 'data failed');
}
echo json_encode($data);
