<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['email']) && isset($_POST['pass'])){
        $email = text_input($_POST['email']);
        $pass = text_input($_POST['pass']);
        if (addAdmin($email, $pass)){
            addInstallA3script();
            header('location:welcome');
        } else {
            $dataErr = ucfirst('enter valid data');
        }
        
    } else {
        $dataErr = ucfirst('enter valid data');
    }
}