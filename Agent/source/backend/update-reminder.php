<?php
include_once '../../../access/connect.php';
$rid = $_POST['rid'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$lid = $_POST['lid'];
$datetime = $_POST['datetime'];
$reason = $_POST['reason'];
$notes = $_POST['notes'];
$title = $_POST['nttitle'];
$getreminder  = mysqli_query($connection, "SELECT * FROM bn_reminders WHERE reminder_id='$rid'");
$counts = mysqli_num_rows($getreminder);
$row = mysqli_fetch_assoc($getreminder);
if ($counts == 1) {
    $pid = $row['project_id'];
    $lid = $row['lead_id'];
    $update = mysqli_query($connection, "UPDATE bn_reminders SET project_id='$pid', reminder_date_time='$datetime', Notes='$notes', reason='$reason',title='$title' WHERE reminder_id='$rid'");
    if ($update) {
        $data = array("status" => "OK", "message" => "Reminder Set Succesfully", "leadid" => $lid);
    } else {
        $data = array("status" => "error", "message" => "There Was an error while setting reminder, Try Again!" . mysqli_error($connection));
    }
} else {
    $data = array("status" => "error", "message" => "There Was an error while setting reminder, Try Again!" . mysqli_error($connection));
}
echo json_encode($data);
