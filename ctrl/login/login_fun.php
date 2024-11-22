<?php
/*
 * update login date
 */
function updateLoginDate($uname){
    $sql = "UPDATE users SET login_date = CURRENT_TIMESTAMP() WHERE uname = '$uname'";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }
}

//register
function checkRegister($uname, $pass, $reme){
    $hashed_pass = passHash($pass);
    if (isset($_COOKIE['FLr'])){
        $ref = test_input($_COOKIE['FLr']);

        //insert user
        $sql = "INSERT INTO users (email, pass) VALUES('$uname', '$hashed_pass')";
            if ($GLOBALS['conn']->query($sql) === TRUE){

                //insert ref user
                $sql = "INSERT INTO ref (ref_email, email) "
                        . " VALUES('$uname', '$ref')";
                    if ($GLOBALS['conn']->query($sql) === TRUE){

                    }

                    return 1;

            } else {
                return 0;
            }

    } else {
        //insert user
        $sql = "INSERT INTO users (email, pass) VALUES('$uname', '$hashed_pass')";
            if ($GLOBALS['conn']->query($sql) === TRUE){
                return 1;
            } else {
                return 0;
            }
    }
     
}

//login
function checkLogin($uname, $pass){  
    $site_info_row = $GLOBALS['site_info_row'];
    $gp = $GLOBALS['gp'];
    //check user name if isset
            $sql = "SELECT uname, email, pass, status FROM $gp.users WHERE "
                    . "uname = '$uname' OR email = '$uname'";
            $result = $GLOBALS['conn']->query($sql);

            if ($result->num_rows > 0){
                $row = $result->fetch_assoc();
                
                //check status
                if ($row['status'] == 1){
                    $hash = $row['pass'];
                    if (password_verify($pass,$hash)){
                        $uname = $row['uname'];
                        
                        //destroy previous login token
                        destroyLoginToken($uname);
                        
                        //if login token exist
                        $login_token = selectLoginToken($uname);

                        if ($login_token == 0){
                            //create login token
                            $login_ok = createLoginToken($uname);

                        } else {
                            //update login token
                            $login_ok = updateLoginToken($uname);

                        }
                        
                        //select login token again
                        $login_token = selectLoginToken($uname);
                        
                        if ($login_token['status'] == 1){
                            
                            $_SESSION['uname'] = $row['uname'];
                            $_SESSION['email'] = $row['email'];
                            
                            $log_tok = md5($site_info_row['site_name'].$row['email']);
                            $_SESSION['login_token'] = $log_tok;
                            
                            updateLoginDate($_SESSION['uname']);
                            
                            cookieRememberMe($log_tok, $site_info_row);
                            
                            cookieUserAutoBan($log_tok, $site_info_row);
                            
                            return 1;

                        } else {
                            return 0;
                        }
                        
                    } else {
                        return 0;
                    }  

                }elseif ($row['status'] == 0) {
                    return 'b';
                } else {
                    return 0;
                }


            } else {
                return 0;
            }
}

