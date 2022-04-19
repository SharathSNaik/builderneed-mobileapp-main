<?php
include_once '../access/connect.php';
// INCLUDE YOUR FCM FILE
include_once 'fcm.php';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d h:i:sa");
$regId = $_POST['token'];
$body = mysqli_real_escape_string($connection, $_POST['body']);
$title = mysqli_real_escape_string($connection, $_POST['title']);


$bntoken = mysqli_query($connection, "SELECT * FROM bn_leadnotification WHERE pn_token='$regId' AND pn_userrole='1'");

$rows = mysqli_fetch_assoc($bntoken);
$leadid = $rows['pn_userid'];

$notification = array();
$arrNotification = array();
$arrData = array();
$arrNotification["body"] = $body;
$arrNotification["title"] = $title;
$arrNotification["sound"] = "default";
$arrNotification["type"] = 1;

$savetokenforuser = mysqli_query($connection, "INSERT INTO bn_notifications (lead_id,body,title,n_data)VALUES('$leadid','$body','$title','$date')");

$querytoken = mysqli_query($connection, "SELECT * FROM bn_leadnotification WHERE pn_userid='$leadid'");

while ($row = mysqli_fetch_assoc($querytoken)) {
    $fcm = new FCM();
    $token = $row['pn_token'];
    $result = $fcm->send_notification($token, $arrNotification, "Android");
    // echo $result;
}
