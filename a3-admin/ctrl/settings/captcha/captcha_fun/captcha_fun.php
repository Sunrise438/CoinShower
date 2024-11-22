<?php

 function updateSiteKey($site_key, $type){
    $sql = "UPDATE captcha SET site_key = '$site_key' WHERE type = '$type' ";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }
}

function updateSecretKey($secret_key, $type){
    $sql = "UPDATE captcha SET secret_key = '$secret_key' WHERE type = '$type' ";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }
}      

function updateRecaptchaAction($action, $type){
    if ($action == 1 || $action == 0){
        $sql = "UPDATE captcha SET status = '$action' WHERE type = '$type' ";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }
    }
}      