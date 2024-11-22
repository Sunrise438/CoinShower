<?php

/*
 * change email settings
 */
function changeEmailSettings($host, $email_username, $pass, $from, $from_name, $port, $secure, $is_smtp = 1, $status = 1){
    $sql = "UPDATE mail SET host = '$host', "
            . "uname = '$email_username',"
            . "pass = '$pass',"
            . "sender = '$from',"
            . "sender_name = '$from_name',"
            . "port = '$port',"
            . "secure = '$secure',"
            . "is_smtp = '$is_smtp',"
            . "status = '$status' WHERE id = 1";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }
}