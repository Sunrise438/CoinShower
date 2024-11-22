<?php

//withdraw info
function withdrawInfo($withdraw_id){
    $sql = "SELECT * FROM withdraw_history WHERE id = '$withdraw_id' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

/*
 * change withdrwal history status
 */
function changeCurrentWithdrwalStatus($id, $status){  
    $sql = "UPDATE withdraw_history SET status = '$status' WHERE id = '$id'";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }

}