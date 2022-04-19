<?php
include_once '../../../access/connect.php';
session_start();
$rid =  $_POST['rid'];
$querys = mysqli_query($connection, "SELECT * FROM bn_reminders WHERE reminder_id = '$rid'");
$count = mysqli_num_rows($querys);
if ($count > 0) {
    $row = mysqli_fetch_assoc($querys);
    $data = array("status" => "OK", "datatime" => $row['reminder_date_time'], "createdate" => $row['created_date'], "notes" => $row['Notes'], "reason" => $row['reason'], "title" => $row['title'], "vid" => $row['reminder_id']);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
