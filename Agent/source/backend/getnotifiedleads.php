<?php
include_once '../../../access/connect.php';
session_start();
$id = $_SESSION['agent_id'];
$query = mysqli_query($connection, "SELECT * FROM bn_leadnotification GROUP BY pn_userid HAVING COUNT(*)>1");
$getptid = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id='$id'"));
$getapid = $getptid['project_id'];
$getlead = array();
$count = mysqli_num_rows($query);
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $lid = $row['pn_userid'];
        $role = $row['pn_userrole'];
        if ($role == '1') {
            $userdata = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leads WHERE lead_id='$lid'"));
            $getuspid = $userdata['project_id'];
            if ($getapid === $getuspid) {
                $querydata = array("leadname" => $userdata['name'], "lid" => $row['pn_userid'], "token" => $row['pn_token']);
                array_push($getlead, $querydata);
            } else {
                //Do  nothing
            }
        }
    }
    $data = array("status" => "OK", "data" => $getlead);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
