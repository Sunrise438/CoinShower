<?php

//info
//don't edit
function shortlinksInfoById($shortlinks_id){
    $sql = "SELECT * FROM shortlinks WHERE id = '$shortlinks_id' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
    
}