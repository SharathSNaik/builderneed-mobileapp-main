<?php
include_once '../../../access/connect.php';
$cid = $_POST['cid'];
$conid = $_POST['conid'];
$query = mysqli_query($connection, "SELECT * FROM bn_configuration WHERE config_id='$cid'");
$queryconv = mysqli_query($connection, "SELECT * FROM bn_conversations WHERE schedule_id='$conid'");
$count = mysqli_num_rows($query);
$ccount = mysqli_num_rows($queryconv);
$row = mysqli_fetch_assoc($query);
$rows = mysqli_fetch_assoc($queryconv);
$mydata = "";
if ($count > 0) {
    if ($ccount>=1) {
        $mydata = array("schedule_id" => $rows['schedule_id'], "config_name" => $rows['config_name'], "cbase_price" => $rows['base_price'], "coffering_price" => $rows['offering_price'], "cmaintenance_fee" => $rows['maintenance_fee'], "payment_plan" => $rows['payment_plan'], "cuds" => $rows['uds'], "modification_ticket" => $rows['modification_ticket'], "faq" => $rows['faqs']);
    }
    $data = array("status" => "OK", "cname" => $row['config_name'], "base_price" => $row['base_price'], "maintenance_fee" => $row['maintenance_fee'], "uds" => $row['uds'], "data" => $mydata);
} else {
    $data = array("status" => "error", "message" => "No data Found for this Conversation");
}
echo json_encode($data);
