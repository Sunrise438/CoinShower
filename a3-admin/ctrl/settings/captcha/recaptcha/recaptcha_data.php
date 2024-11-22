<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
    //set site key
    if (isset($_POST['recapsitekey'])){
        $site_key = test_input($_POST['recapsitekey']);
        updateSiteKey($site_key, 'recap');
    }

    //set secret key
    if (isset($_POST['recapsecretkey'])){
        $secret_key = test_input($_POST['recapsecretkey']);
        updateSecretKey($secret_key, 'recap');
    }

    //set recaptcha action
    if (isset($_POST['recapaction'])){
        $action = test_input($_POST['recapaction']);
        updateRecaptchaAction($action, 'recap');
    }
    
    header('location:captcha');

}