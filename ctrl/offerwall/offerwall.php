<?php

require requireUserInfo();
require requireOfferwallFun();
require requirePageFun();
require __DIR__.'/offerwall_fun.php';
$uname = test_input($_SESSION['uname']);

if (isset($_GET['offer'])){
    if (file_exists('ctrl/offerwall/'.$_GET['offer'].'/'.$_GET['offer'].'.php')){
        require $_GET['offer'].'/'.$_GET['offer'].'.php';
    } else if (file_exists('plugins/'.$_GET['offer'].'/'.$_GET['offer'].'.php')){
        require showPage($_GET['offer']);
    }
}