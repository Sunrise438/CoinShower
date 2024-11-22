<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (isset($_POST['token'])){
    require '../../config/config.php';
    require '../../libs/fun/fun.php';
    require '../../libs/site_info.php';
    require requireUpdateSiteInfo();
    require requireApiFun();
    require requireDepositFun();
    require requireUserBal();

    $token = test_input($_POST['token']);
    $payment_info = file_get_contents("https://faucetpay.io/merchant/get-payment/" . $token);
    $payment_info = json_decode($payment_info, true);
    $token_status = $payment_info['valid'];

    $merchant_username = test_input($payment_info['merchant_username']);
    $amount1 = test_input($payment_info['amount1']);
    $currency1 = test_input($payment_info['currency1']);
    $amount2 = test_input($payment_info['amount2']);
    $currency2 = test_input($payment_info['currency2']);
    $custom = test_input($payment_info['custom']);
    $transaction_id = test_input($payment_info['transaction_id']);


    if ($deposit_method['faucetpay']['merchant'] == $merchant_username && $token_status == true) {

        /*
         * update user purchase balance
         */
        $amount_deposited = calculatePaymentsSiteCurrencyValue('faucetpay', strtolower($currency1), $amount1);
        updateUserBal('p_bal', abs($amount_deposited), $custom);
        /*
         * update deposit history
         */
        depositHistoryUpdate($custom, $amount_deposited, $transaction_id, 'faucetpay');
        /*
         * update site total deposit
         */
        updateSiteInfoTotalDeposit($amount_deposited);

        echo 'Process the payment if the amount1 and currency1 match.';

    } else {

        echo 'Someone is trying to hack you.';

    }

    $conn->close();
    }
}
exit();