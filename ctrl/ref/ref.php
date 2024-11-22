<?php
require requireUserInfo();
require requireDBFun();
require __DIR__.'/ref_fun.php';
$uname = test_input($_SESSION['uname']);
$user_info = userInfoByUsername($uname);