<?php
include_once '../../../access/connect.php';
session_start();
if (isset($_SESSION['bn_ag_phone'])) {
  $phone =  $_SESSION['bn_ag_phone'];
  $query = mysqli_query($connection, "SELECT * FROM bn_agents  WHERE bn_ag_phone = $phone");
  $row = mysqli_fetch_assoc($query);
  $data = array("status" => "OK", "phone" => $phone, "sid" => $row['project_id']);
} else {
  $data = array("status" => "error");
}
echo json_encode($data);
