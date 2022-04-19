
<?php
include '../access/connect.php';
$day =  date('U', strtotime(' -2 day'));
$ch = curl_init();
$start = $day;
$end = time();
$key = '803e0df39a8e5b5d11f1f30999ee34d7';
$id = 12029664;
$curr = time();
$str = $curr;
$hsh = hash_hmac('SHA256', $str, $key);
$a = "https://leads.housing.com/api/v0/get-builder-leads?start_date=" . $start . "&end_date=" . $end . "&current_time=" . $curr . "&hash=" . $hsh . "&id=" . $id;
curl_setopt($ch, CURLOPT_URL, $a);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    if (count(json_decode($result, 1)) == 0) {
        echo 'No data found';
    } else {
        // echo $result;
        $msg = "";
        $arr = json_decode($result, true);
        foreach ($arr as $item) {
            $ld = $item['lead_date'];
            $an = $item['apartment_names'];
            $cc = $item['country_code'];
            $st = $item['service_type'];
            $ct = $item['category_type'];
            $ln = $item['locality_name'];
            $cn = $item['city_name'];
            $le = $item['lead_email'];
            $leadname = $item['lead_name'];
            $lp = $item['lead_phone'];
            $pi = $item['project_id'];
            $pn = $item['project_name'];
            $minp = $item['min_price'];
            $maxp = $item['max_price'];
            $query = mysqli_query($connection, "SELECT * FROM bn_housing_com WHERE lead_phone='$lp'");
            $count = mysqli_num_rows($query);
            if ($count > 0) {
                $msg = "message:Data Already Added";
            } else {
                $insertnewleads = mysqli_query($connection, "INSERT INTO bn_housing_com (lead_date,apartment_names,country_code,service_type,category_type,lead_name,lead_email,lead_phone,locality_name,city_name,min_price,max_price,project_id,project_name)VALUES('$ld','$an','$cc','$st','$ct','$leadname','$le','$lp','$ln','$cn','$minp','$maxp','$pi','$pn')");
            }
            //INSERTING TO OUR DB
            $query = mysqli_query($connection, "SELECT * from bn_housing_com WHERE project_id='33389' OR project_id='251890' OR project_id='44220'");
            while ($row = mysqli_fetch_assoc($query)) {
                $phone = $row['lead_phone'];
                $name = $row['lead_name'];
                $email = $row['lead_email'];
                $pid = $row['project_id'];
                if ($pid == '251890') {
                    $bid = '2';
                } else if ($pid == '33389') {
                    $bid = '5';
                } else if ($pid == '44220') {
                    $bid = '17';
                }
                $category = '';
                $queryCheck = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone='$phone'");
                $count = mysqli_num_rows($queryCheck);
                if ($count > 0) {
                    $msg = "message:Data Already Added";
                } else {
                    $useraid = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_agents WHERE project_id='$bid' AND user_role=1"));
                    $migrateleads = mysqli_query($connection, "INSERT INTO bn_leads (`source_id`,`project_id`,`name`,`phone`,`alternate_contact_number`,`email`,`category`,`agent_id`,`registered_by`,`user_sendOTP`,`lead_status`)values('1','$bid','$name','$phone','$phone','$email','$category','58','agent-58','','0')");
                    if ($migrateleads) {
                        $aid = $useraid['agent_id'];
                        runApi($bid, $connection, $name, $aid, $phone);
                    }
                }
            }
        }
        echo $msg;
    }
}

function runApi($bid, $connection, $name, $aid, $phone)
{
    $adetails = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id='$aid'"));
    $aname = $adetails['name'];
    $source = "Housing";
    $aphone = $adetails['bn_ag_phone'];
    $getpname = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id='$bid'"));
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
                echo $result;
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