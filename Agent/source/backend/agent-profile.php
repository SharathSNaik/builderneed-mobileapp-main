<?php
include_once '../../../access/connect.php';
session_start();
$id =  $_SESSION['agent_id'];
$data = "";
$query = mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id = '$id'");
$count = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
if ($count == 1) {
    $name = $row['name'];
    $pid = $row['project_id'];
    $pquery = mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id = '$pid'");
    $prow = mysqli_fetch_assoc($pquery);
    $logo =  $prow['image_source'];
    $pname = $prow['project_name'];
    $phone = $row['bn_ag_phone'];
    $email = $row['email'];
    $agent = $row['agent_id'];
    $data = array("status" => "OK", "name" => $name, "phone" => $phone, "email" => $email, "aname" => $agent, "pname" => $pname,"logo" => $logo);
} else {
    $data = array("status" => "KO", "There was an error!");
}

echo json_encode($data);
