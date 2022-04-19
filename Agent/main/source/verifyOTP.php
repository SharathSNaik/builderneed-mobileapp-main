<?php
include_once '../../../access/connect.php';
session_start();
$phone = $_POST['getPhone'];
$otp = $_POST['otp'];
$QueryVerifyOTP = mysqli_query($connection, "SELECT * FROM bn_agents WHERE bn_ag_phone='$phone'");
$count = mysqli_num_rows($QueryVerifyOTP);
if ($count == 1) {
    $row = mysqli_fetch_assoc($QueryVerifyOTP);
    $checkotp = $row['send_otp'];
    $aid = $row['agent_id'];
    if ($otp == $checkotp) {
        //DELETE AFTER VERIFYING
        $deleteVerifyOTP = mysqli_query($connection, "UPDATE bn_agents set send_otp='' WHERE bn_ag_phone = '$phone'");
        $_SESSION['bn_ag_phone'] = $phone;
        $_SESSION['agent_id'] = $aid;
        $getmaxid = mysqli_fetch_assoc(mysqli_query($connection, "SELECT MAX(pn_id) as pn_id FROM bn_leadnotification"));
        $getmid = $getmaxid['pn_id'];
        $getlid = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leadnotification WHERE pn_id='$getmid'"));
        $pnleadid = $getlid['pn_userid'];
        if ($pnleadid == "" || $pnleadid == "null" || $pnleadid == null) {
            $updateTokendata = mysqli_query($connection, "UPDATE bn_leadnotification SET pn_userid='$aid',pn_userrole=0 WHERE pn_id ='$getmid'");
        }
        $data = array("status" => "OK", "redirectURL" => "homepage.php");
    } else {
        $data = array("status" => "KO", "message" => "OTP doesnt Match, Check again!");
    }
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
