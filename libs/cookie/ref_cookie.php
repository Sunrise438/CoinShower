<?php

/*
 * referral cookie set
 */
if (isset($_GET['r'])){
    $cookie_Frname = 'FLr';
    $cookie_Frvalue = htmlspecialchars(strip_tags(trim($_GET['r'])));
    $cookie_Frvalue = $cookie_Frvalue;

    setcookie($cookie_Frname, $cookie_Frvalue, time()+ 8400);
}