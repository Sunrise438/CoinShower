<?php

/*
 * user bal update
 */
function updateUserBal($bal_type, $amount, $uname=NULL){
    if ($uname == NULL){
        $uname = test_input($_SESSION['uname']);
    } else {
        $uname = test_input($uname);
    }
    
    if ($bal_type == 'bal'){
        $bal_row = 'bal';
    }elseif ($bal_type == 'withdraw'){
        $bal_row = 'bal';
        $amount = -abs($amount);
        
    }elseif ($bal_type == 'p_bal'){
        $bal_row = 'p_bal';
        
    }elseif ($bal_type == 'spend'){
        $bal_row = 'spend';
        
    }elseif ($bal_type == 'faucet'){
        $bal_row = 'earned_faucet';
    }elseif ($bal_type == 'shortlinks') {
        $bal_row = 'earned_shortlink';
    }elseif ($bal_type == 'surf') {
        $bal_row = 'earned_surf';
    }elseif ($bal_type == 'offerwall') {
        $bal_row = 'earned_offerwall';
    }elseif ($bal_type == 'buysell') {
        $bal_row = 'earned_buysell';
        
    }elseif ($bal_type == 'ref_faucet') {
        $bal_row = 'earned_faucet_ref';
    }elseif ($bal_type == 'ref_shortlinks') {
        $bal_row = 'earned_shortlink_ref';
    }elseif ($bal_type == 'ref_surf') {
        $bal_row = 'earned_surf_ref';
    }elseif ($bal_type == 'ref_offerwall') {
        $bal_row = 'earned_offerwall_ref';
    }elseif ($bal_type == 'ref_buysell') {
        $bal_row = 'earned_buysell_ref';
        
    }elseif ($bal_type == 'spend') {
        $bal_row = 'spend';
    }
    
    $sql = "UPDATE users SET $bal_row = $bal_row + $amount WHERE uname = '$uname' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
    
}
