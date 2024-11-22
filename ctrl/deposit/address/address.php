<?php
require __DIR__.'/fun_address.php';

$deposit_address = getDepositAddress();

if ($deposit_address){
    require __DIR__.'/address_blade.php';
} else {
    echo print_r(createDepositAddress());
}

