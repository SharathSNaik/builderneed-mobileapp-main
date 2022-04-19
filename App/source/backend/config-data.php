<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$row = mysqli_fetch_assoc(mysqli_query($connection, "SELECT project_id FROM bn_leads WHERE phone='$phone'"));
$sid = $row['project_id'];
$query = mysqli_query($connection, "SELECT * FROM bn_config WHERE config_pr_id='$sid'");
$getconfig = array();
$i = 0;
$count = mysqli_num_rows($query);
if ($count >= 1) {
    while ($crow = mysqli_fetch_assoc($query)) {
        $querydata = array("title" => $crow['config_title'], "desc" => $crow['config_desc'], "ulclass" => $i++);
        array_push($getconfig, $querydata);
    }
    $data = array("status" => "OK", "pid" => $sid, "data" => $getconfig);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
