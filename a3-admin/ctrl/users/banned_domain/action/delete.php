<?php

//detele from banned listed
function deleteBannedDomain($id){
    $sql = "DELETE FROM banned_email WHERE id = '$id' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

deleteBannedDomain($token);

header('location:banned_domain');