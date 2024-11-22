<?php

//today offerwall info
function todayOfferWall(){
    $sql = "SELECT COUNT(id), SUM(reward) FROM offerwall_history  WHERE date > CURDATE() AND status = 1";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

//today referrals offerwall info
function todayReferralsOfferWall(){
    $sql = "SELECT COUNT(id), SUM(reward) FROM offerwall_history  WHERE date > CURDATE() AND status = 1 AND ref_uname IS NOT NULL";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}