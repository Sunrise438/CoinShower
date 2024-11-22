<?php

//cancel withdraw
if ($payments_info !== 0){
    if ($payments_info['status'] == 0){
        //retun balance
        if (updateUserBal($payments_info['uname'], 'bal', $payments_info['amount'])){
            changeCurrentWithdrwalStatus($payments_info['id'], 4);
        }
    }
    
}

if (isset($_GET['redt'])){
    $redt = base64_decode(test_input($_GET['redt']));
} else {
    $redt = '';
}

header('location:withdraw'.$redt);