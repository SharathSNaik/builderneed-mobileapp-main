<?php
include_once '../../../access/connect.php';
session_start();
$aid = $_SESSION['agent_id'];
$query = mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id = '$aid'");
$row = mysqli_fetch_assoc($query);
$projid = $row['project_id'];
$querys = mysqli_query($connection, "SELECT * FROM bn_project WHERE project_id = '$projid'");
$rows = mysqli_fetch_assoc($querys);
$projname = $rows['project_name'];
$logoquery = mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id = '$projid'");
$logos = mysqli_fetch_assoc($logoquery);
$logo =  $logos['image_source'];
$data = array("status" => "OK", "projectID" => $projid, "project" => $projname, "logo" => $logo);
echo json_encode($data);
