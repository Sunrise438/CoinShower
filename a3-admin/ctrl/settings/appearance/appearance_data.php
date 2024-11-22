<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['taname'])){
        $appearance = test_input($_POST['taname']);
        if (activeAppearance($appearance) == 3){
            header('location:appearance?activate='.$appearance);
        } else {
            header('location:appearance');
        }
    }
    
    if (isset($_POST['theme_install']) && isset($_FILES['file'])){
        uploadAppearance($_FILES['file']);
        header('location:appearance');
    }
    
    if (isset($_POST['themes_activation']) && isset($_POST['activation_key']) && isset($_POST['themes'])){
        $themes = test_input($_POST['themes']);
        $activation_key = test_input($_POST['activation_key']);
        addThemseActivationKey($themes, $activation_key);
        header('location:appearance?activate='.$themes.'&success=success');
    }
}