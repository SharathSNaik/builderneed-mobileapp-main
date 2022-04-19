<?php
$to = 9483887537;
$otp = 1234;
$ch = curl_init('http://api.equence.in/pushsms/?username=cable_otp&password=in123@%23$R&to=' . $to . '&from=mobiez&text=Dear%20Customer,%20your%20OTP%20code%20is%20' . $otp . '.%20Regards,%20Mobiezy');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
