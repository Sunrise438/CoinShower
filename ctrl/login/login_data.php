<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = test_input($_POST['uname']);
    $pass = test_input($_POST['pass']);
    if (isset($_POST['reme'])){
        $reme = test_input($_POST['reme']);
    } else {
        $reme = 0;
    }
    
    //check email domain is banned or not
        if (bannedEmailDomain($uname) == 0){

            $ok = 0;

            
            //check user multiple account detect
            /*if (checkUserBanCookie($ffpname) == 1){
                $ok = 1;
            } else {
                $ok = 0;
                $dataErr = ucfirst($youCanNottUseMultipleAccountsName);
            }*/
            

            //access login
                $check_login = checkLogin($uname, $pass, $reme);
               if ($check_login == 1){
                   if (isset($p)){
                       header('location:'.$p);
                   } else {
                       header('location:dashboard');
                   }

               }elseif ($check_login == 'b') {
                    $dataErr = ucfirst($yourAccountIsBanedName);
                } else {
                   $dataErr = ucfirst($enterName).' '.$validName.' '.ucfirst($detailsName);
               }

        } else {
            listTOAdminBan($ffpname);
            header('location:index');
        }
    
    
       
}