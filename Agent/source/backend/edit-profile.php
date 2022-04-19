<?php
include_once '../../../access/connect.php';
session_start();
$id =  $_SESSION['agent_id'];
$phone =  $_SESSION['bn_ag_phone'];
$name =  $_POST['name'];
$newphone =  $_POST['phone'];
$email =  $_POST['email'];
$data = "";
$query = mysqli_query($connection, "SELECT * FROM bn_agents WHERE bn_ag_phone = '$newphone'");
$count = mysqli_num_rows($query);
if ($phone == $newphone) {
    $count = 0;
}
if ($count != 1) {
    $update = mysqli_query($connection, "UPDATE bn_agents SET `name`='$name',`bn_ag_phone`='$newphone',`email`='$email' WHERE `agent_id`='$id'");
    $_SESSION['bn_ag_phone'] = $phone;
    $_SESSION['agent_id'] = $id;
    $data = array("status" => "OK", "message" => "Profile Updated Successfully");
} else {
    $data = array("status" => "KO", "message" => "The given number is already registered in our platform!");
}
echo json_encode($data);
