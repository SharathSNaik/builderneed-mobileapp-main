<?php
include '../access/connect.php';
$pid = $_POST['pid'];
$link = $_POST['link'];

$sql = "INSERT INTO bn_img (source_id,img_url)VALUES('$pid','$link')";

if (mysqli_query($connection, $sql)) {
    $data = array("status" => "OK");
} else {
    $data = array("status" => "KO");
}
echo json_encode($data);
