<?php

//update shortlinks value

function updateShortlinksValue(){
    $selectedCoin = $GLOBALS['selectedCoin'];
    $sql = "SELECT value FROM coin_type WHERE status = 1 AND coin = '$selectedCoin'";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    $selectedCoinPriceUSD = $row['value'];

    $sql = "SELECT id, usd_amount FROM shortlinks";
    $result = $GLOBALS['conn']->query($sql);

    if($result->num_rows >0){
        while ($row = $result->fetch_assoc()) {
            $sid  = $row['id'];
            $payamount = $row['usd_amount']/$selectedCoinPriceUSD;
            $payamount = number_format($payamount,9);
            $sql = "UPDATE shortlinks SET pay_amount = '$payamount' WHERE id = '$sid'";
                if ($GLOBALS['conn']->query($sql) === TRUE){

                    //echo $payamount;
                } else {
                    //echo $conn->error;
                }
        }
    }
}

