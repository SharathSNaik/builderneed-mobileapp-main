<?php
include_once '../../../access/connect.php';
$phone = $_POST['phoneOTP'];
$data = "";
$OTPGEN = "1357902468";
$OTP = "";
for ($i = 1; $i <= 4; $i++) {
    $OTP .= substr($OTPGEN, (rand() % (strlen($OTPGEN))), 1);
}
//Check if there is OTP registered in Database
$QueryVerifyPhone = mysqli_query($connection, "SELECT * FROM bn_agents WHERE bn_ag_phone='$phone'");
$count = mysqli_num_rows($QueryVerifyPhone);

if ($count == 1) {
    $row = mysqli_fetch_assoc($QueryVerifyPhone);
    $verifyuser = $row['bn_ag_phone'];
    if ($verifyuser == $phone) {
        //Send OTP
        $QueryOTP = mysqli_query($connection, "UPDATE bn_agents set send_otp='$OTP' WHERE bn_ag_phone = '$phone'");
        if ($QueryOTP) {
            $ch = curl_init('http://api.equence.in/pushsms/?username=cable_otp&password=in123@%23$R&to=' . $phone . '&from=mobiez&text=Dear%20Customer,%20your%20OTP%20code%20is%20' . $OTP . '.%20Regards,%20Mobiezy');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            curl_close($ch);
            $data = array("status" => "OK", "redirectURL" => "otp.php?otp=" . $OTP . "&phone=" . $phone, "mobile" => '91' . $phone);
        } else {
            $data = array("status" => "KO", "message" => "There was an error,Please try again!");
        }
    }
} else {
    $data = array("status" => "KO", "message" => "The following credentials are not registered with us, Please Register");
}
echo json_encode($data);
