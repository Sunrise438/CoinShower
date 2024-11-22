<?php
session_start();

require 'config/config.php';
//maintenance
require 'maintenance.php';
//theme
require 'libs/theme.php';

//checck session
if (isset($_SESSION['uname'])){
    require 'view/theme/'.$themeAction.'/overall_header.php';
    require 'ctrl/refmarket/refmarket/refmarket.php';
    require 'view/theme/'.$themeAction.'/overall_footer.php';
} else {
    require 'view/theme/'.$themeAction.'/overall_header.php';
    $p = 'refmarket';
    require 'ctrl/login/login.php';
    require 'view/theme/'.$themeAction.'/overall_footer.php';
}

$conn->close();