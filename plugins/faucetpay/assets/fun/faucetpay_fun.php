<?php
/*
 * create faucetpay withdraw
 */
function createWithdrawFaucetpay($address, $amount, $currency){
    $uname = test_input($_SESSION['uname']);
    $amount = abs($amount);
    $amount = number_format($amount, $GLOBALS['site_info_row']['truncate_currency']);
    
    if ($amount <= $GLOBALS['user_info']['bal']  && $amount > 0 && $amount >= $GLOBALS['withdraw_method']['faucetpay']['min_withdraw'] && 
            $amount <= $GLOBALS['withdraw_method']['faucetpay']['max_withdraw'] && !checkLastWithdrawal()){
            /*
             * create withdawal history
             */
        
            if (createWithdrawalHistory($address, $amount, $GLOBALS['withdraw_method']['faucetpay']['type'], 0, $currency)){
                
                if ($GLOBALS['withdraw_method']['faucetpay']['wid_action'] && $GLOBALS['withdraw_method']['faucetpay']['instant_action'] && 
                        $amount >= $GLOBALS['withdraw_method']['faucetpay']['min_withdraw'] &&
                    $amount <= $GLOBALS['withdraw_method']['faucetpay']['max_withdraw_instant'] && countWithdrawalBeforeWithdraw() && 
                        $amount <= $GLOBALS['withdraw_method']['faucetpay']['max_withdraw']){
                    //select unpaid current withdrwal
                    $w_unpaid = selectCurrentUnpaidWithdrwal('faucetpay');
                    
                    if ($w_unpaid != 0){
                        $w_id = $w_unpaid['id'];
                        $amount_coin = calculatePaymentsCurrencyValue('faucetpay', $currency, $w_unpaid['amount']);
                        
                        if ($amount_coin == 0){
                            return;
                        }
                        //pay to faucetpay
                        //check faucetpay balance
                        $fp_bal = getFPbalance($GLOBALS['withdraw_method']['faucetpay']['api_key'], strtoupper($currency));
                        if ($fp_bal['balance_bitcoin'] > $amount_coin){
                             //create withdraw
                             if (createFPwithdraw($GLOBALS['withdraw_method']['faucetpay']['api_key'], strtoupper($currency), $address, $amount_coin) != 0){
                                 /*
                                  * update withdrawal history status as paid
                                  */
                                 changeCurrentWithdrwalStatus($w_id, 1);
                                 /*
                                  * update site info total withdrawal
                                  */
                                 updateSiteInfoTotalWithdrawal($amount);
                                 return 1;
                             }

                        } else {
                            return 0;
                        }
                        
                    }

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

/*
 * create faucetpay payments
 */
function createPaymentsFaucetpay($address, $amount, $currency){
    $fp_bal = getFPbalance($GLOBALS['payments_method']['api_key'], $currency);
    $amount_coin = calculatePaymentsCurrencyValue('faucetpay', $currency, $amount);
    if ($fp_bal['balance_bitcoin'] > $amount_coin){
         /*
          * create withdraw
          */
         if (createFPwithdraw($GLOBALS['payments_method']['api_key'], strtoupper($currency), $address, $amount_coin) != 0){
             /*
              * update withdrawal history status as paid
              */
             changeCurrentWithdrwalStatus($GLOBALS['payments_id'], 1);
             /*
              * update site info total withdrawal
              */
             updateSiteInfoTotalWithdrawal($amount);
             return 1;
         }

    } else {
        return 0;
    }
}