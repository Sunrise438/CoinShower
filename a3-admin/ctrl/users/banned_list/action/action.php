<?php

//select ban info
function bannnedListedInfoById($id){
    $sql = "SELECT email FROM ban_list WHERE id = '$id' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row['email'];
    } else {
        return 0;
    }
}

//update ban list status info
function bannnedListedChangeStatus($id, $status){
    $sql = "UPDATE ban_list SET status = $status WHERE id = '$id' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}
