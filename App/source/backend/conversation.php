<?php
include_once '../../../access/connect.php';
session_start();
$leadid = $_SESSION['phone'];
$querysession = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone='$leadid'"));
$leadid = $querysession['lead_id'];
$query = mysqli_query($connection, "SELECT * FROM bn_conversations WHERE lead_id='$leadid'");
$count = mysqli_num_rows($query);
if ($count > 0) {
    $row = mysqli_fetch_assoc($query);
    $data = array("status" => "OK", 'config_id' => $row['config_id'], 'base_price' => $row['base_price'], 'offering_price' => $row['offering_price'], 'maintenance_fee' => $row['maintenance_fee'], 'payment_plan' => $row['payment_plan'], 'uds' => $row['uds'], 'modification_ticket' => $row['modification_ticket'], 'faqs' => $row['faqs']);
} else {
    $data = array("status" => "KO", "Message" => "No data found" . $leadid);
}
echo json_encode($data);
