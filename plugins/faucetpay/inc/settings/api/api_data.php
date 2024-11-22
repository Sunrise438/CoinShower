<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['faucetpayapi'])){
        $FapiKey = test_input($_POST['ffpkey']); //get api key
        $FapiMerchant = test_input($_POST['ffpmerchant']); //get merchant id
        
        updatePaymentsAPI('faucetpay', 'api_key', $FapiKey);
        updatePaymentsAPI('faucetpay', 'merchant', $FapiMerchant);
        header('location:payments');
    } 
}