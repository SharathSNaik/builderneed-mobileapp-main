<?php
include_once '../../../access/connect.php';
session_start();
error_reporting(false);
$aid = $_SESSION['agent_id'];
$limit = "";
if (isset($_GET['lead'])) {
    $limit = "ORDER BY lead_id DESC";
} else {
    $limit = "AND lead_status!=5 Order by lead_id desc LIMIT 3";
}
$getsrc = mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id='$aid'");
$rowagent = mysqli_fetch_assoc($getsrc);
$count = $rowagent['user_role'];
$getsid = $rowagent['project_id'];
$manager = $rowagent['user_role'];
if ($count >= 1) {
    $limit = "ORDER BY lead_id DESC";
    $leadquery = mysqli_query($connection, "SELECT * FROM bn_leads WHERE project_id='$getsid' $limit ");
} else {
    $leadquery = mysqli_query($connection, "SELECT * FROM bn_leads Order by lead_id desc");
}
//AGENTS
$agentassigned = array();
$agentsalesassigned = array();
while ($row = mysqli_fetch_assoc($leadquery)) {
    $agid = $row['agent_id'];
    $agentid = mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id='$agid' AND project_id='$getsid'");
    $rowag = mysqli_fetch_assoc($agentid);
    if (isset($rowag['name'])) {
        $agentnames = $rowag['name'];
    } else {
        $agentnames = "";
    }
    if ($agentnames == null || $agentnames == '') {
        $agentnames = 'Not Defined';
    } else {
        $agentnames = $rowag['name'];
    }
    $datas = 0;
    $lid = $row['lead_id'];
    $pid = $row['project_id'];
    $perquery = mysqli_query($connection, "SELECT check_property,check_amenities,check_configurations,check_nearby,check_vx,check_images,use_explore,book_siteVisit,read_blog FROM bn_user_activity WHERE lead_id = '$lid' AND pr_id='$pid'");
    $perquerys = mysqli_fetch_assoc($perquery);
    foreach ($perquerys as $value) {
        $datas += $value;
    }
    $p_id = $row['project_id'];
    $pnamedata = mysqli_fetch_assoc(mysqli_query($connection, "SELECT project_name FROM bn_project WHERE builder_id='$p_id'"));
    $arrayfortable = array("percentage" => ceil($datas / 9 * 100), "name" => $row['name'], "lid" => $row['lead_id'], "agentassn" => $agentnames, "project" => $row['project_id'], "phone" => $row['phone'], "email" => $row['email'], "status" => $row['lead_status'], "pnamedata" => $pnamedata['project_name']);
    array_push($agentassigned, $arrayfortable);
}

if ($manager == 1) {
    $agentsalequery = mysqli_query($connection, "SELECT * FROM bn_agents WHERE user_role='0' AND project_id='$getsid'");
    while ($rowsalesagent = mysqli_fetch_assoc($agentsalequery)) {
        $arrayforsaletable = array("name" => $rowsalesagent['name'], "agentid" => $rowsalesagent['agent_id']);
        array_push($agentsalesassigned, $arrayforsaletable);
    }
}

$data = array("status" => "OK", 'data' => $agentassigned, 'agent_role' => $manager, "datasales" => $agentsalesassigned);
echo json_encode($data);
