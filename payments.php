<?php
/*
 * surf
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
    require 'view/theme/'.$themeAction.'/overall_uheader.php';
    require 'view/theme/'.$themeAction.'/inc/statistics/payments.php';
    require 'view/theme/'.$themeAction.'/overall_ufooter.php';
} else {
    require 'view/theme/'.$themeAction.'/overall_header.php';
    require 'view/theme/'.$themeAction.'/inc/statistics/payments.php';
    require 'view/theme/'.$themeAction.'/overall_footer.php';
}

$conn->close();