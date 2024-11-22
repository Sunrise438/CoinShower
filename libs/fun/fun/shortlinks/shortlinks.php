<?php

/*
 * shortlinks info
 */
function getShortlinksInfoByLink($links){
    $sql = "SELECT * FROM shortlinks WHERE link = '$links' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
    
}