<?php
include_once '../access/connect.php';
$phone = $_POST['phone_user'];
$usname = $_POST['login_name'];
$email = $_POST['email_user'];
$timeofcreation =  date('Y-m-d H:i:s');
$data = "";

//Check if there is OTP registered in Database
$QueryVerifyPhone = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone='$phone'");
$count = mysqli_num_rows($QueryVerifyPhone);
if ($count == 1) {
    $data = array("status" => "KO", "message" => "The provided details are already registered with us, Please Login or try again!");
} else {
    $QueryinsertOTP = mysqli_query($connection, "INSERT INTO bn_leads (`name`,`phone`,`created_on`,`email`,registered_by)values('$usname','$phone','$timeofcreation','$email','0')");
    if ($QueryinsertOTP) {
        $data = array("status" => "OK", "redirectURL" => "index.php?email=$email&phone=$phone");
    } else {
        $data = array("status" => "KO", "message" => "There was an error,Please try again!" . mysqli_error($connection));
    }
}
echo json_encode($data);
