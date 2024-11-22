<?php

//update faucet cliam amount
//don't edit
function updateFaucetAmount(){
    $famount = $GLOBALS['site_info_row']['faucet_amount_usd']/$GLOBALS['selectedCoin_value'];
    $sql = "UPDATE site_info SET faucet_amount = '$famount' WHERE id = 1 ";
        if ($GLOBALS['conn']->query($sql) === TRUE){

        }
}

