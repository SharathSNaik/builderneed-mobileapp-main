<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$row = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone='$phone'"));
$lid = $row['lead_id'];
$data = 0;
$rows = mysqli_query($connection, "SELECT check_property,check_amenities,check_configurations,check_nearby,check_vx,check_images,use_explore,book_siteVisit,read_blog FROM bn_user_activity WHERE lead_id='$lid'");
$row = mysqli_fetch_assoc($rows);
foreach ($row as $value) {
    $data += $value;
}

$jdata = array("status" => "OK", "percentage" => ceil($data / 9 * 100));
echo json_encode($jdata);
