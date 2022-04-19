<?php
include_once '../../../access/connect.php';
session_start();
$name = $_POST['name'];
$phone = $_POST['phone'];
$lid = $_POST['lid'];
$datetime = $_POST['datetime'];
$reason = $_POST['reason'];
$notes = $_POST['notes'];
$title = $_POST['nttitle'];
$timeofcreation =  date('Y-m-d H:i:s');
$aid = $_SESSION['agent_id'];
$query = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phone'");
$row = mysqli_fetch_assoc($query);
// $getreminder  = mysqli_query($connection, "SELECT * FROM bn_reminders WHERE reminder_id='$rid'");
// $counts = mysqli_num_rows($getreminder);
// if ($counts == 1) {
//     $pid = $row['project_id'];
//     $update = mysqli_query($connection, "UPDATE bn_reminders SET project_id='$pid', reminder_date_time='$datetime', Notes='$notes', reason='$reason',title='$title' WHERE `lead_id`='$lid'");
//     if ($update) {
//         $data = array("status" => "OK", "message" => "Reminder Set Succesfully");
//     } else {
//         $data = array("status" => "error", "message" => "There Was an error while setting reminder, Try Again!" . mysqli_error($connection));
//     }
// } else {
$count = mysqli_num_rows($query);
if ($count == 1) {
    $pid = $row['project_id'];
    $insert = mysqli_query($connection, "INSERT INTO bn_reminders (`lead_id`,`project_id`,`created_date`,`reminder_date_time`,Notes,reason,agent_id,title)values('$lid','$pid','$timeofcreation','$datetime','$notes','$reason','$aid','$title')");
    if ($insert) {
        $data = array("status" => "OK", "message" => "Reminder Set Succesfully");
    } else {
        $data = array("status" => "error", "message" => "There Was an error while setting reminder, Try Again!");
    }
}
// }
echo json_encode($data);
