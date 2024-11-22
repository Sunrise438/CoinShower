<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['offerwalltype']) && isset($_POST['apikey']) && isset($_POST['secretkey'])){
        $offerwalltype = test_input($_POST['offerwalltype']);
        $apikey = test_input($_POST['apikey']);
        $secretkey = test_input($_POST['secretkey']);
        $pubid = isset($_POST['pubid']) ? $_POST['pubid'] : null;
        $appid = isset($_POST['appid']) ? $_POST['appid'] : null;
        
        changeOfferWallAPI($offerwalltype, $apikey, $secretkey, $pubid, $appid);
        header('location:offerwall_settings');
    }
}
