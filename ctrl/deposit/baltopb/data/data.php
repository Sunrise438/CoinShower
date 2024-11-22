<?php

session_start();

if (isset($_SESSION['FLuname'])){
    require '../../../../config/config.php';
    require '../../../../fun/fun.php';
    require '../../../../libs/site_info.php';
    require '../../../../fun/fun/user/user_info.php';
    
    $FLuname = $_SESSION['FLuname'];
    $user_info = userInfoByUsername($FLuname);
    
    $amount = test_input($_POST['txt']);
    $amount = abs($amount);

    if ($user_info['FLbal'] >= $site_info_row['FLmin_baltopb_deposit'] && $amount >= $site_info_row['FLmin_baltopb_deposit']
            && $amount <= $user_info['FLbal']){
        echo 1;
    } else {
        echo 0;
    }

}

$conn->close();
exit();