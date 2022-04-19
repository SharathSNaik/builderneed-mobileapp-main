<?php
include_once '../access/connect.php';
$token = $_GET['token'];
$bntoken = mysqli_query($connection, "SELECT * FROM bn_leadnotification WHERE pn_token='$token'");
$tokencount = mysqli_num_rows($bntoken);
if ($tokencount <= 0) {
    $savetoken = mysqli_query($connection, "INSERT INTO bn_leadnotification (pn_token)VALUES('$token')");
    if ($savetoken) {
        $data = array("statusCode " => "201", "message" => "Success");
    } else {
        $data = array("statusCode " => "200", "message" => "fail");
    }
} else {
    $data = array("statusCode " => "200", "message" => "fail Token already exxists");
}
echo json_encode($data);

