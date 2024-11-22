<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    /*
     * update faucet status
     */
    if (isset($_POST['faucet_action'])){
        $faucet_action = test_input($_POST['faucet_action']);
        if ($faucet_action || !$faucet_action){
            updateSiteInfo('faucet_action', $faucet_action);
        }
        header('location:faucet_settings');
    }
}