<?php
include_once '../../../access/connect.php';
session_start();
$uno = $_POST['uno'];
$lid = $_POST['lid'];
$price = $_POST['price'];
$aid = $_SESSION['agent_id'];
$query = mysqli_query($connection, "SELECT * FROM bn_leads WHERE lead_id = '$lid'");
$row = mysqli_fetch_assoc($query);
$count = mysqli_num_rows($query);
if ($count == 1) {
    $pid = $row['project_id'];
    $insert = mysqli_query($connection, "INSERT INTO bn_inventory (`lead_id`,`project_id`,`discussed_price`,`unit_no`)values('$lid','$pid','$price','$uno')");
    if ($insert) {
        $data = array("status" => "OK", "message" => "Inventory Set Succesfully");
    } else {
        $data = array("status" => "error", "message" => "There Was an error while setting inventory, Try Again!");
    }
}
// }
echo json_encode($data);
