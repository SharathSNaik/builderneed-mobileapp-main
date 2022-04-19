<?php
include_once '../../../access/connect.php';
session_start();
if (isset($_SESSION['phone'])) {
  $phone =  $_SESSION['phone'];
  $query = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phone'");
  $row = mysqli_fetch_assoc($query);
  $data = array("status" => "OK", "phone" => $_SESSION['phone'], "sid" => $row['project_id']);
} else {
  $data = array("status" => "error");
}
echo json_encode($data);
