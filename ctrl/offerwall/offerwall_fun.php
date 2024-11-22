<?php

/*
 * get offerwall list
 */
function getOfferwallList(){
    $sql = "SELECT * FROM offerwall_action WHERE status = 1 ORDER BY total_earned DESC";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        $row_arr = array();
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $row_arr[$i] = $row;
            $i++;
        }
        return $row_arr;
    } else {
        return 0;
    }
}