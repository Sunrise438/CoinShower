<?php

//ban user
function banUser($uname){
    $sql = "UPDATE users SET status = 0 WHERE email = '$uname' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}
