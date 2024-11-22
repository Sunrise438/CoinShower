<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['aname'])){
        $aname = test_input($_POST['aname']);
        if (is_file('../plugins/'.$aname.'/activate.php')){
            require '../plugins/'.$aname.'/activate.php';
            if (activatePlugins($aname) == 3){
                header('location:plugins?activate='.$aname);
            } else {
                header('location:plugins');
            }
        } else {
            header('location:plugins');
        }
    }
    
    if (isset($_POST['iname'])){
        $iname = test_input($_POST['iname']);
        if (is_file('../plugins/'.$iname.'/deactivate.php')){
            require '../plugins/'.$iname.'/deactivate.php';
            deactivatePlugins($iname);
            header('location:plugins');
        } else {
           header('location:plugins'); 
        }
        
    }
    
    if (isset($_POST['rname'])){
        $rname = test_input($_POST['rname']);
        if (is_file('../plugins/'.$rname.'/deactivate.php')){
            require '../plugins/'.$rname.'/deactivate.php';
            removePlugins($rname);
            header('location:plugins');
        } else {
            header('location:plugins');
        }
        
    }
    
    if (isset($_POST['plugins_activation']) && isset($_POST['activation_key']) && isset($_POST['plugins'])){
        $plugins = test_input($_POST['plugins']);
        $activation_key = test_input($_POST['activation_key']);
        addPluginsActivationKey($plugins, $activation_key);
        header('location:plugins?activate='.$plugins.'&success=success');
    }
    
}