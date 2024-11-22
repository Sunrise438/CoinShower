<?php

/*
 * aite info total eaning ref row
 */
function updateSiteInfoEarning($type, $amount){
    if ($type == 'faucet'){
        $row = 'total_claim_amount';
    }elseif ($type == 'surf') {
        $row = 'total_surf_amount';
    }elseif ($type == 'shortlinks') {
        $row = 'total_shortlinks_amount';
    }elseif ($type == 'buysell') {
        $row = 'total_buysell_amount'; 
        
    }elseif ($type == 'ref_faucet') {
        $row = 'total_claim_ref_amount';        
    }elseif ($type == 'ref_surf') {
        $row = 'total_surf_ref_amount';        
    }elseif ($type == 'ref_shortlinks') {
        $row = 'total_shortlinks_ref_amount';        
    }elseif ($type == 'ref_buysell') {
        $row = 'total_buysell_ref_amount';        
    }
    
    $sql = "UPDATE site_info SET $row = $row + $amount WHERE id = 1 ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
    
}

/*
 * update site info total withdrawal
 */
function updateSiteInfoTotalWithdrawal($amount){
    $sql = "UPDATE site_info SET withdraw_total = withdraw_total + $amount WHERE id = 1 ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}
