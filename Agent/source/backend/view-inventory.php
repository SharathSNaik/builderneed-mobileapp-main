<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['agent_id'];
$query = mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id = '$phone'");
$rows = mysqli_fetch_assoc($query);
$pid =  $rows['project_id'];
$querys = mysqli_query($connection, "SELECT * FROM bn_inventory WHERE project_id = '$pid'");
$count = mysqli_num_rows($querys);
$getinventory = array();
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($querys)) {
        $cid = $row['config_id'];
        $getconfig = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_configuration WHERE config_id = '$cid'"));
        $querydata = array("unit" => $row['unit_no'], "cname" => $getconfig['config_name'], "floor" => $row['floor'], "status" => $row['status']);
        array_push($getinventory, $querydata);
    }
    $data = array("status" => "OK", "data" => $getinventory);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
