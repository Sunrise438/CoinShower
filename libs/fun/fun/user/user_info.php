<?php

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

/*
 * get user info using username
 */
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

/*
 * get user info using username
 */
function userInfoByEmail($email){
    $sql = "SELECT * FROM users WHERE email = '$email' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}
