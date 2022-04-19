<?php
include_once '../../../access/connect.php';
$cid = $_POST['cid'];
$lid = $_POST['lid'];
$sid = $_POST['sid'];
$pid = $_POST['pid'];
$cname = $_POST['cname'];
$aprice = $_POST['aprice'];
$oprice = $_POST['oprice'];
$mfee = $_POST['mfee'];
$pplan = $_POST['pplan'];
$mticket = $_POST['mticket'];
$uds = $_POST['uds'];
$query = mysqli_query($connection, "SELECT * FROM bn_conversations WHERE schedule_id='$sid'");
$count = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
if ($count == 0) {
    $sql = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE visit_id='$sid'"));
    $cdate = $sql['created_date'];
    $update = mysqli_query($connection, "UPDATE bn_site_visit_info SET visit_date = '$cdate' WHERE visit_id='$sid'");
    $queryIN = mysqli_query($connection, "INSERT INTO bn_conversations (config_id,schedule_id,project_id,lead_id,config_name,base_price,offering_price,maintenance_fee,payment_plan,modification_ticket,uds)values('$cid','$sid','$pid','$lid','$cname','$aprice','$oprice','$mfee','$pplan','$mticket','$uds')");
    if ($queryIN) {
        $data = array("status" => "OK", "message" => "Data Added Succesfully");
    } else {
        $data = array("status" => "error", "message" => "No data Found" . mysqli_error($connection));
    }
} else {
    $queryUP = mysqli_query($connection, "UPDATE bn_conversations SET config_id='$cid',config_name='$cname',project_id='$pid',config_name='$cname',base_price='$aprice',offering_price='$oprice',maintenance_fee='$mfee',payment_plan='$pplan',modification_ticket='$mticket',uds='$uds' WHERE schedule_id='$sid'");
    if ($queryUP) {
        $data = array("status" => "OK", "message" => "Data Updated Succesfully");
    } else {
        $data = array("status" => "error", "message" => "No data Found");
    }
}
echo json_encode($data);
