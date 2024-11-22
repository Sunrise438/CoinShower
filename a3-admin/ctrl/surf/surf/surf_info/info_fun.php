<?php

//total surf
function totalSurf($type){
    $min_surf_balance = $GLOBALS['site_info_row']['surf_min_bal'];
    if ($type == 'all'){
        $sql = "SELECT COUNT(id) FROM surf";
    }elseif ($type == 'inactive') {
        $sql = "SELECT COUNT(id) FROM surf WHERE active = 0";
    }elseif ($type == 'active') {
        $sql = "SELECT COUNT(id) FROM surf WHERE active = 1 AND balance > '$min_surf_balance' ";
    }elseif ($type == 'delete') {
        $sql = "SELECT COUNT(id) FROM surf WHERE status = 5 AND balance > '$min_surf_balance' ";
    } else {
        $sql = "SELECT COUNT(id) FROM surf";
    }
    
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row['COUNT(id)'];
}  

//total surf amount
function totalSurfAmount(){
    $min_surf_balance = $GLOBALS['site_info_row']['surf_min_bal'];
    
    $sql = "SELECT COUNT(price) FROM surf WHERE active = 1 AND balance > '$min_surf_balance' ";
    
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row['COUNT(price)'];
}

//today surf viewed
function todaySurfView(){
    $sql = "SELECT COUNT(id), SUM(amount), COUNT(DISTINCT uname) FROM surf_history WHERE date > CURDATE() ";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

//today referrals climed info
function todayReferralsSurf(){
    $sql = "SELECT COUNT(id), SUM(amount) FROM surf_history  WHERE date > CURDATE() AND ref_uname IS NOT NULL";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}