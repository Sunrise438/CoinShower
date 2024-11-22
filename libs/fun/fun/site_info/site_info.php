<?php

//total tasks
//don't edit
function totalTask(){
    $site_info_row = $GLOBALS['site_info_row'];
    return $site_info_row['total_claim']+$site_info_row['total_surf']+$site_info_row['total_shortlinks']+$site_info_row['total_offerwall'];
}

//total tasks
//don't edit
function totalEarned(){
    $site_info_row = $GLOBALS['site_info_row'];
    $tot = $site_info_row['total_claim_amount']+$site_info_row['total_claim_ref_amount']
            +$site_info_row['total_surf_amount']+$site_info_row['total_surf_ref_amount']
            +$site_info_row['total_shortlinks_amount']+$site_info_row['total_shortlinks_ref_amount']
            +$site_info_row['total_buysell_amount']+$site_info_row['total_offerwall_ref_amount']
            +$site_info_row['total_buysell_ref_amount']+$site_info_row['total_buysell_ref_amount'];
    return number_format($tot,8);
}

/*
 * aite info total eaning ref row
 */
function updateSiteInfoTotalTask($type){
    if ($type == 'faucet'){
        $row = 'total_tasks_faucet';
    }elseif ($type == 'surf') {
        $row = 'total_tasks_surf';
    }elseif ($type == 'offerwall') {
        $row = 'total_tasks_offerwall';
    }elseif ($type == 'shortlinks') {
        $row = 'total_tasks_shortlinks';
    }
    
    $sql = "UPDATE site_info SET $row = $row + 1 WHERE id = 1 ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
    
}

/*
 * aite info total eaning ref row
 */
function updateSiteInfoEarning($type, $amount){
    if ($type == 'faucet'){
        $row = 'total_faucet_amount';
    }elseif ($type == 'surf') {
        $row = 'total_surf_amount';
    }elseif ($type == 'shortlinks') {
        $row = 'total_shortlinks_amount';
    }elseif ($type == 'offerwall') {
        $row = 'total_offerwall_amount';
    }elseif ($type == 'buysell') {
        $row = 'total_buysell_amount'; 
        
    }elseif ($type == 'ref_faucet') {
        $row = 'total_faucet_ref_amount';        
    }elseif ($type == 'ref_surf') {
        $row = 'total_surf_ref_amount';        
    }elseif ($type == 'ref_shortlinks') {
        $row = 'total_shortlinks_ref_amount';        
    }elseif ($type == 'ref_offerwall') {
        $row = 'total_offerwall_ref_amount';        
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
