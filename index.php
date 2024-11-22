<?php
session_start();

require 'config/config.php';
/*
 * maintenance
 */
require 'maintenance.php';
/*
 * theme
 */
require 'libs/theme.php';

/*
 * checck session
 */
if (isset($_SESSION['uname'])){
    require 'view/theme/'.$themeAction.'/overall_header.php';
    require 'libs/cookie/ref_cookie.php';
    header('location:dashboard');    
    require 'view/theme/'.$themeAction.'/overall_footer.php';
} else {
    require 'view/theme/'.$themeAction.'/overall_header.php';
    require 'libs/cookie/ref_cookie.php';
    require 'view/theme/'.$themeAction.'/main_layout.php';
    require 'view/theme/'.$themeAction.'/overall_footer.php';
}

$conn->close();