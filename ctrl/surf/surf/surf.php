<?php

require requireUserInfo();
require __DIR__.'/surf_fun.php';
$uname = test_input($_SESSION['uname']);
$user_info = userInfoByUsername($uname);