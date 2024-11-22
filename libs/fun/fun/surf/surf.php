<?php

//surf info
function surfInfoById($surf_id){
    $uname = test_input($_SESSION['uname']);
    $sql = "SELECT * FROM surf WHERE uname = '$uname' AND id = '$surf_id' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

//surf info ony by id 
//don't edit
function surfInfoByIdOnly($surf_id){
    $sql = "SELECT * FROM surf WHERE id = '$surf_id' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

/*
 * get surf today view
 */
function getSurfTodayViews($surf_id){
    $sql = "SELECT COUNT(id) FROM surf_history WHERE surf_id = '$surf_id' AND date > CURDATE() ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        
        return $row['COUNT(id)'];
    } else {
        return 0;
    }
}

