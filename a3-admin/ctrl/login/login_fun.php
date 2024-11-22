<?php
/*
 * update login date
 */
function updateLoginDate($email){
    global $gp;
    $sql = "UPDATE $gp.admin_users SET login_date = CURRENT_TIMESTAMP() WHERE admin_email = '$email'";
    echo $GLOBALS['conn']->error;
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }
}

/*
 * check login
 */
function checkLogin($email, $pass){  
    $site_info_row = $GLOBALS['site_info_row'];
    global $gp;
    /*
     * check user name if isset
     */
    $sql = "SELECT admin_email, admin_pass, status FROM $gp.admin_users WHERE admin_email = '$email' ";
    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();

        if ($row['status']){
            $hash = $row['admin_pass'];
            if (password_verify($pass,$hash)){
                $email = $row['admin_email'];
                
                $login_ok = createLoginToken($email);
                if (!$login_ok){
                    return 0;
                }
                $login_token = selectLoginToken($email);

                if ($login_token['admin_email'] == $email){

                    $_SESSION['aemail'] = $row['admin_email'];
                    $_SESSION['admin_login_token'] = $login_token['login_token'];

                    updateLoginDate($row['admin_email']);
                    sendLoginSuccessfulEmail($email);
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

