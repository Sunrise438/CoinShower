<?php

function todayShortlinksViews($link){
    //today shortlinks views
    $sql = "SELECT COUNT(id) FROM shortlinks_history WHERE link = '$link' AND date > CURDATE() ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        
        return $row['COUNT(id)'];
    } else {
        return 0;
    }
}