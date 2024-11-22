<?php

/*
 * create login token
 */
function createLoginToken($email){
    $token = md5($GLOBALS['site_info_row']['site_name'].$email.date("Y-m-d H:i:s"));
    $login_ip = getClientIp();
    $country_code = getClientCountryCode();
    $sql = "UPDATE admin_users SET "
            . "login_token = '$token', "
            . "login_ip = '$login_ip',"
            . "login_country = '$country_code' "
            . "WHERE admin_email = '$email' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

/*
 * destroy login token
 */
function destroyLoginToken($email){
    $sql = "UPDATE admin_users SET login_token = '' WHERE admin_email = '$email' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}