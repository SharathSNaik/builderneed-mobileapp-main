<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['agent_id'];
$query = mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id = '$phone'");
$rows = mysqli_fetch_assoc($query);
$lid =  $rows['project_id'];
$agent =  $rows['name'];
$querys = mysqli_query($connection, "SELECT * FROM bn_reminders WHERE agent_id = '$phone'");
$count = mysqli_num_rows($querys);
$getsiteinfo = array();
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($querys)) {
        $lid = $row['lead_id'];
        $queryData = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leads WHERE lead_id = '$lid'"));
        $querydata = array("datatime" => $row['reminder_date_time'], "createdate" => $row['created_date'], "notes" => $row['Notes'], "reason" => $row['reason'], "vid" => $row['reminder_id'], "agent" => $agent, "lid" => $lid, "name" => $queryData['name'], "lphone" => $queryData['phone']);
        array_push($getsiteinfo, $querydata);
    }
    $data = array("status" => "OK", "data" => $getsiteinfo);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
