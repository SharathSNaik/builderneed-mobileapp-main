<?php
include_once '../../../access/connect.php';
session_start();
$getVisitID = $_POST['getVisitID'];
$phone =  $_SESSION['phone'];
$getdatetime =  $_POST['getdatetime'];
$getmode =  $_POST['getmode'];
$status =  "0";
$currentdate = date('Y-m-d H:i:s');
$data = "";
$query = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phone'");
$row = mysqli_fetch_assoc($query);
$lid =  $row['lead_id'];
$srid =  $row['project_id'];
$count = mysqli_num_rows($query);
if ($getVisitID) {
    if ($count == 1) {
        if ($getmode == "Virtual") {
            $email = $_POST['email_v'];
            $number = $_POST['phone_v'];
            $sourceevent = $_POST['sourceevent'];
        } else {
            $email = "Physical";
            $number = "Physical";
            $sourceevent = "Physical";
        }
        $queryEvent = mysqli_query($connection, "UPDATE bn_site_visit_info SET visit_date='$getdatetime',requested_mode='$getmode',created_date='$currentdate',email='$email',phone='$number',meetingstatus='$status',visit_source='$sourceevent'  WHERE visit_id='$getVisitID'");
        if ($queryEvent) {
            $data = array("status" => "OK", "message" => "Your Event Re-Scheduled");
        } else {
            $data = array("status" => "KO", "message" => "There was an error, while Re-scheduling!".mysqli_error($connection));
        }
    } else {
        $data = array("status" => "KO", "message" => "There was an error!");
    }
} else {
    $data = array("status" => "KO", "message" => "There was an error!");
    if ($count == 1) {
        if ($getmode == "Virtual") {
            $email = $_POST['email_v'];
            $number = $_POST['phone_v'];
            $sourceevent = $_POST['sourceevent'];
        } else {
            $email = "Physical";
            $number = "Physical";
            $sourceevent = "Physical";
        }

        $queryEvent = mysqli_query($connection, "INSERT INTO bn_site_visit_info (lp_id,visit_date,created_date,requested_mode,email,phone,meetingstatus,visit_source,sr_id)VALUES('$lid','$getdatetime','$currentdate','$getmode','$email','$number','$status','$sourceevent','$srid')");
        if ($queryEvent) {
            $data = array("status" => "OK", "message" => "Your Event Scheduled");
        } else {
            $data = array("status" => "KO", "message" => "There was an error, while scheduling!");
        }
    } else {
        $data = array("status" => "KO", "message" => "There was an error!");
    }
}

echo json_encode($data);
