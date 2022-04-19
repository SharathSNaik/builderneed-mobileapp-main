<?php
include_once '../../../access/connect.php';
session_start();
$phone = $_SESSION['phone'];
$getpid = mysqli_fetch_assoc(mysqli_query($connection, "SELECT project_id,lead_id FROM bn_leads WHERE phone='$phone'"));
$prid = $getpid['project_id'];
$lid = $getpid['lead_id'];
$fid =  $_POST['fid'];
$query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT fp_images,fp_desc FROM bn_floorplan WHERE fp_id='$fid'"));
if ($query) {
    $getfpdata =  mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_user_activity WHERE pr_id='$prid' AND lead_id='$lid'"));
    if (isset($getfpdata['floor_plan'])) {
        $getfid = $getfpdata['floor_plan'];
    } else {
        $getfid = null;
    }
    $check = explode(',', $getfid);
    if (in_array($fid, $check)) {
    } else {
        if ($getfid == null || $getfid == 'null') {
            $fid = $fid;
        } else {
            $fid = $getfid . ',' . $fid;
        }
        $update  = mysqli_query($connection, "UPDATE bn_user_activity SET floor_plan='$fid' WHERE lead_id='$lid' AND pr_id='$prid'");
    }
    $data = array("status" => "OK", "img" => $query['fp_images'], "desc" => $query['fp_desc']);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
