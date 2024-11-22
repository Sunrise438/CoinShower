<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $amount = test_input($_POST['amount']);
    $faucetpay_email = test_input($_POST['address']);
    $currency = test_input($_POST['currency']);

    createWithdrawFaucetpay($faucetpay_email, $amount, $currency);
    header('location:withdraw');
}