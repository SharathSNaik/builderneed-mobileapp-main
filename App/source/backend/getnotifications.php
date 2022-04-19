<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$querys = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phone'");
$rows = mysqli_fetch_assoc($querys);
$leadid = $rows['lead_id'];
$getnotification = array();
$dataseen = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_notifications WHERE lead_id = '$leadid' AND seen='0'"));
$queryNotification = mysqli_query($connection, "SELECT * FROM bn_notifications WHERE lead_id = '$leadid'");
$count = mysqli_num_rows($queryNotification);
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($queryNotification)) {
        $querydata = array("title" => $row['title'], "body" => $row['body'], "date" => $row['n_data']);
        array_push($getnotification, $querydata);
    }
    $data = array("status" => "OK", "data" => $getnotification, "count" => $dataseen);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
