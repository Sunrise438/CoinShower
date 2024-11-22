<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['action']) && isset($_POST['dep_status']) && isset($_POST['wid_status'])){
        $action = test_input($_POST['action']);
        $value = test_input($_POST['value']);
        $dep_status = test_input($_POST['dep_status']);
        $wid_status = test_input($_POST['wid_status']);
        changePaymentsCurrencyStatus($action, $value, $dep_status, $wid_status);
        header('location:coin_type');
    } 
  
}