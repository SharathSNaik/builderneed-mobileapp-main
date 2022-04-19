<?php
include_once '../access/connect.php';
session_start();
$phone = $_POST['getPhone'];
$otp = $_POST['otp'];
$lid = null;
$QueryVerifyOTP = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone='$phone'");
$count = mysqli_num_rows($QueryVerifyOTP);
if ($count == 1) {
    $row = mysqli_fetch_assoc($QueryVerifyOTP);
    $checkotp = $row['user_sendOTP'];
    $leadid = $row['lead_id'];
    $sid = $row['project_id'];
    if ($otp == $checkotp) {
        //DELETE AFTER VERIFYING
        $deleteVerifyOTP = mysqli_query($connection, "UPDATE bn_leads set user_sendOTP='' WHERE phone = '$phone'");
        $_SESSION['phone'] = $phone;
        $_SESSION['lead_id'] = $lid;
        $Useractivity = mysqli_query($connection, "SELECT * FROM bn_user_activity WHERE lead_id='$leadid' AND pr_id='$sid'");
        $uscount = mysqli_num_rows($Useractivity);
        if ($uscount > 0) {
        } else {
            $inserUseractivity = mysqli_query($connection, "INSERT INTO bn_user_activity (lead_id,first_login,pr_id,agent_id)VALUES('$leadid','1','$sid','$aid')");
        }
        $getmaxid = mysqli_fetch_assoc(mysqli_query($connection, "SELECT MAX(pn_id) as pn_id FROM bn_leadnotification"));
        $getmid = $getmaxid['pn_id'];
        $getlid = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leadnotification WHERE pn_id='$getmid'"));
        $pnleadid = $getlid['pn_userid'];
        if ($pnleadid == "" || $pnleadid == "null" || $pnleadid == null) {
            $updateTokendata = mysqli_query($connection, "UPDATE bn_leadnotification SET pn_userid='$leadid',pn_userrole=1 WHERE pn_id ='$getmid'");
        }
        $data = array("status" => "OK", "redirectURL" => "App/home.php");
    } else {
        $data = array("status" => "KO", "message" => "OTP doesnt Match, Try again!");
    }
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
