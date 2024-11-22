<?php

require requireSiteInfoFun();
require requireWithdrawFun();
require requireUserInfo();
require requireUserBal();
require requireApiFun();
require requirePageFun();
$uname = test_input($_SESSION['uname']);
$user_info = userInfoByUsername($uname);
require __DIR__.'/withdraw_fun.php';