<?php
include '../access/connect.php';
$pid = $_POST['pid'];
$fid = $_POST['fid'];

$sql = "UPDATE bn_fb_lead SET fb_pr_id='$pid' WHERE fb_lead_form_id='$fid'";

if (mysqli_query($connection, $sql)) {
    $data = array("status" => "OK");
} else {
    $data = array("status" => "KO");
}
echo json_encode($data);
