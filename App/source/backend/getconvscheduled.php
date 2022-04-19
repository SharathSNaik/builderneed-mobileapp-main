<?php
include_once '../../../access/connect.php';
$vid = $_POST['vid'];
$query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_conversations WHERE schedule_id='$vid'"));
if ($query) {
    $data = array("status" => "OK", 'config_id' => $query['config_id'], 'config_name' => $query['config_name'], 'base_price' => $query['base_price'], 'offering_price' => $query['offering_price'], 'maintenance_fee' => $query['maintenance_fee'], 'payment_plan' => $query['payment_plan'], 'uds' => $query['uds'], 'modification_ticket' => $query['modification_ticket'], 'faqs' => $query['faqs']);
} else {
    $data = array("status" => "KO", "message" => 'No data found');
}
echo json_encode($data);
