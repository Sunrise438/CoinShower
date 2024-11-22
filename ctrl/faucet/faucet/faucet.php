<?php

require requireUserInfo();
$uname = $_SESSION['uname'];
$user_info = userInfoByUsername($uname);
require __DIR__.'/faucet_fun.php';