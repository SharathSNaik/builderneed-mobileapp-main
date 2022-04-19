<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['agent_id'];
$query = mysqli_query($connection, "SELECT * FROM bn_leads WHERE agent_id = '$phone'");
$rows = mysqli_fetch_assoc($query);
$getc = mysqli_num_rows($query);
if ($getc > 0) {
    $lid =  $rows['lead_id'];
    $pid =  $rows['project_id'];
    $agent =  $rows['agent_id'];
    $querys = mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE agent = '$phone' ORDER BY visit_date DESC");
    $count = mysqli_num_rows($querys);
    $getsiteinfo = array();
    if ($count > 0) {
        if ($agent == null || $agent == 0) {
            $agentname = "Not Assigned";
        } else {
            $aquery = mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id = '$agent'");
            $arow = mysqli_fetch_assoc($aquery);
            $agentname = $arow['name'];
            $aquery = mysqli_query($connection, "UPDATE bn_site_visit_info SET agent = '$agentname' WHERE lp_id='$lid'");
        }
        while ($row = mysqli_fetch_assoc($querys)) {
            $leadidName =  $row['lp_id'];
            $lquery = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leads WHERE lead_id='$leadidName'"));
            $querydata = array("datatime" => $row['visit_date'], "createdate" => $row['created_date'], "mode" => $row['requested_mode'], "agent" => $agentname, "usname" => $lquery['name'], "vid" => $row['visit_id'], "canceled" => $row['meetingstatus'], "url" => $row['url'], "source" => $row['visit_source'], "pid" => $pid, "lid" => $leadidName);
            array_push($getsiteinfo, $querydata);
        }
        $data = array("status" => "OK", "data" => $getsiteinfo);
    } else {
        $data = array("status" => "error", "message" => "No data Found");
    }
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
