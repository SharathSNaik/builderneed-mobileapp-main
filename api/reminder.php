<?php
include '../access/connect.php';
date_default_timezone_set('Asia/Kolkata');
$query = mysqli_query($connection, "SELECT title,reason,Notes,reminder_id,sent,lead_id,reminder_date_time,DATE_FORMAT(reminder_date_time, '%e %M %Y') as reminder_date_time
FROM bn_reminders WHERE reminder_date_time BETWEEN CURDATE() AND CURDATE()+INTERVAL 1 DAY");
$count = mysqli_num_rows($query);
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $lead_id = $row['lead_id'];
        $seen = $row['sent'];
        $title = $row['title'];
        $reason = $row['reason'];
        $notes = $row['Notes'];
        $rid = $row['reminder_id'];
        if ($seen <= 0 || $seen == null) {
            $queryLEAD = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leads WHERE lead_id='$lead_id'"));
            $queryUpdate = mysqli_query($connection, "UPDATE bn_reminders SET sent='1' WHERE reminder_id='$rid'");
            //WHATSAPP REMINDER
            if ($queryUpdate) {
                $authKey = "YASWANT2";
                $mobileNumber = "91" . $queryLEAD['phone'];
                $url = "https://takesolution.co.in/sendMessage.php";
                $message = "Hello," . $queryLEAD['name'] . "%0aReminder Alert!.%0aTitle : $title %0aReason : $reason%0aNotes : $notes%0aRegards MyPropBuddy.";
                $postData = array(
                    'AUTH_KEY' => $authKey,
                    'phone' => $mobileNumber,
                    'message' => $message
                );
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $postData
                    //,CURLOPT_FOLLOWLOCATION => true
                ));
                //Ignore SSL certificate verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                //get response
                $output = curl_exec($ch);
                if (curl_errno($ch)) {
                    echo 'error:' . curl_error($ch);
                }
                curl_close($ch);
                echo $message;
            } else {
                echo "No Message sent!";
            }
        } else {
            echo "Reminder already sent!";
        }
    }
} else {
    echo "No Reminder exists for today!";
}
