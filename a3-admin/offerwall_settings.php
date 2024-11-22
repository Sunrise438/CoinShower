<?php

session_start();

if (empty($_SESSION['aemail'])){
    header('Location:index');
    
} else {
    require 'view/theme/uhead.php';
    if (!validateLogin()){
        header('location:logout?logout=logout');
    }
    require 'ctrl/offerwall/offerwall_settings/offerwall_settings.php';
    require 'view/theme/footer.php';
    
}
