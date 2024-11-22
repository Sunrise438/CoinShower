<?php

/*
 * change password
 */
function changePassword($current_pass, $pass){
    if (validateCurrentPass($current_pass)){
        $uname = test_input($_SESSION['uname']);
        $hashed_pass = passHash($pass);
        $sql = "UPDATE users SET pass = '$hashed_pass' WHERE uname = '$uname'";
        if ($GLOBALS['conn']->query($sql)){
            return 1;
        } else {
            echo 'ss';
            return 0;
        }
    } else {
        return 0;
    }
}

/*
 * change surf uname
 */
function changeSurfUname($email, $uname){
    $sql = "SELECT id FROM surf WHERE  uname = '$email'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            $surf_id = $row['id'];
            $sql = "UPDATE surf SET uname = '$uname' WHERE id= '$surf_id'";
            if ($GLOBALS['conn']->query($sql)){

            }
        }
    }
}

/*
 * change uname
 */
function changeUname($uname, $current_pass){
    $email = test_input($_SESSION['email']);
    if (validateCurrentPass($current_pass, $email)){
        $sql = "UPDATE users SET uname = '$uname' WHERE email = '$email'";
        if ($GLOBALS['conn']->query($sql)){
            $_SESSION['uname'] = $uname;
            changeSurfUname($email, $uname);
            return 1;
        } else {
            echo 'ss';
            return 0;
        }
    } else {
        return 0;
    }
}