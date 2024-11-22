<?php

function cookieRememberMe($log_tok, $site_info_row){
    if ($site_info_row['remember_me_action']){
        $cookie_Name = md5($site_info_row['site_name'].'remember_me');
        setcookie($cookie_Name, $log_tok, time()+ (86400 * $site_info_row['remember_me_period']));
    }
}

function cookieUserAutoBan($log_tok, $site_info_row){
    if ($site_info_row['user_auto_ban_action']){
        $cookie_Name = md5($GLOBALS['site_name'].'user_ban');
        setcookie($cookie_Name, $log_tok, time()+ 86400);
    }
}
