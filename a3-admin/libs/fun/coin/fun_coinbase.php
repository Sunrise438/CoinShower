<?php

function coinbaseCoinPriceUSD($coin){
     // Step 1
    $cSession = curl_init(); 
    // Step 2
    curl_setopt($cSession,CURLOPT_URL,"https://api.coinbase.com/v2/exchange-rates?currency=".$coin);
    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cSession,CURLOPT_HEADER, false); 
    // Step 3
    $result=curl_exec($cSession);

    // Step 4
    curl_close($cSession); 
    //echo $result;
    // Step 5
    $result = json_decode($result, TRUE, 512, JSON_BIGINT_AS_STRING);

    if (isset($result['errors'])){
        return 0;
    } else {
        if (isset($result['data']['rates']['USD'])){
            $coinPriceUSD = $result['data']['rates']['USD'];
            $coinPriceUSD = floatval($coinPriceUSD);
            return $coinPriceUSD;
        } else {
            return 0;
        }
    }
}
