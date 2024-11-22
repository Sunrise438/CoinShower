<?php

/*
 * today offerwall earning
 */
function todayOfferwallEarning($offerwall){
    $uname = test_input($_SESSION['uname']);
    $sql = "SELECT COUNT(id), SUM(reward) FROM offerwall_history "
            . "WHERE uname = '$uname' AND offerwall = '$offerwall' AND date > CURDATE() ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

/*
 * today offerwall earning ref
 */
function todayOfferwallEarningRef($offerwall){
    $uname = test_input($_SESSION['uname']);
    $sql = "SELECT COUNT(id), SUM(reward) FROM offerwall_history "
            . "WHERE ref_uname = '$uname' AND offerwall = '$offerwall' AND date > CURDATE() ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

/*
 * total today offerwall earned 
 */
function totalTodayOfferwallEarn(){
    $uname = $GLOBALS['uname'];
    $sql = "SELECT COUNT(id), SUM(reward) FROM offerwall_history WHERE uname='$uname' AND date > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

/*
 * total today offerwall earned by referrals
 */
function totalTodayOfferwallEarnRef(){
    $uname = $GLOBALS['uname'];
    $sql = "SELECT COUNT(id), SUM(reward) FROM offerwall_history WHERE ref_email='$uname' AND date > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

/*
 * today offerwall earning by user
 */
function todayOfferwallEarningByUser($offerwall){
    $sql = "SELECT COUNT(id), SUM(reward) FROM offerwall_history "
            . "WHERE offerwall = '$offerwall' AND date > CURDATE() ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

//offerwall info
//don't edit
function offerwallInfo($name){
    $sql = "SELECT * FROM offerwall_action WHERE offerwall_name = '$name' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}


/*
 * is OfferWall task
 */
function isOfferWallTask($offerWall, $transaction_id){
    $sql = "SELECT id FROM offerwall_history "
            . "WHERE offerwall = '$offerWall' AND offer_name = '$transaction_id' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return 1;
    } else {
        return 0;
    }
}


//update offerwall history
//don't edit
function insertOfferwallHistory($user_id, $offerwall, $transaction_id, $reward, $status){
    $sql = "INSERT INTO offerwall_history (uname, offerwall, offer_name, reward, status)
    VALUES ('$user_id', '$offerwall', '$transaction_id', '$reward', '$status')";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        return 1;
    } else {
        return 0;
    }
}

//update ref on offerwall history
//don't edit
function changeOfferwallHistoryReferral($ref_owener_uname, $transaction_id){
 $sql = "SELECT id FROM offerwall_history WHERE offer_name = '$transaction_id' ORDER BY date DESC LIMIT 1";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        $offer_id = $row['id'];
        
        $sql = "UPDATE offerwall_history SET ref_uname = '$ref_owener_uname' WHERE id = '$offer_id' ";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

//update offerwall earning by each offerwall
//don't edit
function earningByOfferwall($offerwall, $bal_type, $reward){
    if ($bal_type == 'offerwall'){
        $bal_row = 'total_earned';
    }elseif ($bal_type == 'ref_offerwall') {
        $bal_row = 'total_earned_ref';
    }
    
    $sql = "UPDATE offerwall_action SET $bal_row = $bal_row + $reward "
            . "WHERE offerwall_name = '$offerwall' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

//update offerwall task by each offerwall
//don't edit
function updateOfferwallTasks($offerwall){
    $sql = "UPDATE offerwall_action SET total_tasks = total_tasks + 1 "
            . "WHERE offerwall_name = '$offerwall' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}