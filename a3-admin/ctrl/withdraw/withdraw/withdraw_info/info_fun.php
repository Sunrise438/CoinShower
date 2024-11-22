<?php      

//toatal pending withdrwal
function totalPendingWithdraw(){
    $sql = "SELECT COUNT(id), SUM(amount) FROM withdraw_history WHERE status = 0 ";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

//toatal pending withdrwal
function todayWithdraw(){
    $sql = "SELECT COUNT(id), SUM(amount) FROM withdraw_history WHERE status = 1 AND date > CURDATE() ";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}