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

if (isset($_SESSION['uname'])){
    require 'view/theme/'.$themeAction.'/overall_header.php';
    header('location:index');
    require 'view/theme/'.$themeAction.'/overall_footer.php';
} else {
    require 'view/theme/'.$themeAction.'/overall_header.php';
    require 'view/theme/'.$themeAction.'/inc/login/resetpass/resetpass.php';
    require 'view/theme/'.$themeAction.'/overall_footer.php';
}

$conn->close();