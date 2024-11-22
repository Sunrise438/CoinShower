<?php
session_start();
require '../../config/config.php';

/*
 * maintenance
 */
require '../../maintenance.php';
if (isset($_SESSION['uname'])){
    header('location:../../deposit?t=faucetpay&status=fail');
} else {
    header('location:index');
}