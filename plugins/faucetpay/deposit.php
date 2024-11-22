<?php

require __DIR__.'/assets/fp/faucetpay_fun.php';
require __DIR__.'/assets/fun/faucetpay_fun.php';
if ($deposit_method['faucetpay']['dep_action']){
    require __DIR__.'/inc/deposit/faucetpay_deposit_form.php';
}
