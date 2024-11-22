<?php

require 'recap/recap.php';
require 'turnstile/turnstile.php';

/*
 * captcha check
 */
function captchaCheck(){
    if (isset($GLOBALS['recap_ok'])){
        if ($GLOBALS['recap_ok'] == 1){
            return 1;
        }
    }
}