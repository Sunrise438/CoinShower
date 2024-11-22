<?php

//check secure
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
if ($grecap_action == 1){
    
        function CheckCaptcha($userResponse) {
                $fields_string = '';
                $fields = array(
                    'secret' => $GLOBALS['grecap_secret_key'],
                    'response' => $userResponse
                );
                foreach($fields as $key=>$value)
                $fields_string .= $key . '=' . $value . '&';
                $fields_string = rtrim($fields_string, '&');
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
                curl_setopt($ch, CURLOPT_POST, count($fields));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
                $res = curl_exec($ch);
                curl_close($ch);
                return json_decode($res, true);

                   }
            // Call the function CheckCaptcha
           if (isset($_POST['g-recaptcha-response'])){
                $result = CheckCaptcha($_POST['g-recaptcha-response']);
                if ($result['success']) {
                    $recap_ok = 1; //

                }
                } else {
                    $recap_ok = 0;

                }
           }
            
}*/