<?php

/*
 * check user ban
 */
function checkUserBanCookie($uname){
    if ($GLOBALS['site_info_row']['cookie_register_detect_action']){
        if (isset($_COOKIE[md5($GLOBALS['site_info_row']['site_name'].'banU')])){
            if ($_COOKIE[md5($GLOBALS['site_info_row']['site_name'].'banU')] == md5($GLOBALS['site_info_row']['site_name'].$uname)){
                return 1;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
        
    } else {
        return 1;
    }
    
}