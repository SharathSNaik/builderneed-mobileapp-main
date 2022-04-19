<?php
include_once '../../../access/connect.php';
session_start();
$lid =  $_POST['lid'];
$querys = mysqli_query($connection, "SELECT * FROM bn_reminders WHERE lead_id = '$lid'");
$count = mysqli_num_rows($querys);
$getsiteinfo = array();
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($querys)) {
        $querydata = array("datatime" => $row['reminder_date_time'], "createdate" => $row['created_date'], "notes" => $row['Notes'], "reason" => $row['reason'], "title" => $row['title'], "vid" => $row['reminder_id'], "lid" => $row['lead_id']);
        array_push($getsiteinfo, $querydata);
    }
    $data = array("status" => "OK", "data" => $getsiteinfo);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
