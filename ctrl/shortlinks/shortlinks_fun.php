<?php

/*
 * get shortlinks
 */
function getShortlinks(){
    $uname = test_input($_SESSION['uname']);
    $sql = "SELECT * FROM shortlinks WHERE status = '1' ORDER BY pay_amount DESC";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0){
        $row_arr = array();
        $i = 0;
        while ($row = $result->fetch_assoc()){
            $link = $row['link'];
            $csql = "SELECT COUNT(id) FROM shortlinks_history WHERE "
            . "link = '$link' AND uname = '$uname' AND date > CURDATE()";
            $cresult = $GLOBALS['conn']->query($csql);
            $crow = $cresult->fetch_assoc();
            if ($crow['COUNT(id)'] < $row['view_limit'] ){
                $row['view_limit'] = $row['view_limit'] - $crow['COUNT(id)'];
                $row_arr[$i] = $row;
            }
            $i++;
        }
        return $row_arr;
    }
}

/*
 * select shortlinks
 * don't edit
 */
function selectShortlinksByLink($shortlinks_link){
    $sql = "SELECT * FROM shortlinks WHERE link = '$shortlinks_link'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

//select short link history
//don't edit
function checkViewedShortlinksFromHistoryByLink($shortlinks_link, $view_limit){
    $uname = test_input($_SESSION['uname']);
    $sql = "SELECT id FROM shortlinks_history WHERE link = '$shortlinks_link' AND uname = '$uname' AND "
            . "date > CURDATE()";
        $result = $GLOBALS['conn']->query($sql);
        if ($result->num_rows < $view_limit){
            return 1;
        } else {
            return 0;
        }
}

//select shortlinks history
//don't edit
function insertShortlinksTntoHistory($shortlinks_link, $amount){
    $uname = test_input($_SESSION['uname']);
    $sql = "INSERT INTO shortlinks_history (link, uname, amount) "
            . "VALUES('$shortlinks_link', '$uname', '$amount')";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

//update shortlinks history status
//don't edit
function updateShortlinksHistoryStatus($shortlinks_link){
    $uname = test_input($_SESSION['uname']);
    $sql = "UPDATE shortlinks_history SET status = 1 WHERE uname = '$uname' AND "
            . "link = '$shortlinks_link' AND date > CURDATE() ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

//update shortlinks total views
//don't edit
function updateShortlinksTotalViews($shortlinks_link){
    $sql = "UPDATE shortlinks SET view = view + '1' WHERE link = '$shortlinks_link'";
    if ($GLOBALS['conn']->query($sql) === TRUE){

    }
}


//update ref username in shortlinks history
function updateRefUsernameInShortlinksHistory($uname, $ref_email, $shortlinks_link){
    $sql = "SELECT id FROM shortlinks_history WHERE uname = '$uname' AND link = '$shortlinks_link' "
            . "ORDER BY id DESC LIMIT 1";
    $result = $GLOBALS['conn']->query($sql);
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $cid = $row['id'];

        //update ref username 
        $sql = "UPDATE shortlinks_history SET ref_uname='$ref_email' WHERE id='$cid'";
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
 * update shortlinks ref
 */
function updateShortlinksRef($amount, $vlink){
    $uname = test_input($_SESSION['uname']);
    $shortlinks_ref_amount = $amount/100*$GLOBALS['site_info_row']['shortlinks_ref_commission'];
    $shortlinks_ref_amount = number_format($shortlinks_ref_amount,10);

    $user_info_ref = getRefUserInfo();
    
    if ($user_info_ref != 0){
        /*
         * ref owener
         */
        $ref_owener_uname = $user_info_ref['uname'];
        
        /*
         * update ref user shortlinks earning
         */
        if (updateUserBal('bal', $shortlinks_ref_amount, $ref_owener_uname)){
            /*
             * update user ref earning
             */
            updateUserBal('ref_shortlinks', $shortlinks_ref_amount, $ref_owener_uname);

            /*
             * update rating
             */
            updateRatingRef($ref_owener_uname, 'shortlinks');

            updateRefUsernameInShortlinksHistory($uname, $ref_owener_uname, $vlink);

            /*
             * updatesite info total shortlinks ref amoubt
             */
            updateSiteInfoEarning('ref_shortlinks', $shortlinks_ref_amount);

            /*
             * update ref row shortlinks earning
             */
            updateRefBal($uname, 'shortlinks', $shortlinks_ref_amount);

        }
    }
}

/*
 * update shortlinks 
 */
function updateShortlinks($vlink){
    $selected_shortlinks = selectShortlinksByLink($vlink);
    
    if ($selected_shortlinks != 0){
        $vlimit = $selected_shortlinks['view_limit'];
        $amount = $selected_shortlinks['pay_amount'];

        /*
         * check short link history
         */
        if (checkViewedShortlinksFromHistoryByLink($vlink, $vlimit)){
            /*
             * insert into shortlinks history
             */
            if (insertShortlinksTntoHistory($vlink, $amount)){
                /*
                 * update user shortlinks earning
                 */
                if (updateUserBal('bal', $amount)){
                    /*
                     * update user shortlinks earning
                     */
                    updateUserBal('shortlinks', $amount);
                    
                    /*
                     * update shortlinks status
                     */
                    updateShortlinksHistoryStatus($vlink);
                    
                    /*
                     * update shortlinks total views
                     */
                    updateShortlinksTotalViews($vlink);
                    
                    /*
                     * update rating
                     */
                    updateRating('shortlinks');
                    
                    /*
                     * updatesite info total shortlinks view
                     */
                    updateSiteInfoTotalTask('shortlinks');
                    
                    /*
                     * updatesite info total shortlinks amoubt
                     */
                    updateSiteInfoEarning('shortlinks', $amount);
                    
                    /*
                     * update ref commissions
                     */
                    updateShortlinksRef($amount, $vlink);
                }
            }
        }
    }
}