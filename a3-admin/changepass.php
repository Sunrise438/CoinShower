<?php
session_start();
?>


<?php
if (empty($_SESSION['aemail'])){
    header('Location:index');
    
} else {
    require 'style_admin/ahead.php';
    if (!validateLogin()){
        header('location:logout?logout=logout');
    }
    require 'ctrl/changepass.php';
    require 'style_admin/afooter.php';
    
}