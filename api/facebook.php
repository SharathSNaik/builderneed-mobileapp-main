
<?php
include '../access/connect.php';
include_once '../pushnotification/fcm.php';
$phone = "";
$qfidpid = mysqli_query($connection, "SELECT * from bn_fb_lead WHERE fb_pr_id IS NOT NULL");
while ($row = mysqli_fetch_assoc($qfidpid)) {
    $pid = $row['fb_pr_id'];
    $fid = $row['fb_lead_form_id'];
    $sql = "UPDATE bn_fb_lead SET fb_pr_id='$pid' WHERE fb_lead_form_id='$fid' AND fb_pr_id IS NULL";
    if (mysqli_query($connection, $sql)) {
        $data = array("status" => "OK");
    } else {
        $data = array("status" => "KO");
    }
}
$qfidpid = mysqli_query($connection, "SELECT * from bn_fb_lead WHERE fb_lead_email IS NULL");
while ($row = mysqli_fetch_assoc($qfidpid)) {
    $pid = $row['fb_pr_id'];
    $fid = $row['fb_lead_form_id'];
    $sql = "UPDATE bn_fb_lead SET fb_lead_email='project@mypropbuddy.online' WHERE fb_lead_form_id='$fid' AND fb_lead_email IS NULL";
    if (mysqli_query($connection, $sql)) {
        $data = array("status" => "OK");
    } else {
        $data = array("status" => "KO");
    }
}
$query = mysqli_query($connection, "SELECT * from bn_fb_lead");
while ($row = mysqli_fetch_assoc($query)) {
    $phone = $row['fb_lead_phone'];
    $len = strlen($phone);
    if ($len > 10) {
        $phone = substr($phone, -10);
    } else {
        $phone = $row['fb_lead_phone'];
    }
    $name = mysqli_real_escape_string($connection, $row['fb_lead_name']);
    $email = $row['fb_lead_email'];
    $pid = $row['fb_pr_id'];
    $category = '';
    $queryCheck = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone='$phone'");
    $count = mysqli_num_rows($queryCheck);
    if ($count > 0) {
        $msg = "Data Already Added<br>";
    } else {
        if ($pid == null || $pid == NULL || $pid == "") {
            $msg = "No Project Mapping Listed<br>";
            echo $msg;
        } else {
            $useraid = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_agents WHERE project_id='$pid' AND user_role=1"));
            $migrateleads = mysqli_query($connection, "INSERT INTO bn_leads (`source_id`,`project_id`,`name`,`phone`,`alternate_contact_number`,`email`,`category`,`agent_id`,`registered_by`,`user_sendOTP`,`lead_status`)values('2','$pid','$name','$phone','$phone','$email','$category','93','agent-93','','0')");
            $aid = 93;
            $msg = "Running API<br>";
            echo $msg;
            runApi($pid, $connection, $name, $aid, $phone);
        }
    }
}

function runApi($pid, $connection, $name, $aid, $phone)
{
    $adetails = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id='$aid'"));
    $aname = $adetails['name'];
    $source = "Facebook";
    $aphone = $adetails['bn_ag_phone'];
    $getpname = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id='$pid'"));
    $pname = $getpname['project_name'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d h:i:sa");
    $body = "Lead, $name has been registered!";
    $title = "New Lead, $name has been registered for $pname!";
    $arrNotification = array();
    $arrNotification["body"] = $body;
    $arrNotification["title"] = $title;
    $arrNotification["sound"] = "default";
    $arrNotification["type"] = 1;

    $savetokenforuser = mysqli_query($connection, "INSERT INTO bn_notifications (lead_id,body,title,n_data)VALUES('$aid','$body','$title','$date')");
    if ($savetokenforuser) {
        $querytoken = mysqli_query($connection, "SELECT * FROM bn_leadnotification WHERE pn_userid='$aid'");
        $count = mysqli_num_rows($querytoken);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($querytoken)) {
                $fcm = new FCM();
                $token = $row['pn_token'];
                $result = $fcm->send_notification($token, $arrNotification, "Android");
                echo $result . '<br>';
            }
        }
    }
    whatsAppInternal($name, $aname, $pname, $phone, $source, $aphone);
    whatsAppAgent($name, $aname, $pname, $phone, $source, $aphone);
    whatsAppTeleCaller($name, $aname, $pname, $phone, $source, $aphone);
    
}
function whatsAppInternal($name, $aname, $pname, $phone, $source, $aphone)
{
    $data = array("name" => $name, "agent_name" => "Anjan BN", "Project" => $pname, "Name" => $name, "lead_phone" => $phone, "agent_phone" => $aphone, "source" => $source);
    $result = array("userId" => "", "phoneNumber" => 9900329633, "countryCode" => "+91", "traits" => $data);
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.interakt.ai/v1/public/track/users/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($result),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Basic M3VuOXYtWGRrdC1Pd0txWTdBNzNxb0YwMTBBVHZfak1GMnNxb2xqalk4bzo='
        ),
    ));

    echo curl_exec($curl);
    curl_close($curl);
    $internal = array("userId" => "", "phoneNumber" => 9900329633, "countryCode" => "+91", "event" => "BN_INTERNAL");
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.interakt.ai/v1/public/track/events/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($internal),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Basic M3VuOXYtWGRrdC1Pd0txWTdBNzNxb0YwMTBBVHZfak1GMnNxb2xqalk4bzo='
        ),
    ));

    curl_exec($curl);
    curl_close($curl);
}

function whatsAppAgent($name, $aname, $pname, $phone, $source, $aphone)
{
    $data = array("name" => $name, "agent_name" => $aname, "Project" => $pname, "Name" => $name, "lead_phone" => $phone, "agent_phone" => $aphone, "source" => $source);
    $result = array("userId" => "", "phoneNumber" => $aphone, "countryCode" => "+91", "traits" => $data);
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.interakt.ai/v1/public/track/users/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($result),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Basic M3VuOXYtWGRrdC1Pd0txWTdBNzNxb0YwMTBBVHZfak1GMnNxb2xqalk4bzo='
        ),
    ));

    echo curl_exec($curl);
    curl_close($curl);
    $internal = array("userId" => "", "phoneNumber" => $aphone, "countryCode" => "+91", "event" => "BN_INTERNAL");
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.interakt.ai/v1/public/track/events/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($internal),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Basic M3VuOXYtWGRrdC1Pd0txWTdBNzNxb0YwMTBBVHZfak1GMnNxb2xqalk4bzo='
        ),
    ));

    curl_exec($curl);
    curl_close($curl);
}


function whatsAppTeleCaller($name, $aname, $pname, $phone, $source, $aphone)
{
    $data = array("name" => $name, "agent_name" => "TeleCaller", "Project" => $pname, "Name" => $name, "lead_phone" => $phone, "agent_phone" => $aphone, "source" => $source);
    $result = array("userId" => "", "phoneNumber" => 6363465230, "countryCode" => "+91", "traits" => $data);
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.interakt.ai/v1/public/track/users/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($result),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Basic M3VuOXYtWGRrdC1Pd0txWTdBNzNxb0YwMTBBVHZfak1GMnNxb2xqalk4bzo='
        ),
    ));

    echo curl_exec($curl);
    curl_close($curl);
    $internal = array("userId" => "", "phoneNumber" => 6363465230, "countryCode" => "+91", "event" => "BN_INTERNAL");
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.interakt.ai/v1/public/track/events/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($internal),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Basic M3VuOXYtWGRrdC1Pd0txWTdBNzNxb0YwMTBBVHZfak1GMnNxb2xqalk4bzo='
        ),
    ));

    curl_exec($curl);
    curl_close($curl);
}