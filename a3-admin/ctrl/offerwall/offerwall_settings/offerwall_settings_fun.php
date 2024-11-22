<?php

/*
 * active offerwall
 */
function activateOfferwall($offerwall_id, $status){
    $sql = "UPDATE offerwall_action SET status = $status WHERE id = $offerwall_id";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

/*
 * add ip whitelist
 */
function addOfferwallIPwhitelist($offerwall, $whitelist){
    $sql = "UPDATE offerwall_action SET ip_whitelist = '$whitelist' WHERE offerwall_name  = '$offerwall' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}
