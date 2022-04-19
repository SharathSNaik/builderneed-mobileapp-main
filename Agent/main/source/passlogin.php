<?php
include_once '../../../access/connect.php';
session_start();
$phone = $_POST['phoneOTP'];
$pass = $_POST['pass'];
$QueryVerifyOTP = mysqli_query($connection, "SELECT * FROM bn_agents WHERE bn_ag_phone='$phone'");
$count = mysqli_num_rows($QueryVerifyOTP);
if ($count == 1) {
    $row = mysqli_fetch_assoc($QueryVerifyOTP);
    $oldpass = $row['password'];
    $aid = $row['agent_id'];
    if (password_verify($pass, $oldpass)) {
        $_SESSION['bn_ag_phone'] = $phone;
        $_SESSION['agent_id'] = $aid;
        $data = array("status" => "OK", "redirectURL" => "homepage.php");
    } else {
        $data = array("status" => "KO", "message" => "Password doesnt Match, Check again!");
    }
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
