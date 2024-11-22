<?php
/*
 * update new password
 */
function updateNewPassword($email, $pass_hash){
    $sql = "UPDATE users SET pass = '$pass_hash' WHERE email = '$email'";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }
}

/*
 * destroy reset password token
 */
function destroyResetPasswordToken($token){
    $sql = "UPDATE reset_pass SET status = 1 WHERE token = '$token'";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }
}

/*
 * create reset password token
 */
function createResetPassToken($email){
    date_default_timezone_set("UTC");
    $date = date("Y-m-d h:i:s");
    $token = hash('md5', $email.date($date));
    $sql = "INSERT INTO reset_pass (email, token, date)"
            . "VALUES('$email', '$token', '$date')";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return $token;
    } else {
        return 0;
    }
}

/*
 * get reset password token info
 */
function getResetPassTokenInfo($email, $token){
    $sql = "SELECT * FROM reset_pass WHERE email='$email' AND token='$token'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

/*
 * check reset password token status
 */
function getResetPassTokenStatus($email, $token){
    date_default_timezone_set("UTC");
    $sql = "SELECT * FROM reset_pass WHERE email='$email' AND token='$token' AND status = 0 ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        $date = strtotime(date("Y-m-d h:i:s"));
        $token_date = strtotime($row['date']);
        $token_ex_date = $token_date+($GLOBALS['site_info_row']['rest_pass_token_valid_period']*60);
        if ($token_ex_date > $date){
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

/*
 * reset password
 */
function resetPassword($uname){
    if (isEmail($uname)){
        $user_info = userInfoByEmail($uname);
    } else {
        $user_info = userInfoByUsername($uname);
    }
    
    if ($user_info != 0){
        $email = $user_info['email'];
        $token = createResetPassToken($email);
        if ($token != 0){
            if (getResetPassTokenStatus($email, $token)){
                $subject = ucwords($GLOBALS['resetPasswordName']);
                $body = '<h2>'.ucwords($GLOBALS['resetPasswordName']).'</h2><br><br>'
                        . ucfirst($GLOBALS['passwordResetMailInfoName']).'<br><br>'
                        . '<a href="'.$GLOBALS['site_info_row']['site_url'].'/resetpass?token='.$token.'&user='.$email.'">'
                        .ucwords($GLOBALS['resetPasswordName']).'</a>';
                
                if (sendMail($subject, $body, $email)){
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } else {
            return 0; 
        }
    } else {
        return 0;
    }
}

/*
 * set reset new password
 */
function setResetNewPassword($token, $email, $password){
    $ok = getResetPassTokenStatus($email, $token);
    
    if ($ok){
        if (!validatePassword($password)){
            return 0;
        }
        $npass_hash = passHash($password);        
        $user_info = userInfoByEmail($email);
        if (!password_verify($password, $user_info['pass'])){
            if (updateNewPassword($email, $npass_hash)){
                destroyResetPasswordToken($token);
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
}