<?php
//today views
function shortlinksTodayViews($link){
    $sql = "SELECT COUNT(id), SUM(amount) FROM shortlinks_history WHERE id = '$link' AND status = 1 ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}