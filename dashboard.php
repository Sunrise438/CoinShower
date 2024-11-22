<?php
/*
 * dashboard
 */
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
    if (empty($_SESSION['uname'])){
        header('location:account');
    }
    require 'view/theme/'.$themeAction.'/overall_uheader.php';
    require 'view/theme/'.$themeAction.'/dashboard.php';
    require 'view/theme/'.$themeAction.'/overall_ufooter.php';
} else {
    header('location:index');
}

$conn->close();
