<?php

//detele from banned listed
function deleteBannedListed($id){
    $sql = "DELETE FROM ban_list WHERE id = '$id' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

deleteBannedListed($token);

header('location:banned_list');