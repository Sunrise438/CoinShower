<?php

/*
 * update surf history
 */
function updateSurfHistory($id, $amount){
    $uname = test_input($_SESSION['uname']);
    $sql = "INSERT INTO surf_history (uname, surf_id, amount, status) "
            . "VALUES('$uname', '$id', '$amount', '1')";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }
    
}

/*
 * add referrals into surf history
 */
function updateSurfHistoryReferral($ref_owener_uname){
    $sql = "SELECT id FROM surf_history ORDER BY date DESC LIMIT 1";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        $surf_his_id = $row['id'];
        
        $sql = "UPDATE surf_history SET ref_uname = '$ref_owener_uname' ";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

/*
 * update total surf viewed
 */
function surfViewed($id, $price){
    $sql = "UPDATE surf SET view = view + 1, balance = balance - $price WHERE id = '$id' ";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }
    
}

/*
 * update surf ref
 */
function updateSurfViewRef($id){
    $uname = test_input($_SESSION['uname']);
    $ref_user_info = getRefUserInfo();
    $ref_amount = $GLOBALS['site_info_row']['faucet_amount']/100*$GLOBALS['site_info_row']['surf_ref_commission'];
    $ref_owener_uname = $ref_user_info['uname'];
    /*
     * update ref owner bal
     */
    if (updateUserBal('bal', $ref_amount, $ref_owener_uname)){
        /*
         * update ref earning
         */
        updateUserBal('ref_surf', $ref_amount, $ref_owener_uname);
        /*
         * update ref username in surf history
         */
        updateSurfHistoryReferral($ref_owener_uname);
        /*
         * update ratin from referrals
         */
        updateRatingRef($ref_owener_uname, 'surf');
        /*
         * update ref row bal
         */
        updateRefBal($uname, 'surf', $ref_amount);
        /*
         * update site info total faucet earning
         */
        updateSiteInfoEarning('ref_surf', $ref_amount);
        return 1;
    } else {
        return 0;
    }
}

/*
 * update surf view
 */
function updateSurfView($id){
    $uname = test_input($_SESSION['uname']);
    
    /*
     * get viewd surf info
     */
    $surf_info = getSurfById($id);
    
    /*
     * surf balance
     */
    $balance = $surf_info['balance'];

    if ($surf_info != 0 && $balance > $GLOBALS['site_info_row']['surf_min_bal']){
        $surf_id = $surf_info['id'];
        $surf_price = $surf_info['price'];
        $surf_amount = $surf_price/100*$GLOBALS['site_info_row']['surf_commission'];

        /*
         * update surf history
         */
        updateSurfHistory($surf_id, $surf_amount);
        
        /*
         * update surf viewed
         */
        surfViewed($surf_id, $surf_price);
        
        /*
         * update user bal
         */
        updateUserBal('bal', $surf_amount);
        
        /*
         * update user surf earned
         */
        updateUserBal('surf', $surf_amount);
        
        /*
         * update site tiotal earning
         */
        updateSiteInfoEarning('surf', $surf_amount);

        /*
         * update total views in site info
         */
        updateSiteInfoTotalTask('surf');

        /*
         * update user rating
         */
        updateRating('surf');
        
        /*
         * update surf ref commissions
         */
        updateSurfViewRef($uname, $id);

    }
}