<?php

require requireAccountFun();
require requireUserInfo();
require requireRefFun();
require 'account_fun.php';
require 'account_data.php';
$uname = test_input($_SESSION['uname']);
$user_info = userInfoByUsername($uname);
