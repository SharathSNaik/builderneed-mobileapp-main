<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$querys = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phone'");
$rows = mysqli_fetch_assoc($querys);
$sid =  $rows['project_id'];
$aid =  $rows['agent_id'];
$agentnum = "";
$agentdetails = mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id = '$aid'");
$c = mysqli_num_rows($agentdetails);
if ($c > 0) {
    $agentrow = mysqli_fetch_assoc($agentdetails);
    $agentnum = $agentrow['bn_ag_phone'];
} else {
    $managerdetails = mysqli_query($connection, "SELECT * FROM bn_agents WHERE project_id = '$sid' AND user_role = '1'");
    $coun = mysqli_num_rows($managerdetails);
    if ($coun > 0) {
        $manrow = mysqli_fetch_assoc($managerdetails);
        $agentnum = $manrow['bn_ag_phone'];
    }
}
$query = mysqli_query($connection, "SELECT * FROM bn_img WHERE source_id = '$sid'");
$count = mysqli_num_rows($query);
$getimages = array();
if ($count >= 1) {
    $getll = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id = '$sid'"));

    while ($row = mysqli_fetch_assoc($query)) {
        $querydata = array("image" => $row['img_url'], "img_desc" => $row['img_desc']);
        array_push($getimages, $querydata);
    }
    $logoquery = mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id = '$sid'");
    $logos = mysqli_fetch_assoc($logoquery);
    $logo =  $logos['image_source'];
    $data = array("status" => "OK", "logo" => $logo, "pid" => $sid, "data_img" => $getimages, "agentnum" => $agentnum, "lat" => $getll['latitude'], "long" => $getll['longitude']);
} else {
    $data = array("status" => "error", "message" => "No data Found", "wa" => $agentnum);
}
echo json_encode($data);
