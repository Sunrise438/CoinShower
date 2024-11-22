<?php

//today faucet earned
//don't edit
function todayFaucetEarned($uname){
    $sql = "SELECT SUM(amount) FROM earn_history WHERE status = 1 AND email = '$uname' AND date > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row['SUM(amount)'];
}

//today faucet earned
//don't edit
function todaySurfEarned($uname){
    $sql = "SELECT SUM(amount) FROM surf_history WHERE email = '$uname' AND date > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row['SUM(amount)'];
}

//today shortlinks earned
//don't edit
function todayShortlinksEarned($uname){
    $sql = "SELECT SUM(amount) FROM shortlinks_history WHERE status = 1 AND uname = '$uname' AND date > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row['SUM(amount)'];
}

//today offerwall earned
//don't edit
function todayOfferWallEarned($uname){
    $sql = "SELECT SUM(reward) FROM offerwall_history WHERE status = 1 AND email = '$uname' AND date > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row['SUM(reward)'];
}

//today ref buy sell earned
//don't edit
function todayRefBuySellEarned($user_id){
    $site_info_row = $GLOBALS['site_info_row'];
    $sql = "SELECT SUM(price) FROM ref_buysell_history WHERE status = 1 AND seller = '$user_id' AND date > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row['SUM(price)'] - ($row['SUM(price)']/100*$site_info_row['ref_market_commission']);
}
//today offerwall referrals earned
//don't edit
function todayOfferWallEarnedRef($uname){
    $sql = "SELECT SUM(reward) FROM offerwall_history WHERE status = 1 AND ref_email = '$uname' AND date > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row['SUM(reward)']/100*$GLOBALS['offerwall_ref_commission'];
}