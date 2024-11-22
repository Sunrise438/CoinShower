<?php

//select banned domain info
function bannnedDomainInfoById($id){
    $sql = "SELECT email FROM banned_email WHERE id = '$id' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row['email'];
    } else {
        return 0;
    }
}

//update ban domain status info
function bannnedDomainChangeStatus($id, $status){
    $sql = "UPDATE banned_email SET status = $status WHERE id = '$id' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}
