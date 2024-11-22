<?php

/*
 * count ref
 */
function countRef($user_id){
    $sql = "SELECT COUNT(id) FROM ref WHERE uname = '$user_id'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row['COUNT(id)'];
    }else {
        return 0;
    }
}

/*
 * get ref email
 */
function getRefUserOwnerId($uname){
    $sql = "SELECT uname FROM ref WHERE ref_uname = '$uname'";
    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();
        //ref user id
        return $row['uname'];
        
    } else {
        return 0;
    }
}

/*
 * get ref info by id
 */
function getRefInfoById($ref_id){
    $sql = "SELECT * FROM ref WHERE id = '$ref_id'";
    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();
        //ref user id
        return $row;
        
    } else {
        return 0;
    }
}

/*
 * getRefUserInfo
 */
function getRefUserInfo($ref_uname = NULL){
    if ($ref_uname == NULL){
        $ref_uname = test_input($_SESSION['uname']);
    }
    
    $ref_owener_id = getRefUserOwnerId($ref_uname);
    
    if ($ref_owener_id != 0){
        return userInfoById($ref_owener_id);
    } else {
        return 0;
    }
    
}

/*
 * user ref row
 */
function updateRefBal($ref_uname, $bal_type, $amount){
    if ($bal_type == 'faucet'){
        $bal_row = 'faucet_amount';
    }elseif ($bal_type == 'surf') {
        $bal_row = 'surf_amount';
    }elseif ($bal_type == 'shortlinks') {
        $bal_row = 'shortlinks_amount';
    }elseif ($bal_type == 'offerwall') {
        $bal_row = 'offerwall_amount';
    }elseif ($bal_type == 'buysell') {
        $bal_row = 'buysell_amount';
        
    }
    
    $sql = "UPDATE ref SET $bal_row = $bal_row + $amount WHERE ref_uname = '$ref_uname' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
    
}