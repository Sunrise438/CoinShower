<?php

require requireUserInfo();
require requireUserBal();
require requireSurfFun();
$user_info = userInfoByUsername(test_input($_SESSION['uname']));
require __DIR__.'/surfads_fun.php';
require __DIR__.'/surfads_data.php';