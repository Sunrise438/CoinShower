<?php
/*
 * update api
 */
function updateAPI($method, $api_key, $secret){
    $sql = "UPDATE api_key SET "
            . "apiKey = '$api_key', pri_key = '$secret' "
            . "WHERE type = '$method' ";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }
}
