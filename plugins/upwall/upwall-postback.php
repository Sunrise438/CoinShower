<?php

/*
 * upwall
 * Important!
 */
require '../../ctrl/offerwall/offerwall/offerwall_fun.php';
require requirePostback();

/*
 * select offerwall type and action
 * Important!
 */
$offerwall_name = 'upwall';
$offerwall_info = offerwallInfo($offerwall_name);
$secret = $offerwall_info['secret_key'];


$subId = isset($_POST['subId']) ? test_input($_POST['subId']) : null;
$transId = isset($_POST['transactionId']) ? test_input($_POST['transactionId']) : null;
$reward = isset($_POST['reward']) ? test_input($_POST['reward']) : null;
$signature = isset($_POST['signature']) ? test_input($_POST['signature']) : null;
$status = isset($_POST['status']) ? test_input($_POST['status']) : null;

/*
* Validate Signature
*/
if(hash('md5', $subId.$transId.$reward.$secret) != $signature){

    echo "ERROR: Signature doesn't match";

    return;

}

/*
 * ip whitelist
 * Important!
 */
if (strlen($offerwall_info['ip_whitelist']) > 0){
    if (!explode(" , ", checkOfferwallWhitelisting($offerwall_info['ip_whitelist']))){
        echo "ERROR: Invalid source";
        return;
    }
    
}


if ($offerwall_info['status']){
    $payout = isset($_POST['payout']) ? test_input($_POST['payout']) : null;
    $payout = $payout/$selectedCoin_value;
    $reward1 = $payout/100*$offerwall_commission;
    $reward1 = number_format($reward1,10);

    updateOfferWallReward($subId, $offerwall_name, $transId, $reward1, $status);

}

echo "ok"; // Important!

$conn->close();

exit();