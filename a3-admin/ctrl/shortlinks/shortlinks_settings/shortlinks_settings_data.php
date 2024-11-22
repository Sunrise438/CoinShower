<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){    
    /*
     * update shortlinks status
     */
    if (isset($_POST['shortlinks_action'])){
        $shortlinks_action = test_input($_POST['shortlinks_action']);
        if ($shortlinks_action || !$shortlinks_action){
            updateSiteInfo('shortlinks_action', $shortlinks_action);
        }
        header('location:shortlinks_settings');
    }
}