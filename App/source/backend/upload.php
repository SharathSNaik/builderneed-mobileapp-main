<?php 
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
if($_FILES['file']['name'] != ''){
    $test = explode('.', $_FILES['file']['name']);
    $extension = end($test);    
    $name = rand(100,999).'.'.$extension;
    $loc = '../uploads/'.$name;
    $location = '../../../uploads/'.$name;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
    $update = mysqli_query($connection, "UPDATE bn_leads SET `profile_pic`='$name' WHERE `phone`='$phone'");
    echo $loc;
}
