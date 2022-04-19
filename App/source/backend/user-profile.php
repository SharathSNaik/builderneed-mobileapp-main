<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$data = "";
$query = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phone'");
$count = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
if ($count == 1) {
    $name = $row['name'];
    $pid = $row['project_id'];
    $pquery = mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id = '$pid'");
    $prow = mysqli_fetch_assoc($pquery);
    $pname = $prow['project_name'];
    $phone = $row['phone'];
    $email = $row['email'];
    $agent = $row['agent_id'];
    $img = $row['profile_pic'];
    $sitelogo = $prow['image_source'];
    if ($agent == null || $agent == 0) {
        $agentname = "Not Assigned";
    } else {
        $aquery = mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id = '$agent'");
        $arow = mysqli_fetch_assoc($aquery);
        $agentname = $arow['name'];
    }
    $data = array("status" => "OK", "name" => $name, "phone" => $phone, "email" => $email, "aname" => $agentname, "pname" => $pname, "img" => $img, "slogo" => $sitelogo, 'pid' => $pid);
} else {
    $data = array("status" => "KO", "There was an error!");
}

echo json_encode($data);
