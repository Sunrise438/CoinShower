<?php

require 'libs/fun/coin_value_usd.php';
require requireFaucetFun();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //update coin value
    if (isset($_POST['earnamountupdate'])){
        coinValuUSD();
        updateFaucetAmount();
    }
    
    header('location:faucet');
}
