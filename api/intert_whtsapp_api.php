<?php
$result = array("userId" => "", "phoneNumber" => $op_phone, "countryCode" => "+91", "traits" => $data);
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
    'Authorization: Basic ZUVneFN0emF4QUVCekdWX3AxQ0hfRGFDTEJzbW9GMXU4SzZzMEp3MmRLYzo='
  ),
));

$response = curl_exec($curl);
echo $response;
curl_close($curl);
