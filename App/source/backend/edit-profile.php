<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$name =  $_POST['name'];
$newphone =  $_POST['phone'];
$email =  $_POST['email'];
$data = "";
$query = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$newphone'");
$count = mysqli_num_rows($query);

if ($phone == $newphone) {
    $count = 0;
}
if ($count != 1) {
    $update = mysqli_query($connection, "UPDATE bn_leads SET `name`='$name',`phone`='$newphone',`email`='$email' WHERE `phone`='$phone'");
    $_SESSION['phone'] = $newphone;
    $data = array("status" => "OK", "message" => "Profile Updated Successfully");
} else {
    $data = array("status" => "KO", "message" => "The given number is already registered in our platform!");
}
echo json_encode($data);
