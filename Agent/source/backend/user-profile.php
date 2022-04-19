<?php
include_once '../../../access/connect.php';
session_start();
error_reporting(true);
$aid = $_SESSION['agent_id'];
$lid = $_POST['match'];
$getsrc = mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id='$aid'");
$rowagent = mysqli_fetch_assoc($getsrc);
$count = $rowagent['user_role'];
$getsid = $rowagent['project_id'];
$manager = $rowagent['user_role'];
$leadquery = mysqli_query($connection, "SELECT * FROM bn_leads WHERE lead_id='$lid'");
$count = mysqli_num_rows($leadquery);
if ($count > 0) {
    //AGENTS
    $agentassigned = array();
    $agentsalesassigned = array();
    $row = mysqli_fetch_assoc($leadquery);
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
    if ($perquerys) {
        foreach ($perquerys as $value) {
            $datas += $value;
        }
    }
    $arrayfortable = array("percentage" => ceil($datas / 9 * 100), "name" => $row['name'], "lid" => $row['lead_id'], "agentassn" => $agentnames, "project" => $row['project_id'], "phone" => $row['phone'], "email" => $row['email'], "status" => $row['lead_status'], "updated" => $row['updated_at']);
    array_push($agentassigned, $arrayfortable);

    $data = array("status" => "OK", 'data' => $agentassigned, 'agent_role' => $manager);
} else {
    $data = array("status" => "KO", 'message' => "No data Available");
}
echo json_encode($data);
