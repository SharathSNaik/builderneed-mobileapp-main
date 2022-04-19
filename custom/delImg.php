<?php
include '../access/connect.php';
$pid = $_POST['pid'];
$delete = mysqli_query($connection, "DELETE FROM bn_img WHERE id=$pid");
if ($delete) {
    $data = array("status" => "OK");
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
