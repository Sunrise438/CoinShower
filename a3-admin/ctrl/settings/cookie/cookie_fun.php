<?php

function changeUserBanCookie($status){
    if (isset($status)){
        if ($status == 1 || $status == 0){
            $sql = "UPDATE site_info SET cookie_register_detect_action = '$status' WHERE id = 1 ";
            if ($GLOBALS['conn']->query($sql) === TRUE){
                return 1;
            } else {
                return 0;
            }
        }else {
            return 0;
        }
    }else {
            return 0;
        }      
}