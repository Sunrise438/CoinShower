<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['changepass']) && isset($_POST['cpass']) && isset($_POST['npass']) && isset($_POST['ncpass'])){
        
        $changepass = test_input($_POST['changepass']);
        $cpass = test_input($_POST['cpass']);
        $npass = test_input($_POST['npass']);
        $ncpass = test_input($_POST['ncpass']);
        if ($npass == $ncpass && $changepass){
            if (validateCurrentPass($cpass)){
                if (!validateCurrentPass($npass)){
                    if (changePassword($cpass, $npass)){
                        header('location:account');
                    } else {
                        $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
                    }

                } else {
                    $dataErr = ucfirst($passwordChangeErrInfoName);
                }
            } else {
                $dataErr = ucfirst($enterName.' '.$validName.' '.$currentName.' '.$passwordName);
            }
        } else {
            $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
        }
    }
    
    
    
    
    if (isset($_POST['changeuname']) && isset($_POST['uname']) && isset($_POST['cpass'])){
        
        $changeuname = test_input($_POST['changeuname']);
        $uname = test_input($_POST['uname']);
        $cpass = test_input($_POST['cpass']);
        
        if ($changeuname){
            $email = test_input($_SESSION['email']);
            if (validateCurrentPass($cpass, $email)){
                if (changeUname($uname, $cpass)){
                    header('location:account');
                } else {
                    $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
                }
            } else {
                $dataErr = ucfirst($enterName.' '.$validName.' '.$currentName.' '.$passwordName);
            }
        } else {
            $dataErr = ucfirst($enterName.' '.$validName.' '.$dataName);
        }
    }
}