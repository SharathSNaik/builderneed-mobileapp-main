<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$query = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phone'");
$rows = mysqli_fetch_assoc($query);
$lid =  $rows['lead_id'];
$agent =  $rows['agent_id'];
$querys = mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE lp_id = '$lid'");
$count = mysqli_num_rows($querys);
$getsiteinfo = array();
if ($count > 0) {
    $agent = $rows['agent_id'];
    if ($agent == null || $agent == 0) {
        $agentname = "Not Assigned";
    } else {
        $aquery = mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id = '$agent'");
        $arow = mysqli_fetch_assoc($aquery);
        $agentname = $arow['name'];
        $aquery = mysqli_query($connection, "UPDATE bn_site_visit_info SET agent = '$agent' WHERE lp_id='$lid'");
    }
    while ($row = mysqli_fetch_assoc($querys)) {
        $querydata = array("datatime" => $row['visit_date'], "createdate" => $row['created_date'], "mode" => $row['requested_mode'], "agent" => $agentname, "vid" => $row['visit_id'], "canceled" => $row['meetingstatus'], "url" => $row['url']);
        array_push($getsiteinfo, $querydata);
    }
    $data = array("status" => "OK", "data" => $getsiteinfo);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
