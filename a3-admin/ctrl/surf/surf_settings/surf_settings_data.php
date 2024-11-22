<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    /*
     * update surf status
     */
    if (isset($_POST['surf_action'])){
        $surf_action = test_input($_POST['surf_action']);
        if ($surf_action || !$surf_action){
            updateSiteInfo('surf_action', $surf_action);
        }
        header('location:surf_settings');
    }
}