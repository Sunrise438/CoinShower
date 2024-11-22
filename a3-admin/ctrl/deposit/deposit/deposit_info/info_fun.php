<?php      

//today toatal deposited
function todayDeposit(){
    $sql = "SELECT COUNT(id), COUNT(DISTINCT uname), SUM(amount) FROM deposit_history WHERE status = 1 AND date > CURDATE() ";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}