<?php
/*
 * get next claim time
 */
function getNextClaimTime(){
    $uname = test_input($_SESSION['uname']);
    date_default_timezone_set("Europe/London");
    //check faucet time
    $FTime = $GLOBALS['site_info_row']['faucet_timer']*60; 
    //check last claime
    $sql = "SELECT date FROM faucet_history WHERE uname = '$uname' ORDER BY id DESC LIMIT 1";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0){
        $lastClaimTime = $row['date'];
        $lastClaimTime = strtotime($lastClaimTime);

        $nextClaimTime = $lastClaimTime + $FTime;

        if ($nextClaimTime < strtotime(date('Y-m-d H:i:s'))){
            return 0;
        }else {
            $nextClaimTimeDaley = $nextClaimTime - strtotime(date('Y-m-d H:i:s'));
            return $nextClaimTimeDaley*1000;

        }
    } else {
        return 0;
    }
}

/*
 * check claim time
 */
function checkClaimTime(){
    $uname = test_input($_SESSION['uname']);
    date_default_timezone_set("Europe/London");
    //check faucet time
    $FTime = $GLOBALS['site_info_row']['faucet_timer']*60; 
    //check last claime
    $sql = "SELECT date FROM faucet_history WHERE uname = '$uname' ORDER BY id DESC LIMIT 1";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0){
        $lastClaimTime = $row['date'];
        $lastClaimTime = strtotime($lastClaimTime);
        $nextClaimTime = $lastClaimTime + $FTime;
        if ($nextClaimTime < strtotime(date('Y-m-d H:i:s'))){
            return 1;
        }else {
            $nextClaimTimeDaley = $nextClaimTime - strtotime(date('Y-m-d H:i:s'));
            $nextClaimTimeDaley = $nextClaimTimeDaley*1000;
            return 0;
        }
    } else {
        return 1;
    }
}

/*
 * //update ref username in faucet history
 */
function updateRefUname($uname, $id){
    $sql = "UPDATE faucet_history SET ref_uname='$uname' WHERE id='$id'";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

/*
 * update faucet claim ref
 */
function updateFaucetClaimRef($id){
    $uname = test_input($_SESSION['uname']);
    $ref_user_info = getRefUserInfo();
    $ref_amount = $GLOBALS['site_info_row']['faucet_amount']/100*$GLOBALS['site_info_row']['faucet_ref_commission'];
    $ref_owener_uname = $ref_user_info['uname'];
    /*
     * update ref owner bal
     */
    if (updateUserBal('bal', $ref_amount, $ref_owener_uname)){
        /*
         * update ref earning
         */
        updateUserBal('ref_faucet', $ref_amount, $ref_owener_uname);
        /*
         * update ref username in faucet history
         */
        updateRefUname($ref_owener_uname, $id);
        /*
         * update ratin from referrals
         */
        updateRatingRef($ref_owener_uname, 'faucet');
        /*
         * update ref row bal
         */
        updateRefBal($uname, 'faucet', $ref_amount);
        /*
         * update site info total faucet earning
         */
        updateSiteInfoEarning('ref_faucet', $ref_amount);
    } else {
        return 0;
    }
}

/*
 * update faucet claim
 */
function updateFaucetClaim(){
    $uname = test_input($_SESSION['uname']);
    /*
     * get date and time
     */
    date_default_timezone_set("Europe/London");
    $claimdate = date('Y-m-d H:i:s');
    $claimAmount = number_format($GLOBALS['site_info_row']['faucet_amount'],10);
    $ok = 0;
    /*
     * insert faucet history
     */
    $sql = "INSERT INTO faucet_history (uname, amount, date)
        VALUES ('$uname', '$claimAmount', '$claimdate')";
    if ($GLOBALS['conn']->query($sql) === TRUE) {
        /*
         * select last climed
         */
        $sql = "SELECT id FROM faucet_history WHERE uname = '$uname' AND date > CURDATE() "
                . "ORDER BY date DESC LIMIT 1";
        $result = $GLOBALS['conn']->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $earn_id = $row['id'];
            /*
             * update main balance
             */
            $ok = updateUserBal('bal', $claimAmount);
            if ($ok){
                /*
                * update status
                */
                $sql = "UPDATE faucet_history SET status = 1 WHERE uname = '$uname' AND id = '$earn_id'";
                if ($GLOBALS['conn']->query($sql)){
                    /*
                     * update user facucet eanrned
                     */
                    updateUserBal('faucet', $claimAmount);
                    /*
                     * update user rating
                     */
                    updateRating('faucet');
                    /*
                     * update site info total task by faucet
                     */
                    updateSiteInfoTotalTask('faucet');
                    /*
                     * update site info total earned by faucet
                     */
                    updateSiteInfoEarning('faucet', $claimAmount);
                    /*
                     * ref commistion update
                     */
                    updateFaucetClaimRef($earn_id);
                }
                return 1;
            } else {
                return 0;
            } 
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}