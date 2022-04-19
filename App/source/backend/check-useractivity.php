<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$row = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone='$phone'"));
$lid = $row['lead_id'];
$sid = $row['project_id'];
$aid = $row['agent_id'];
$pageSeen = $_POST['data'];
if ($pageSeen == '1') {
    $updateDataactivity = mysqli_query($connection, "UPDATE bn_user_activity SET check_property='1',agent_id='$aid' WHERE lead_id='$lid' AND pr_id=$sid");
    if ($updateDataactivity) {
        $data = array("status" => "ok");
    }
} else if ($pageSeen == '2') {
    $updateDataactivity = mysqli_query($connection, "UPDATE bn_user_activity SET check_amenities='1',agent_id='$aid' WHERE lead_id='$lid' AND pr_id=$sid");
    if ($updateDataactivity) {
        $data = array("status" => "ok");
    }
} else if ($pageSeen == '3') {
    $updateDataactivity = mysqli_query($connection, "UPDATE bn_user_activity SET check_configurations='1',agent_id='$aid' WHERE lead_id='$lid' AND pr_id=$sid");
    if ($updateDataactivity) {
        $data = array("status" => "ok");
    }
} else if ($pageSeen == '4') {
    $updateDataactivity = mysqli_query($connection, "UPDATE bn_user_activity SET check_nearby='1',agent_id='$aid' WHERE lead_id='$lid' AND pr_id=$sid");
    if ($updateDataactivity) {
        $data = array("status" => "ok");
    }
} else if ($pageSeen == '5') {
    $updateDataactivity = mysqli_query($connection, "UPDATE bn_user_activity SET check_vx='1',check_images='1',agent_id='$aid' WHERE lead_id='$lid' AND pr_id=$sid");
    if ($updateDataactivity) {
        $data = array("status" => "ok");
    }
} else if ($pageSeen == '7') {
    $updateDataactivity = mysqli_query($connection, "UPDATE bn_user_activity SET use_explore='1',agent_id='$aid' WHERE lead_id='$lid' AND pr_id=$sid");
    if ($updateDataactivity) {
        $data = array("status" => "ok");
    }
} else if ($pageSeen == '8') {
    $updateDataactivity = mysqli_query($connection, "UPDATE bn_user_activity SET book_siteVisit='1',agent_id='$aid' WHERE lead_id='$lid' AND pr_id=$sid");
    if ($updateDataactivity) {
        $data = array("status" => "ok");
    }
}
echo json_encode($data);
