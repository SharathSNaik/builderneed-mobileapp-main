
<?php
include '../access/connect.php';
$query = mysqli_query($connection, "SELECT * from bn_housing_com WHERE project_id='33389'");
while ($row = mysqli_fetch_assoc($query)) {
    $phone = $row['lead_phone'];
    $name = $row['lead_name'];
    $email = $row['lead_email'];
    $category = '';
    $queryCheck = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone='$phone'");
    $count = mysqli_num_rows($queryCheck);
    if ($count > 0) {
        // $msg = "message:Data Already Added";
    } else {
        $migrateleads = mysqli_query($connection, "INSERT INTO bn_leads (`source_id`,`project_id`,`name`,`phone`,`alternate_contact_number`,`email`,`category`,`agent_id`,`registered_by`,`user_sendOTP`,`lead_status`)values('1','5','$name','$phone','$phone','$email','$category','58','agent-58','','0')");
    }
}
    echo mysqli_error($connection);
