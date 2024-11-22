<?php

//change surf actiopn
function surfPlayPause($surf_id, $status){
    $sql = "UPDATE surf SET active = '$status' WHERE id = '$surf_id' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

//delete surf
function deleteSurf($surf_id){
    $sql = "DELETE FROM surf WHERE id = '$surf_id' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

//surf status
function surfStatus($surf_id, $status){
    $sql = "UPDATE surf SET status = '$status' WHERE id = '$surf_id' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}
