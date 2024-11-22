<?php
require __DIR__.'/coin/fun_coinbase.php';
require __DIR__.'/coin/fun_coinpayments.php';
//update coin value usd
function coinValuUSD(){
    //select coin 
    $lsql = "SELECT * FROM coin_type ";
    $lresult = $GLOBALS['conn']->query($lsql);

    if ($lresult->num_rows > 0){
        while ($lrow = $lresult->fetch_assoc()){
            $coin_type = $lrow['coin'];
            $coin = strtoupper($lrow['coin']);

            if ($coin == 'TRX'){
                $coinPriceUSD = coinpaymentsCoinPrice($coin)*coinbaseCoinPriceUSD('BTC');
                $coinPriceUSD = number_format($coinPriceUSD,10);
            } else {
                $coinPriceUSD = number_format(coinbaseCoinPriceUSD($coin), 10);
            }
            $bad_symbols = array(",");
            $coinPriceUSD = str_replace($bad_symbols, "", $coinPriceUSD);
            //update coin price
            if ($coinPriceUSD != 0){
                $sql = "UPDATE coin_type SET value = '$coinPriceUSD' WHERE coin = '$coin_type'";
                $GLOBALS['conn']->query($sql);
                
                $sql = "UPDATE payments_currency SET rate = '$coinPriceUSD' WHERE currency = '$coin_type'";
                $GLOBALS['conn']->query($sql);
            }
        }
    }
}

