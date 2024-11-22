<?php

session_start();
if (isset($_SESSION['uname'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require '../../../config/config.php';
        require '../../../libs/site_info.php';
        require '../../../libs/fun/fun.php';
        require '../../../view/language/en.php';
        require __DIR__.'/faucet_fun.php';
        require requireUserBal();
        require requireUserRatingFun();
        require requireUserInfo();
        require requireRefFun();
        require requireSiteInfoFun();
        $uname = test_input($_SESSION['uname']);
        
        if (checkClaimTime()){
            
             if (updateFaucetClaim()){
                 echo 1;
             } else {
                 echo 0;
             }
        } else {
            echo 0;
        }
        $conn->close();
    }
}
exit();