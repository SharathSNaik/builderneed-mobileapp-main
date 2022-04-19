<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$row = mysqli_fetch_assoc(mysqli_query($connection, "SELECT lead_id FROM bn_leads WHERE phone='$phone'"));
$lid = $row['lead_id'];
$query = mysqli_query($connection, "SELECT * FROM bn_lead_project_mapping WHERE lead_id='$lid'");
$getproj = array();
$count = mysqli_num_rows($query);
if ($count >= 1) {
    while ($row = mysqli_fetch_assoc($query)) {
        $prid  = $row['project_id'];
        $getimage = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id='$prid'"));
        $img = $getimage['image_source'];
        $prname = $getimage['project_name'];
        $querydata = array("prname" => $prname, "prid" => $prid, 'primg' => $img);
        array_push($getproj, $querydata);
    }
    $data = array("status" => "OK", "data" => $getproj);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
