<?php

//approve withdrawal
if ($payments_info !== 0){
    if ($payments_info['status'] == 0){
        $payments_method = getPaymentsMethod($payments_info['method']);
        $payments_currency= $payments_info['coin'];
        $payments_id = $payments_info['id'];
        $payments_amount = $payments_info['amount'];
        $payments_address = $payments_info['address'];
        require '../plugins/'.$payments_info['method'].'/payments.php';
    }
}

if (isset($_GET['redt'])){
    $redt = base64_decode(test_input($_GET['redt']));
} else {
    $redt = '';
}

header('location:withdraw'.$redt);