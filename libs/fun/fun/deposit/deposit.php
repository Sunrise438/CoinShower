<?php

/*
 * show deposit method
 */
function showDepositMethod($method){
    if (is_dir('ctrl/withdraw/withdraw/'.$method)){
        return "ctrl/withdraw/withdraw/$method/deposit.php";
    } else {
        if (is_dir('plugins/'.$method.'/')){
            if (isPV($method)){
                return "plugins/$method/deposit.php";
            }
            
        }
    }
}

/*
 * insert into deposit history
 * don't edit
 */
function depositHistoryUpdate($uname, $amount, $transaction_id, $method){
    $sql = "INSERT INTO deposit_history (uname, amount, method, status, tx_id) "
            . "VALUES ('$uname', '$amount', '$method', '1', '$transaction_id') ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
            
}

/*
 * site info total deposit update
 * don't edit
 */
function updateSiteInfoTotalDeposit($amount){
    $sql = "UPDATE site_info SET total_deposit = total_deposit + $amount WHERE id = 1 ";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }
}