
<?php
 $authKey = "YASWANT2";
        $url = "https://takesolution.co.in/sendMessage.php";
$messagess = "Test Message from Api";
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
            echo $soutput;
            if (curl_errno($chss)) {
                echo 'error:' . curl_error($chss);
            }
            curl_close($chss);