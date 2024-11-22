<?php

//check banned email type

function bannedEmailDomain ($email){
    //get domain
    if (isset($email) && strpos($email, '@') !== FALSE) {

            // GET EMAIL PARTS

                $email  = explode('@', $email);
                //$user   = $email[0];
                $domain = $email[1];
                
                //select banned email domain from table
                $sql = "SELECT id FROM banned_email WHERE status = 1 AND email = '$domain' ";
                $result = $GLOBALS['conn']->query($sql);
                if ($result->num_rows>0){
                    return 1;
                } else {
                    return 0;
                }

        } else {
            return 0;
        }
        
}

//list to admin ban
function listTOAdminBan($email){
    //check user name if isset
    $sql = "SELECT id FROM users WHERE email = '$email' AND status = 1";
    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows > 0){
        //select user from ban list
        $sql = "SELECT id FROM ban_list WHERE email = '$email' ";
        $result = $GLOBALS['conn']->query($sql);
        if ($result->num_rows > 0){
            return 1;
        } else {
            //add to ban list
            $sql = "INSERT INTO ban_list (email) VALUES('$email')";
            if ($GLOBALS['conn']->query($sql) === TRUE){
                return 1;
            } else {
                return 0;
            }
        }
        
    } else {
        return 0;
    }
    
}
