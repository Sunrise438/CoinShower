<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['emailsettings'])){
        $host = test_input($_POST['emailhost']);
        $email_username = test_input($_POST['email']);
        $pass = test_input($_POST['pass']);
        $from = test_input($_POST['from']);
        $from_name = test_input($_POST['fromname']);
        $port = test_input($_POST['port']);
        $secure = test_input($_POST['secure']);
        $is_smtp = test_input($_POST['is_smtp']);
        $status = test_input($_POST['status']);

        changeEmailSettings($host, $email_username, $pass, $from, $from_name, $port, $secure, $is_smtp, $status);
        header('location:email');
    } else {
        $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
    }
}