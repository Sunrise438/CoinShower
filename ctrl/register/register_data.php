<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['cpass']) && isset($_POST['tos'])){
        $uname = test_input($_POST['uname']);
        if (isEmail($_POST['email'])){
            $email = filter_var(test_input($_POST['email']), FILTER_SANITIZE_EMAIL);
        } else {
            $emailErr = ucfirst($enterName.' '.$validName.' '.$emailName);
            return;
        }
        if ($_POST['pass'] == $_POST['cpass']){
            $pass = test_input($_POST['pass']);
        } else {
            $passErr = ucfirst($enterName.' '.$validName.' '.$passwordName);
            return;
        }
        
        if (isset($uname) && isset($email) && isset($pass) && $_POST['tos'] == 'on'){
            /*
             * insert user 
             */
            if (register($uname, $email, $pass)){
                header('location:welcome');
            } else {
                $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
                return;
            }
            
        } else {
            $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
            return;
        }
        
    } else {
        $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
        return;
    }
    
}