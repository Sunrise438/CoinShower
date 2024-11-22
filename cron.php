<?php

require 'config/config.php';
require 'libs/site_info.php';
require 'fun/fun/coin_value_usd.php';
//update coin value
coinValuUSD();

//update faucet cliam amount
//don't edit
//should run every 30 minute or 1 hour
function updateFaucetAmount(){
    $earn_amount_usd = $GLOBALS['site_info_row'];
    $famount = $earn_amount_usd['faucet_amount_usd']/$GLOBALS['selectedCoin_value'];
    $sql = "UPDATE site_info SET faucet_amount = '$famount' WHERE id = 1 ";
        if ($GLOBALS['conn']->query($sql) === TRUE){

        }
}

updateFaucetAmount();