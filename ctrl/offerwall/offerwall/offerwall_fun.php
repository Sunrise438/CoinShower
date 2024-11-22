<?php
/*
 * Important!
 */
function requirePostback(){
    return __DIR__.'/require_postback.php';
}

/*
 * offer
 * Important!
 */
function updateOfferWallReward($user_id, $offerwall_name, $transaction_id, $payout, $status){
    if (isOfferWallTask($offerwall_name, $transaction_id)){
        return 0;
    }
    
    $user = userInfoByUsername($user_id);
    if (!$user){
        return 0;
    }
    
    if ($user['uname'] != $user_id){
        return 0;
    }
    
    $reward = $payout/$GLOBALS['selectedCoin_value'];
    $reward1 = $reward/100*$GLOBALS['site_info_row']['offerwall_commission'];
    $reward1 = number_format($reward1,10);
    
    if ($status == 1){
        $reward1 = abs($reward1);
    }else if($status == 2){
        $reward1 = -abs($reward1);
    } else {
        return 0;
    }

    /*
     * update offerwall history
     */

    if (insertOfferwallHistory($user_id, $offerwall_name, $transaction_id, $reward1, 1) !== 0){

        /*
         * update user balance
         */
        updateUserBal('bal', $reward1, $user_id);

                

        /*
         * user earning by offerwall update
         */
        updateUserBal('offerwall', $reward1, $user_id);
        

        /*
         * update site info total offerwall task
         */

        updateSiteInfoTotalTask('offerwall');

        

        /*
         * update site info total earned from offerwall
         */

        updateSiteInfoEarning('offerwall', $reward1);

        

        /*
         * update offerwall earning by each offerwall
         */

        earningByOfferwall($offerwall_name, 'offerwall', $reward1);

        

        /*
         * update offerwall tasks by each offerwall
         */

        updateOfferwallTasks($offerwall_name);

        

        /*
         * update rating
         */

        updateRating('offerwall', $user_id);

        

        

        /*
         *  pay for referrals
         */

        $ref_amount = $reward/100*$GLOBALS['site_info_row']['offerwall_ref_commission'];

        $ref_amount = number_format($ref_amount,10);



        $refok = 0;

        /*
         * check referrals info
         */

        $ref_info = getRefUserInfo($user_id);



        if ($ref_info != 0){

            /*
             * check referrals info
             */

            $ref_owener_id = $ref_info['email'];

            $ref_owener_info = userInfoById($ref_owener_id);

            $ref_owener_uname = $ref_owener_info['email'];

            $ref_uname = $ref_info['ref_email'];

            

            $refok = 1;



        }





        if ($refok == 1){

            /*
             * update ref user balance
             */
            updateUserBal('bal', $ref_amount, $ref_owener_uname);

        

            /*
             * update ref bal
             */
            updateUserBal('ref_offerwall', $ref_amount, $ref_owener_uname);



            /*
             * update ref row
             */

            updateRefBal($user_id, 'offerwall', $ref_amount);



            /*
             * update ref on ref buy sell history
             */

            changeOfferwallHistoryReferral($ref_owener_uname, $transaction_id);



            /*
             * update site total earning
             */

            updateSiteInfoEarning('ref_offerwall', $ref_amount);

            

            /*
             * update offerwall earning by each offerwall ref
             */

            earningByOfferwall($offerwall_name, 'ref_offerwall', $ref_amount);

            

            /*
             * update rating from ref
             */

            updateRatingRef($ref_owener_uname, 'offerwall');

        }

    }
}