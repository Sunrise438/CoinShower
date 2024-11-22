<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['userbancookie'])){
        if ($_POST['userbancookie']==1 || $_POST['userbancookie']==0){
            $status = test_input($_POST['userbancookie']);
            changeUserBanCookie($status);
        }

    }  
    
    header('location:cookie');
}