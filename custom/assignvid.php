<?php
include '../access/connect.php';
$pid = $_POST['pid'];
$link = $_POST['link'];

$sql = "UPDATE bn_project SET site_video='$link' WHERE builder_id='$pid'";

if (mysqli_query($connection, $sql)) {
    $data = array("status" => "OK");
} else {
    $data = array("status" => "KO");
}
echo json_encode($data);
