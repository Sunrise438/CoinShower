<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
     
    /*
     * activate offerwall
     */
    if (isset($_POST['offerwalltype']) && isset($_POST['offerwallstatus'])){
        $offerwall_id = test_input($_POST['offerwalltype']);
        $status = test_input($_POST['offerwallstatus']);
        activateOfferwall($offerwall_id, $status);
        header('location:offerwall_settings');
    }
    
    /*.
     * add IP whitelist
     */
    if (isset($_POST['offerwall']) && isset($_POST['whitelist'])){
        $offerwall = test_input($_POST['offerwall']);
        $whitelist = test_input($_POST['whitelist']);
        addOfferwallIPwhitelist($offerwall, $whitelist);
        header('location:offerwall_settings');
    }
    
    /*
     * update offerwall status
     */
    if (isset($_POST['offerwall_action'])){
        $offerwall_action = test_input($_POST['offerwall_action']);
        if ($offerwall_action || !$offerwall_action){
            updateSiteInfo('offerwall_action', $offerwall_action);
        }
        header('location:offerwall_settings');
    }
}