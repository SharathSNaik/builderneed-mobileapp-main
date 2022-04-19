<?php
include_once '../../../access/connect.php';
session_start();
$getVisitID = $_POST['getVisitID'];
$phone =  $_SESSION['phone'];
$query = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phone'");
$row = mysqli_fetch_assoc($query);
$lid =  $row['lead_id'];
$count = mysqli_num_rows($query);
if ($count == 1) {
    $queryEvent = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE visit_id = '$getVisitID'"));
    if ($queryEvent) {
        $data = array("status" => "OK", "message" => "Your Event status", "date" => $queryEvent['visit_date'], "req_mode" => $queryEvent['requested_mode'], "agent" => $queryEvent['agent'], "email" => $queryEvent['email'], "phone" => $queryEvent['phone'], "source" => $queryEvent['visit_source']);
    } else {
        $data = array("status" => "KO", "message" => "There was an error, Try Again!");
    }
} else {
    $data = array("status" => "KO", "message" => "There was an error, Try Again!");
}
echo json_encode($data);
