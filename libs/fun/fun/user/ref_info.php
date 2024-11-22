<?php

//select ref from ref table
function refInfo($username){
    $sql = "SELECT * FROM ref WHERE ref_email = '$username' ";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}