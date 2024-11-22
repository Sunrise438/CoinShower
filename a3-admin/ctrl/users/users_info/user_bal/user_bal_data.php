<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['userbal']) && isset($_POST['user']) && isset($_POST['bal']) && isset($_POST['type'])){
        $fuserbal = test_input($_POST['bal']);
        $funame = test_input($_POST['user']);
        
        if ($_POST['type'] == 'r') {
            $fuserbal = -($fuserbal);
        }
        
        
        updateUserBal($funame, 'bal', $fuserbal);
        
        header('location:users_info?token='.$funame);
    }  
}