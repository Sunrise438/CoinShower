<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
    //set site key
    if (isset($_POST['turnstilesitekey'])){
        $site_key = test_input($_POST['turnstilesitekey']);
        updateSiteKey($site_key, 'turnstile');
    }

    //set secret key
    if (isset($_POST['turnstilesecretkey'])){
        $secret_key = test_input($_POST['turnstilesecretkey']);
        updateSecretKey($secret_key, 'turnstile');
    }

    //set recaptcha action
    if (isset($_POST['turnstileaction'])){
        $action = test_input($_POST['turnstileaction']);
        echo $action;
        updateRecaptchaAction($action, 'turnstile');
    }
    
    header('location:captcha');

}