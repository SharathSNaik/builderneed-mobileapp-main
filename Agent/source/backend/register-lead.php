<?php
include_once '../../../access/connect.php';
session_start();
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$source = $_POST['source'];
$agid = 'agent-' . $_SESSION['agent_id'];
$aid = $_SESSION['agent_id'];

$query = mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phone'");
$count = mysqli_num_rows($query);
if ($count == 1) {
    $data = array("status" => "error", "message" => "The Number is already registered");
} else {
    $insert = mysqli_query($connection, "INSERT INTO bn_leads (`phone`,`email`,`name`,`project_id`,registered_by,lead_status,agent_id)values('$phone','$email','$name','$source','$agid','0','$aid')");
    if ($insert) {
        $link = "https://play.google.com/store/apps/details?id=com.builderneed.com";
        $data = array("status" => "OK", "link" => 'https://api.whatsapp.com/send?phone=+91' . $phone . '&text=Your account has been registered in our platform, You can login via this url : ' . $link . ' ', "message" => "Registered Succesfully");
        // $mail = new PHPMailer();
        // $mail->IsSMTP();
        // $mail->Mailer = "smtp";
        // $mail->SMTPDebug  = 0;
        // $mail->SMTPAuth   = TRUE;
        // $mail->SMTPSecure = "tls";
        // $mail->Port       = 465;
        // $mail->Host       = "";
        // $mail->Username   = "";
        // $mail->Password   = "";
        // $mail->IsHTML(true);
        // $mail->Body = '<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
        // <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
        //   <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
        //     <tbody>
        //       <tr>
        //         <td style="vertical-align: top; padding-bottom:30px;" align="center">
        //         <a href=""><img src="ourlogo" style="border:none alt="Logo" title="Logo" style="display:block" width="200" height="50""/></a>
        //       </td>
        //       </tr>
        //     </tbody>
        //   </table>
        //   <div style="padding: 40px; background: #fff;">
        //     <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        //       <tbody><tr><td style="border-bottom:1px solid #f6f6f6;"><h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear ' . $name . ',</h1><p style="margin-top:0px; color:#bbbbbb;">Your new account has been registered in our platform.</p></td></tr><tr><td style="padding:10px 0 30px 0;"><p>Click here to open in app:</p><center><a href="' . $link . '" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #000; background: #8a2be2; border-radius: 60px; text-decoration:none;">Open in App</a></center><b>- Thanks (Team Builderneed)</b> </td></tr>
        //       </tbody>
        //     </table>
        //   </div>
        //   <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
        //   <p>CodersDek © 2020 <br></p></div></div></div>';
        // $mail->AddAddress("$email", "$email");
        // $mail->SetFrom("no-reply@", "no-reply@");
        // $mail->AddReplyTo("no-reply@", "no-reply@");
        // $mail->Subject = 'New Account Registration';
        // $mail->MsgHTML(true);
        // $mail->WordWrap = 200;
        // $headers = "MIME-Version: 1.0" . "\r\n";
        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // $headers .= 'From: no-reply@';
        // $secure_check = sanitize_my_email($user);
        // if ($secure_check == false) {
        //     echo "Invalid input ";
        // } else {
        //     if (!$mail->Send()) {
        //         $sentmail =  "Error while sending Email.";
        //     } else {
        //         $sentmail =  "Email sent successfully";
        //     }
        // }
        if ($source === 17) {


            
            $messagess = "Hello.%0aA new lead has been generated for Saiven Siesta.%0aName : $name%0aMobile : $phone%0aEmail : $email";
            $postDatas = array(
                'AUTH_KEY' => $authKey,
                'phone' => 919900734148,
                'message' => $messagess
            );
            $chss = curl_init();
            curl_setopt_array($chss, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postDatas
                //,CURLOPT_FOLLOWLOCATION => true
            ));
            //Ignore SSL certificate verification
            curl_setopt($chss, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($chss, CURLOPT_SSL_VERIFYPEER, 0);
            //get response
            $soutput = curl_exec($chss);
            if (curl_errno($chss)) {
                echo 'error:' . curl_error($chss);
            }
            curl_close($chss);
        }
    } else {
        $data = array("status" => "error", "message" => "There Was an error while registering, Try Again!".mysqli_error($connection));
    }
}
function sanitize_my_email($field)
{
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
echo json_encode($data);
