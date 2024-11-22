<?php

require requireUserInfo();
require requireUserBal();
require requireUserRatingFun();
require requireSiteInfoFun();
require requireRefFun();

if (isset($_GET['q'])){
    $vlink = test_input($_GET['q']);
    updateShortlinks($vlink);
    header('location:shortlinks');
}