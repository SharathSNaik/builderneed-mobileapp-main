<?php
include_once '../../../access/connect.php';
$conid = $_POST['conid'];
$queryconv = mysqli_query($connection, "SELECT * FROM bn_conversations WHERE schedule_id='$conid'");
$ccount = mysqli_num_rows($queryconv);
$rows = mysqli_fetch_assoc($queryconv);
$mydata = "";
if ($ccount >= 1) {
    $mydata = array("schedule_id" => $rows['schedule_id'], "config_name" => $rows['config_name'], "cbase_price" => $rows['base_price'], "coffering_price" => $rows['offering_price'], "cmaintenance_fee" => $rows['maintenance_fee'], "payment_plan" => $rows['payment_plan'], "cuds" => $rows['uds'], "modification_ticket" => $rows['modification_ticket'], "faq" => $rows['faqs'], "uid" => $rows['config_id']);
    $data = array("status" => "OK", "data" => $mydata);
} else {
    $data = array("status" => "error", "message" => "No data Found for this Conversation");
}
echo json_encode($data);
