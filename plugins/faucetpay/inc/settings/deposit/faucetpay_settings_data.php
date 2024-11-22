<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['faucetpay_depaction'])){
        if ($_POST['faucetpay_depaction']==1 || $_POST['faucetpay_depaction']==0){
            $faucetpay_status = test_input($_POST['faucetpay_depaction']);
            updatePaymentsAPI('faucetpay', 'dep_action', $faucetpay_status);
        }
        header('location:payments');
    }
    
    if (isset($_POST['faucetpay_mindeposit'])){
        $faucetpay_mindeposit = test_input($_POST['faucetpay_mindeposit']);
        updatePaymentsAPI('faucetpay', 'min_deposit', $faucetpay_mindeposit);
        header('location:payments');
    }
    
    

}