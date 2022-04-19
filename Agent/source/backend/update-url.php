<?php
include_once '../../../access/connect.php';
// include("../../../mailer/PHPMailerAutoload.php");
$vid = $_POST['vid'];
$link = $_POST['link'];
$lid = $_POST['lid'];
$querys = mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE visit_id = '$vid'");
$count = mysqli_num_rows($querys);
if ($count > 0) {
    $aquery = mysqli_query($connection, "UPDATE bn_site_visit_info SET `url` = '$link' WHERE visit_id='$vid'");
    if ($aquery) {
        $getname = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leads WHERE lead_id='$lid'"));
        $lemail = $getname['email'];
        $data = array("status" => "OK", "message" => 'Updated link URL');
        //MAIL
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
        //       <tbody><tr><td style="border-bottom:1px solid #f6f6f6;"><h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear Sir/Madam,</h1><p style="margin-top:0px; color:#bbbbbb;">Here are your site visit meeting scheduled.</p></td></tr><tr><td style="padding:10px 0 30px 0;"><p>click below to join the meeting:</p><center><a href="' . $link . '" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #000; background: #8a2be2; border-radius: 60px; text-decoration:none;">JOIN MEETING</a></center><b>- Thanks (Team Builderneed)</b> </td></tr>
        //       </tbody>
        //     </table>
        //   </div>
        //   <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
        //   <p>CodersDek © 2020 <br></p></div></div></div>';
        // $mail->AddAddress("$lemail", "$lemail");
        // $mail->SetFrom("no-reply@", "no-reply@");
        // $mail->AddReplyTo("no-reply@", "no-reply@");
        // $mail->Subject = 'Site Visit Scheduled';
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
    } else {
        $data = array("status" => "KO", "message" => 'Failed Updating URL');
    }
} else {
    $data = array("status" => "KO", "message" => 'Failed Updating URL');
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
