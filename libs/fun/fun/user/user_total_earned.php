<?php

//get user info using id
function userTotalEarnedById($user_id){
    $sql = "SELECT * FROM users WHERE id = '$user_id' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        return $row['earned']+$row['ref_earned']+$row['earned_shortlink']+$row['earned_shortlink_ref']+$row['earned_offerwall']+$row['earned_offerwall_ref']+$row['earned_buysell']+$row['earned_buysell_ref'];
    } else {
        return 0;
    }
}

//get user info using username
function userTotalEarnedByUsername($uname){
    $sql = "SELECT * FROM users WHERE email = '$uname' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        return $row['earned']+$row['ref_earned']+$row['earned_shortlink']+$row['earned_shortlink_ref']+$row['earned_offerwall']+$row['earned_offerwall_ref']+$row['earned_buysell']+$row['earned_buysell_ref'];
    } else {
        return 0;
    }
}


