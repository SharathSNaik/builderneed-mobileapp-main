<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$row = mysqli_fetch_assoc(mysqli_query($connection, "SELECT project_id FROM bn_leads WHERE phone='$phone'"));
$pid = $row['project_id'];
$query = mysqli_query($connection, "SELECT fp_id,fp_title FROM bn_floorplan WHERE pr_id='$pid'");
$getftitle = array();
$count = mysqli_num_rows($query);
if ($count >= 1) {
    while ($crow = mysqli_fetch_assoc($query)) {
        $querydata = array("title" => $crow['fp_title'], "fid" => $crow['fp_id']);
        array_push($getftitle, $querydata);
    }
    $data = array("status" => "OK", "pid" => $pid, "data" => $getftitle);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
