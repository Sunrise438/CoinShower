<?php
/*
 * plugins
 */

session_start();

if (empty($_SESSION['aemail'])){
    header('Location:index');
    
} else {
    require 'view/theme/uhead.php';
    if (!validateLogin()){
        header('location:logout?logout=logout');
    }
    require 'view/theme/inc/plugins/plugins.php';
    require 'view/theme/footer.php';
    
}