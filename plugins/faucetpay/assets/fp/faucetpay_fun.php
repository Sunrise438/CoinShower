<?php

/*
 * get faucetpay balance
 */
function getFPbalance($faucetpay_api_key, $selectedCoin){

            //Set the API command and required fields
                $req['version'] = 1;
                            $req['api_key'] = $faucetpay_api_key;
                            $req['currency'] = strtoupper($selectedCoin);

            // Generate the query string
            $post_data = http_build_query($req, '', '&');

            // Calculate the HMAC signature on the POST data
            //$hmac = hash_hmac('sha512', $post_data, $private_key);

            // Create cURL handle and initialize 
            $ch = curl_init('https://faucetpay.io/api/v1/balance');

            curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


            //curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: '.$hmac));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);


            $data = curl_exec($ch);
            //echo $data;
            curl_close($ch);



    if ($data !== FALSE) {
        //genatate address update sql
        $decDATA = json_decode($data, TRUE, 512, JSON_BIGINT_AS_STRING);
        

        if ($decDATA['status'] == 200 && $decDATA['message'] = 'OK'){
            return $decDATA;

        } else {
            return 0;
        }

    } else {
        return 0;
    }
}

/*
 * faucetpa create withdraw
 */
function createFPwithdraw($faucetpay_api_key, $selectedCoin, $faucetpayEmail, $claimAmount){

        //Set the API command and required fields
            $req['version'] = 1;
                        $req['api_key'] = $faucetpay_api_key;
                        $req['currency'] = strtoupper($selectedCoin);
                        $req['amount'] = $claimAmount*100000000;
                        $req['to'] = $faucetpayEmail;

        // Generate the query string
        $post_data = http_build_query($req, '', '&');

        // Calculate the HMAC signature on the POST data
        //$hmac = hash_hmac('sha512', $post_data, $private_key);

        // Create cURL handle and initialize 
        $ch = curl_init('https://faucetpay.io/api/v1/send');

        curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: '.$hmac));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);


        $data = curl_exec($ch);
        //echo $data;
        curl_close($ch);



    if ($data !== FALSE) {
        //genatate address update sql
        $decDATA = json_decode($data, TRUE, 512, JSON_BIGINT_AS_STRING);

        if ($decDATA['status'] == 200 && $decDATA['message'] == 'OK'){
            return $decDATA;
        } else {
            return 0;
        }

    } else {
        return 0;
    }
}