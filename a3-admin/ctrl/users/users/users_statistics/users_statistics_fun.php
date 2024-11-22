<?php

function totalUsers($type){
    if ($type == 'all'){
        $where = '';
    }elseif ($type == 'active'){
        $type = 1;
        $where = 'WHERE status = '.$type;
    }elseif ($type == 'ban') {
        $type = 0;
        $where = 'WHERE status = '.$type;
    }elseif ($type == 'today') {
        $where = 'WHERE date > CURDATE()';
    } else {
        $type = 1;
        $where = 'WHERE status = '.$type;
    }
    $sql = "SELECT COUNT(id) FROM users  $where ";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row['COUNT(id)'];
    
}