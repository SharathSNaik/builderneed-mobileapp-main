<?php
include_once '../../../access/connect.php';
session_start();
$phone =  $_SESSION['phone'];
$querys = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phone'");
$row = mysqli_fetch_assoc($querys);
$lid =  $row['lead_id'];
$sid =  $row['project_id'];

$query = mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE lp_id = '$lid' AND sr_id = '$sid' AND meetingstatus='0' AND visit_date > NOW()");
$rows = mysqli_fetch_assoc($query);
$count = mysqli_num_rows($query);

if ($count == 1) {
    $date = "Site Visit on " . $rows['visit_date'];
} else {
    $date = "";
}
if ($count > 1) {
    $rowsd = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE sr_id = '$sid' AND lp_id = '$lid' AND meetingstatus='0' AND  visit_date > NOW() ORDER BY visit_date"));
    $date = "Site Visit on " . $rowsd['visit_date'];

}
if ($count > 0 || $count != 0) {
    $data = array("status" => "OK", "upcoming_count" => $count, "datatime" => $date);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}

echo json_encode($data);
