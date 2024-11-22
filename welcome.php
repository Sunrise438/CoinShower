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

if (isset($_SESSION['uname']) && isset($_SESSION['login_token'])){
    header('location:index');
} else {
    require 'view/theme/'.$themeAction.'/overall_header.php';
    require 'view/theme/'.$themeAction.'/inc/register/welcome.php';
    require 'view/theme/'.$themeAction.'/overall_footer.php';
}

$conn->close();
