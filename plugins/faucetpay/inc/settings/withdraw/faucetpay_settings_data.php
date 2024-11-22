<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if (isset($_POST['faucetpay_action'])){
        $fpaction = test_input($_POST['faucetpay_action']);
        if ($fpaction == 0 || $fpaction == 1){
            updatePaymentsAPI('faucetpay', 'wid_action', $fpaction);
        }
        
    }
    
    if (isset($_POST['faucetpay_instant'])){
        $fpinstant = test_input($_POST['faucetpay_instant']);
        if ($fpinstant == 0 || $fpinstant == 1){
            updatePaymentsAPI('faucetpay', 'instant_action', $fpinstant);
        }
        
    }
    
    if (isset($_POST['faucetpay_minwithdraw'])){
        $minwithdrawfp = test_input($_POST['faucetpay_minwithdraw']);
        updatePaymentsAPI('faucetpay', 'min_withdraw', $minwithdrawfp);
    }
    
    if (isset($_POST['faucetpay_maxwithdraw'])){
        $maxwithdrawfp = test_input($_POST['faucetpay_maxwithdraw']);
        updatePaymentsAPI('faucetpay', 'max_withdraw', $maxwithdrawfp);
    }
    
    if (isset($_POST['faucetpay_maxwithdraw_instant'])){
        $maxwithdrawfpinstant = test_input($_POST['faucetpay_maxwithdraw_instant']);
        updatePaymentsAPI('faucetpay', 'max_withdraw_instant', $maxwithdrawfpinstant);
    }
    
    header('location:payments');

}