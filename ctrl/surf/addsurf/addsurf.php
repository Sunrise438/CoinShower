<?php

require requireUserInfo();
require requireSurfFun();
$uname = test_input($_SESSION['uname']);
$user_info = userInfoByUsername($uname);
require __DIR__.'/addsurf_fun.php';
require __DIR__.'/addsurf_data.php';
