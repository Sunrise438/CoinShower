<?php

session_start();

if (empty($_SESSION['aemail'])){
    require 'view/theme/head.php';
    require 'login.php';
    require 'view/theme/footer.php';
    
} else {
    header('Location:dashboard');
    
}