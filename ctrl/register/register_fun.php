<?php
/*
 * exist user
 */
function existUser($uname=NULL, $email=NULL){
    if ($uname != NULL && $email != NULL){
        $where = "WHERE uname = '$uname' AND email = '$email'";
    }elseif ($uname != NULL) {
        $where = "WHERE uname = '$uname'";
    }elseif ($email != NULL) {
        $where = "WHERE email = '$email'";
    } else {
        return 0;
    }
    $sql = "SELECT id FROM users $where";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        return 1;
    } else {
        return 0;
    }
}

/*
 * insert ref
 */
function insertRef($uname){
    if (isset($_COOKIE['FLr'])){
        $ref = test_input($_COOKIE['FLr']);
        $sql = "INSERT INTO ref (ref_uname, uname) "
            . " VALUES('$uname', '$ref')";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

/*
 * register
 */
function register($uname, $email, $pass){
    /*
     * validate username
     */
    if (!validUsername($uname)){
        return 0;
    }
    
    /*
     * 
     */
    if (checkIpNotUsedByAnotherUserLoginToken($uname)){
        return 0;
    }
    
    /*
     * check user exist or not
     */
    $ok = existUser($uname, $email);
    
    if (!$ok){
        /*
         * hashed password
         */
        $hashed_pass = passHash($pass);
        $ip = getClientIp();
        $country = getClientCountryCode();
        
        /*
         * inser user
         */
        $sql = "INSERT INTO users (uname, email, pass, country_code, login_ip)"
                . "VALUES('$uname', '$email', '$hashed_pass', '$country', '$ip')";
        
        if ($GLOBALS['conn']->query($sql)){
            insertRef($uname);
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0; 
    }
}