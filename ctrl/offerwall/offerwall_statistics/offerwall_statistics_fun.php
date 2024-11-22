<?php

//total today offerwall earned 
function totalTodayOfferwallEarn(){
    $FLuname = $GLOBALS['FLuname'];
    $sql = "SELECT COUNT(FLid), SUM(Flreward) FROM flofferwall_history WHERE Flemail='$FLuname' AND FLdate > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}


//total today offerwall earned by referrals
function totalTodayOfferwallEarnRef(){
    $FLuname = $GLOBALS['FLuname'];
    $sql = "SELECT COUNT(FLid), SUM(Flreward) FROM flofferwall_history WHERE FLref_email='$FLuname' AND FLdate > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}