<?php

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

//today offerwall earning
function todayOfferwallEarning($offerwall){
    $sql = "SELECT COUNT(id), COUNT(DISTINCT uname), SUM(reward) FROM offerwall_history "
            . "WHERE offerwall = '$offerwall' AND date > CURDATE() ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}