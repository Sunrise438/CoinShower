<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = test_input($_POST['email']);
    $pass = test_input($_POST['pass']);

    /*
     * access login
     */
    $check_login = checkLogin($uname, $pass);
    if ($check_login){
       header('location:dashboard');
    }else {
       $dataErr = ucfirst($enterName).' '.$validName.' '.ucfirst($detailsName);
    }
}