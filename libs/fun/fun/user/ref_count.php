<?php

//count ref
function countRef($user_id){
    
    $sql = "SELECT COUNT(id) FROM ref WHERE email = '$user_id' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row['COUNT(id)'];
        
    } else {
        require 0;
    }
}

