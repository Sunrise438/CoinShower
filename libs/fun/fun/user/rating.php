<?php

/*
 * rating
 */
function rating(){
    $sql = "SELECT * FROM rating WHERE id = 1 ";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

/*
 * update user rating
 * don't edit
 */
function updateRating($type, $uname = NULL){
    $rate = rating();
    if ($uname == NULL){
        $uname = test_input($_SESSION['uname']);
    }
    if ($type == 'faucet'){
        $rating = $rate['faucet'];
    }elseif ($type == 'surf') {
        $rating = $rate['surf'];
    }elseif ($type == 'shortlinks') {
        $rating = $rate['shortlinks'];
    }elseif ($type == 'offerwall') {
        $rating = $rate['offerwall'];
    }elseif ($type == 'refbuysell') {
        $rating = $rate['ref_buysell'];
    }
    $sql = "UPDATE users SET rating = rating + $rating WHERE uname = '$uname' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
    
}

/*
 * update user rating ref
 * don't edit
 */
function updateRatingRef($uname, $type){
    $rate = rating();
    if ($type == 'faucet'){
        $rating = $rate['faucet'];
    }elseif ($type == 'surf') {
        $rating = $rate['surf'];
    }elseif ($type == 'shortlinks') {
        $rating = $rate['shortlinks'];
    }elseif ($type == 'offerwall') {
        $rating = $rate['offerwall'];
    }elseif ($type == 'refbuysell') {
        $rating = $rate['ref_buysell'];
    }
    $rating = $rating/100;
    $sql = "UPDATE users SET rating = rating + $rating WHERE uname = '$uname' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
    
}