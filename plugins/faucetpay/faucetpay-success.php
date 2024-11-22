<?php
session_start();
require '../../config/config.php';

/*
 * maintenance
 */
require '../../maintenance.php';
if (isset($_SESSION['uname'])){
    header('location:../../deposit?t=faucetpay&status=success');
} else {
    header('location:index');
}