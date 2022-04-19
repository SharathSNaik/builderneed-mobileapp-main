<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$imgid = $_POST['imgid'];
$querys = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phone'");
$rows = mysqli_fetch_assoc($querys);
$sid =  $rows['project_id'];
$query = mysqli_query($connection, "SELECT * FROM bn_img WHERE source_id = '$sid' AND img_info='$imgid'");
$count = mysqli_num_rows($query);
$getimages = array();
if ($count >= 1) {
    while ($row = mysqli_fetch_assoc($query)) {
        $querydata = array("image" => $row['img_url'], "img_desc" => $row['img_desc']);
        array_push($getimages, $querydata);
    }
    $data = array("status" => "OK", "data_img" => $getimages);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
