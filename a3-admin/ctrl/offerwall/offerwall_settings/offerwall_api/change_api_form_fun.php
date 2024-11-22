<?php

function changeOfferWallAPI($offerwall_id, $api_key, $secret_key, $pub_id, $app_id){
    $api_key = test_input($api_key);
    $secret_key = test_input($secret_key);
    $api_key = test_input($api_key);
    $app_id = test_input($app_id);
    $offerwall_id = test_input($offerwall_id);
    
    $sql = "UPDATE offerwall_action SET api_key = '$api_key', secret_key = '$secret_key', "
            . "pub_id = '$pub_id', app_id = '$app_id'"
            . "WHERE id = '$offerwall_id' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}