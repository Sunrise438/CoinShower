<?php

function coinpaymentsApiKey(){
    $sql = "SELECT * FROM api_key WHERE type = 'coinpayments'";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

function coinpaymentsCoinPrice($coin){
    $coinpayments = coinpaymentsApiKey();
    
    //Set the API command and required fields
        $req['version'] = 1;
                    $req['cmd'] = 'rates';
                    $req['key'] = $coinpayments['pub_key'];
                    $req['format'] = 'json';//supported values are json and xml

    // Generate the query string
    $post_data = http_build_query($req, '', '&');

    // Calculate the HMAC signature on the POST data
    $hmac = hash_hmac('sha512', $post_data, $coinpayments['pri_key']);

    // Create cURL handle and initialize 
    $ch = curl_init('https://www.coinpayments.net/api.php');

    curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


    curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: '.$hmac));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);


    $data = curl_exec($ch);
    //echo $data;
    curl_close($ch);



    if ($data !== FALSE) {
        //genatate address update sql
        $decDATA = json_decode($data, TRUE, 512, JSON_BIGINT_AS_STRING);
        return ($decDATA['result'][$coin]['rate_btc']);

    }else{
        return 0;
    }
    
}
