<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['userpbal']) && isset($_POST['user']) && isset($_POST['p_bal']) && isset($_POST['type'])){
        $fuserpbal = test_input($_POST['p_bal']);
        $funame = test_input($_POST['user']);
        
        if ($_POST['type'] == 'r') {
            $fuserpbal = -($fuserpbal);
        }
        
        
        updateUserBal($funame, 'p_bal', $fuserpbal);
        
        header('location:users_info?token='.$funame);
    }  
}