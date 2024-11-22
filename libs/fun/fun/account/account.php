<?php

/*
 * validate current password
 */
function validateCurrentPass($pass, $email = NULL){
    if ($email == NULL){
        $uname = test_input($_SESSION['uname']);
        $where = "WHERE uname = '$uname'";
    } else {
        $where = "WHERE email = '$email'";
    }
    
    $sql = "SELECT pass FROM users $where";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        if (password_verify($pass,$row['pass'])){
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}