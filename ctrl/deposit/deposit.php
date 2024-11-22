<?php
require requireUpdateSiteInfo();
require requireApiFun();
require requireUserInfo();
require requireUserBal();
require requireDepositFun();
require requirePageFun();
$uname = test_input($_SESSION['uname']);
$user_info = userInfoByUsername($uname);

if (isset($_GET['t'])){
    if ($_GET['t'] == 'baltopb'){
        require __DIR__.'/baltopb/baltopb.php';

    }
}