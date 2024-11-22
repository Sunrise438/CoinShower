<?php

session_start();

if (empty($_SESSION['aemail'])){
    header('Location:index');
    
} else {
    require 'view/theme/uhead.php';
    if ($_GET['logout'] == 'logout'){
        require requireLoginFun();
        session_destroy();
        destroyLoginToken(test_input($_SESSION['aemail']));
        header('Location:index');
    } else {
        header('Location:dashboard');
    }
    
    require 'view/theme/footer.php';
    
}