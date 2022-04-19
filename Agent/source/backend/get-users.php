<?php
include_once '../../../access/connect.php';
$query = mysqli_query($connection, "SELECT * FROM bn_leads");
$count = mysqli_num_rows($query);
$getusers = array();
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $querydata = array("name" => $row['name'], "sid" => $row['project_id'], "lid" => $row['lead_id']);
        array_push($getusers, $querydata);
    }
    $data = array("status" => "OK", "data" => $getusers);
} else {
    $data = array("status" => "error", "message" => "No data Found");
}
echo json_encode($data);
