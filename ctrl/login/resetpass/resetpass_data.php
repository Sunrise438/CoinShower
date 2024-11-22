<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['resetpass'])){
        $resetpass = test_input($_POST['resetpass']);
        if (resetPassword($resetpass)){
            $data = ucfirst($passwordResetLinkSentName);
        } else {
            $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
        }
    }
    
    if (isset($_POST['token']) && isset($_POST['user']) && isset($_POST['npass']) && isset($_POST['ncpass'])){
        $token = test_input($_POST['token']);
        $email = test_input($_POST['user']);
        if ($_POST['npass'] = $_POST['ncpass']){
            $password = test_input($_POST['npass']);
        }
        
        if (setResetNewPassword($token, $email, $password)){
            header('location:login');
        } else {
            $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
        }
        
    }
}