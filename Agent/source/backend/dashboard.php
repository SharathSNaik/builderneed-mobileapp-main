<?php
include_once '../../../access/connect.php';
session_start();
$aid = $_SESSION['agent_id'];
$getsrc = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id='$aid'"));
$count = $getsrc['user_role'];
$getsid = $getsrc['project_id'];
if ($count >= 1) {
    $leadquery = mysqli_query($connection, "SELECT * FROM bn_leads WHERE project_id='$getsid' ORDER BY agent_id IS NULL DESC");
    $leadCount = mysqli_num_rows($leadquery);
} else {
    $leadquerys = mysqli_query($connection, "SELECT * FROM bn_leads");
    $leadCount = mysqli_num_rows($leadquerys);
}
if ($count > 0) {
    //HOTLEAD
    $hlquery = mysqli_query($connection, "SELECT * FROM bn_leads WHERE project_id='$getsid' AND lead_status='6'");
    $hlcount = mysqli_num_rows($hlquery);
    //SITEVISIT
    $eventquery = mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE sr_id='$getsid' AND agent=$aid");
    $eventCount = mysqli_num_rows($eventquery);
    //SITEVISIT / Agent
    $agquery = mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE sr_id='$getsid' AND agent='$aid'");
    $agsite = mysqli_num_rows($eventquery);
    //Remninders
    $remQuery = mysqli_query($connection, "SELECT * FROM bn_reminders WHERE agent_id='$aid'");
    $remin = mysqli_num_rows($remQuery);
    //AGENTS
    $agentquery = mysqli_query($connection, "SELECT * FROM bn_agents WHERE project_id='$getsid'");
    $agentCount = mysqli_num_rows($agentquery);
    //LEADS Completed
    $mtquery = mysqli_query($connection, "SELECT * FROM bn_leads WHERE agent_id='$aid' AND lead_status='4'");
    $mtcount = mysqli_num_rows($mtquery);
    //Inventory
    $inquery = mysqli_query($connection, "SELECT * FROM bn_leads WHERE project_id='$getsid' AND lead_status='7'");
    $inventory = mysqli_num_rows($inquery);
    //UNASSIGNED
    $unAssignedQuery = mysqli_query($connection, "SELECT * FROM bn_leads WHERE project_id='$getsid' AND agent_id='' or agent_id IS NULL");
    $unAssignedCount = mysqli_num_rows($unAssignedQuery);
} else {
    //HOTLEAD
    $hlquery = mysqli_query($connection, "SELECT * FROM bn_leads WHERE project_id='$getsid' AND lead_status='6' AND agent_id=$aid");
    $hlcount = mysqli_num_rows($hlquery);
    //SITEVISIT
    $eventquery = mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE sr_id='$getsid' AND agent=$aid");
    $eventCount = mysqli_num_rows($eventquery);
    //SITEVISIT / Agent
    $agquery = mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE sr_id='$getsid' AND agent='$aid'");
    $agsite = mysqli_num_rows($eventquery);
    //Remninders
    $remQuery = mysqli_query($connection, "SELECT * FROM bn_reminders WHERE agent_id='$aid'");
    $remin = mysqli_num_rows($remQuery);
    //AGENTS
    $agentquery = mysqli_query($connection, "SELECT * FROM bn_agents WHERE project_id='$getsid'");
    $agentCount = mysqli_num_rows($agentquery);
    //LEADS Completed
    $mtquery = mysqli_query($connection, "SELECT * FROM bn_leads WHERE agent_id='$aid' AND lead_status='4'");
    $mtcount = mysqli_num_rows($mtquery);
    //Inventory
    $inquery = mysqli_query($connection, "SELECT * FROM bn_leads WHERE project_id='$getsid' AND lead_status='7' AND agent_id=$aid");
    $inventory = mysqli_num_rows($inquery);
    //UNASSIGNED
    $unAssignedQuery = mysqli_query($connection, "SELECT * FROM bn_leads WHERE project_id='$getsid' AND agent_id='' or agent_id IS NULL");
    $unAssignedCount = mysqli_num_rows($unAssignedQuery);
}
$data = array("status" => "OK", "mtb" => $mtcount, "hlead" => $hlcount, "leadCount" => $leadCount, 'agentCount' => $agentCount, "eventCount" => $eventCount, "unAssignedCount" => $unAssignedCount, "agentsRegistered" => $agentCount, 'invent' => $inventory, 'agsite' => $agsite, 'remin' => $remin);
echo json_encode($data);
