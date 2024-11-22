<?php

function baltopb($amount){
    $FLuname = $GLOBALS['FLuname'];
    $site_info_row = $GLOBALS['site_info_row'];
    $user_info = userInfoByUsername($FLuname);
    
    if ($user_info['FLbal'] >= $site_info_row['FLmin_baltopb_deposit'] && $amount >= $site_info_row['FLmin_baltopb_deposit']
            && $amount <= $user_info['FLbal']){
        
        //update user bal
        $bal_amount = -$amount;
        $update_user_bal = updateUserBal($FLuname, 'bal', $bal_amount);
        
        if ($update_user_bal == 1){
            //update puchase bal
            $amount = abs($amount);
            $update_puchase_bal = updateUserBal($FLuname, 'p_bal', $amount);
            return 1;
        }
        
    } else {
        return 0;
    }
}

function createBaltopbHistory($amount){
    $FLuname = $GLOBALS['FLuname'];
    $sql = "INSERT INTO flbaltopb_history (FLemail, FLamount) "
            . "VALUES('$FLuname', '$amount')";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

