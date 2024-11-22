<?php

require requireUserInfo();
require requirePager();
require requireDBFun();
require requirePageFun();
$uname = test_input($_SESSION['uname']);
$user_info = userInfoByUsername($uname);
require __DIR__.'/page_fun.php';