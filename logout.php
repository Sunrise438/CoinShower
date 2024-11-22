<?php
/*
 * logout
 */
session_start();

if (empty($_GET['logout'])){
    header("location:index");
} else {
    if ($_GET['logout'] == 'logout'){
        require 'config/config.php';
        require 'libs/site_info.php';
        require 'libs/fun/fun/user/login.php';
        $uname = $_SESSION['uname'];
        /*
         * create logout
         */
        session_destroy();
        
        //*
        //destroy login token
        destroyLoginToken($uname);
        
        header('Location: index');
        $conn->close();
    }
    
}