<?php

//surf today view
function surfTodayView($surf_id){
    $sql = "SELECT COUNT(id) FROM surf_history WHERE surf_id = '$surf_id' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        
        return $row['COUNT(id)'];
    } else {
        return 0;
    }
}
