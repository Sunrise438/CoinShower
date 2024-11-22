<?php
//update coin value usd
function coinValuUSD(){
    //select coin 
    $lsql = "SELECT * FROM coin_type WHERE status = 1 ";
    $lresult = $GLOBALS['conn']->query($lsql);

    if ($lresult->num_rows > 0){
        while ($lrow = $lresult->fetch_assoc()){
        $c = ($lrow['coin']);

            // Step 1
            $cSession = curl_init(); 
            // Step 2
            curl_setopt($cSession,CURLOPT_URL,"https://api.coinbase.com/v2/exchange-rates?currency=".$c);
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

            } else {
                $coinPriceUSD = $result['data']['rates']['USD'];
                $coinPriceUSD = floatval($coinPriceUSD);
                $coinType = $result['data']['currency'];
                //echo $coinType.'<br><br>'.$coinPriceUSD;

                //update coin price
                $sql = "UPDATE coin_type SET value = '$coinPriceUSD' WHERE coin = '$coinType'";
                if ($GLOBALS['conn']->query($sql) === TRUE){
                    //echo '<br>'.$coinPriceUSD.'<br><br>';
                }
            }



    }
    }
}

