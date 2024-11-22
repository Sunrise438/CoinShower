<?php

/*
 * get admin user info by email
 */
function adminInfoByEmail($email){
    $sql = "SELECT * FROM admin_users WHERE admin_email = '$email' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

//get user info using id
function userInfoById($user_id){
    $sql = "SELECT * FROM users WHERE id = '$user_id' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

//get user info using username
function userInfoByUsername($uname){
    $sql = "SELECT * FROM users WHERE uname = '$uname' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

//total users
function totalUsers(){
    $sql = "SELECT id FROM users ORDER BY id DESC LIMIT 1 ";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();

    return $row['id'];
}

//today users
function todayUsers(){
    //count today total user
    $sql = "SELECT COUNT(id) FROM users  WHERE date > CURDATE() ORDER BY id DESC LIMIT 1 ";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();

    return $row['COUNT(id)'];
}

/*
 * user bal update
 */
function updateUserBal($uname, $bal_type, $amount){
    if ($bal_type == 'bal'){
        $bal_row = 'bal';
    }elseif ($bal_type == 'p_bal'){
        $bal_row = 'p_bal';
    }elseif ($bal_type == 'faucet'){
        $bal_row = 'earned';
    }elseif ($bal_type == 'shortlinks') {
        $bal_row = 'earned_shortlink';
    }elseif ($bal_type == 'surf') {
        $bal_row = 'earned_surf';
    }elseif ($bal_type == 'buysell') {
        $bal_row = 'earned_buysell';
        
    }elseif ($bal_type == 'ref_faucet') {
        $bal_row = 'ref_earned';
    }elseif ($bal_type == 'ref_shortlinks') {
        $bal_row = 'earned_shortlink_ref';
    }elseif ($bal_type == 'ref_surf') {
        $bal_row = 'earned_surf_ref';
    }elseif ($bal_type == 'ref_buysell') {
        $bal_row = 'earned_buysell_ref';
    }
    
    $sql = "UPDATE users SET $bal_row = $bal_row + $amount WHERE uname = '$uname' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
    
}