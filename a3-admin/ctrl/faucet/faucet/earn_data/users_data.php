<?php

//today climed info
function todayClaimed(){
    $sql = "SELECT COUNT(id), SUM(amount) FROM faucet_history  WHERE date > CURDATE() AND status = 1";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

//today referrals climed info
function todayReferralsClaimed(){
    $sql = "SELECT COUNT(id), SUM(amount) FROM faucet_history  WHERE date > CURDATE() AND status = 1 AND ref_uname IS NOT NULL";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}