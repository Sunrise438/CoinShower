<?php

//reject withdraw
if ($payments_info != 0){
    if ($payments_info['status'] == 0){
        changeCurrentWithdrwalStatus($payments_info['id'], 3);
    }
    
}

if (isset($_GET['redt'])){
    $redt = base64_decode(test_input($_GET['redt']));
} else {
    $redt = '';
}

header('location:withdraw'.$redt);