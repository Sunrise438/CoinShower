<?php

//*
//select login token
function selectLoginToken($uname){
    $token = md5($GLOBALS['site_info_row']['site_name'].$uname);
    $login_ip = getClientIp();
    $sql = "SELECT * FROM log_tok WHERE uname = '$uname' AND log_token = '$token' AND login_ip = '$login_ip' "
            . "AND date > CURDATE() ORDER BY date LIMIT 1";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

/*
 * create login token
 */
function createLoginToken($uname){
    $token = md5($GLOBALS['site_info_row']['site_name'].$uname);
    $login_ip = getClientIp();
    $country_code = getClientCountryCode();
    $sql = "INSERT INTO log_tok (uname, log_token, login_ip, country_code) "
            . "VALUES('$uname', '$token', '$login_ip', '$country_code')";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

/*
 * check login token valid or not
 */
function checkLoginToken($uname){
    $token = md5($GLOBALS['site_info_row']['site_name'].$uname);
    $sql = "SELECT id FROM log_tok WHERE uname = '$uname' AND log_token = '$token' "
            . "AND date > CURDATE() AND status = 1 ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows == 1){
        return 1;
    } else {
        return 0;
    }
}

/*
 * destroy login token
 */
function destroyLoginToken($uname){
    $token = md5($GLOBALS['site_info_row']['site_name'].$uname);
    $sql = "UPDATE log_tok SET status = 0 WHERE uname = '$uname' AND log_token = '$token' "
            . "AND date > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

/*
 * update login token
 */
function updateLoginToken($uname){
    $token = md5($GLOBALS['site_info_row']['site_name'].$uname);
    $login_ip = getClientIp();
    $country_code = getClientCountryCode();
    
    $sql = "UPDATE log_tok SET status = 1, date = CURRENT_TIMESTAMP(), country_code = '$country_code' "
            . "WHERE uname = '$uname' AND log_token = '$token' "
            . "AND date > CURDATE() AND login_ip = '$login_ip' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

/*
 * check user if log same ip
 */
function checkIpNotUsedByAnotherUserLoginToken($uname){
    $login_ip = getClientIp();
    $sql = "SELECT id FROM log_tok WHERE NOT uname = '$uname' AND login_ip = '$login_ip' "
            . "AND date > CURDATE() ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0){
        return 1 ;
    } else {
        return 0;
    }
}