<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['uname'])){
        require '../../../../config/config.php';
        require '../../../../libs/site_info.php';
        require '../../../../libs/fun/fun.php';
        require requireUserRatingFun();
        require requireSiteInfoFun();
        require requireUserInfo();
        require requireUserBal();
        require requireRefFun();
        require '../surf_fun.php';
        require 'data_fun.php';
        $id = test_input(base64_decode($_POST['id']));
        $id = (int)$id;
        updateSurfView($id);
        $conn->close();
    }
}
exit();