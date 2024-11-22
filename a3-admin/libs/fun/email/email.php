<?php

/*
 * get email settings
 */
function getEmailSettings(){
    $sql = "SELECT * FROM mail WHERE id = '1'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
    
}

/*
 * send login successful mail
 */
function sendLoginSuccessfulEmail($to){
    $subject = ucfirst($GLOBALS['youHaveLoggedInSuccessfullyName']);
    $body = '<h2>'.ucfirst($GLOBALS['youHaveLoggedInSuccessfullyName']).'</h2><br><br>'
            . ucwords($GLOBALS['userName'].' '.$GLOBALS['ipName']).' : <b>'. getClientIp().' ('. getCountryName(getClientCountryCode()).')</b><br><br>'
            .ucwords($GLOBALS['userName'].' '.$GLOBALS['browserName']).' : <b>'. $_SERVER['HTTP_USER_AGENT'].'</b><br><br>';
    sendMail($subject, $body, $to);
}