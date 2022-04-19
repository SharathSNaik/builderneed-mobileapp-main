<?php
include_once '../../../access/connect.php';
session_start();
$sql = "SELECT * FROM bn_inventory WHERE unit_no LIKE '%" . $_GET['query'] . "%' LIMIT 20";
$resultset = mysqli_query($connection, $sql);
$json = array();
$count = mysqli_num_rows($resultset);
while ($rows = mysqli_fetch_assoc($resultset)) {
    $json[] = $rows["unit_no"];
}
echo json_encode($json);
