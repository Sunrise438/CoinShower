<?php

session_start();

if (empty($_SESSION['aemail'])){
    require 'view/theme/uhead.php';
    if (validateLogin()){
        header('location:index');
    }
    require 'view/theme/inc/login/resetpass/resetpass.php';
    require 'view/theme/footer.php';
} else {
    header('location:index');
}